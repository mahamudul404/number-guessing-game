<?php
session_start();

// suru korar jonno random number generate korbo
if (!isset($_SESSION['randomNumber'])) {
  // Generate a random number between 1 and 100
  $_SESSION['randomNumber'] = rand(1, 100);
  $_SESSION['attempts'] = 0; // Initialize the attempt counter
}

// user guess ta check korbo
if (isset($_POST['guess'])) {
  $guess = intval($_POST['guess']); // Convert the input to an integer
  $_SESSION['attempts']++; // Increment the attempt counter
  $randomNumber = $_SESSION['randomNumber'];

  // user er guess er feedback dekha
  if ($guess < $randomNumber) {
    $message = "Too low! Try again.";
  } elseif ($guess > $randomNumber) {
    $message = "Too high! Try again.";
  } else {
    $message = "Congratulations! You've guessed the correct number in {$_SESSION['attempts']} attempts!";
    unset($_SESSION['randomNumber']); // End the game by unsetting the number
    unset($_SESSION['attempts']); // Reset attempts for a new game
  }
}

// reset korar jonno button ta click korle
if (isset($_POST['reset'])) {
  unset($_SESSION['randomNumber']);
  unset($_SESSION['attempts']);
  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Number Guessing Game</title>
</head>

<body style="background-color: #f0f0f0; font-family: Arial, sans-serif;margin: 0;">
  <h1 style="text-align: center; color: #333;">Number Guessing Game</h1>
  <h2 style="text-align: center; color: #666;">আপনি এটি খুব কম সংখ্যায় চেষ্টা করার মাধ্যমে বের করুন  </h2>
  <p style="text-align: center; color: #666;">Guess the number between 1 and 100</p>
  <form action="index.php" method="post" style="text-align: center;">
    <input type="number" name="guess" placeholder="Enter your guess" style="padding: 10px; margin: 10px; border: 1px solid #ccc; border-radius: 5px; width: 200px; text-align: center;">
    <button type="submit" style="padding: 10px 20px; margin: 10px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
  </form>

  <!-- user er jonno feedback dekha -->

  <?php if (isset($message)): ?>
    <p style="text-align: center; color: #333;"><?php echo $message; ?></p>
  <?php endif; ?>


  <!-- reset korar jonno button ta -->
  <form method="POST">
    <button style="padding: 10px 20px; margin: 10px; background-color: darkorange; color: white; border: none; border-radius: 5px; cursor: pointer; display: block; margin-left: auto; margin-right: 680px; text-align: center; font-size: 16px; font-weight: bold; margin-top: 50px;" type="submit" name="reset">Play Again</button>
  </form>


</body>

</html>