<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Number Guessing Game</title>
</head>

<body style="background-color: #f0f0f0; font-family: Arial, sans-serif;margin: 0;">
  <h1 style="text-align: center; color: #333;">Number Guessing Game</h1>
  <p style="text-align: center; color: #666;">Guess the number between 1 and 100</p>
  <form action="index.php" method="post" style="text-align: center;">
    <input type="number" name="guess" placeholder="Enter your guess" style="padding: 10px; margin: 10px; border: 1px solid #ccc; border-radius: 5px; width: 200px; text-align: center;">
    <button type="submit" style="padding: 10px 20px; margin: 10px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
  </form>

  <!-- display the feedback to the user -->

  <?php
  if (isset($message)): ?>
    <p style="text-align: center; color: #333;"><?php echo $message; ?></p>
  <?php endif; ?>


  <!-- button to reset the game -->
  <form method="post">
    <button type="submit" name="reset" value="true" style="padding: 10px 20px; margin: 10px; background-color: darkorange; color: white; border: none; border-radius: 5px; cursor: pointer; display: block; margin-left: auto; margin-right: 680px; text-align: center; font-size: 16px; font-weight: bold; margin-top: 50px;">Play Again</button>
  </form>


</body>

</html>

<?php
session_start();
// start the game if the session is not set

if (!isset($_SESSION['randomNumber'])) {

  $_SESSION['randomNumber'] = rand(1, 100);
  $_SESSION['attempts'] = 0;
}

// user er guess er jonno , uuser jeta guess korbe tar upor

if (isset($_POST['guess'])) {
  $guess = intval($_POST['guess']);
  $_SESSION['attempts']++;
  $randomNumber = $_SESSION['randomNumber'];
}
// user er guess er feedback dekha

if ($guess < $randomNumber) {
  $message = "Too low! Try again.";
} elseif ($guess > $randomNumber) {
  $message = "Too high! Try again.";
} else {
  $message = "Congratulations! You guessed the number in " . $_SESSION['attempts'] . " attempts.";
  unset($_SESSION['randomNumber']);
  unset($_SESSION['attempts']);
}




?>