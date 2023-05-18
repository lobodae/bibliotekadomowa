<?php
//połaczenie z baza danych biblioteka_domowa
$conn = new mysqli("localhost", "root", "", "biblioteka_domowa" );

if($conn)
{
    echo "Connected";
}
else
{
    die(mysqli_error($conn));
}
//
?>