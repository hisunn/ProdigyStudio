<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="bg-indigo-400">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pagecdn.io/lib/font-awesome/5.10.0-11/css/all.min.css" integrity="sha256-p9TTWD+813MlLaxMXMbTA7wN/ArzGyW/L7c5+KkjOkM=" crossorigin="anonymous">
    <title>Prodigy Studio</title>
</head>

<body>

    <div class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
        <div class="bg-gradient-to-tr from-blue-800 to-purple-700 ">
            <div class="flex bg-green-100  p-4  text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Success alert!</span> Please Login using your credential :D
                </div>
            </div>

        </div>
        <span class="text-indigo-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0" style="top: 50%;">
            <i class="fas fa-circle-notch fa-spin fa-5x"></i>
        </span>
    </div>
</body>

</html>


<script>
    const myTimeout = setTimeout(redirect, Math.floor((Math.random() * 3000) + 500));

    function redirect() {
        location.href = "../../views/index.php";
    }
</script>