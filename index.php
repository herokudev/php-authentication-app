<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    </head>
    <body>
        <main class="box-content mx-[5%] pl-[15%] my-6 border-4 border-green-400 rounded-3xl">
            <div class="w-[475px] border-2 border-purple-500 lg:ml-[20%] max-w-[1200px]">
                <div class="w-[300px]">
                    <img class="h-5 w-auto" src="./images/devchallenges.svg" alt="Your Company">
                </div>
                <div class="w-[275px]">
                    <p class="text-1xl font-bold text-black">
                        Join thousands of learners from around the world
                    </p>
                </div>       
                <div class="w-[300px]">
                    <p class="text-sm font-bold text-gray-400">
                        Master web development by making real-life projects. There are multiple paths for you to chose
                    </p>
                </div>                                         
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
                <button type="submit">Start coding now</button>            
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