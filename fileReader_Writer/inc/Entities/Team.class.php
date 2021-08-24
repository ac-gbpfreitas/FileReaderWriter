<?php
	//Team Entity class | A Set of players
	class Team {
		//Team attribute
		private $team;

		//Set the new Player Objects to the team
		function teamOrioles($teamArray) {
			$this->team = $teamArray;
		}
		//Return the objects of the team
		function getTeam(){
			return $this->team;
		}
		//Return the total of objects in the team
		function getTotalPlayers(){
			return count($this->team);
		}

		//Comparative functions from the team
		function compareNumber($player1,$player2) {//Sort By Number
			return $player1->getPlayerNumber() <=> $player2->getPlayerNumber();
		}
		function compareFirstName($player1,$player2) {//Sort By First Name
			return $player1->getFirstName() <=> $player2->getFirstName();
		}
		function compareLastName($player1,$player2) {//Sort By Last Name
			return $player1->getLastName() <=> $player2->getLastName();
		}
		function comparePosition($player1,$player2) {//Sort By Position
			return $player1->getPosition() <=> $player2->getPosition();
		}
		function compareBats($player1,$player2) {//Sort By Batting Average
			return $player1->getBats() <=> $player2->getBats();
		}
		function compareThrow($player1,$player2) {//Sort by throwing hand
			return $player1->getPlayerThrow() <=> $player2->getPlayerThrow();
		}
		function compareAge($player1,$player2) {//Sort by age
			return $player1->getAge() <=> $player2->getAge();
		}
		function compareBirthPlace($player1,$player2) {//Sort by Birth Place
			return $player1->getBirthPlace() <=> $player2->getBirthPlace();
		}
		function compareWeight($player1,$player2) {//Sort by Weight
			return $player1->getWeight() <=> $player2->getWeight();
		}
		function compareHeight($player1,$player2) {//Sort by Height
			return $player1->getHeight() <=> $player2->getHeight();
		}
		
		//Function sort by player attributes/properties
		function sortOrioles($sortBy) {
			//Sort the team object according to user choice
			switch ($sortBy) {

			case "num"://If the user clicks on Player Number
				usort($this->team,'self::compareNumber');
				break;
			case "fName"://If the user clicks on First Name
				usort($this->team,'self::compareFirstName');
				break;
			case "lName"://If the user clicks on Last Name
				usort($this->team,'self::compareLastName');
				break;
			case "pos"://If the user clicks on Position
				usort($this->team,'self::comparePosition');
				break;
			case "bats": //If the user clicks on Batting Average
				usort($this->team,'self::compareBats');
				break;
			case "thro"://If the user clicks on Throwing Hand
				usort($this->team,'self::compareThrow');
				break;
			case "age"://If the user clicks on Age
				usort($this->team,'self::compareAge');
				break;
			case "weight"://If the user clicks on Weight
				usort($this->team,'self::compareWeight');
				break;
			case "height"://If the user clicks on Height
				usort($this->team,'self::compareHeight');
				break;
			case "bPlace"://If the user clicks on BirthPlace
				usort($this->team,'self::compareBirthPlace');
				break;
			}
		}
	}