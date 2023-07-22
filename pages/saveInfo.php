<?php
    require '../scripts/funciones.php';

    session_start();

    if (!isset($_SESSION["usuario"])) {
        require("nonauthorized.php");
        die();
    }    

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       extract($_POST);
       echo "<br />" . $userName; 
       echo "<br />" . $userBio; 
       echo "<br />" . $userPhone; 
       echo "<br />" . $userEmail; 
       echo "<br />" . $userPassword; 

       echo "<br />";
       var_dump($_FILES);
       $temporal = $_FILES["imagen"]["tmp_name"];
       $nombre_archivo = $_FILES["imagen"]["name"];
   
       $destino = "uploads/";   
       move_uploaded_file($temporal, $destino . $nombre_archivo);   
       $rutaCompleta = $destino . $nombre_archivo;   
       echo "<br />";
       echo "Imagen OK --> " . $rutaCompleta;    
       
       $updateResult = updateUser($userName, $userBio, $userPhone, $userEmail, $userPassword, $rutaCompleta);
       echo "<br />";
       echo "Update OK"; 
    }    

?>