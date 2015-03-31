<?php 
	class HangView
	{
		private $game;
		private $tpl;

		public function __construct(Hangman $hang)
		{
			$this->game = $hang;
		}

		//Displays the game onto the html template
		public function show()
		{
			$tpl = array();
			
			//$_SESSION['numWrongGuesses'] = $this->game->getNumWrongGuesses();
			$tpl['picture'] = $this->showPicture();
			$word = implode($this->game->showWord());
			$tpl['wordGuess'] = $word;
			
			$letters = $this->game->generateLetters();
			foreach ($letters as $letter) 
			{
				$tpl['letters'][] = array('letter' => $letter);
			}

			$tpl['newGame'] = PHPWS_Text::moduleLink("New Game", 'hangman', array('action' => 'new_game'));

			//Next two if statements determine if user won or lost
			if($this->game->getNumWrongGuesses() >= 6)
			{
				$this->game->setGameOver(true);
			    $tpl['loss'] = "<br><b>GAME OVER! The word was <u>".$this->game->getWord()."</u>! Press New Game to Play Again!</b><br><br>";
				
			}
			
			if(!(in_array("___ ", $this->game->showWord())))
			{
				$this->game->setGameOver(true);
			    $tpl['won'] = "<br><b>Congragulations! You have correctly guessed the word! Press New Game to Play Again!</b><br><br>";
			}
			
			
			//Pushes content to the template and adds the template to the localhost
			$content = PHPWS_Template::process($tpl, 'hangman', "hangman.tpl");
			Layout::add($content, 'hangman');
		}

		//returns the pictures from the img folder for the appropriate wrong guess for show()
		public function showPicture()
		{
			$hangNum = $this->game->getNumWrongGuesses();
			$pic = "<img src = mod/hangman/img/hang".$hangNum.".gif>";
			$this->picture = $pic;
			return $pic;
		}
	}
?>