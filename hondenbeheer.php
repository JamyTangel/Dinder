<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- 
session_start();
    include_once("php/config.php");
    if(isset($_POST["submit"])) {

      $sql= "INSERT INTO `dogs` (`id`, `naam`, `ras`, `leeftijd`) 
             VALUES (NULL, :naam, :ras, :leeftijd);";

      $naam = $_POST['naam'];
      $ras = $_POST['ras'];
      $leeftijd = $_POST['leeftijd'];

      $dogArray = array(
        "naam"=>$naam,
        "image"=>$image_path,
        "ras"=>$ras,
        "leeftijd"=>$leeftijd
      );

      $stmt = $pdo->prepare($sql);
      $stmt->execute($dogArray);
    }
?> -->
<div class="wrapper">
    <section class="form signup">
      <header>Honden</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
          <div class="field input">
          <label>Naam</label>
          <input type="text" name="naam" placeholder="naam" required>
        </div>
        <div class="field input">
          <label>Ras</label>
          <input type="text" name="ras" placeholder="Ras" required>
        </div>
        <div class="field input">
          <label>leeftijd</label>
          <input type="text" name="leeftijd" placeholder="leeftijd" required>
        </div>
        <div class="field image">
          <label>Profielfoto</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Opslaan">
        </div>
      </form>
    </section>
  </div>
  
  </body>