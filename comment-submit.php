  <?php
  session_start();
  $FirstName = $_SESSION["FirstName"];
  $LastName = $_SESSION["LastName"];
  $userEmail = $_SESSION["userEmail"];
  $Message = $_SESSION["Message"];
  $fullName = $FirstName . " " . $LastName;
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>Travel-Diary</title>
    <link rel="stylesheet" type="text/css" href="style/all.css" media="all"/>
  </head>
  <body class="redirect">
    <?php include("includes/navigation.php"); ?>
    <p class="feedback"> THANK YOU, <?php echo($fullName); ?>! </p>
    <p class="feedback1"> Once your comments and questions have been reviewed, I will contact you at <?php echo($userEmail); ?>! </p>. </p>
    <p class="feedback1"> Have a wonderful day! </p>
    <!-- Image Source: http://clipart-library.com/images/kiMb7KKRT.png -->
    <!-- Image License: Clipart -->
    <img class= "skyline" alt="skyline" src="Images/skyline.jpg"/>
  </body>
  </html>
