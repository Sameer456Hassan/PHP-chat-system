<?php
include '../connection.php';
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $name = $_SESSION['name'];
  $Linkedin = $_SESSION['Linkedin'];
  $Website = $_SESSION['Website'];
  $address = $_SESSION['address'];
  $country = $_SESSION['Country'];
  $City = $_SESSION['City'];
  $Career = $_SESSION['Career'];
  $Mobile = $_SESSION['Mobile'];
  $id = $_SESSION['id'];
  // echo $Career;
  $Career = json_decode($Career);
  $query = "SELECT * FROM images WHERE id_c='$id' ORDER BY id DESC LIMIT 1";
  $image = mysqli_query($db, $query);
} else {
  session_destroy();
  header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chats | Cigar Club</title>
  <link rel="icon" type="image/x-icon" href="../assets/img/nav_logo.png">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
  <link rel="stylesheet" href="style.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="../assets/js/script.js"></script>

</head>


<body>
  <header class="main_header">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div id="mySidenav" class="sidenav">
        <h2 class="text-white text-center">Welcome to <br /> <span><img src="../assets/img/nav_logo.png" alt=""></span>
          Cigar Club</h2>
        <a href="javascript:void(0)" class="closebtn">&times;</a>
        <div class="container custom-container">
          <div class="row justify-content-center fixed_row">

            <div class="col-lg-4 px-lg-5 col-md-6 mb-5">
              <a class="nav_btn" href="../Chat/">
                <div class="border_nav text-center">
                  <img class="img-fluid" src="../assets/img/messages.png" alt="" height="60">
                  <p class="m-0">Messages</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 px-lg-5 col-md-6 mb-5">
              <a class="nav_btn" href="../announcements.php">
                <div class="border_nav text-center">
                  <img class="img-fluid" src="../assets/img/announcement.png" alt="" height="60">
                  <p class="m-0">Announcements</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 px-lg-5 col-md-6 mb-5">
              <a class="nav_btn" href="../search.php">
                <div class="border_nav text-center">
                  <img class="img-fluid" src="../assets/img/search.png" alt="" height="60">
                  <p class="m-0">Search </p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 px-lg-5 col-md-6 mb-5">
              <a class="nav_btn" href="../gallery.php">
                <div class="border_nav text-center">
                  <img class="img-fluid" src="../assets/img/gallery.png" alt="" height="60">
                  <p class="m-0">Gallery</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 px-lg-5 col-md-6 mb-5">
              <a class="nav_btn" href="">
                <div class="border_nav text-center">
                  <img class="img-fluid" src="../assets/img/shop.png" alt="" height="60">
                  <p class="m-0">Shop</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 px-lg-5 col-md-6 mb-5">
              <a class="nav_btn" href="./php/logout.php?logout_id=<?php echo $_SESSION['unique_id']; ?>">
                <div class="border_nav text-center">
                  <img class="img-fluid" src="../assets/img/login.png" alt="" height="60">
                  <p class="m-0">Logout</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <a class="navbar-brand" href="../index.php">
          <?php
          $sql = "SELECT id FROM cities WHERE c_name = '. $City .'";
          $result = $db->query($sql);
          if ($result !== false && $result->num_rows > 0) {
            echo '<img class="img-fluid" src="../assets/img/logo.png" alt="">';
          } else {
            echo '<img class="img-fluid" src="../assets/img/cities/' . str_replace(" ", "_", $City) . '.png" alt="">';
          }
          ?>
        </a>
        <span class="open_btn">&#9776;</span>
      </div>
    </nav>
  </header>