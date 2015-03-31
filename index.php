<?php
	//Creates new hangman object to generate logic.
	$hangman = new Hangman();
	
	//Determines if it is a new game or if the user has guessed. If they have, it updates the game accordingly.
	if (isset($_GET['action'])) 
	{
		$action = $_GET['action'];
	} 
	else 
	{
		$action = '';
	}

	switch ($action)
	{
		case 'new_game':
			$hangman->startGame();
					
					
			break;
		case 'guess':
			$hangman->showGame();
			$hangman->restoreGame();

			break;
		default:
			$this->startGame();
			break;
	}
	
	//Creates and displays a hangview object to display hangman onto an html template.
	$view = new HangView($hangman);
	$view->show();
?>
