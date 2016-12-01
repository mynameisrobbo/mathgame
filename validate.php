<?php
    session_start();
    extract($_POST);
    $_SESSION["email"] = $email;
    $_SESSION["pwd"] = $password;
    $incorrectSignin = "<p>Incorrect Credentials";
    
    if ($email == "a@a.a" && $password == "aaa") {
        header("Location:index.php");
        die();
    } else { 
        header("Location:signin.php?msg=$incorrectSignin");
        die();
    }
?>