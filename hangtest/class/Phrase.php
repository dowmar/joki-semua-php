<?php
class Phrase
{
  private $currentPhrase;
  private $selected = array();
  private $phraseAnswer;
  private $phraseArray = [
    'Basreng Hesti',
    'Aku sakit perut',
    'Main Genshin Impact Mulu'
  ];

  public function __construct($phrase = null, $selected = [])
  {
    if (!empty($phrase)) {
      $this->setCurrentPhrase($phrase);
    } else {
      $this->setCurrentPhrase($this->phraseArray[array_rand($this->phraseArray)]);
    }

    if (!empty($selected) && is_array($selected)) {
      foreach ($selected as $character) {
        $this->setSelected($character);
      }
    }
  }

  public function getCurrentPhrase()
  {
    return $this->currentPhrase;
  }

  public function setCurrentPhrase($value)
  {
    $normalized_phrase = $this->normalinStringChar($value);
    if (strlen($normalized_phrase) > 0 && ctype_alpha(str_replace(' ', '', $normalized_phrase))) {
      $this->currentPhrase = $normalized_phrase;
    }
  }

  public function getPhraseAnswer()
  {
    return $this->phraseAnswer;
  }

  public function setPhraseAnswer($value)
  {
    $normalized_phrase_answer = $this->normalinStringChar($value);
    if (strlen($normalized_phrase_answer) > 0 && ctype_alpha(str_replace(' ', '', $normalized_phrase_answer))) {
      $this->phraseAnswer = $normalized_phrase_answer;
    }
  }

  public function checkPhraseAnswer()
  {
    if ($this->getCurrentPhrase() == $this->getPhraseAnswer()) {
      return TRUE;
    }

    return FALSE;
  }

  public function getSelected()
  {
    return $this->selected;
  }

  public function getSelectedCorrect()
  {
    $selected_correct_characters = array_filter(
      $this->getSelected(),
      array($this, 'checkLetter')
    );
    return $selected_correct_characters;
  }

  public function setSelected($value)
  {
    $character = $this->normalinStringChar($value);
    if (!in_array($character, $this->getSelected()) && strlen($character) == 1 && ctype_alpha($character)) {
      $this->selected[] = $character;
    }
  }

  public function normalinStringChar($value)
  {
    $normalized_output = strtolower(
      trim(
        preg_replace(
          "/[^A-Za-z ]/",
          '',
          preg_replace(
            '/\s+/',
            ' ',
            filter_var($value,)
          )
        )
      )
    );

    return $normalized_output;
  }

  public function checkLetter($value)
  {
    $character = $this->normalinStringChar($value);
    if (strlen($character) == 1 && ctype_alpha($character)) {
      if (strpos($this->getCurrentPhrase(), $character) !== FALSE) {
        return true;
      }
    }
    return false;
  }

  public function getWholeCharacters()
  {

    $all_correct_characters = str_split(
      count_chars(
        str_replace(' ', '', $this->getCurrentPhrase()),
        3
      )
    );
    return $all_correct_characters;
  }

  public function setDisplayPhrases($show_full_answer_screen)
  {

    // $display_phrase = '<div id="phrase" class="section">' . PHP_EOL;
    $display_phrase = nl2br('<div id="phrase" class="section">');
    if ($show_full_answer_screen) {
      $display_phrase .= nl2br('</div>');
      return $display_phrase;
    }
    $display_phrase .= nl2br('<ul>');
    $characters = str_split($this->currentPhrase);
    $next_new_line = 10;
    $all_selected_characters = $this->getSelected();
    $last_selected_character = end($all_selected_characters);

    foreach ($characters as $key => $character) {
      $display_phrase .= '<li class="';

      if ($character == " ") {
        $display_phrase .= 'hide space"> ';
      } else {
        if ($character == $last_selected_character && !$show_full_answer_screen) {
          $display_phrase .= 'show ';
        }
        if (in_array($character, $this->getSelectedCorrect())) {
          $display_phrase .= 'show ';
        } else {
          $display_phrase .= 'hide ';
        }
        $display_phrase .= nl2br('letter ' . $character . '">' . $character . '</li>');
      }
      $display_phrase .= nl2br('</li>');
      if ($character == " " && $key >= $next_new_line) {
        $display_phrase .= nl2br('<br>');
        $next_new_line = $key + 10;
      }
    }
    $display_phrase .= nl2br('</ul>');
    $display_phrase .= nl2br('</div>');

    return $display_phrase;
  }
}
