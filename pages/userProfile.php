<?php
    require '../scripts/funciones.php';
    
    session_start();

    if (!isset($_SESSION["usuario"])) {
        require("nonauthorized.php");
        die();
    }    
    $imageSrc = "../images/profile1.png";
    $navUserName = "User Name";    
    //echo "<br /> Source page --> " . $_SESSION["sourcePage"];

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
                $_SESSION["email"] = $email;
                $_SESSION["pwd"] = $password;
                $_SESSION["name"] = "";
                $_SESSION["bio"] = "";
                $_SESSION["phone"] = "";
                $_SESSION["photo"] = "";              
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
                    //get user Info  --> $_SESSION["item"] = "value";
                    $userData = getUserData($email);

                    $_SESSION["email"] = $email;
                    $_SESSION["pwd"] = $password;
                    $_SESSION["name"] = $userData["Name"];
                    $_SESSION["bio"] = $userData["Bio"];
                    $_SESSION["phone"] = $userData["Phone"];
                    $_SESSION["photo"] = $userData["Photo"];                    
                    $navUserName = $_SESSION["name"];
                    if ($_SESSION["photo"] != "") $imageSrc = "uploads/" . $_SESSION["photo"];
                    
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

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $imageSrc = "./uploads/" . $_SESSION["photo"];
        $navUserName = $_SESSION["name"];    
    }

    if ($_SESSION["sourcePage"] == "edit-Info") {        
       
        $_SESSION["email"] = $_SESSION["newEmail"];
        $_SESSION["name"] = $_SESSION["newName"];
        $_SESSION["bio"] = $_SESSION["newBio"];
        $_SESSION["phone"] = $_SESSION["newPhone"];
        $imageSrc = "./uploads/" . $_SESSION["newPhoto"];
        $navUserName = $_SESSION["newName"];
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
        <nav class="w-[425px] lg:w-[950px] lg:mx-[12%]">
            <ul>
                <li><img class="h-5 w-auto" src="../images/devchallenges.svg" alt="Your Company"></li>
                <li><div class="flex items-center justify-center">                        
                        <div><img class=" h-8 w-auto pr-3" src="<?= $imageSrc ?>" alt="user-photo"></div>
                        <div><?= $navUserName ?></div>
                    </div>
                    <div id="toggleBar">
                        <ul>
                            <li class="flex items-center bg-[#F2F2F2] h-[40px] rounded-lg">
                                <img class="h-5 w-auto pr-3" src="../images/profile.svg" alt="profile-icon">
                                <a href="userProfile.php">My profile</a>
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
  
        <main class="box-content w-[315px] mx-[4%] pl-[2%] my-6 lg:w-[825px] lg:mx-[12%] p-10">         
            <div class="w-[345px] mb-5 flex flex-col items-center lg:w-[525px] lg:mx-[10%] lg:p-10">
                <div class="text-black text-3xl">Personal info</div>
                <div class="text-black">Basic info, like your name and photo</div>                              
            </div>  
            <form class="w-[345px] lg:w-[825px] lg:mx-[12%] lg:p-10 lg:border-4 border-gray-300 rounded-3xl" action="editInformation.php" method="post">
                <div class="flex items-center justify-between mx-5 pt-3 pb-3">
                    <div>
                        <div class="text-black">Profile</div>
                        <div class="text-gray-400 text-[12px]">Some info may be visible to other people</div>
                    </div>                    
                    <div>
                        <button class="w-[95px] h-[38px] border-[1px] border-[#828282] rounded-lg" type="submit">Edit</button>            
                    </div>
                </div>
                <table class="table-auto w-[340px] mb-3 border-separate border-spacing-5 lg:mx-[12%]">
                    <tbody>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">PHOTO</p></td>
                        <td><img class=" h-14 w-auto pr-3" src="<?= $imageSrc?>" alt="user-photo"></td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">NAME</p></td>
                        <td class="text-black"><?= $_SESSION["name"] ?> </td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">BIO</p></td>
                        <td class="text-black"><?= $_SESSION["bio"]?></td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">PHONE</p></td>
                        <td class="text-black"><?= $_SESSION["phone"]?></td>
                        </tr>
                        <tr>
                        <td class="text-gray-400"><p class="ml-5">EMAIL</p></td>
                        <td class="text-black"><?= $_SESSION["email"]?></td>
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