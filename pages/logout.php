<?php
    //setcookie("connected", false,  -time() );
    setcookie("connected", "false", time() - 3600);
    header('Location: accueil.php');
?>