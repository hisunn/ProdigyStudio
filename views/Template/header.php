<?php
session_start();
define('name', 'Prodigy Studio');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> <!-- using the third party API that are not controlled by us  -->
  <script src="https://cdn.tiny.cloud/1/oyc8ug17t9qb18bib51wxeyczua0yjkw9hnhoztwgiautrur/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../../node_modules/jquery-ui-1.13.1/jquery-ui.css">
  <script src="../../node_modules/jquery-ui-1.13.1/jquery-ui.js"></script>
  <link href="http://fonts.cdnfonts.com/css/harlow-solid-italic" rel="stylesheet">
  <script src="../../node_modules/alpinejs/dist/cdn.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js" integrity="sha256-ErZ09KkZnzjpqcane4SCyyHsKAXMvID9/xwbl/Aq1pc=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  <script>
    tinymce.init({
      selector: '#mytextarea',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code visualchars wordcount',
      setup: function(editor) {
        var max = 150;
        editor.on('submit', function(event) {
          var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();
          if (numChars > max) {
            alert("Maximum " + max + " characters allowed.");
            event.preventDefault();
            return false;
          }
        });
      }
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#btn_sidebar").click(function() {
        $("#sidebar").toggle(1000);
      });
    });
  </script>
  <script>
    var cont = 0;

    function loopSlider() {
      var xx = setInterval(function() {
        switch (cont) {
          case 0: {
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
            cont = 1;

            break;
          }
          case 1: {

            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
            cont = 0;
            break;
          }
        }
      }, 8000);
    }

    function reinitLoop(time) {
      clearInterval(xx);
      setTimeout(loopSlider(), time);
    }
    function sliderButton1() {
      $("#slider-2").fadeOut(400);
      $("#slider-1").delay(400).fadeIn(400);
      $("#sButton2").removeClass("bg-purple-800");
      $("#sButton1").addClass("bg-purple-800");
      reinitLoop(6000);
      cont = 0
    }
    function sliderButton2() {
      $("#slider-1").fadeOut(400);
      $("#slider-2").delay(400).fadeIn(400);
      $("#sButton1").removeClass("bg-purple-800");
      $("#sButton2").addClass("bg-purple-800");
      reinitLoop(4000);
      cont = 1
    }
    $(window).ready(function() {
      $("#slider-2").hide();
      $("#sButton1").addClass("bg-purple-800");
      loopSlider();
    });
  </script>

  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font-family: Verdana, sans-serif;
    }
    .mySlides {
      display: none;
    }
    img {
      vertical-align: middle;
    }
    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }
    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }
    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }
    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }
    .active {
      background-color: #717171;
    }
    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }
    @keyframes fade {
      from {
        opacity: .4
      }
      to {
        opacity: 1
      }
    }
    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {
        font-size: 11px
      }
    }    
  </style>
  <link href="/dist/output.css" rel="stylesheet">
  <script src="/node_modules/chart.js/dist/chart.min.js"></script>
  <link rel="shortcut icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
  <link rel="icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
  <style>
    [x-cloak] {
      display: none;
    }
    .duration-300 {
      transition-duration: 300ms;
    }
    .ease-in {
      transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
    }
    .ease-out {
      transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }
    .scale-90 {
      transform: scale(.9);
    }
    .scale-100 {
      transform: scale(1);
    }
  </style>
  <title><?php echo name ?></title>
</head>

<body>
  <header>
    <nav class="p-6 mb-2 shadow-md">
      <div class="flex justify-between items-center">
        <div>
          <a href="../index.php">
            <h1 class="pr-6 border-r-2 text-2xl font-bold text-gray-800">
              <svg class="inline" version="1.0" xmlns="http://www.w3.org/2000/svg" width="65px" height="60px" viewBox="0 0 262.000000 262.000000" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,262.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                  <path d="M1330 2244 c-61 -52 -109 -190 -110 -314 l0 -56 -47 6 c-35 4 -49 10
  -51 23 -3 13 3 17 28 17 25 0 31 4 28 18 -2 9 -13 18 -25 20 -38 6 -70 -67
  -42 -95 29 -29 -37 -77 -69 -51 -13 11 -15 9 -9 -19 5 -28 3 -35 -18 -49 -37
  -24 -51 -12 -59 50 -5 48 -3 60 13 78 12 12 26 18 35 15 30 -12 19 40 -14 65
  -31 23 -42 72 -17 81 6 2 4 3 -6 1 -11 -1 -21 6 -26 19 -14 37 -47 60 -75 53
  -32 -8 -52 -42 -36 -61 10 -12 15 -11 33 5 26 25 47 26 47 1 0 -12 -9 -21 -26
  -25 -23 -6 -24 -9 -11 -19 25 -21 25 -41 0 -69 -17 -17 -27 -42 -30 -72 -5
  -42 -8 -46 -33 -46 -27 0 -60 -26 -60 -48 0 -17 37 -52 54 -52 9 0 12 7 9 20
  -9 35 23 35 69 -2 38 -30 48 -33 108 -32 36 0 76 4 90 8 24 8 24 7 -5 -18 -16
  -14 -36 -25 -43 -26 -8 0 -12 -10 -10 -27 3 -26 0 -28 -32 -28 -28 0 -35 4  
  -34 18 3 27 -30 17 -34 -11 -4 -26 -14 -28 -32 -7 -11 13 -10 18 5 29 22 16
  14 46 -13 46 -30 0 -54 -33 -46 -64 6 -25 4 -26 -33 -26 -22 0 -62 -7 -89 -15
  -54 -16 -94 -19 -94 -7 0 15 22 30 36 25 8 -3 14 1 14 9 0 8 10 24 23 36 18
  17 26 19 35 10 9 -9 12 -7 12 10 0 29 -38 62 -71 62 -65 0 -109 -89 -79 -159
  12 -29 10 -33 -46 -95 l-59 -64 -5 41 c-5 45 -28 60 -55 37 -19 -16 -19 -50
  -1 -50 9 0 16 -12 18 -27 2 -22 9 -29 31 -31 27 -3 27 -4 27 -72 0 -77 27
  -163 65 -208 l23 -27 -24 -18 c-22 -16 -23 -16 -33 0 -8 16 -10 14 -16 -10 -8
  -30 16 -67 42 -67 8 0 13 -12 13 -34 0 -38 33 -86 59 -86 22 0 41 19 41 43 0
  15 -5 18 -25 13 -30 -8 -32 4 -6 28 14 13 28 16 55 11 28 -6 37 -4 42 9 3 9 0
  23 -7 32 -12 14 -14 14 -21 -5 -4 -12 -12 -21 -18 -21 -18 0 -23 30 -11 57 11
  24 15 25 62 20 64 -8 69 -12 69 -50 0 -18 9 -49 19 -69 19 -35 20 -36 1 -53
  -10 -9 -24 -14 -30 -10 -8 5 -11 1 -8 -11 2 -10 16 -25 31 -32 19 -9 27 -21
  27 -38 0 -16 -5 -24 -12 -21 -7 2 -12 12 -10 21 4 23 -26 32 -46 13 -14 -15
  -14 -18 3 -37 28 -31 77 -26 120 11 19 17 38 42 41 56 4 16 10 21 16 15 11
  -11 1 -92 -10 -92 -4 0 -8 -15 -9 -34 -2 -27 2 -36 17 -41 28 -9 60 12 72 47
  9 25 12 28 20 14 5 -9 18 -16 28 -16 14 0 20 -7 20 -24 0 -13 -6 -27 -12 -29
  -7 -3 -3 -6 10 -6 31 -1 28 -27 -5 -37 -16 -4 -31 -7 -35 -6 -12 3 -10 -26 2
  -33 6 -3 10 -18 10 -32 0 -23 3 -25 32 -21 28 5 29 4 13 -9 -40 -29 -99 -7
  -89 32 5 21 2 25 -15 25 -12 0 -21 6 -21 15 0 8 7 15 15 15 8 0 15 5 15 10 0
  17 -56 11 -73 -8 -24 -27 -21 -76 6 -108 20 -23 34 -28 84 -32 l61 -4 5 -40
  c10 -78 75 -111 131 -67 32 26 33 50 2 86 -20 23 -28 26 -43 17 -10 -6 -19
  -21 -21 -33 -2 -12 -8 -19 -13 -16 -17 11 -9 56 22 121 39 81 46 135 25 207
  -13 44 -26 64 -64 96 -40 34 -45 43 -36 58 15 23 58 24 62 1 2 -13 -1 -16 -12
  -12 -20 8 -21 -10 -1 -26 23 -19 45 -4 45 29 l0 29 58 -15 c56 -15 156 -14
  210 3 17 5 22 2 22 -13 0 -41 42 -57 61 -22 10 19 9 20 -11 14 -18 -6 -21 -3
  -18 12 4 23 37 28 63 9 19 -14 18 -16 -32 -63 -37 -35 -54 -60 -63 -93 -19
  -70 -8 -157 29 -226 30 -57 38 -93 24 -107 -4 -4 -12 6 -19 23 -15 35 -36 38
  -64 10 -45 -45 -12 -110 56 -110 40 0 72 36 80 92 7 38 7 38 55 38 36 0 55 6
  78 26 39 32 51 86 26 114 -19 21 -75 28 -75 10 0 -5 5 -10 10 -10 19 0 10 -28
  -11 -33 -15 -4 -20 -11 -15 -23 3 -9 1 -23 -5 -30 -13 -16 -65 -19 -74 -4 -4
  6 5 10 19 10 18 0 26 5 26 18 0 9 3 26 6 37 4 16 -3 24 -30 38 -40 19 -47 37
  -14 37 17 0 19 3 10 12 -19 19 -15 48 8 48 11 0 23 7 26 15 9 24 21 18 27 -14
  4 -17 16 -35 28 -41 26 -14 69 -5 69 15 0 18 -23 32 -28 17 -2 -7 -10 -12 -19
  -12 -23 0 -11 35 14 38 19 3 21 7 13 28 -6 14 -10 37 -10 51 0 23 3 21 46 -26
  25 -28 57 -54 70 -57 34 -9 76 21 72 49 -4 30 -45 36 -50 7 -4 -26 -22 -27
  -26 -1 -2 13 6 24 24 33 31 15 43 38 20 38 -30 0 -37 34 -16 76 11 21 20 50
  20 65 0 21 7 29 31 38 63 22 99 9 99 -36 0 -16 -6 -23 -20 -23 -11 0 -20 5
  -20 11 0 5 -5 7 -11 4 -5 -4 -9 -14 -7 -23 3 -13 14 -17 47 -17 43 0 76 -24
  58 -42 -5 -4 -12 -2 -16 5 -6 10 -11 9 -21 -3 -17 -21 -2 -49 28 -53 31 -5 72
  43 72 82 0 23 6 34 23 41 15 7 23 20 25 44 3 30 1 33 -12 22 -12 -10 -18 -9
  -35 8 -17 17 -18 21 -5 32 14 12 29 40 58 113 9 22 16 68 16 107 0 67 1 69 25
  69 42 0 73 83 40 110 -21 18 -43 6 -52 -29 l-8 -29 -57 51 -58 52 17 46 c16
  45 16 49 -2 88 -10 23 -26 46 -36 52 -49 26 -109 -4 -109 -53 0 -29 1 -30 13
  -14 13 18 15 17 35 -9 12 -15 22 -31 22 -35 0 -4 8 -7 17 -6 10 0 19 -7 21
  -16 4 -21 -22 -24 -65 -7 -15 6 -53 14 -83 18 -52 6 -55 8 -58 36 -6 50 -41
  72 -70 43 -9 -9 -8 -16 4 -29 16 -18 13 -49 -5 -49 -5 0 -11 10 -13 22 -2 13
  -11 24 -21 26 -10 2 -16 -2 -15 -8 5 -19 -27 -34 -56 -26 -21 5 -25 11 -21 29
  4 17 -2 27 -30 46 -42 28 -41 35 4 20 56 -20 133 -7 177 29 46 39 64 40 64 7
  0 -30 20 -33 43 -7 36 39 15 82 -40 82 -32 0 -33 1 -33 45 0 36 -6 52 -25 71
  -24 24 -25 27 -11 54 15 32 12 40 -16 40 -19 0 -22 8 -10 27 7 10 14 10 35 0
  15 -6 27 -16 27 -20 0 -5 5 -5 10 -2 16 10 12 40 -8 58 -30 28 -60 21 -83 -18
  -14 -22 -29 -35 -42 -35 -20 -1 -20 -2 -4 -11 27 -16 22 -56 -10 -71 -19 -9
  -29 -22 -31 -41 -2 -15 0 -26 5 -25 5 2 21 -7 36 -18 27 -22 37 -54 16 -54 -8
  0 -9 -13 -5 -39 7 -48 -4 -58 -45 -40 -25 10 -29 16 -24 36 7 31 -2 48 -20 33
  -9 -8 -20 -7 -39 1 -25 12 -26 15 -20 63 5 50 5 51 -13 30 -10 -13 -33 -24
  -53 -26 l-35 -3 0 90 c0 72 -6 105 -27 163 -25 70 -70 142 -88 142 -5 0 -23
  -12 -40 -26z m92 -141 c13 -12 18 -30 18 -72 0 -74 -32 -141 -103 -217 l-55
  -59 -12 45 c-29 106 20 272 90 307 33 17 40 16 62 -4z m-22 -456 c0 -12 7 -35
  15 -51 8 -15 15 -35 15 -43 0 -27 35 -9 40 22 l6 30 6 -37 c4 -20 16 -50 28
  -66 27 -36 23 -66 -9 -70 -20 -3 -22 -1 -16 19 6 19 4 21 -19 17 -28 -6 -33 1
  -14 20 9 9 5 12 -19 12 -31 0 -43 -14 -43 -50 0 -12 -10 -20 -34 -24 -42 -8
  -120 -76 -146 -127 -47 -92 -8 -218 82 -265 54 -28 58 -14 8 34 -40 39 -50 55
  -50 81 0 75 84 161 158 161 150 0 241 -158 163 -281 -46 -73 -87 -93 -204 -97
  -93 -4 -101 -3 -162 27 -150 74 -196 227 -115 385 18 36 36 66 39 66 3 0 15
  -7 25 -15 28 -21 75 -19 114 5 29 18 33 25 30 58 -3 33 -6 37 -33 40 -24 3
  -28 1 -17 -9 6 -7 12 -20 12 -28 0 -12 -3 -12 -12 -3 -7 7 -20 12 -31 12 -14
  0 -17 -5 -12 -20 8 -25 -22 -28 -32 -4 -4 12 24 46 103 123 60 58 112 105 117
  103 4 -2 7 -13 7 -25z m-742 -285 c3 -19 6 -21 18 -11 11 9 14 8 14 -5 0 -10
  7 -15 21 -13 12 1 24 -3 26 -9 4 -13 -43 -28 -57 -19 -6 4 -10 -1 -10 -9 0 -9
  -9 -16 -20 -16 -16 0 -19 5 -14 28 4 20 0 33 -15 46 -24 22 -18 38 12 34 14
  -2 23 -11 25 -26z m192 -157 c0 -3 -7 -17 -16 -30 -9 -13 -22 -44 -29 -67 -10
  -35 -17 -44 -38 -46 -14 -2 -40 4 -57 13 -25 13 -30 20 -24 38 4 12 11 24 15
  25 5 2 9 10 9 17 0 22 22 29 32 11 12 -22 28 -20 28 4 0 10 8 24 18 29 18 11
  62 15 62 6z m1064 -14 c10 -11 14 -25 10 -36 -6 -15 -4 -16 14 -6 12 7 22 17
  22 24 0 16 46 -35 54 -60 5 -17 0 -24 -25 -37 -18 -9 -44 -16 -59 -16 -24 0
  -29 5 -39 43 -6 24 -19 55 -30 69 -11 14 -17 28 -14 32 13 12 50 6 67 -13z
  m-926 -68 c-13 -16 -3 -43 17 -43 8 0 15 -4 15 -9 0 -18 -19 -22 -40 -9 -18
  11 -23 10 -35 -6 -17 -23 -45 -14 -45 14 0 12 10 25 25 32 14 6 32 22 41 36
  12 19 18 22 25 11 4 -8 3 -19 -3 -26z m808 -68 c-7 -20 -46 -20 -46 0 0 18
  -36 20 -43 3 -3 -10 -10 -8 -23 5 -18 16 -17 17 5 17 21 0 23 3 17 33 -3 18
  -4 36 0 39 10 11 96 -81 90 -97z" />
                </g>
              </svg>
              <span class="sm:inline hidden">Prodigy Studio</span>
          </a> </h1>
        </div>
        <div class="flex justify-between flex-grow mr-5">
          <div class="sm:flex ml-6 items-center hidden">
            <form action="../../views/viewEvent/eventpage.php" method="get">
              <span>
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4 cursor-pointer text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </button>
              </span>
              <input name="search" required class="outline-none text-sm flex-grow bg-gray-50" type="text" placeholder="Search events..." />
            </form>

          </div>
          <div class="flex ml-10 sm:ml-0 space-x-6">
            <div class="sm:hidden">
              <select onchange="location = this.value;" id="redirect" class="ml-5 cursor-pointer border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none w-full">
                <option class="text-center" value="all"><b>&nbsp;&nbsp;&nbsp;&nbsp;&#9679;&#9679;&#9679;</b>
                </option>
                <option class="text-center" value="views/viewEvent/eventpage.php?sort=all">Browse Event</option>
                <option class="text-center" value="views/Registration/register.php">Sign Up</option>
                <option class="text-center" value="views/signIn/signin.php">Login</option>
              </select>
            </div>
            <script>
              function redirect() {
                let page = document.getElementById("redirect").value;
                if (page == "b_event") {
                  location.href = "/viewEvent/eventpage.php?sort=all";
                }
                if (page == "s_up") {
                  location.href = "./Registration/register.php";
                }
                if (page == "s_in") {
                  location.href = "./signIn/signin.php";
                }
              }
            </script>

            <div class="hidden sm:block">

              <?php if (isset($_SESSION['username']) == null) { ?>
                <span class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/viewEvent/eventpage.php?sort=all">Browse Events</a> </span>
                <span class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/Registration/register.php?user=ticketer">Sign up</a></span>
                <span class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/signIn/signin.php">Log in</a> </span>
              <?php } ?>

              <?php if (isset($_SESSION['username']) != null) { ?>
                <span <?php echo "hidden"; ?> class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/viewEvent/eventpage.php?sort=all">Browse Events</a></span>
                <span <?php echo "hidden"; ?> class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/registration/register.php">Sign up</a></span>
                <span <?php echo "hidden"; ?> class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/signin.php">Log in</a> </span>
              <?php } ?>
              <?php
              if (isset($_SESSION['username']) != null) { ?>
                <span class="text-black-500 text-md"><?= "Hello " . $_SESSION['username']; ?></span>
                <?php if ($_SESSION['usertype'] == 'admin' || $_SESSION['usertype'] == 'organizer') {    ?>
                  <?php if ($_SESSION['usertype'] == 'admin') {    ?>
                    <span class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/admin/administrator.php">Dashboard</a> </span>
                  <?php } ?>
                  <span class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/manageEvent/eventcreationmain.php">Manage Events</a> </span>
                <?php  } ?>
                <span class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/viewEvent/eventpage.php?sort=all">Browse Events</a> </span>
                <?php if ($_SESSION['usertype'] == 'organizer' || $_SESSION['usertype'] == 'ticketer') { ?>

                  <span class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all"><a href="/views/viewTicket/ticketlist.php">View Tickets</a> </span>
                <?php  } ?>

                <span> <a class="text-gray-800 text-md text-center hover:text-white hover:bg-gray-800 rounded-full px-3 transition-all" href="../signout.php">Sign Out</a> </span>

              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Section Hero -->

  </header>