<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/bootstrap.css">
  <style>
        @media screen and (min-width: 769px) and (max-width: 1440px){
          .menu-page{
              width: 100% !important;
          }
        }
        
        /* For PC */
        @media screen and (min-width: 1441px){
          .menu-page{
              width: 100% !important;
          }
        }
  </style>
</head>

<body>
  <nav class="top-nav">
    <div class="nav">
      <div class="d-flex justify-content-start" id="logo" style="width: 100%;">
        <a href="../index.php" class="logo d-flex align-items-center mx-3 w-auto" style="box-shadow: none;">
          <img src="../img/pcn.png" alt="HR Logo" width="20%">
        </a>
      </div>

      <div class="menu-page d-flex justify-content-center py-4">
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
          <div class='menu-button'></div>
        </label>


        <ul class="menu">
          <li><button class="btn" onclick="location.href = '../index.php'">HOME</button></li>
          <li><button class="btn" onclick="location.href = '../body/about.php'">ABOUT</button></li>
          <!-- <li><button class="btn"><a href="../body/about.php">ABOUT</a></button></li> -->
          <li><button class="btn" onclick="location.href = '../body/contact.php'">CONTACT</button></li>
          <!-- <li><button class="btn"><a href="../body/contact.php">CONTACT</a></button></li> -->
          <li><button class="btn" onclick="location.href = '../applicant/register_applicant.php'">SIGNUP</button></li>
          <li><button class="btn" id="login" onclick="location.href = '../applicant/login_applicant.php'">LOGIN</button></li>
        </ul>
      </div>

      <div class="d-flex justify-content-end py-4" id="icons" style="width: 100%;">
        <div class="icons">
          <a href="#" target="_blank" class="fa fa-facebook-square"></a>
          <a href="#" target="_blank" class="fa fa-instagram"></a>
          <a href="#" target="_blank" class="fa fa-twitter"></a>
          <a href="#" target="_blank" class="fa fa-google"></a>
        </div>
      </div>
    </div>
  </nav>

  <script src="../js/bootstrap.js"></script>
</body>

</html>