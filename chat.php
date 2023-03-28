<?php
session_start();
include_once "../connection.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>
<main class="d-flex align-items-center justify-content-center wellcome_bg">

  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        $user_id = mysqli_real_escape_string($db, $_GET['user_id']);
        $sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = '$user_id'");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left text-white"></i></a>
        <img src="../uploads/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['FirstName'] . " " . $row['LastName'] ?></span>
          <p><?php echo $row['status_on']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

</main>

<script src="javascript/chat.js"></script>

</body>

</html>