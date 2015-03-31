<?php
	class Hangman
	{
		
		private $word;

		private $lettersLeft;
		private $gameOver;
		private $picture;

		public function __construct()
		{
			
		}

		//Picks a random word and stores it into a session variable
		public function getWord()
		{
			$words = file(PHPWS_SOURCE_DIR."/mod/hangman/hangwords.txt");
			
			$randWord = array_rand($words);
			$_SESSION["word"] = $words[$randWord];
			$this->word = $_SESSION["word"];

			$_SESSION['guessedWord'] = array_fill(0, strlen($_SESSION["word"]) - 1, "___ ");
			$_SESSION["wrongGuesses"] = 0;
			return $_SESSION["word"];
	    }

		//Runs the helper methods necesary for the game to begin
		public function startGame()
		{
			$this->increment();
			$this->initializeUsedLetters();
			$this->getWord();
			$this->showGame();

		}

		//Refreshes the count to the current number after every user move
		public function restoreGame()
		{
	        echo $_SESSION["word"];
			$_SESSION['count']++;

		}

		/*A helper method to keep track of the number of guesses
		* in a session variable, also used to keep track of the index
		*of the usedLetters session array
		*/
		public function increment()
		{
			$_SESSION['count'] = (isset($__SESSION['count'])) ? $__SESSION['count'] : 0;
			$_SESSION['count']++;
			return $_SESSION['count'];
		}

		//Stores a blank array in a session variable at startup
		public function initializeUsedLetters()
		{
			$_SESSION['usedLetters'] = array();
		}

		//Stores $used into the usedLetters array session variable at position $index
		public function setUsedLetters($used, $index)
		{
			$_SESSION['usedLetters'] = (isset($_SESSION['usedLetters'])) ? $_SESSION['usedLetters'] : array();
			$_SESSION['usedLetters'][$index] = $used;
		}
		
		//Refreshes the used letters array and number of wrong guesses, essentially refreshing the game state
		public function showGame()
		{
			if(isset($_GET['letter']))
			{
				$this->setUsedLetters($_GET['letter'], $_SESSION['count']);
			}
			$this->showWord();
			
			
			if(isset($_GET['letter']) && !(in_array(($_GET['letter']." "), $_SESSION['guessedWord'])))
			{
				$_SESSION['wrongGuesses']++;

			}

		}

		//stores the guessed letters into the guessed word session variable
		public function showWord()
		{
			$word = $_SESSION["word"];
			$i = 0;
			foreach ($_SESSION['usedLetters'] as $index => $letter) 
			{
				$word = strtoupper($word);
				
				
				if(strpos($word, $letter) || substr($word, 0, 1) == $letter)
				{
					$i = strpos($word, $letter, 0);
					
				    $occur = substr_count($word, $letter);
				    $wordArray = str_split($word);
				    for($j = 0; $j < sizeof($wordArray); $j++)
				    {
				    	if($wordArray[$j] == $letter)
				    	{
				    		$_SESSION["guessedWord"][$j] = $letter." ";
				    	}
				    }
				  	
					ksort($_SESSION["guessedWord"]);
					
				}
				
				
			}
			
			$this->guessedWord = $_SESSION["guessedWord"];
			return $_SESSION["guessedWord"];
		}


		//Helper method for showGame that print the letters on to the screen
		public function generateLetters()
		{
			
				
				$this->letters = file(PHPWS_SOURCE_DIR."/mod/hangman/letters.txt");
				$letArray = array();
				foreach ($this->letters as $index => $letter)
			 	{	
			 		$letter = trim($letter);
			 		
			 		if(!in_array($letter, $_SESSION['usedLetters']))
			 		{
			 			$letArray[] = PHPWS_Text::moduleLink($letter, 'hangman', array('action' => 'guess', 'letter'=> $letter));
			 			
			 		}
			 	} 
			 	$this->lettersLeft = $letArray;
				return $letArray;

		}

		//Returns number of incorrect guesses
		public function getNumWrongGuesses()
		{
			return $_SESSION['wrongGuesses'];
		}

		public function isGameOver()
		{
			return $this->gameOver();
		}

		public function setGameOver($game)
		{
			$this->gameOver = $game;
		}

	}
?>
