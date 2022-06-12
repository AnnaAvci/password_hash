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

    <h1>Inscription</h1>

    <form method="post" action="traitement.php?action=addUser">

    <label for="email">Email: </label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="password">Mot de passe: </label><br>
    <input type="password" id="password" name="password"><br><br>

    <label for="passwordConf">Répéter mot de passe: </label><br>
    <input type="password" id="passwordConf" name="passwordConf"><br><br>

    <input type="submit" value="Inscription" name="submit" class="green">

    </form><br><br>

    <?php
     if(empty($_SESSION['user'])){
        echo "<p>0 utilisateurs enregistrés</p>";
    }
    

     print_r($_SESSION);


   
?>

</body>
</html>