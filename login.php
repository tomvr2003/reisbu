<?php

use LDAP\Result;

 session_start();
    include("./components/head.php");
    include("./components/header.php");
?>

<main>
    <section class="section-login">
        <div class="section-login-left">
            <img src="./assets/banner-login.png" alt="banner-login" class="login-banner">
        </div>
        <div class="section-login-right">
            <?php 
                    require("./components/connection.php");

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $usernameOrEmail = $_POST['username'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM login WHERE (username = :username OR email = :email) AND password = :password";
                    $statement = $conn->prepare($sql);
                    $statement->bindParam(":username", $usernameOrEmail);
                    $statement->bindParam(":email", $usernameOrEmail);
                    $statement->bindParam(":password", $password);
                    $statement->execute();

                    $result = $statement->fetch(PDO::FETCH_ASSOC);

                    if ($result) {
                        $_SESSION["username"] = $result["username"];
                        $_SESSION["isadmin"] = $result ["isadmin"];
                        $_SESSION["id"] = $result ["id"];
                        $_SESSION["email"] = $result["email"];
                        header("Location: ./index.php");
                    } else {
                        echo "<p style='margin-bottom: 35px; font-weight: 500;'>Invalid username/email or password</p>";
                    }
                }
            ?>
        <form id="login-form" action="login.php" method="POST" class="login-form" onsubmit="return loginValidatie()">
            <h1 style="margin-bottom: 10px;" class="login-form-title">Login</h1>
            <input type="text" id="username" name="username" placeholder="Gebruikersnaam of Email">
            <input style="margin-bottom: 20px;" type="password" id="password" name="password" placeholder="Wachtwoord">
            <button style="background-color: #7189FF; margin-bottom: 20px;" type="submit" name="login">Log in</button>
        </form>
        <p>Geen account? <a href="./register.php"><span class="register-text">Registreer</span></a></p>
        <p style="margin-top: 10px;">Wachtwoord vergeten? <a href="#"><span class="register-text">Reset</span></a></p>

        <script>
            function loginValidatie() {
                var usernameInput = document.getElementById("username");
                var passwordInput = document.getElementById("password");
                var restrictedCharacters = /[!@#$%^&*]/;

                if (restrictedCharacters.test(usernameInput.value.trim())) {
                    alert("Gebruikersnaam kan niet deze karakters bevatten: !@#$%^&*");
                    usernameInput.focus();
                    return false;
                }

                if (usernameInput.value.trim() === "") {
                    alert("Voer een geldige gebruikersnaam of email in");
                    usernameInput.focus();
                    return false;
                }

                if (passwordInput.value.trim() === "") {
                    alert("Voer een wachtwoord in.");
                    passwordInput.focus();
                    return false;
                }

                return true;
            }
        </script>
    </section>
</main>

<?php
include("./components/footer.php");
?>