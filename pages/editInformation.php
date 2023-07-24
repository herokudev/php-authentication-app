<?php
    require '../scripts/funciones.php';

    session_start();

    if (!isset($_SESSION["usuario"])) {
        require("nonauthorized.php");
        die();
    }
    $imageSrc = "../images/profile2.png";    
    if ($_SESSION["photo"] != "") $imageSrc = "uploads/" . $_SESSION["photo"];

    if(isset($_POST['submit'])) {

        $_SESSION["newName"] = $_POST['userName'];
        $_SESSION["newBio"] = $_POST['userBio'];
        $_SESSION["newPhone"] = $_POST['userPhone'];
        $_SESSION["newEmail"] = $_POST['userEmail'];
        $_SESSION["newPassword"] = $_POST['userPassword'];
        $_SESSION["newPhoto"] = $imageSrc;
        if ($_FILES["imagen"]["name"] != "") {
            $_SESSION["newPhoto"] = $_FILES["imagen"]["name"];
        }        

        $temporal = $_FILES["imagen"]["tmp_name"];
        $nombre_archivo = $_FILES["imagen"]["name"];

        $destino = "uploads/";   
        move_uploaded_file($temporal, $destino . $nombre_archivo);   
        
        $userId = getUserId($_SESSION["email"]);
        echo "<br /> Email --> " . $_SESSION["email"];
        echo "<br /> New Email --> " . $_SESSION["newEmail"];
        echo "<br /> userId --> " . $userId;

        $securedPWD = hashPassword($_SESSION["newPassword"]);

        $updateResult = updateUser($userId, $_SESSION["newName"], $_SESSION["newBio"], $_SESSION["newPhone"], $_SESSION["newEmail"], $securedPWD, $nombre_archivo);        
        $_SESSION["sourcePage"] = "edit-Info";       
        echo "<br /> updateResult --> " . $updateResult;
        header("Location: userProfile.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="editInformation.css">
        <script src="../scripts/main.js" defer></script>
        <title>Edit Information</title>
    </head>
    <body>
        <nav class="w-[425px] lg:w-[950px] lg:mx-[12%]">
            <ul>
                <li><img class="h-5 w-auto" src="../images/devchallenges.svg" alt="Your Company"></li>
                <li>
                    <div class="flex items-center justify-center">                        
                        <div><img class=" h-8 w-auto pr-3" src="<?= $imageSrc ?>" alt="user-photo"></div>
                        <div><?= $_SESSION["name"]?></div>
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
        <div class="flex  mx-[4%] pl-[2%] lg:mx-[12%]">
            <img class="h-5 w-auto pr-3" src="../images/back.svg" alt="back-icon">
            <a href="userProfile.php" class=" text-[#2D9CDB]">Back</a>
        </div>          
        <main class="box-content w-[625px] mx-[4%] p-10 my-6 border-4 border-gray-300 rounded-3xl lg:mx-[12%]">     
            <div>
                <div class=" text-2xl">Change Info</div>
                <div class=" text-sm text-gray-400">Changes wil be reflected to every services</div>
            </div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                <div class="flex items-center justify-start mt-5">
                    <div><img class="h-20 w-auto pr-3" src="<?= $imageSrc?>" alt="user-photo"></div>
                    <label class="change-photo">
                        <input class="input-file" type="file" name="imagen" id="image"/>
                        <span>CHANGE PHOTO</span>
                    </label>
                </div>
                <div class="mt-5">
                    <span>Name</span>
                    <div class="w-[415] h-[52px] border-[1px] border-[#828282] rounded-[12px]">
                        <input class="ml-2 p-3 outline-none" type="text" name="userName" id="userName" value="<?= $_SESSION["name"]?>" placeholder="Enter your name...">
                    </div>
                </div>
                <div class="mt-5">
                    <span>Bio</span>
                    <div class="w-[415] h-[52px] border-[1px] border-[#828282] rounded-[12px]">
                        <input class="ml-2 p-3 outline-none" type="text" name="userBio" id="userBio" value="<?= $_SESSION["bio"]?>" placeholder="Enter your bio...">
                    </div>
                </div>            
                <div class="mt-5">
                    <span>Phone</span>
                    <div class="w-[415] h-[52px] border-[1px] border-[#828282] rounded-[12px]">
                        <input class="ml-2 p-3 outline-none" type="text" name="userPhone" id="userPhone" value="<?= $_SESSION["phone"]?>" placeholder="Enter your phone...">
                    </div>
                </div>            
                <div class="mt-5">
                    <span>Email</span>
                    <div class="w-[415] h-[52px] border-[1px] border-[#828282] rounded-[12px]">
                        <input class="ml-2 p-3 outline-none" type="email" name="userEmail" id="userEmail" value="<?= $_SESSION["email"]?>" placeholder="Enter your email...">
                    </div>
                </div> 
                <div class="mt-5">
                    <span>Password</span>
                    <div class="w-[415] h-[52px] border-[1px] border-[#828282] rounded-[12px]">
                        <input class="ml-2 p-3 outline-none" type="password" name="userPassword" id="userPassword" value="<?= $_SESSION["pwd"]?>" placeholder="Enter your password...">
                    </div>
                </div>  
                <input class="bg-[#2F80ED] text-white w-[82px] h-[38px] mt-6 rounded-lg" type="submit" value="Save" name="submit">
                
            </form>               
        </main>
        <script src="https://cdn.tailwindcss.com"></script>          
    </body>
</html>