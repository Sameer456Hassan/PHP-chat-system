<?php 
session_start();
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
    header("location:users.php");
} else {
  echo 'on';
    // session_destroy();
    // header("location:login.php");
}
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
