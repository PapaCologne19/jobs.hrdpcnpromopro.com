<?php
include '../database/connection.php';
include '../body/function.php';
session_start();

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- JS -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link rel="stylesheet" href="../css/style/search_results.css">
  <link rel="stylesheet" href="../css/style/header.css">
  <link rel="stylesheet" href="../css/bootstrap.css">


  <title>Search Jobs Results</title>
<style>
       .card{
            width: 100% !important; 
            height: 400px !important;
       }
       @media screen and (max-width: 430px){
           .card{
               height: 100% !important;
           }
       }
  </style>
</head>

<body>
  <?php
  include 'page/header.php'; ?>

  <br><br><br><br><br><br><br><br>

  <div class="head">
    <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="searchjob.php" style="color: #000;">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Search Jobs Results</li>
        </ol>
      </nav>
      <br><br>
    </div>
  </div>

  <div class="body">
    <div class="container">
    <button type="button" class="btn" onclick="location.href = 'searchjob.php';" style="background: #279EFF; border-radius: 5px; box-shadow: none;" title="Search Again">
        <i class="bi bi-search text-white"></i>
    </button>
      <div class="row">
        <span>JOB OPENINGS</span>
        <hr>
        <?php
        if (isset($_GET['searchbtn'])) {
          $search = clean(mysqli_real_escape_string($con, $_GET['search']));
          $query = "SELECT *, TIMESTAMPDIFF(SECOND, date_approved, NOW()) as diff
          FROM projects 
          WHERE project_title LIKE '%$search%' OR 
                EXISTS (SELECT * FROM mrf WHERE projects.mrf_tracking = mrf.tracking AND mrf.outlet LIKE '%$search%')
                AND status = '1'
                AND is_deleted = '0'";

          $result = mysqli_query($con, $query);
          $queryResult = mysqli_num_rows($result);
          
              ?>
          <span style="text-transform: uppercase;">Search Result for "<?php echo $search; ?>"</span>
          <p style="color: #000;"><?php echo $queryResult ?> result/s found</p>
         <?php
         if (mysqli_num_rows($result)) {
          while ($row = mysqli_fetch_assoc($result)) {
            $tracking = $row['mrf_tracking'];
            $project_title = $row['project_title'];
          $select = "SELECT * FROM mrf WHERE tracking = '$tracking'";
          $select_result = $con->query($select);
          while($select_row = $select_result->fetch_assoc()){
            $image = '../img/pcn.png';
            $diff = $row['diff'];
            if ($diff < 60) { 
              $time_ago = $diff . " seconds ago";
            } else if ($diff < 3600) {
              $time_ago = floor($diff / 60) . " minute" . ((floor($diff / 60) > 1) ? "s" : "") . " ago";
            } else if ($diff < 86400) {
              $time_ago = floor($diff / 3600) . " hour" . ((floor($diff / 3600) > 1) ? "s" : "") . " ago";
            } else if ($diff < 604800) {
              $time_ago = floor($diff / 86400) . " day" . ((floor($diff / 86400) > 1) ? "s" : "") . " ago";
            } else if ($diff < 2592000) {
              $time_ago = floor($diff / 604800) . " week" . ((floor($diff / 604800) > 1) ? "s" : "") . " ago";
            } else if ($diff < 31536000) {
              $time_ago = floor($diff / 2592000) . " month" . ((floor($diff / 2592000) > 1) ? "s" : "") . " ago";
            } else {
              $time_ago = floor($diff / 31536000) . " year" . ((floor($diff / 31536000) > 1) ? "s" : "") . " ago";
            }

            $select_deployed = "SELECT * FROM deployment WHERE shortlist_title = '$project_title' AND clearance = 'ACTIVE'";
            $select_deployed_result = $con->query($select_deployed);
            $deployed = $select_deployed_result->num_rows;
            $needed = $select_row['np_male'] + $select_row['np_female'];
            $slots = $needed - $deployed;
            if($slots > 0){
         ?>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                  <a href="job_details.php?jobid=<?php echo $row['id']; ?>" style="text-decoration: none;">
                    <div class="card-body" style="background: none !important;">
                      <img width="30%" alt="Company Logo" style="box-sizing: border-box;" <?php echo '<img src="../imageStorage/' . $image . '" />'; ?> <br><br>
                      <p class="card-title" style="text-align: left !important;"><?php echo $row['project_title']; ?></p>
                      <p style="font-family: 'Roboto', sans-serif;"><?php echo $row['client_company_id']; ?></p>
                      <p>Posted on <?php echo $time_ago; ?></p>
                    </div>
                    <div class="card-footer">Available Slots: <?php echo $slots;?></div>
                  </a>
                </div>
                </form>
              </div>
        <?php
            }
            }
          }
         }
          else {
            echo "No Result Found";
          }
        }
     
        ?>



      </div>
    </div>
  </div>


<br><br><br><br><br><br><br><br><br><br><br><br>

  <?php include '../body/footer.php'; ?>
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