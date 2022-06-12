<?php
session_start();

// w/o if isset the browser won't reognize the 'action' in the switch
if(isset($_GET['action'])) {

    switch($_GET['action']){
        case "addUser":
            if(isset($_POST['submit'])){
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $passwordConf = filter_input(INPUT_POST, "passwordConf", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                if($password === $passwordConf){
                    if($email && $password && $passwordConf){
                        // 'user' can be declared here for the 1st time, we just need to know it's an array
                        $user = [
                            "email" => $email,
                        // the session needs to stock the hashed password, we can hash it at this stage
                            "password" => password_hash($password, PASSWORD_DEFAULT)
                        // no need to add the confirmation password here, but we need to sanitize it at the earlier stage
                        ];
                        $_SESSION['user'][] = $user;
                        
                    } 
                    
                    $_SESSION["msg"] = "<span style='color:green'><p>L'inscription est réussie!</p></span>"; 
                    header("Location: register.php");die;
                } else {
                    $_SESSION["msg"] =  "<span style='color:red'><p>Les mots de passe ne correspondent pas!</p></span>";
                    header("Location: register.php");die;
                } 
            }
            
         
            break;
    
        case "deleteUser":
            unset($_SESSION['user']);
            header("Location:register.php");die;
            break;
        
        case "connect":
            if(isset($_POST['submit'])){
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
    
                foreach($_SESSION['user'] as $user){
                
                    if(in_array($email, $user)){
                        // $_SESSION["msg"] = "<span style='color:green'><p> Adresse mail correcte! </p></span>";
                        // header("Location: login.php");die;
                        if(password_verify( $password, $user['password'])){
                            $_SESSION["msg"] = "<span style='color:green'><p>Mot de passe correct!</p></span>";
                            header("Location: login.php");die;
                        } else {
                            $_SESSION["msg"] ="<span style='color:red'><p>Mot de passe incorrect!</p></span>";
                            header("Location: login.php");die;
                        }
                    } else {
                        // ['msg'] is an array in $_SESSION, which will only serve to show a current message; there needs to be a function in every "view" ti make it work
                        $_SESSION["msg"] = "<span style='color:red'><p> Cet utilisateur n'existe pas! </p></span>";
                        header("Location: login.php");die;
                    }
                    die;
                }
    
            } 
          
        break;
    }   
}






