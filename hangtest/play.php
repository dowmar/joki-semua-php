<?php

//start session

session_start();
require 'class/Game.php';
require 'class/Phrase.php';
$selected = $words = array();
$current_phrase = '';
$phrase_answer = '';
$show_full_answer_screen = false;

//destroy last session
if ($_SERVER['REQUEST_METHOD'] != "POST" || (empty($_POST['go_back']) && empty($_POST['key']) && empty($_POST['to_answer']) && empty($_POST['submit_answer']))) {
  session_destroy();
  $_SESSION['selected'] = array();
  $_SESSION['current_phrase'] = '';
  session_start();
}

//reset 
else {
  if (!empty($_SESSION['selected'])) {
    $selected = $_SESSION['selected'];
  }
  if (!empty($_SESSION['current_phrase'])) {
    $current_phrase = $_SESSION['current_phrase'];
  }
}


$phrase_object = new Phrase($current_phrase, $selected);
$game = new Game($phrase_object);

//store phrase -> session
if (empty($_SESSION['current_phrase'])) {
  $_SESSION['current_phrase'] = $phrase_object->getCurrentPhrase();
}


if (!empty($_POST['key'])) {
  $key = trim(
    strtolower(
      filter_input(INPUT_POST, 'key')
    )
  );
  $phrase_object->setSelected($key);
  $_SESSION['selected'] = $phrase_object->getSelected();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>HangMan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/styles.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  
</head>

<body>
  <div class="main-container">
    <div id="banner" class="section">
      <?php
      if (!empty($message)) {
        echo '<h3 class="message">' . $message . '</h3>';
      }
      if ($gameOverMsg = $game->gameOver()) {
        echo $gameOverMsg;
      } else {
        echo $game->displayScore();
        echo $phrase_object->setDisplayPhrases($show_full_answer_screen);
        echo $game->disKeyboard();
      }
      ?>


    </div>
  </div>
</body>

</html>