<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Doc</title>
</head>
<body>
    <button class="green"><a href="register.php">S'inscrire</a></button>
    <button class="green"><a href="login.php">Se connecter</a></button>
    <button class="red"><a href='traitement.php?action=deleteUser'>Se déconnecter</a></button>

    <h1>Connexion</h1>

    <form method="post" action="traitement.php?action=connect">

        <label for="email">Email: </label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="password">Mot de passe: </label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Connexion" name="submit" class="green">

    

    </form><br><br>
    <?php
    // displays messages that we fill in traitement.php
        if(isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            unset($_SESSION["msg"]);
        }
    ?>

    <?php
        if(empty($_SESSION['user'])){
            echo "<p> 0 utilisateurs enregistrés </p>";
        }
    ?>

</body>
</html>