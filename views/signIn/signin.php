<?php define('name', 'Prodigy Studio') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/dist/output.css" rel="stylesheet">
  <link rel="shortcut icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
  <link rel="icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
  <title><?= name ?></title>
</head>
<body>
  <main>

    <div class="h-screen flex">
      <div class="hidden sm:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center">        
        <div>
          <h1 class="text-white font-bold text-4xl font-sans inline-block">Prodigy Studio EMS <img class="inline-block w-16 md:w-24" src="../../Img/prodigyLogo_white.png" alt="logo"> </h1>
          <p class="text-white mt-1">Are you new ?</p>
          <button onclick="location.href='/views/Registration/register.php?user=ticketer'" type="submit" class="block w-48 bg-white text-indigo-800 hover:bg-indigo-800 hover:text-white border hover:border-white transition-all mt-4 py-2 rounded-2xl font-bold mb-2">Register here</button>
        </div>
      </div>
      <div class="flex sm:w-1/2 mx-16 justify-center items-center bg-white">
        <form name="signinform" class="bg-white" method="POST" action="/module/signin/signinValidation.php">
          <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
          <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>
          <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>
            <input class="pl-2 outline-none border-none" type="text" name="username" id="" placeholder="Username" />
          </div>
          <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
            <input class="pl-2 outline-none border-none" type="password" name="password" id="" placeholder="Password" />
          </div>
         
          <button onclick="validation()" name="login_user" type="submit" class="block w-full bg-indigo-600 hover:bg-white hover:text-indigo-700 border hover:border-indigo-700 transition-all mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
          <a href="forgotpwd.php" class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password ?</a>
          <?php if(isset($_GET['signin']) ){ ?>
         <p class="mt-5 text-red-700">Login error, please enter correct credentials<p>
       <?php      }?>      
        </form>
      </div>
    </div>
  </main>
</body>
<?php include "../Template/footer.php" ?>
</html>
<script>  
            function validation()  
            {  
                let username=document.signinform.username.value;  
                let password=document.signinform.password.value;  
                
                if(username.length=="" && password.length=="") {  
                    alert("User Name and Password fields are empty");  
                    
                }  
                else  
                {  
                    if(username.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (password.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  