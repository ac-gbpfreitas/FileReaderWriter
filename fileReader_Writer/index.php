<?php

	//config
	require_once("inc/config.inc.php");
	//Entities
	require_once("inc/Entities/Player.class.php");
	require_once("inc/Entities/Team.class.php");
	//Utilities Classes
	require_once("inc/Utility/FileAgent.class.php");
	require_once("inc/Utility/TeamParser.class.php");
	require_once("inc/Utility/Page.class.php");
	
	//Static Page file With The Lab Title
	Page::$title = "Lab 05 - GFR - 91";
	//Call the Static Header from Page
	Page::header_Html_gfr_91();

	//If the file is not empty
	if (!empty($_FILES)) {
		//Verify if there is any error
		$errors = FileAgent::validateFile_gfr_91();
		//If there is any error
		if (empty($errors)) {
			//Read file the user uploaded
			$readContent = FileAgent::readFile_gfr_91($_FILES['fileCSV']['tmp_name']);
			//Write the uploaded file data in a new file
			FileAgent::writeFile_gfr_91($readContent);
		}
	}

	//If the files is empty or errors exist
    if ( !empty($_FILES) && !empty($errors) )  {
		//Show the errors
		Page::htmlErrors_gfr_91($errors);
		//show the upload form
		Page::form_Html_gfr_91();
	
	//If there is a file and no errors
    } elseif ( !empty($_FILES) && empty($errors) )   {
		//Read from the new File and create an array of objects
		TeamParser::parseTeamFile(FileAgent::readFile_gfr_91(DATA_OUTPUT));
		//Create an Team Object
		$newTeam = new Team();
		//Set the new Team with players
		$newTeam->teamOrioles(TeamParser::$teamArray);
		//Sort the new Team by Age
		$newTeam->sortOrioles("age");

		//Display the form, if the user wants to upload a new file
		Page::form_Html_gfr_91();
		//Create the table based on the Team Object
		Page::createTable_gfr_91($newTeam);

	//If the file is empty and SortBy was clicked
    } elseif ( empty($_FILES) && !empty($_GET['sortBy']) ) {
		//Read from the new File and create an array of objects
		TeamParser::parseTeamFile(FileAgent::readFile_gfr_91(DATA_OUTPUT));
		//Create an Team Object
		$newTeam = new Team();
		//Set the new Team with players
		$newTeam->teamOrioles(TeamParser::$teamArray);
		//Sort the Team Object by User Choice
		$newTeam->sortOrioles($_GET['sortBy']);

		//Display the form, if the user wants to upload a new file
		Page::form_Html_gfr_91();
		//Create the table based on the sorted Team Object
		Page::createTable_gfr_91($newTeam);

	} else {
		//Display the form, if the user wants to upload a new file
		Page::form_Html_gfr_91();
	}
	//Call the Static Foot from Page
	Page::footer_Html_gfr_91();
	
	//Gustavo Freitas
?>
