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
<div class="wrapper">
    <section class="form signup">
      <header>Profiel</header>
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
        <a href="hondenbeheer.php">honden</a>
        <div class="field button">
          <input type="submit" name="submit" value="Opslaan">
        </div>
      </form>
    </section>
  </div>
  
</body>
</html>
