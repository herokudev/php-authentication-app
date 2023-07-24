<?php

    function checkEmail($email) {
        $mysqli = new mysqli("localhost", "root", "", "empresa");
        
        $query = "select * from usuarios where email='$email'";
        $resultado = $mysqli->query($query);
        $numfilas = $resultado->num_rows;
        mysqli_close($mysqli);
        if ($numfilas === 1) {
            return true;
        } else {
            return false;
        }        
    };

    function getPassword($email) {
        $mysqli = new mysqli("localhost", "root", "", "empresa");
        
        $query = "select pwd from usuarios where email='$email'";
        $resultado = $mysqli->query($query);
        $numfilas = $resultado->num_rows;
        $datos = $resultado->fetch_assoc();        
        mysqli_close($mysqli);
        if ($numfilas === 1) {
            return $datos["pwd"];
        } else {
            return "";
        }              
    }

    function getUserId($email) {
        $mysqli = new mysqli("localhost", "root", "", "empresa");
        
        $query = "select id from usuarios where email='$email'";
        $resultado = $mysqli->query($query);
        $numfilas = $resultado->num_rows;
        $datos = $resultado->fetch_assoc();        
        mysqli_close($mysqli);
        if ($numfilas === 1) {
            return $datos["id"];
        } else {
            return "";
        }              
    }   
    
    function getUserData($email) {
        $mysqli = new mysqli("localhost", "root", "", "empresa");
        
        $query = "select * from usuarios where email='$email'";
        $resultado = $mysqli->query($query);
        $numfilas = $resultado->num_rows;
        $datos = $resultado->fetch_assoc();        
        mysqli_close($mysqli);
        if ($numfilas === 1) {
            return $datos;
        } else {
            return "";
        }              
    }   

    function hashPassword($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $hashedPassword;
    }    

    function verifyPassword($plaintextPassword, $hashedPassword) {
        $isMatch = password_verify($plaintextPassword, $hashedPassword);

        // Return the result (true if they match, false otherwise)
        return $isMatch;
    }   
    
    function insertUser($email, $securedPWD) {
        $mysqli = new mysqli("localhost", "root", "", "empresa");
        $query = "insert into usuarios(email, pwd) values('$email', '$securedPWD')";
        $resultado = $mysqli->query($query);
        mysqli_close($mysqli);
        return $resultado;
    };

    function updateUser($userId, $userName, $userBio, $userPhone, $userEmail, $userPassword, $nombre_archivo) {
        $mysqli = new mysqli("localhost", "root", "", "empresa");
        $query = "update usuarios set Name='$userName', email='$userEmail', pwd='$userPassword', Bio='$userBio', Phone='$userPhone', Photo='$nombre_archivo' where id='$userId'";
        $resultado = $mysqli->query($query);
        mysqli_close($mysqli);
        return $resultado;
    };    

?>