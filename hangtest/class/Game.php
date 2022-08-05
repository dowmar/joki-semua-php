<?php

class Game
{
  private $maxLives = 6;
  private $lives;
  private $phrase;

  public function __construct($phrase)
  {
    $this->phrase = $phrase;
  }

  public function getLives()
  {
    return $this->lives;
  }

  public function setLives($lives)
  {
    $this->lives = $lives;
  }


  public function checkMenang()
  {
    $remaining_correct_characters = array_diff($this->phrase->getWholeCharacters(), $this->phrase->getSelectedCorrect());

    if (empty($remaining_correct_characters) && is_array($remaining_correct_characters)) {
      return TRUE;
    }
    return FALSE;
  }



  public function checkLosing()
  {

    $incorrect_characters = array_diff($this->phrase->getSelected(), $this->phrase->getWholeCharacters());

    if (is_array($incorrect_characters)) {
      $count_incorrect = count($incorrect_characters);
      $this->setLives($this->maxLives - $count_incorrect);
      if ($this->getLives() == 0) {
        return TRUE;
      }
    }
    return FALSE;
  }

  public function gameOver()
  {
    $image = $gameOverMsg = '';

    $start_tag = nl2br('<h1 id="game-over-message">');
    $end_tag = nl2br('</h1>');

    $start_over_button = nl2br('<form method="post" action="play.php">');
    $start_over_button .= nl2br('<input id="btn__reset" name="start" type="submit" value="RESTART" />');
    $start_over_button .= nl2br('</form>');

    if (empty($this->phrase->getPhraseAnswer())) {

      if ($this->checkMenang() && !$this->checkLosing()) {
        $gameOverMsg = 'YE : ';
      } elseif ($this->checkLosing() && !$this->checkMenang()) {
        $gameOverMsg = 'NO : ';
      }
    }

    if (!empty($gameOverMsg)) {
      $output = $image
        . $start_tag
        . $gameOverMsg
        . '"' . $this->phrase->getCurrentPhrase() . '"'
        . $end_tag
        . $start_over_button;
      return $output;
    }
    return FALSE;
  }


  public function disKeyboard()
  {

    $keyrows = array();
    $keyrows[] = array('q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p');
    $keyrows[] = array('a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l');
    $keyrows[] = array('z', 'x', 'c', 'v', 'b', 'n', 'm');

    $keyboard_string = '';

    $keyboard_string .= nl2br('<div id="qwerty" class="section" style="display:block">');
    $keyboard_string .= nl2br('<form id="key_board" method="post" action="play.php">');
    foreach ($keyrows as $keyrow) {
      $keyboard_string .= nl2br('<div class="keyrow">');
      foreach ($keyrow as $key) {
        $keyboard_string .= '<button id="key" name="key" value="' . $key . '"';
        $styling = ' class="key"';
        if (in_array($key, $this->phrase->getSelected())) {
          $styling = ' class="key ';
          if (!$this->phrase->checkLetter($key)) {
            $styling .= 'in';
          }
          $styling .= 'correct" disabled';
        }

        $keyboard_string .= $styling;
        $keyboard_string .= nl2br('>' . $key . '</button>');
      }

      $keyboard_string .= nl2br('</div>');
    }
    $keyboard_string .= nl2br('</form>');
    $keyboard_string .= nl2br('</div>');

    return $keyboard_string;
  }

  public function displayScore()
  {
    switch ($this->lives) {
      case 1:
        echo '<img src="images/hang6.png" alt="Hang6" width="300" height="300">';
        break;
      case 2:
        echo '<img src="images/hang5.png" alt="Hang5" width="300" height="300">';
        break;
      case 3:
        echo '<img src="images/hang4.png" alt="Hang4" width="300" height="300">';
        break;
      case 4:
        echo '<img src="images/hang3.png" alt="Hang3" width="300" height="300">';
        break;
      case 5:
        echo '<img src="images/hang2.png" alt="Hang2" width="300" height="300">';
        break;
      case 6:
        echo '<img src="images/hang1.png" alt="Hang1" width="300" height="300">';
        break;
      default:
        echo '<img src="images/hang7.png" alt="IMAGINE LOSING OMEGALUL" width="300" height="300">';
    }
  }
}
