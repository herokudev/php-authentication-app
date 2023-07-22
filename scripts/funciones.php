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

    function updateUser($userName, $userBio, $userPhone, $userEmail, $userPassword, $rutaCompleta) {
        $mysqli = new mysqli("localhost", "root", "", "empresa");
        $query = "update usuarios set Name='$userName', pwd='$userPassword', Bio='$userBio', Phone='$userPhone', Photo='$rutaCompleta' where email='$userEmail'";
        $resultado = $mysqli->query($query);
        mysqli_close($mysqli);
        return $resultado;
    };    

?>