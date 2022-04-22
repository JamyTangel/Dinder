<?php
        include("php/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinder</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
        <div class="header">
            <div class="logo">
            <img src="images/logo_transparent.png" alt="logo" width="100" height="100">
            </div>
                <ul>
                    <li><a href="landing.php">Home</a></li>
                    <li><a href="">Contact</a></li>
                    <?php
                    $sum=1;
                    $queryone="SELECT user_id FROM users";
                    $result = mysqli_query($conn, $queryone);
                    $row = mysqli_fetch_array($result, MYSQLI_NUM);

                    while($row = $result->fetch_assoc()){
                    $sum = $sum + 1;
                    }
                    echo $sum;
                    ?>
                    
                </ul>
                <div class="message">
                    <img src="images/message.jpg" alt="logo" width="100" height="100">
                </div>
                <div class="knop">
                    <button><a href="login.php">Inloggen</a></button>
                </div>
                <div class="knop">
                    <button><a href="index1.php">Registreren</a></button>
                </div>
        </div>
        <br><br><br><br>
        <div class="banner">
            <img src="images/banner.jpg" alt="banner" width="1500" height="400">
            <div class="tekst">Welkom</div>
        </div><br><br><br>
        <div class="tekstvlak">
            <p>Dinder is een platform waarbij je andere hondjes en baasjes kan ontmoeten.<br>
            Daarbij kan je swipen of je een hond leuk vind of niet. Als je naar rechts swipt kan<br>
            je met degene gaan praten en je kan afspreken om te gaan wandelen. </p>
        </div>
        <br><br><br>
        </div>
        <div class="swipen">
            <img class="mySlides" src="images/hond1.jpg" style="width:75%">
            <img class="mySlides" src="images/hond2.jpg" style="width:75%">
            <img class="mySlides" src="images/hond 3.jpg" style="width:75%">

        <div class="swipeknoppen">
            <button class="red-button" onclick="plusDivs(-1)">&#10094;</button>
            <button class="green-button" onclick="plusDivs(1)">&#10095;</button>
        </div>
        <br>

        <div class="footer">
            <br>
            <div class="socials">
                <img src="images/Facebooklogo.png" alt="facebooklogo" width="80" height="80">
                <img src="images/instagramlogo.png" alt="instagramlogo" width="90" height="75">
                <img src="images/Linkedinlogo.jpg" alt="linkedinlogo" width="80" height="80">
            </div>
        </div>
        <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
</body>
</html>