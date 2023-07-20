<?php
    echo "User profile page --> 123";
    session_start();
/*
    if (!isset($_SESSION["usuario"])) {
        require("nonauthorized.php");
        die();
    }
*/    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="userProfile.css">
        <script src="main.js" defer></script>
        <title>User Profile</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><img class="h-5 w-auto" src="./images/devchallenges.svg" alt="Your Company"></li>
                <li>UserName
                    <div id="toggleBar">
                        <ul>
                            <li class="flex items-center bg-[#F2F2F2] h-[40px] rounded-lg">
                                <img class="h-5 w-auto pr-3" src="./images/profile.svg" alt="profile-icon">
                                <a href="#">My profile</a>
                            </li>
                            <li class="flex">
                                <img class="h-5 w-auto pr-3" src="./images/group.svg" alt="group-icon">
                                <a href="#">Group chat</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="flex">
                            <img class="h-5 w-auto pr-3" src="./images/logout.svg" alt="logout-icon">
                            <a href="logout.php" class=" text-[#EB5757]">Logout</a>
                        </div>
                    </div>                      
                </li>
            </ul>        
        </nav>
  
        <main class="box-content mx-[5%] pl-[15%] my-6 border-4 border-green-400 rounded-3xl">         
            <div class="w-[475px] border-2 border-purple-500 lg:ml-[20%] max-w-[1200px]">
                <a href="logout.php">Logout</a>                                  
            </div>  
            <form class="w-[475px] border-2 border-purple-500 lg:ml-[20%] max-w-[1200px]" action="userProfile.php" method="post">
                <div class="flex items-center justify-start">
                    <img class="h-5 w-auto" src="./images/Email.svg" alt="email-icon">
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="flex items-center justify-start">
                    <img class="h-5 w-auto" src="./images/Locked.svg" alt="pwd-icon">
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <button class="bg-[#2F80ED] text-white w-[470px] h-[38px] rounded-lg" type="submit">Start coding now</button>            
            </form>   
            <div class="w-[475px] border-2 border-purple-500 lg:ml-[20%] max-w-[1200px]">
                <div>
                    <p>or continue with these social profile</p>
                </div>
                <div class="flex items-center justify-center">
                    <img class="w-[42px] h-[42px]" src="./images/Google.svg" alt="google-icon">
                    <img class="w-[42px] h-[42px]" src="./images/Facebook.svg" alt="facebook-icon">
                    <img class="w-[42px] h-[42px]" src="./images/Twitter.svg" alt="twitter-icon">
                    <img class="w-[42px] h-[42px]" src="./images/Github.svg" alt="github-icon">
                </div>
                <div>
                    <p>Already a member? Login</p>
                </div>
            </div>                      
        </main>
        <script src="https://cdn.tailwindcss.com"></script>
    </body>
</html>