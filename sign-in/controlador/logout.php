<?php
    session_start();
    unset($_SESSION['nombre']);
    unset($_SESSION['valido']);
    unset($_SESSION['id']);

    session_destroy();

    header('Location: http://localhost/h3/sign-in/index.html');


?>