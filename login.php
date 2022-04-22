<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Inloggen</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Emailadres</label>
          <input type="text" name="email" placeholder="Emailadres" required>
        </div>
        <div class="field input">
          <label>Wachtwoord</label>
          <input type="password" name="password" placeholder="wachtwoord" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="inloggen">
        </div>
      </form>
      <div class="link">Nog niet geregistreerd? <a href="index1.php">Doe het hier!</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
