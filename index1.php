<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Registreren</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Voornaam</label>
            <input type="text" name="fname" placeholder="Voornaam" required>
          </div>
          <div class="field input">
            <label>Achternaam</label>
            <input type="text" name="lname" placeholder="Achternaam" required>
          </div>
          <div class="field input">
            <label>Hond</label>
            <input type="text" name="dogname" placeholder="hond" required>
          </div>
        </div>
        <div class="field input">
          <label>Emailadres</label>
          <input type="text" name="email" placeholder="Emailadres" required>
        </div>
        <div class="field input">
          <label>Wachtwoord</label>
          <input type="password" name="password" placeholder="Wachtwoord" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Profielfoto</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Registreer">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
