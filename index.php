<!DOCTYPE html>
<html lang="en-us">

<head>
  <!-- Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="alegario cure, alegario, Job Portal, JOB PORTAL, SEARCH JOB PORTAL, ALEGARIO CURE HOSPITAL JOB PORTAL">
  <meta name="description" content="Start your Journey here. Find a Job that is suitable to you. <br> We offer a variety of job opportunities for job seekers of all experience levels.">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/pcn.png" type="image/x-icon">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="assets/fontawesome/css/brands.css">
  <link rel="stylesheet" href="assets/fontawesome/css/solid.css">
  <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Barlow+Condensed:wght@400;600&family=Comfortaa:wght@500&family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Hind&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

  <!-- Script -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="css/style/style.css">
  <link rel="stylesheet" href="css/style/header.css">
  <link rel="stylesheet" href="css/bootstrap.css">

  <title>Job Portal</title>
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

<body id="home">

   <nav class="top-nav">
   <div class="nav">
      <div class="d-flex justify-content-start" id="logo" style="width: 100%;">
      <a href="index.php" class="logo d-flex align-items-center w-auto">
        <img src="img/pcn.png" class="mx-3" alt="HR Logo" width="20%">
        <!-- <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">ALEGARIO<b id="animated-text" style="font-family: 'Poiret One', cursive !important;"> CURE</b></span> -->
      </a>
    </div>

    <div class="menu-page d-flex justify-content-center py-4">
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
      <div class='menu-button'></div>
    </label>


    <ul class="menu">
    <li><button class="btn active" onclick="location.href = '#home'">HOME</li>
      <li><button class="btn" onclick="location.href = '#about'">ABOUT</li>
      <li><button class="btn" onclick="location.href = '#contact'">CONTACT</button></li>
      <li><button class="btn" onclick="location.href = 'applicant/register_applicant.php'">SIGNUP</button></li>
      <li><button class="btn" id="login" onclick="location.href = 'applicant/login_applicant.php'">LOGIN</button></li>
    </ul>
    </div>
    <div class="d-flex justify-content-end py-4" id="icons" style="width: 100%;">
        <div class="icons">
      <a href="https://www.facebook.com/PCNPromopro" target="_blank" class="fa bi bi-facebook"></a>
      <a href="https://www.tiktok.com/@tipstoktv" target="_blank" class="fa bi bi-tiktok"></a>
      <a href="https://pcnpromopro.com/" target="_blank" class="fa bi bi-globe2"></a>
      <a href="mailto:jobs@hrdpcnpromopro.com" target="_blank" class="fa bi bi-envelope-at"></a>
      </div>
      </div>
    </div>
  </nav>

  

  <section>
    <div class="homepages">
      <div class="home">

        <div class="text">
          <h1>Build your <br> Bright future <br> right now</h1><br>
          <h6>Shape your promising future today. Explore boundless opportunities and build a career that defines success. Start building your bright career now.</h6>
          <br><br>

          <ul>
            <li>
              <a href="job/search_job.php" id="home-button">Apply Now</a>
            </li>
          </ul>
          

        </div>

        <div class="home-image">
          <div class="row justify-content-end" style="width: 100vh;"></div>
          <img src="img/Code review-cuate.svg" width="40%" class="rounded" alt="..." id="img">
        </div>

      </div>
    </div>



    <!-- About Us -->
    <div class="nextPage" id="about">
      <div class="about-page">

        <div class="about" style="background-image: linear-gradient(to right, #fff, #fff, #fff) !important; background-size: cover; height: 100vh">
          <div class="row justify-content-start" style="width: 100vh;"></div>
          <img src="img/Thinking face-cuate.svg" width="90%" class="rounded" alt="..." id="img2">
        </div>

        <div class="description">
          <h3>Who Are We?</h3>
          <h1>About Us</h1>
          <h5 class="fs-4">We are PCN.</h5>
          <p>We are proud to be one of the pioneers in the BTL industry in the Philippines, with over 31 years of experience.</p>
          <p>We have continuously grown in size, volume and clientele over the years through our passion for excellence, fearless out-of-the-box solutions and strong commitment to lasting partnerships.</p>
          <h5 class="fs-4 mt-5">Our Mission</h5>
          <p>To provide effective and reliable Marketing and Sales Solutions with our local expertise and global competitiveness.</p>
          <h5 class="fs-4 mt-5">Our Vision</h5>
          <p>To be the leader in the Marketing and Sales Solutions industry by: <br>
            <ul>
                <li>Creating a work environment where employees are encouraged and trained to be productive to achieve their full potential</li>
                <li>Nurturing a mutually beneficial partnership with our clients.</li>
                <li>Being socially responsible and environment-friendly.</li>
                <li>Continuing to be a profitable venture for all our stakeholders.</li>
            </ul>
          </p>
          <h5 class="fs-4 mt-5">Our Core Values</h5>
          <p>To be the leader in the Marketing and Sales Solutions industry by: <br>
            <ul>
                <li>Maagap (Punctual, Prompt)</li>
                <li>Makatao (Humane)</li>
                <li>Malasakit (Devoted)</li>
                <li>Maparaan (Resourceful)</li>
                <li>Maadhikain (Goal-oriented)</li>
                <li>Mapaglingkod (Servitude)</li>
                <li>Mapagpunyagi (Victorious)</li>
                <li>Pagkakaisa (United)</li>
            </ul>
          </p>
          
          
           
          <br>
          <button type="button" id="button" onclick="location.href = 'body/about.php';">View More</button>
        </div>

      </div>
    </div>


    <!-- Contact Us -->
    <div class="contact-page" id="contact">.
      <div class="contact-body">

        <div class="contact_info">
          <h3>Contact Us</h3>
          <h1>Get In Touch</h1><br><br>
          <div class="icons" id="icons2">
            <ul class="elementor-icon-list-items">
              <li class="elementor-icon-list-item">
                <span class="elementor-icon-list-icon">
                    <img src="img/geo-alt.svg" alt="" width="5%">
                </span>
                <span class="elementor-icon-list-text">
                  <p> PCN Cresta Building, <br>
                     #27 Cresta St., Barangay Malamig, Mandaluyong City<br>
                    Metro Manila, Philippines</p>
                </span>
              </li>
              <li class="elementor-icon-list-item">
                <span class="elementor-icon-list-icon">
                    <img src="img/telephone.svg" alt="" width="5%">
                </span>
                <span class="elementor-icon-list-text">
                  <p>027-718-1588<br>02-8280-9274</p>
                </span>
              </li>
              <li class="elementor-icon-list-item">
                <span class="elementor-icon-list-icon">
                    <img src="../img/envelope.svg" alt="" width="5%">
                 </span>
                <span class="elementor-icon-list-text">
                  <br>
                  <p>jobs@hrdpcnpromopro.com</p>
                </span>
              </li>
              <div class="mt-5">
                <button type="button" id="button" onclick="location.href = 'body/contact.php';">Message Us</button>
              </div>
          </div>
        </div>
        

        <div class="contact-image" style="background-image: linear-gradient(to right, #fff, #fff, #fff) !important; background-size: cover; height: 100vh">
          <div class="row justify-content-end" style="width: 100vh;"></div>
          <img src="img/Get in touch-cuate (1).svg" width="50%" class="rounded" alt="..." id="img3">
        </div>
       
      </div>
      
    </div>

  </section>
  





  <footer class="footer" id="footer" style="background: #272829;">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3" id="footer_links">
          <ul>
            <span>JOB SEEKERS</span>
            <li>
              <a href="job/search_job.php">Search Jobs</a>
            </li>
            <li>
              <a href="applicant/login_applicant.php">Job Seeker Login</a>
            </li>
            <li>
              <a href="applicant/register_applicant.php">Job Seeker Register</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-3" id="footer_links">
          <ul>
            <span>ABOUT US</span>
            <li>
              <a href="">About Us</a>
            </li>
            <li>
              <a href="">FAQ</a>
            </li>
            <li>
              <a href="">Contact Us</a>
            </li>
            <li>
              <a href="">Terms & Conditions</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-3" id="footer_links">
          <ul>
            <span>ADDRESS</span>
            <li>
              PCN Cresta Building, <br>
              #27 Cresta St., Barangay Malamig, Mandaluyong City <br>
              Metro Manila, Philippines
            </li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-3" id="footer_links">
          <ul>
            <span>SOCIAL MEDIA</span>
            <p style="color: #fff !important; font-family: 'Inter', san-serif !important;">Follow us</p>

            <a href="https://www.facebook.com/PCNPromopro" target="_blank" class="fa bi bi-facebook text-white"></a>
            <a href="https://www.tiktok.com/@tipstoktv" target="_blank" class="fa bi bi-tiktok text-white"></a>
            <a href="https://pcnpromopro.com/" target="_blank" class="fa bi bi-globe2 text-white"></a>
            <a href="mailto:jobs@hrdpcnpromopro.com" target="_blank" class="fa bi bi-envelope-at text-white"></a>
          </ul>
        </div>

      </div>
    </div>
    <br><br>
    <div class="footer_credit small mb-0" style="text-align: center; background: #272829 !important;">
      <p style="color: #ADADAD !important; font-family: 'Inter', san-serif !important;">Copyright &copy; 2023. All rights Reserved.</p>
    </div>
  </footer>
  <script src="js/bootstrap.js"></script>
  <script>
    $(window).scroll(function() {
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
    });
  </script>
</body>

</html>