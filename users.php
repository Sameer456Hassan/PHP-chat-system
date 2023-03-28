<?php
session_start();
include_once "../connection.php";
if (!isset($_SESSION['email'])) {
  header("location: login.php");
}
$unique = $_SESSION['unique_id'];
?>
<?php include_once "header.php"; ?>

<main class="d-flex justify-content-center align-items-center  wellcome_bg" >
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id ='$unique'");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="../gallery/FB_IMG_1670669324694.jpg" alt="">
          <div class="details">
            <span><?php echo $row['FirstName'] . " " . $row['LastName'] ?></span>
            <p><?php echo $row['status_on']; ?></p>
          </div>
        </div>
        <!-- <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a> -->
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>
</main>

<script src="javascript/users.js"></script>

</body>

</html>