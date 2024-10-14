<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Number Guessing Game</title>
</head>

<body>
  <h1>Number Guessing Game</h1>
  <p>Guess the number between 1 and 100</p>
  <form action="index.php" method="post">
    <input type="number" name="guess" placeholder="Enter your guess">
    <button type="submit">Submit</button>
  </form>

  <!-- display the feedback to the user -->

  <?php
  if (isset($message)): ?>
    <p><?php echo $message; ?></p>
  <?php endif; ?>


  <!-- button to reset the game -->
  <form method="post">
    <button type="submit" name="reset" value="true">Reset Game</button>
  </form>


</body>

</html>