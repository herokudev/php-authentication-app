<?php
    require '../scripts/funciones.php';
    
    session_start();

    if (!isset($_SESSION["usuario"])) {
        require("nonauthorized.php");
        die();
    }    

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($_SESSION["sourcePage"] == 'register') {
            //echo "<br/> Vamos a registrar un nuevo usuario !!";
            $emailExists = checkEmail($email);
            if ($emailExists === true) {
                $_SESSION["mensaje"] = "Este email YA ESTA REGISTRADO !!";
                header("Location: notification.php");   
            } else {
                $securedPWD = hashPassword($password);
                $dbExec = insertUser($email, $securedPWD);
            };
        }

        if ($_SESSION["sourcePage"] == 'login') {
            //echo "<br/> Vamos a validar datos de ingreso !!";
            $emailExists = checkEmail($email);
            if ($emailExists === true) {
                $securedPWD = getPassword($email);
                
                $pwdOK = verifyPassword($password, $securedPWD);
                if ($pwdOK) {
                    //echo " <br/> Password check --> TRUE";        
                    //get user Info

                } else {
                    // "<br/> Password check --> FALSE";
                    $_SESSION["mensaje"] = "Password incorrecto!!";
                    header("Location: notification.php");        
                }                
            } else {
                //echo "<br/> No se puede hacer login --> Email NO REGISTRADO";  
                $_SESSION["mensaje"] = "No se puede hacer login --> Email NO REGISTRADO";
                header("Location: notification.php");         
            }
            
        }      
    }
     
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="userProfile.css">
        <script src="../scripts/main.js" defer></script>
        <title>User Profile</title>
    </head>
    <body>
        <nav class="w-[425px]">
            <ul>
                <li><img class="h-5 w-auto" src="../images/devchallenges.svg" alt="Your Company"></li>
                <li>UserName
                    <div id="toggleBar">
                        <ul>
                            <li class="flex items-center bg-[#F2F2F2] h-[40px] rounded-lg">
                                <img class="h-5 w-auto pr-3" src="../images/profile.svg" alt="profile-icon">
                                <a href="#">My profile</a>
                            </li>
                            <li class="flex">
                                <img class="h-5 w-auto pr-3" src="../images/group.svg" alt="group-icon">
                                <a href="#">Group chat</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="flex">
                            <img class="h-5 w-auto pr-3" src="../images/logout.svg" alt="logout-icon">
                            <a href="logout.php" class=" text-[#EB5757]">Logout</a>
                        </div>
                    </div>                      
                </li>
            </ul>        
        </nav>
  
        <main class="box-content w-[315px] mx-[4%] pl-[2%] my-6">         
            <div class="w-[345px] mb-5 flex flex-col items-center">
                <div class="text-black text-3xl">Personal info</div>
                <div class="text-black">Basic info, like your name and photo</div>                              
            </div>  
            <form class="w-[345px] border-4 border-gray-300 rounded-3xl" action="editInformation.php" method="post">
                <div class="flex items-center justify-between mx-5 pt-3 pb-3">
                    <div>
                        <div class="text-black">Profile</div>
                        <div class="text-gray-400 text-[12px]">Some info may be visible to other people</div>
                    </div>                    
                    <div>
                        <button class="w-[95px] h-[38px] border-[1px] border-[#828282] rounded-lg" type="submit">Edit</button>            
                    </div>
                </div>
                <table class="table-auto w-[340px] mb-3 border-separate border-spacing-5">
                    <tbody>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">PHOTO</p></td>
                        <td class="text-black">IMAGE</td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">NAME</p></td>
                        <td class="text-black">Xanthe Neal</td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">BIO</p></td>
                        <td class="text-black">I am a software developer</td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">PHONE</p></td>
                        <td class="text-black">789456132</td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">EMAIL</p></td>
                        <td class="text-black">xanthe.neal@gmail.com</td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">PASSWORD</p></td>
                        <td class="text-black">**********</td>
                        </tr>                        
                    </tbody>
                </table>                 
                                            
            </form>                      
        </main>
        <script src="https://cdn.tailwindcss.com"></script>
    </body>
</html>