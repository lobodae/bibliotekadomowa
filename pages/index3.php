<?php
session_start();
?>


<!DOCTYPE html>
<!--html lang="en"-->
<html lang="pl">
<head>

    <meta charset="UTF-8"><!--wyswietlanie polskich znakow -->

    <link rel="stylesheet" href="../index3.css">
    <title>BIBLIOTEKA DOMOWA - Dodawanie ksiązki</title>
</head>

<body>
    <section>


        <div class="form-box">
            <div class="form-value">
                <!-- <form action="register.php" method="POST"> -->
                    <h2>Dodawanie książki</h2>

                    <!-- dodanie form action -->
    <form action="../scripts/index3.php" method="post">

                    <div class="inputbox">
                        <!-- <ion-icon name="person-outline"></ion-icon> -->
                        <ion-icon name="pencil-outline"></ion-icon>
                        <input type="text" name="title" required>
                        <label for="username">Tytuł ksiązki</label>
                    </div>
                

                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="author_name" required>
                        <label for="author">Imię autora</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="author_lastname" required>
                        <label for="author_lastname">Nazwisko autora</label>
                    </div>


                    <div class="inputbox">
                 
                        <!-- dać ograniczenie na tylko 4 cyfry -->
                        <input type="text" name="release_date" required>
                        <label for="release_date">Rok wydania</label>
                    </div>

                    <div class="inputbox">
                        <!-- PROBLEM z nachodzeniem sie wyboru kalendarza z "data wydania" -->
                        <input type="date" name="join_date" required>
                        <label for="date">Data dodania do zbioru</label>
                    </div>


                    <!-- Dodanie "wybierz kategorie" z boku -->
                    <div class="inputbox">
                        <select class="custom-select" name="category">
                            <?php
                            require_once "../scripts/connect.php";
                            $sql = "SELECT * FROM `categories`";
                            $result = $conn->query($sql);
                            while($category = $result->fetch_assoc())
                            {
                            echo"<option value='$category[id]'>$category[category]</option>";
                            }
                            ?>
                        </select>

                        <!-- Dodanie "wyboru miejca ksiazki" z boku -->
                            <!-- Dodanie miejsca na ksiazke i  na to z boku -->

                            
<!-- nachodzenie na siesbie slow  -->
                            <div class="input">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="n" checked>
                            <label class="form-check-label">Nieprzeczytana</label>
                            </div>
                        </div>

                        <div class="input">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="y">
                            <label class="form-check-label">Przeczytana</label>
                            </div>
                        </div>
                    
                    <button type="submit">Dodaj książke do zbioru</button>
                    <div class="register">
                        <p>Ta ksiązka jest już w systemie? <a href="index.html"> Wróć do strony głównej </a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
