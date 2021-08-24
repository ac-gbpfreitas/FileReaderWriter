<?php
	//Team Parser Class
	class TeamParser {
		//Empty Static array of objects (Player)
		static $teamArray = array();
		
		//Static function To parse the String file content
		static function parseTeamFile($fileContent) {

			try {
				//Generates an array of Strings. Each line has Player data
				$lines = explode("\n",$fileContent);
				//Skipping the first line (header), go through every line
				for ( $i = 1; $i < count($lines); $i++ ) {
					//Generate an array of strings with player data
					$playerPropertie = explode(",",$lines[$i]);
					//If there are more than 9 attributes/properties
					if ( count($playerPropertie) != 9 ) {
						throw new Exception("Problem with file structure on line: $i");
					} else {//If there are 9 attributes/properties
						//Push a player object into static array
						//By using static parseFileLine function, as it needs to split the name
						self::$teamArray[] = self::parseFileLine_gfr_91($playerPropertie);
					}
				}
			} catch (Exception $ex) {
				echo $ex->getMessage();
			}
		}

		//Static Function that will parse a string array with data into a Player Object
		#Parameter: String Array
		#Return: A player
		static function parseFileLine_gfr_91($playerLine) {
			//Explode the position #1 from the Array of string (Player Full Name)
			$fullName = explode(" ",$playerLine[1]);
			
			//Create a new Player with the String array 
			$newPlayer = new Player(
				$playerLine[0],// Player Number
				$fullName[0], //Player First Name
				$fullName[1], //Player Last Name
				$playerLine[2], //Player Position
				$playerLine[3], //Player Bats
				$playerLine[4], //Player Throw
				$playerLine[5], //Player Age
				$playerLine[6], //Player Height
				$playerLine[7], //Player Weight
				$playerLine[8] //Player Birth Place
			);
			//Return the Player
			return $newPlayer;
		}
	}