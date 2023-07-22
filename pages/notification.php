<?php
    require '../scripts/funciones.php';
    
    session_start();

    if (!isset($_SESSION["usuario"])) {
        require("nonauthorized.php");
        die();
    }    

    echo $_SESSION["mensaje"];