<?php
    session_start();

   //echo $_SESSION['valido'];
    $usuario=$_SESSION['nombre'];

    if(!isset($_SESSION['valido'])){
        header('Location: http://localhost/h3/sign-in/index.html');
        exit();
    }
   /* else{
        echo 'OK';
    }*/

?>
   
    
