<?php
include "../database/connection.php";
include "../body/function.php";
session_start();
$errors = array();
?>

<!--  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/pcn.png" type="image/x-icon">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../css/style/login.css">
    <link rel="stylesheet" href="../css/bootstrap.css">


    <title>Login - Job Seeker</title>

</head>

<body>
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
    if (isset($_SESSION['errorMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "<?php echo $_SESSION['errorMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['errorMessage']);
    }
    ?>
    <script>
        // Event listener to handle messages from child window
        window.addEventListener('message', function(event) {
            // Check if the message is to reload
            if (event.data === 'reload') {
                // Reload the parent window
                location.reload();
            }
        });
    </script>


    <div class="d-flex justify-content-center py-4" id="error-message" style="display: none; text-align: center;"></div>
    <div class="d-flex justify-content-center py-4">
        <button type="button" class="btn btn-dark back-btn" onclick="window.history.go(-1)" style="display: none; text-align: center;">Try Again</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-danger close-btn" style="display: none; text-align: center;">Close</button>

    </div>


    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-start py-4">
                <div class="container">
                    <div class="row justify-content-center" id="login-form">

                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4" id="logo">
                                <a href="../index.php" class="logo d-flex align-items-center w-auto justify-content-center">
                                    <img src="../img/pcn.png" alt="HR Logo" width="30%">
                                </a>
                            </div>
                            <!-- End Logo -->




                            <div class="card mb-3" style="border: none;">

                                <div class="card-body" id="card-body" style="background: #fff; color: #000000;">
                                    <?php
                                    if (isset($_SESSION['message'])) { ?>
                                        <div class="container">
                                            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert" id="myAlert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                <script>
                                                    $(document).ready(function() {
                                                        window.setTimeout(function() {
                                                            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                                                                $(this).remove();
                                                            });
                                                        }, 3000);

                                                    });
                                                </script>
                                                <?php
                                                echo $_SESSION['message'];
                                                ?>
                                            </div>
                                        </div>
                                    <?php unset($_SESSION['message']);
                                    } ?>

                                    <?php
                                    if (isset($_SESSION['werror'])) { ?>
                                        <div class="container">
                                            <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert" id="myAlert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                                <script>
                                                    $(document).ready(function() {
                                                        window.setTimeout(function() {
                                                            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                                                                $(this).remove();
                                                            });
                                                        }, 3000);

                                                    });
                                                </script>
                                                <?php
                                                echo $_SESSION['werror'];
                                                ?>
                                            </div>
                                        </div>
                                    <?php unset($_SESSION['werror']);
                                    } ?>
                                    <div class="pt-4 pb-2">
                                        <h2 class="card-title text-center " style="color: #279EFF ; font-family: 'Poppins', sans-serif !important; font-weight: 600;">LOGIN TO YOUR ACCOUNT</h2>
                                        <br>
                                    </div>
                                    <?php


                                    $id = $_GET['job_id'];
                                    $query = "SELECT  * FROM projects  WHERE id = '$id'";
                                    if ($result = mysqli_query($con, $query)) {
                                        $row = mysqli_fetch_assoc($result);

                                    ?>
                                        <form class="row g-3 needs-validation" novalidate method="post" action="action.php">
                                            <input type="hidden" name="job_id" value="<?php echo $row['id']; ?>">
                                            <div class="form-floating mb-7">
                                                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username" style="border-top: none; border-left: none; border-right: none; border-bottom: 1px solid #a19eab !important; border-radius: 0; box-shadow: none !important; font-family: 'Poppins', sans-serif;" required>
                                                <label for="floatingInput" style="font-family: 'Poppins', sans-serif !important; color: #a19eab;">Username</label>
                                                <div class="invalid-feedback">
                                                    Please enter a Username
                                                </div>
                                            </div>

                                            <div class="form-floating">
                                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" style="background-color: inherit; border-top: none; border-left: none; border-right: none; border-bottom: 1px solid #a19eab !important; border-radius: 0; box-shadow: none !important; font-family: 'Poppins', sans-serif !important;" required>
                                                <label for="floatingPassword" style="font-family: 'Poppins', sans-serif !important; color: #a19eab;">Password</label>
                                                <div class="invalid-feedback">
                                                    Please enter a Password.
                                                </div>
                                                <span class="eyes" onclick="myFunction()">
                                                  <i class="bi bi-eye" id="hide1" style="position: absolute; right: 4rem; margin-top: -1.8rem; display: none;"></i>
                                                  <i class="bi bi-eye-slash" id="hide2" style="position: absolute; right: 4rem; margin-top: -1.8rem;"></i>
                                                </span>
                                            </div>
                                            <div class="col-12">
                                                <br>
                                                <p class="small mb-0" style="text-align: left !important;"><a href="javascript:void(0)" onclick="openPopup()" style="color: #a19eab;">Forgot Password?</a></p>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn w-100 login_button" type="submit" name="login" style="border:1px solid #279EFF; box-shadow: none; border-radius: 10px; padding: .5rem; font-size: 1.2rem !important;">Log in</button>
                                            </div>
                                            <div class="col-12">
                                                <p class="small mb-0" style="text-align: center !important; color: #a19eab;"><a href="javascript:void(0)" onclick="openRegisterPopup()" style="color: #0079FF;">Create an account</a></p>
                                            </div>
                                            <br><br>
                                            <div class="col-12">
                                                <a href="javascript:void(0)" onclick="location.href = '../job/search_job.php'" class="small mb-0" style="color: #000000; ">Cancel Login</a>
                                            </div>
                                        </form>
                                    <?php }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>

    </script>

    <script>
    function myFunction() {
        var x = document.getElementById("floatingPassword");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");

        if (x.type === 'password') {
          x.type = "text";
          y.style.display = "block";
          z.style.display = "none";
        } else {
          x.type = "password";
          y.style.display = "none";
          z.style.display = "block";
        }
      }
      
        var newWin;

        function openPopup() {
            newWin = window.open('forgot_password.php', 'Forgot Password', 'width=800, height=500');

            document.onmousedown = focusPopup;
            document.onkeyup = focusPopup;
            document.onmousemove = focusPopup;

        }

        function focusPopup() {
            if (!newWin.closed) {
                newWin.focus();
            }
        }

        var newWinR;

        function openRegisterPopup() {
            newWinR = window.open('jobApply_Register.php', 'Register Applicant', 'width=800, height=500');

            document.onmousedown = focusRegisterPopup;
            document.onkeyup = focusRegisterPopup;
            document.onmousemove = focusRegisterPopup;

        }

        function focusRegisterPopup() {
            if (!newWinR.closed) {
                newWin.focus();
            }
        }
    </script>


    <!-- Vendor JS Files -->
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
    <?php include '../body/footer.php'; ?>
</body>

</html>