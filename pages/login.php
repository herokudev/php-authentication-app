<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>      
    </head>
    <body>
        <main class="box-content w-[470px] mx-[4%] pl-[2%] lg:mt-10 lg:ml-[10%] lg:border-4 border-gray-300 rounded-3xl">
            <div class="w-[300px] mx-4 lg:ml-[15%] lg:max-w-[1200px]">
                <div class="w-[300px] mt-10">
                    <img class="h-5 w-auto" src="../images/devchallenges.svg" alt="Your Company">
                </div>
                <div class="w-[275px] mt-6">
                    <p class="text-1xl font-bold text-black">
                        Login
                    </p>
                </div>                                            
            </div>  
            <form class="w-[330px] mx-4 mt-8 max-w-[1200px] lg:ml-[15%]" action="userProfile.php" method="post">
                <div class="w-[300px] mt-3 rounded-lg flex items-center justify-start border-2 border-gray-400">
                    <img class="h-5 w-auto pl-2 pr-2" src="../images/Email.svg" alt="email-icon">
                    <input class="p-2 outline-none" type="email" name="email" id="email" placeholder="Email">
                </div>
                <div class="w-[300px] mt-3 rounded-lg flex items-center justify-start border-2 border-gray-400">
                    <img class="h-5 w-auto pl-2 pr-2" src="../images/Locked.svg" alt="pwd-icon">
                    <input class="p-2 outline-none" type="password" name="password" id="password" placeholder="Password">
                </div>
                <button class="bg-[#2F80ED] text-white w-[300px] h-[38px] mt-6 rounded-lg" type="submit">Login</button>            
            </form>   
            <div class="w-[300px] mx-4 mt-5 lg:ml-[15%] max-w-[1200px]">
                <div class="flex items-center justify-center">
                    <p>or continue with these social profile</p>
                </div>
                <div class="flex items-center justify-center mt-5">
                    <img class="w-[42px] h-[42px]" src="../images/Google.svg" alt="google-icon">
                    <img class="w-[42px] h-[42px]" src="../images/Facebook.svg" alt="facebook-icon">
                    <img class="w-[42px] h-[42px]" src="../images/Twitter.svg" alt="twitter-icon">
                    <img class="w-[42px] h-[42px]" src="../images/Github.svg" alt="github-icon">
                </div>
                <div class="flex items-center justify-center mt-5 mb-10">
                    <p>Already a member? <a href="../index.php" class=" text-[#2D9CDB]">Register</a></p>
                </div>
            </div>                      
        </main>
        <script src="https://cdn.tailwindcss.com"></script>
        <?php
            session_start();
            $_SESSION["usuario"] = "";
            $_SESSION["sourcePage"] = "login";
        ?>        
    </body>
</html>