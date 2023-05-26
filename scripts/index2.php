<?php
//DODAWANIE UŻYTKOWNIKA wsm nie działają te alerty xd

// //sanityzacja, abysmy nie mieli znakow specjalnych w inputach
// function sanitizeInput($input)
// {
//     $input = trim($input);//usuwanie bialych znakow np tab, spacja
//     $input = stripcslashes($input);
//     $input = htmlentities($input);
    
//     return $input;

// }


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $required_fields = ["user_name", "email1", "email2", "password1", "password2"];
require_once "./connect.php";



session_start();

$errors = [];

foreach($required_fields as $value)
{
    if(empty($_POST[$value]))
    {
        $errors[] = "Pole <b>$value</b> jest wymagane";
    }
}

//mail

if($_POST["email1"] != $_POST["email2"]){
    //$error = 1;
    //$_SESSION["error"] = "Adresy email sa rozne";
    $errors[] = "Adresy email sa rozne";
}

//haslo

if($_POST["password1"] != $_POST["password2"]){
    //$error = 1;
    //$_SESSION["error"] = "Hasla sa rozne";
    $errors[] = "hasla sa rozne";
// }else
// {
//     //walidacja hasla, male litery, duze litery, 1 cyfra,jeden znak specjalny, min 8
//     if(!preg_match('/^(?=.*[a-z])(?=[A-Z])(?=.*\d)(?=.*[^\w\d\s])\S{8,}$/', $_POST["password1"]))
//     {
//     //$error = 1;
//     //$_SESSION["error"] = "Haslo nie spelnia wymagan";
//     $errors[] = "Haslo nie spelnia wymagan";
//     }
}


//musi byc na samym koncu implode aby wszystko dzialalo
if(!empty($errors))
{
    $_SESSION["error"] = implode("<br>", $errors);
    echo "<script>history.back();</script>";
    exit;
}


//czy jest duplikacja adresu email | wersja tomka
require_once "./connect.php";
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $_POST["email1"]);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0)
{
    $_SESSION["error"] = "Adres email juz jest w bazie";
    $error++;
}

//czy jest duplikacja nazwy użytkownika
require_once "./connect.php";
$stmt = $conn->prepare("SELECT * FROM users WHERE user_name=?");
$stmt->bind_param("s", $_POST["user_name"]);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0)
{
    $_SESSION["error"] = "Dana nazwa użytkownika juz jest w bazie";
    $error++;
}



/*pana wersja
$result = $stmt->get_result();

if($result->num_rows != 0)
{
    $_SESSION["error"] = "Adres $_POST[email1] jest zajety";
    echo "<script>history.back();</script>";
    exit();
}


*/

//cofanie do strony
if($error !=0)
{
   echo "<script>history.back();</script>";
    exit();

}


// //uzycie sanitizeInput

// foreach ($_POST as $key => $value){
//     if (!$_POST["password1"] && ["password2"])
//     {
//         sanitizeInput($_POST["$key"]);
//     }
// }

//hashowanie hasla
$stmt= $conn->prepare("INSERT INTO `users` ( `user_name`, `email`, `password`, `created_at`) 
VALUES (?, ?, ?, current_timestamp());");

$pass = password_hash('$_POST["password1"]', PASSWORD_ARGON2ID);  

//$avatar = ($_POST["gender"] == 'm') ? './jpg/man.png' : './jpg/woman.png';

$stmt->bind_param('sss', $_POST["user_name"], $_POST["email1"], $pass);

$stmt->execute();

if($stmt->affected_rows == 1)
{
    $_SESSION["success"] = "Dodano uzykownika $_POST[user_name]";

}
else
{
    $_SESSION["error"] = "Nie udalo sie dodac uzytkownika";

}
header("location:../pages/index2.php");

}