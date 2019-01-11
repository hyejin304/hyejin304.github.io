<?php
$HIDDEN_ERROR_CLASS = "hiddenError";

// Form Submission
$submit = $_REQUEST["submit"];
if (isset($submit)) {

  error_log("user submitted form");

  $FirstName = $_REQUEST["FirstName"];

  if ( !empty($FirstName) ) {
    $FirstNameValid = true;
  } else {
    $FirstNameValid = false;
  }

  // Last Name
  $LastName = $_REQUEST["LastName"];
  if ( !empty($LastName) ) {
    $LastNameValid = true;
  } else {
    $LastNameValid = false;
  }

  // Email
  $userEmail = $_REQUEST["userEmail"];
  if ( !empty($userEmail) && filter_var($userEmail, FILTER_VALIDATE_EMAIL) ) {
    $userEmailValid = true;
  } else {
    $userEmailValid = false;
  }

  //Message
  $Message = $_REQUEST["Message"];
  if ( !empty($Message) ) {
    $MessageValid = true;
  } else {
    $MessageValid = false;
  }

  $formValid = $FirstNameValid && $LastNameValid && $userEmailValid && $MessageValid;

  // If Valid, allow submission
  if ($formValid) {
    session_start();
    $_SESSION['FirstName'] = $FirstName;
    $_SESSION['LastName'] = $LastName;
    $_SESSION['userEmail'] = $userEmail;
    $_SESSION['Message'] = $Message;
    header("Location: comment-submit.php");
    return;
  }
} else {
  error_log("no form submitted");
  $FirstNameValid = true;
  $LastNameValid = true;
  $userEmailValid = true;
  $MessageValid= true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Travel-Diary</title>
  <link rel="stylesheet" type="text/css" href="style/all.css" media="all"/>
  <!-- Load validation -->
  <script src="Scripts/clientValidation.js" type="text/javascript"></script>
</head>
<body class="Contact-Body">
  <h1 id="contact-heading">Contact</h1>
  <?php include("includes/navigation.php"); ?>
  <p class="contact-caption"> Feel free to drop me comments, messages or any questions you may have! </p>
  <hr>
  <p class="subscribe"> Have questions? Want to collaborate? Drop me a message. </p>
  <form method="post" action="contact.php" id="mainForm" novalidate>
    <div class="LabelAndInput">
      <div class="Label">
        <label for="FirstName">First Name: </label>
      </div>
      <div class="Input">
        <input id="FirstName" name="FirstName" placeholder="First Name" value="<?php echo($FirstName);?>" required>
      </div>
      <br/>
      <span class="errorContainer <?php if ($FirstNameValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="FirstNameError">
        Required Field.
      </span>
    </div>
    <div class="LabelAndInput">
      <div class="Label">
        <label for="LastName">Last Name: </label>
      </div>
      <div class="Input">
        <input id="LastName" name="LastName" placeholder="Last Name" value="<?php echo($LastName);?>" required>
      </div>
      <br/>
      <span class="errorContainer <?php if ($LastNameValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="LastNameError">
        Required Field.
      </span>
    </div>
    <div class="LabelAndInput">
      <div class="Label">
        <label for="LastName">Email: </label>
      </div>
      <div class="Input">
        <input type="email" id="userEmail" name="userEmail" placeholder="e.g. hk884@cornell.edu" value="<?php echo($userEmail);?>" required>
      </div>
      <br/>
      <span class="errorContainer <?php if ($userEmailValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="EmailError">
        Required Field.
      </span>
      <span class="errorContainer <?php if ($userEmailValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="EmailInvalid">
        Please submit a valid email address!
      </span>
    </div>
    <div class="LabelAndInput">
      <div class="Label">
        <label for="Message">Message: </label>
      </div>
      <div class="Input">
        <input id="Message" name="Message" placeholder="Ask me anything!" value="<?php echo($Message);?>" required>
      </div>
      <br/>
      <span class="errorContainer <?php if ($MessageValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="MessageError">
        Required Field.
      </span>
    </div>
    <hr>
    <div class="Survey">
      <p class="subscribe"> Wait...Tell me more about you! </p>
      <p> Want to see content YOU want? Indicate your interests below. </p>
      <div class="subscribe-div">
        <input type="checkbox" name="subscribe-option"> Accommodation <br>
        <input type="checkbox" name="subscribe-option"> Tourist Destinations <br>
        <input type="checkbox" name="subscribe-option"> Local Cuisine <br>
      </div>
      <div class="interest">
        <p> Is there anything else you want to see here? </p>
        <input class="interest-box" type="text" name="interest" placeholder= "This space is optional!">
        <br/>
        <input class= "comment-submit" name="submit" type="submit">
      </div>
    </div>
  </form>
</body>
</html>
