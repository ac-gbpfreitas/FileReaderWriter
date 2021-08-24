<?php

	//Static HTML Page
	class Page {
		//Global Static PageTitle
		public static $title = "Lab Page Title";

		//Static HTML Header Function
		static function header_Html_gfr_91() {
			echo '
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<!-- Required meta tags -->
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

				<!-- Bootstrap CSS -->
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
				<link href="css/lab05-gfr-91.css" rel="stylesheet" type="text/css" />
				<title>'.self::$title.'</title>
			</head>
			<body>
				<div class="container">
				<h1>'.self::$title.'</h1>';
		}

		//Static HTML Foot Function
		static function footer_Html_gfr_91() {
			echo '
				</div>
				<!-- Optional JavaScript -->
				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
			</body>
			</html>';
		}

		//Static HTML Form Function
		static function form_Html_gfr_91() {
			echo '
					<div>
						<form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
							<input type="file" name="fileCSV">
							<input type="submit" value="Upload CSV">
						</form>
					</div>
			';
		}

		//Static HTML Error to display Function
		#Parameters: Array of String messages
		static function htmlErrors_gfr_91($errors)   {
			echo '
			<div class="alert alert-warning" role="alert">
				<p>Please fix the following errors:</p>
				<ul>';
					foreach($errors as $error)  {
						echo '<li>'.$error.'</li>';
					}			
			echo '</ul>
			</div>
			';
		}

		//Static Function Table to display, based on the read file
		#Parameters: A Team Object
		static function createTable_gfr_91(Team $team) {
			//As needed to sort the team object, GET method is used in the table
			echo '<div>
			<form action="'.$_SERVER['PHP_SELF'].'" method="GET" enctype="multipart/form-data">
				<table class="table table-striped">
					<thead>
						<tr>
							<th colspan="10"><h1>Orioles</h1></th>
						</tr>
						<tr>
						<th scope="col"><a href="?sortBy=num">Player No.</a></th>
						<th scope="col"><a href="?sortBy=fName">First Name</a></th>
						<th scope="col"><a href="?sortBy=lName">Last Name</a></th>
						<th scope="col"><a href="?sortBy=pos">Position</a></th>
						<th scope="col"><a href="?sortBy=bats">Bats</a></th>
						<th scope="col"><a href="?sortBy=thro">Throw</a></th>
						<th scope="col"><a href="?sortBy=age">Age</a></th>
						<th scope="col"><a href="?sortBy=height">Height</a></th>
						<th scope="col"><a href="?sortBy=weight">Weight</a></th>
						<th scope="col"><a href="?sortBy=bPlace">BirthPlace</a></th>
						</tr>
					</thead>
					<tbody>';
			//For each player inside the Team, display player data
            foreach ($team->getTeam() as $player) {
				//By To String methods, each player data is displayed.
                echo '
                <tr>
                    <th scope="row">'.$player->getPlayerNumber().'</th>
                    <td>'.$player->getFirstName().'</td>
                    <td>'.$player->getLastName().'</td>
                    <td>'.$player->getPosition().'</td>
					<td>'.$player->getBats().'</td>
					<td>'.$player->getPlayerThrow().'</td>
					<td>'.$player->getAge().'</td>
					<td>'.$player->getHeight().'</td>
					<td>'.$player->getWeight().'</td>
					<td>'.$player->getBirthPlace().'</td>
                </tr>
                ';
            }
			//The last line display the total objects into the team object.
			//By using a method from team object
			echo '
				<tr>
					<th colspan="9" scope="col">Total Players: </th>
					<td>'.$team->getTotalPlayers().'</td>
				</tr>
			';
			
        echo '   
				</tbody>
				</table>
			</form>
		</div>
        ';
		}
	}
