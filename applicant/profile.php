<?php
include "../database/connection.php";
session_start();

if (isset($_POST['save'])) {
  $user_id = $_POST['user_id'];
  $firstname = mysqli_real_escape_string($con, $_POST['firstName']);
  $middlename = mysqli_real_escape_string($con, $_POST['middleName']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastName']);
  $street = mysqli_real_escape_string($con, $_POST['Address']);
  $city = mysqli_real_escape_string($con, $_POST['city']);
  $state = mysqli_real_escape_string($con, $_POST['state']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $email = mysqli_real_escape_string($con, $_POST['email']);


  $query = "UPDATE applicant 
        SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', 
            present_address = '$street', city = '$city', region = '$state',
            mobile_number = '$phone', email_address = '$email'
        WHERE id = '$user_id'";

  if ($results = mysqli_query($con, $query)) {
    header("location: profile.php");
  } else {
    $errors['error'] = "Update Unsuccessful!";
  }
}


// Update profile picture
if (isset($_POST['update'])) {
  $user_id = $_POST['user_id'];
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTempName = $_FILES["file"]["tmp_name"];
  $fileSize = $_FILES["file"]["size"];
  $fileError = $_FILES["file"]["error"];
  $fileType = $_FILES["file"]["type"];
  $folder = "../imageStorage/" . $fileName;

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000000) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = $folder;
        move_uploaded_file($fileTempName, $fileDestination);

        if (!empty($file)) {
          $query = "UPDATE applicant SET image = '$fileName'
            WHERE id = '$user_id'";

          $result = mysqli_query($con, $query);

          header("location: profile.php");
        } else {
          $_SESSION['errorMessage'] = "Failed to update profile picture";
        }
      } else {
        $_SESSION['errorMessage'] = "You image is too big!";
      }
    } else {
      $_SESSION['errorMessage'] = " There was an error uplading your file!";
    }
  } else {
    $_SESSION['errorMessage'] = "You cannot upload this type of Image";
  }
}


if (isset($_POST['changepass'])) {
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $conpass = mysqli_real_escape_string($con, $_POST['conpass']);

  if ($password !== $conpass) {
    $_SESSION['errorMessage'] = "Password isn't matched!!!";
  } else {
    $passwordhashed = password_hash($password, PASSWORD_DEFAULT);
    $query2 = "UPDATE applicant SET password = '$passwordhashed' WHERE username = '" . $_SESSION['username'] . "'";
    $result2 = mysqli_query($con, $query2);

    if ($result2) {
      $_SESSION['message'] = "Password update successfully";
      header("location: profile.php");
      exit(0);
    } else {
      $_SESSION['errorMessage'] = "Password update unsuccessfully";
    }
  }
}

if (isset($_SESSION['username'], $_SESSION['password'])) {
  ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/pcn.png" type="image/x-icon">

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/brands.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/solid.css">
        <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Vendor CSS -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- JS -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../css/style/search_results.css">
        <link rel="stylesheet" href="../css/style/status.css">
        <link rel="stylesheet" href="../css/style/header.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link href="../assets/css/style.css" rel="stylesheet">



        <title>My Profile</title>

        <style>
          @font-face {
            font-family: 'Jamesphilip Bold';
            src: url(../assets/fonts/Fonts/sofiapro-light.otf);
          }

          .img-circle {
            flex: none;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            backdrop-filter: blurd(10px) !important;
            box-shadow: 5px 10px 20px rgba(0, 0, 0, .3) !important;
          }

          .alert {
            display: none;
          }

          .requirements {
            list-style-type: none;
          }

          .wrong .fa-check {
            display: none;
          }

          .good .fa-times {
            display: none;
          }

          .contain {
            display: grid;
            grid-template-columns: 0fr 0fr;
            grid-template-rows: 0fr 0fr;
            gap: 5px;
            margin: 0 auto;
          }
          .table th{
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: #566A7C;
          }
        </style>
      </head>

      <body>
        <?php
        include 'page/header.php';
        ?>

        <br><br><br><br><br><br><br><br>

        <div class="header">
          <div class="container">
            <h1 style="font-family: 'Poppins', sans-serif; color: #279EFF; font-weight: 500;">My Profile</h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../applicant/searchjob.php" style="color: #000;">Search Jobs</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
              </ol>
            </nav>
            <br><br>
          </div>
        </div>

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
                  title: 'Engk...',
                  text: "<?php echo $_SESSION['errorMessage']; ?>",
                })
              </script>
            <?php unset($_SESSION['errorMessage']);
        } ?>

        <main id="main" class="main">
          <section class="section profile container-fluid">
            <div class="row">
              <div class="col-md-12">
                <?php
                $query = "SELECT * 
                   FROM applicant
                   WHERE username = '" . $_SESSION['username'] . "'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result)) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $image = $row['image'];
                    ?>
                            <div class="card">
                              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                <img alt="Profile Picture" class="img-circle" <?php echo '<img src="../imageStorage/' . $image . '" />'; ?> <h2><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . " " . $row['extension_name']; ?></h2>
                                <!--<div class="social-links mt-2">-->
                                <!--  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>-->
                                <!--  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>-->
                                <!--  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>-->
                                <!--  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>-->
                                <!--</div>-->
                              </div>
                            </div>

                      </div>

                      <div class="col-md-12 col-sm-12">

                        <div class="card">
                          <div class="card-body">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered flex-column flex-md-row flex-sm-row" style="width: 100%;">
                              <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                              </li>
                              <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                              </li>
                              <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                              </li>
                              <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-requirements" style="text-align: left;">Submit Requirements</button>
                              </li>
                              <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-loa">LOA</button>
                              </li>
                            </ul>
                            <div class="tab-content pt-2">

                              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['firstname'], " ", $row['middlename'], " ", $row['lastname'], " ", $row['extension_name']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Address</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['present_address'], ", ", $row['city'], ", ", $row['region']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Email Address</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['email_address']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Phone</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['mobile_number']; ?></div>
                                </div>

                        <?php }
                } ?>
                      </div>


                      <!--Modal-->
                      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <br>
                              <h5 style="color: #000; font-family: 'Roboto', sans-serif; font-weight: 800; text-align: center;">UPDATE YOUR PROFILE PICTURE</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background: none !important;"></button>
                            </div>
                            <div class="modal-body">
                              <!-- Form -->
                              <?php
                              $query = "SELECT * 
                        FROM applicant
                        WHERE username = '" . $_SESSION['username'] . "'";
                              $result = mysqli_query($con, $query);
                              if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                  $image = $row['image'];
                                  ?>
                                          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group needs-validation" novalidate enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
                                            <input type="hidden" value="<?php echo $row['id']; ?>" name="user_id">
                                            <div class="col-auto">
                                              <label for="email" class="form-label" style="color: #000;">Please select image</label>
                                              <input type="file" class="form-control" name="file" id="file" style="color: #000; box-shadow: none; border-color: #279EFF;" required>
                                              <div class="invalid-feedback">
                                                Please insert an image.
                                              </div>
                                            </div>
                                            <br>
                                            <button type="submit" name="update" class="btn" style="background: #279EFF; color: #fff; border: none;">Update</button>
                                          </form>
                                  <?php }
                              } ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #121212 !important;">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        <!-- Profile Edit Form -->

                        <?php
                        $query = "SELECT * 
                    FROM applicant
                    WHERE username = '" . $_SESSION['username'] . "'";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result)) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            $image = $row['image'];
                            ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="needs-validation" novalidate enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
                                      <input type="hidden" value="<?php echo $row['id']; ?>" name="user_id">
                                      <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                          <img alt="Profile Picture" class="img-circle" style="border-radius: 50%;" <?php echo '<img src="../imageStorage/' . $image . '" />'; ?> <div class="pt-2">
                                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-upload text-white"></i></a>
                                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash text-white"></i></a>
                                        </div>
                                      </div>
                              </div>

                              <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="firstName" type="text" class="form-control" id="firstName" value="<?php echo $row['firstname']; ?>" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="middleName" type="text" class="form-control" id="middleName" value="<?php echo $row['middlename']; ?>" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="lastName" type="text" class="form-control" id="lastName" value="<?php echo $row['lastname']; ?>" required>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">ADDRESS</label>
                                <div class="col-md-8 col-lg-9">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                                <div class="col-md-8 col-lg-9">
                                  <input type="text" name="Address" class="form-control" id="Address" value="<?php echo $row['present_address']; ?>" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">City</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="city" type="text" class="form-control" id="City" value="<?php echo $row['city']; ?>" required>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">State</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="state" type="text" class="form-control" id="State" value="<?php echo $row['region']; ?>" required>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Email Address</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="email" type="text" class="form-control" id="Email" value="<?php echo $row['email_address']; ?>" required>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                                <div class="col-md-8 col-lg-9">
                                  <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $row['mobile_number']; ?>" required>
                                </div>
                              </div>

                              <div class="text-center">
                                <button type="submit" name="save" class="btn" style="background: #279EFF; color: #fff;">Save Changes</button>
                              </div>
                              </form>
                      <?php }
                        } ?>
                  <!-- End Profile Edit Form -->

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-change-password">
                      <?php
                      $query = "SELECT * 
                    FROM applicant
                    WHERE username = '" . $_SESSION['username'] . "'";
                      $result = mysqli_query($con, $query);
                      if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group needs-validation" novalidate>
                              <div class="col-md-12">
                                <label for="password">New Password</label>
                                <input type="password" name="password" id="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <span class="eyes" onclick="myFunction()">
                                  <i class="bi bi-eye" id="hide1" style="position: absolute; right: 4rem; margin-top: -1.8rem; display: none;"></i>
                                  <i class="bi bi-eye-slash" id="hide2" style="position: absolute; right: 4rem; margin-top: -1.8rem;"></i>
                                </span>
                              </div>
                              <div class="alert alert-warning password-alert" role="alert">
                                <ul>
                                  <li class="requirements leng"><i class="fas fa-check green-text"></i></i></i><i class="fas fa-times red-text"></i> Your password must have at least 8 characters.</li>
                                  <li class="requirements big-letter"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 big letter.</li>
                                  <li class="requirements num"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 number.</li>
                                </ul>
                              </div>
                              <div class="col-md-12">
                                <label for="conpass">Confirm Password</label>
                                <input type="password" name="conpass" id="conpass" class="form-control" required>
                                <span class="eyes" onclick="myFunction2()">
                                  <i class="bi bi-eye" id="hide3" style="position: absolute; right: 4rem; margin-top: -1.8rem; display: none;"></i>
                                  <i class="bi bi-eye-slash" id="hide4" style="position: absolute; right: 4rem; margin-top: -1.8rem;"></i>
                                </span>
                              </div>
                              <span id='message'></span>
                              <script type="text/javascript" charset="utf-8">
                                $('#password, #conpass').on('keyup', function() {
                                  if ($('#password').val() && $('#conpass').val() == null) {
                                    $('');
                                  } else if ($('#password').val() == $('#conpass').val()) {
                                    $('#message').html('Password Matched').css('color', 'green');
                                  } else
                                    $('#message').html('Password Unmatched').css('color', 'red');
                                });
                              </script>

                              <div class="text-center pt-5">
                                <button type="submit" name="changepass" class="btn" style="background: #279EFF; color: #fff;">Save Changes</button>
                              </div>
                            </form><!-- End Change Password Form -->
                      <?php } ?>
                    </div>

                    <div class="tab-pane fade show profile-requirements" id="profile-requirements">
                    <div class="table-responsive"> 
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th>File Name</th>
                            <th>Job Applied</th>
                            <th>Status</th>
                            <th>Date Applied</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $select_file = "SELECT resume.*, project.*, resume.status AS resume_status, DATE_FORMAT(date_applied, '%M %d, %Y') AS date_applied
                          FROM applicant_resume resume, projects project
                          WHERE resume.project_id = project.id 
                          AND applicant_id = '" . $_SESSION['id'] . "' 
                          AND resume.is_deleted = '0'";
                          $select_file_result = $con->query($select_file);
                          while ($select_file_row = mysqli_fetch_assoc($select_file_result)) {
                            ?>
                                <tr>
                                  <td><a href="../201 Files/<?php echo $select_file_row['resume_file'] ?>" download="<?php echo $select_file_row['resume_file'] ?>"><?php echo $select_file_row['resume_file'] ?></a></td>
                                  <td><?php echo $select_file_row['project_title']; ?></td>
                                  <td><?php echo $select_file_row['project_status']; ?></td>
                                  <td><?php echo $select_file_row['date_applied']; ?></td>
                                  <td>
                                    <?php
                                    if ($select_file_row['project_status'] === 'FOR DEPLOYMENT') { ?>
                                          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadRequirements-<?php echo $select_file_row['project_id'] ?>">
                                            Upload
                                          </button>
                                    <?php } else {
                                      echo "";
                                    }

                                    ?>
                                  </td>



                                  <!-- Modal for uploading Mandatory Requirements-->
                                  <div class="modal fade" id="uploadRequirements-<?php echo $select_file_row['project_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="container">
                                            <form action="action.php" method="post" enctype="multipart/form-data" class="form-group needs-validation">
                                              <?php
                                              $fetch = "SELECT * FROM employees WHERE app_id = '" . $_SESSION['id'] . "'";
                                              $fetched = $con->query($fetch);
                                              $fetched_row = $fetched->fetch_assoc();
                                              ?>
                                              <input type="hidden" name="project_id" value="<?php echo $select_file_row['project_id'] ?>">
                                              <div class="col-md-12">
                                                <label for="" class="form-label">SSS Number</label>
                                                <input type="text" name="sss" id="sss" maxlength="10" minlength="10" class="form-control" value="<?php echo $fetched_row['sssnum'] ?>">
                                              </div>
                                              <div class="col-md-12">
                                                <label for="" class="form-label">Philhealth Number</label>
                                                <input type="text" name="philhealth" id="philhealth" maxlength="12" minlength="12" class="form-control" value="<?php echo $fetched_row['phnum'] ?>">
                                              </div>
                                              <div class="col-md-12">
                                                <label for="" class="form-label">PagIBIG Number</label>
                                                <input type="text" name="pagibig" id="pagibig" maxlength="12" minlength="12" class="form-control" value="<?php echo $fetched_row['pagibignum'] ?>">
                                              </div>
                                              <div class="col-md-12">
                                                <label for="" class="form-label">TIN Number</label>
                                                <input type="text" name="tin" id="tin" maxlength="12" minlength="12" class="form-control" value="<?php echo $fetched_row['tinnum'] ?>">
                                              </div>
                                              <hr class="mt-3 mb-3">
                                              <div class="col-md-12">
                                                <label for="" class="form-label">Emergency Contact Person</label>
                                                <input type="text" name="emergency_contact_person" id="emergency_contact_person" class="form-control" required>
                                              </div>
                                              <div class="col-md-12">
                                                <label for="" class="form-label">Emergency Contact Number</label>
                                                <input type="text" name="emergency_contact_number" id="emergency_contact_number" class="form-control" required>
                                              </div>
                                              <div class="col-md-12">
                                                <label for="" class="form-label">Emergency Contact Address</label>
                                                <input type="text" name="emergency_contact_address" id="emergency_contact_address" class="form-control" required>
                                              </div>
                                              <hr class="mt-5 mb-5">
                                              <div class="col-md-12">
                                                <label for="" class="form-label">Attach File/s</label>
                                                <input type="file" name="files[]" id="files" class="form-control" multiple required>
                                                <div class="invalid-feedback">
                                                  Please attach file.
                                                </div>
                                              </div>
                                              <div class="col-md-12 mt-4">
                                                <button type="submit" name="submit_files" class="btn btn-primary">Upload</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
                    </div>

                    <div class="tab-pane fade show profile-loa" id="profile-loa">
                      <div class="table-responsive">
                        <table class="table table-sm" id="example">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Project</th>
                              <th>Employment Status</th>
                              <th>Remarks</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $get_deployment = "SELECT *, 
                        DATE_FORMAT(date_created, '%M %d, %Y') AS date_created, 
                        DATE_FORMAT(loa_start_date, '%M %d, %Y') AS loa_start_date, 
                        DATE_FORMAT(loa_end_date, '%M %d, %Y') AS loa_end_date
                        FROM deployment WHERE app_id = '" . $_SESSION['id'] . "'";
                            $get_deployment_result = $con->query($get_deployment);

                            while ($get_deployment_row = $get_deployment_result->fetch_assoc()) {
                              ?>
                                  <tr>
                                    <td style="font-size: 13px;"><?php echo $get_deployment_row['date_created'] ?></td>
                                    <td style="font-size: 13px;"><?php echo $get_deployment_row['shortlist_title'] ?></td>
                                    <td style="font-size: 13px;"><?php echo $get_deployment_row['employment_status'] ?></td>
                                    <td style="font-size: 13px;">
                                      <?php echo $get_deployment_row['signed_loa_status'] ?></td>
                                    <td style="font-size: 13px;">
                                      <div class="contain">
                                        <div class="columns">
                                          <!--<a href="download_loa.php?id=<?php echo $get_deployment_row['employee_id']; ?>&deployment_id=<?php echo $get_deployment_row['id'] ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-title="Download LOA"><i class="bi bi-box-arrow-down text-white"></i></a>-->
                                        </div>
                                        <div class="columns">
                                          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#uploadSignedLOAModal-<?php echo $get_deployment_row['id'] ?>" title="Upload Signed LOA"><i class="bi bi-file-earmark-arrow-up text-white"></i></button>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>

                                  <!-- Modal for Uploading Signed LOA -->
                                  <div class="modal fade" id="uploadSignedLOAModal-<?php echo $get_deployment_row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="container">
                                            <form action="action.php" method="post" class="row" enctype="multipart/form-data">
                                              <input type="hidden" name="deployment_id" id="deployment_id" value="<?php echo $get_deployment_row['id'] ?>">
                                              <div class="col-md-12">
                                                <label for="" class="form-label">Attach File</label>
                                                <input type="file" name="signed_loa[]" id="signed_loa" class="form-control" multiple required>
                                              </div>
                                              <div class="col-md-12 mt-5">
                                                <button type="submit" class="btn btn-primary" name="signed_loa_button">Upload</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php
                            } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div><!-- End Bordered Tabs -->
                </div>
              </div>

            </div>
            </div>
          </section>

        </main><!-- End #main -->

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include '../body/footer.php'; ?>

        <script>
          function myFunction() {
            var x = document.getElementById("password");
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

          function myFunction2() {
            var x = document.getElementById("conpass");
            var y = document.getElementById("hide3");
            var z = document.getElementById("hide4");

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
        </script>
        <script>
          $(function() {
            var $password = $(".form-control[type='password']");
            var $passwordAlert = $(".password-alert");
            var $requirements = $(".requirements");
            var leng, bigLetter, num, specialChar;
            var $leng = $(".leng");
            var $bigLetter = $(".big-letter");
            var $num = $(".num");
            // var $specialChar = $(".special-char");
            // var specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
            var numbers = "0123456789";

            $requirements.addClass("wrong");
            $password.on("focus", function() {
              $passwordAlert.show();
            });

            $password.on("input blur", function(e) {
              var el = $(this);
              var val = el.val();
              $passwordAlert.show();

              if (val.length < 8) {
                leng = false;
              } else if (val.length > 7) {
                leng = true;
              }


              if (val.toLowerCase() == val) {
                bigLetter = false;
              } else {
                bigLetter = true;
              }

              num = false;
              for (var i = 0; i < val.length; i++) {
                for (var j = 0; j < numbers.length; j++) {
                  if (val[i] == numbers[j]) {
                    num = true;
                  }
                }
              }

              console.log(leng, bigLetter, num, specialChar);

              if (leng == true && bigLetter == true && num == true) {
                $(this).addClass("valid").removeClass("invalid");
                $requirements.removeClass("wrong").addClass("good");
                $passwordAlert.removeClass("alert-warning").addClass("alert-success");
              } else {
                $(this).addClass("invalid").removeClass("valid");
                $passwordAlert.removeClass("alert-success").addClass("alert-warning");

                if (leng == false) {
                  $leng.addClass("wrong").removeClass("good");
                } else {
                  $leng.addClass("good").removeClass("wrong");
                }

                if (bigLetter == false) {
                  $bigLetter.addClass("wrong").removeClass("good");
                } else {
                  $bigLetter.addClass("good").removeClass("wrong");
                }

                if (num == false) {
                  $num.addClass("wrong").removeClass("good");
                } else {
                  $num.addClass("good").removeClass("wrong");
                }
              }


              if (e.type == "blur") {
                $passwordAlert.hide();
              }
            });
          });
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
      </body>

      </html>
    <?php
} else {
  header("location:../applicant/login_applicant.php");
  session_destroy();
}
unset($_SESSION['prompt']);
mysqli_close($con);
?>