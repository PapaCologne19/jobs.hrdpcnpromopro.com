<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);

    try {
        // Set mail server settings
        $mail->isSMTP();
        $mail->Host = 'mail.hrdpcnpromopro.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'jobs@hrdpcnpromopro.com'; // Your SMTP username
        $mail->Password = 'P@ssw0rd2024'; // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Set sender and recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('jobs@hrdpcnpromopro.com'); // Your email address

        // Set email subject and body
        $mail->Subject = 'New Contact Us Submission';
        $mail->Body = "Name: $name\nContact Number: $number\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        if($mail->send()){
            $_SESSION['successMessage'] = "Thank you for contacting us! We will get back to you soon.";
        } else {
            $_SESSION['errorMessage'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        $_SESSION['errorMessage'] = "Oops! Something went wrong and we couldn't send your message.";
    }
}
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/pcn.png" type="image/x-icon">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/brands.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/solid.css">
    <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Barlow+Condensed:wght@400;600&family=Comfortaa:wght@500&family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Hind&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Script -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/style/style.css">
    <link rel="stylesheet" href="../css/style/header.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <title>Contact Us | Job Portal</title>

    <style>
        .text p {
            text-align: justify !important;
        }

        @media screen and (min-width: 769px) and (max-width: 1668px) {
            .text p {
                font-size: 14px;
                margin: 1rem 5rem;
            }
        }

        @media screen and (max-width: 768px) {
            .text p {
                font-size: 12px;
                margin: 1rem 5rem;
            }
        }
        div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
            border: 0;
            border-radius: 0.25em;
            background: initial;
            background-color: #7066e0;
            color: #fff !important;
            font-size: 1em;
        }
    </style>
</head>

<body id="contact">
    <?php 
    include 'header.php';
    ?>
    
    <?php
  if (isset($_SESSION['successMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: "<?php echo $_SESSION['successMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['successMessage']);
  } ?>

  <?php
  if (isset($_SESSION['warningmessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'warning',
        title: "<?php echo $_SESSION['warningmessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['warningmessage']);
  } ?>

  <?php
  if (isset($_SESSION['errorMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Engk...',
        text: "<?php echo $_SESSION['errorMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['errorMessage']);
  } ?>


    <div class="contact-homepages">
        <div class="contact-home">

            <div class="contact-text">
                <h1>Contact Us</h1>
                <h3>Get In Touch</h3><br><br>
                <div class="icons" id="icons2">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                    <img src="../img/geo-alt.svg" alt="" width="5%">
                                </span>
                            <span class="elementor-icon-list-text">
                                <p>PCN Cresta Building, <br>
                                    #27 Cresta St., Barangay Malamig, Mandaluyong City<br>
                                    Metro Manila, Philippines</p>
                            </span>
                        </li>
                        <li class="elementor-icon-list-item">
                            <span class="elementor-icon-list-icon">
                                    <img src="../img/telephone.svg" alt="" width="5%">
                                </span>
                            <span class="elementor-icon-list-text">
                                <br>
                                <p>027-718-1588 <br>02-8280-9274</p>
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
                </div>
            </div>

            <div class="contact-form">
                    <h2>Contact Form</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-lg-12">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" style="box-shadow: none !important; outline: none !important; border: 1px solid #279EFF;" required>
                        <div class="invalid-feedback">
                            Please enter your Name.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" style="border: 1px solid #279EFF;" required>
                        <div class="invalid-feedback">
                            Please enter your Email Address.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="number" name="number" class="form-control" id="number" placeholder="Phone Number" style="border: 1px solid #279EFF;" required>
                        <div class="invalid-feedback">
                            Please enter your Phone Number.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" class="form-control" id="message" placeholder="Message" col="10" row="10" style="border: 1px solid #279EFF;" required></textarea>
                        <div class="invalid-feedback">
                            Please enter your Message.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn" name="submit" id="submit" style="box-shadow: none !important; background: #279EFF; color: white !important; border: 1px solid #279EFF;">Submit</button>
                    </div>

                </form>
            </div>

        </div>
    <br>
        <div class="footer-body" id="footer">

            <div class="row">
                <div class="col-sm-3 col-md-3" id="footer_links">
                    <ul>
                        <span>JOB SEEKERS</span>
                        <li>
                            <a href="../job/search_job.php">Search Jobs</a>
                        </li>
                        <li>
                            <a href="../applicant/login_applicant.php">Job Seeker Login</a>
                        </li>
                        <li>
                            <a href="../applicant/register_applicant.php">Job Seeker Register</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 col-md-3" id="footer_links">
                    <ul>
                        <span>ABOUT US</span>
                        <li>
                            <a href="../body/about.php?AboutUs">About Us</a>
                        </li>
                        <li>
                            <a href="../body/about.php?FrequentlyAskedQuestions">FAQ</a>
                        </li>
                        <li>
                            <a href="#contact">Contact Us</a>
                        </li>
                        <li>
                            <a href="../body/about.php?Terms&Condition">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 col-md-3" id="footer_links">
                    <ul>
                        <span>ADDRESS</span>
                        <li>
                            1071 Brgy. Kaligayahan <br>
                            Quirino Highway, Novaliches, Quezon City <br>
                            Metro Manila, Philippines
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 col-md-3" id="footer_links">
                    <ul>
                        <span>SOCIAL MEDIA</span>
                        <p style="color: #fff !important;">Follow us</p>

                          <a href="https://www.facebook.com/PCNPromopro" target="_blank" class="fa bi bi-facebook text-white"></a>
                          <a href="https://www.tiktok.com/@tipstoktv" target="_blank" class="fa bi bi-tiktok text-white"></a>
                          <a href="https://pcnpromopro.com/" target="_blank" class="fa bi bi-globe2 text-white"></a>
                          <a href="mailto:jobs@hrdpcnpromopro.com" target="_blank" class="fa bi bi-envelope-at text-white"></a>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="footer_links">
                    <div class="footer_credit small mb-0" style="text-align: center;">
                        <p style="color: #ADADAD !important;">Copyright &copy; <?php echo date('Y')?>. All rights Reserved.</p>
                    </div>
                </div>
            </div>



        </div>

    </div>


    <footer>

    </footer>
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

    <script src="../js/bootstrap.js"></script>
    <script>
        $(window).scroll(function() {
            $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
        });
    </script>
</body>

</html>