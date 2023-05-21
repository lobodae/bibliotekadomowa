<?php
session_start();
?>


<!DOCTYPE html>
<!--html lang="en"-->
<html lang="pl">
<head>

    <meta charset="UTF-8"><!--wyswietlanie polskich znakow -->

    <link rel="stylesheet" href="index.css">
    <title>BIBLIOTEKA DOMOWA - Rejestracja użytkownika</title>
</head>

<body>
    <section>


        <div class="form-box">
            <div class="form-value">
                <!-- <form action="register.php" method="POST"> -->
                    <h2>Rejestracja użytkownika</h2>

                    <!-- dodanie form action -->
    <form action="../scripts/index2.php" method="post">

                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="user_name" required>
                        <label for="username">Nazwa użytkownika</label>
                    </div>
                

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email1" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email2" required>
                        <label for="email">Potwierdź Email</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password1" required>
                        <label for="password">Hasło</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password2" required>
                        <label for="password">Potwierdź hasło</label>
                    </div>
                    
                    <button type="submit">Utwórz konto czytelnika</button>
                    <div class="register">
                        <p>Masz już konto? <a href="index.html">Zaloguj się</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
