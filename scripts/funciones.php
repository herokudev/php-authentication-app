<?php

    function getUsuarios() 
    {
        $conexion = mysqli_connect("localhost", "root", "", "empresa");
        $respuesta = mysqli_query($conexion, "Select * from usuarios");    
        $datos = mysqli_fetch_assoc($respuesta);
        mysqli_close($conexion);
        return $datos;
    };

?>