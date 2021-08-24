<?php
	//Player Entity class
	class Player {
		//Player attributes/properties
		private $playerNumber;
		private $firstName;
		private $lastName;
		private $position;
		private $bats;
		private $playerThrow;
		private $age;
		private $height;
		private $weight;
		private $birthPlace;

		//Player Constructor
		function Player($number,$fName,$lName,$pos,$bats,$throw,$age,$height,$weight,$birthPlace) {
			$this->playerNumber = $number;
			$this->firstName = $fName;
			$this->lastName = $lName;
			$this->position = $pos;
			$this->bats = $bats;
			$this->playerThrow = $throw;
			$this->age = $age;
			$this->height = $height;
			$this->weight = $weight;
			$this->birthPlace = $birthPlace;
		}

		//To String methods
		//Get attributes/properties Methods
		function getFirstName() {
			return $this->firstName;
		}
		
		function getLastName() {
			return $this->lastName;
		}

		function getPlayerNumber() {
			return $this->playerNumber;
		}

		function getPosition() {
			return $this->position;
		}

		function getBats() {
			return $this->bats;
		}

		function getPlayerThrow() {
			return $this->playerThrow;
		}
		
		function getAge() {
			return $this->age;
		}
		
		function getBirthPlace() {
			return $this->birthPlace;
		}
		
		function getWeight() {
			return $this->weight;
		}

		function getHeight() {
			return $this->height;
		}
		
		/*
		function __toString(){
			$message = "";
			$message .= "Player #: ".$this->playerNumber."\n";
			$message .= "First Name: ".$this->firstName."\n";
			$message .= "Last Name: ".$this->lastName."\n";
			$message .= "Position: ".$this->position."\n";
			$message .= "Bats: ".$this->bats."\n";
			$message .= "Throw: ".$this->playerThrow."\n";
			$message .= "Age: ".$this->age."\n";
			$message .= "BirthPlace: ".$this->birthPlace."\n";
			$message .= "Weight: ".$this->weight."\n";
			$message .= "Height: ".$this->height;
			
			return $message;
		}
		*/
	}