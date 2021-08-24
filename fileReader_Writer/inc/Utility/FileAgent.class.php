<?php
	//Class to deal with file
	class FileAgent {

		//Static Function that will read the uploaded file from the user
		#Parameter: Temporary FilePath
		#Return: A String
		static function readFile_gfr_91($file) {
			try {

				//File Handle opens the file to read
				$fileHandle = fopen($file,'r');

				if ( !$fileHandle ) {
					throw new Exception("Could not read the file $file");
				}

				//Collects the file content into a huge String
				$fileContent = fread($fileHandle,filesize($file));
				//*IMPORTANT* Close the file
				fclose($fileHandle);
			} catch ( Exception $ex ) {
				echo $ex->getMessage();
			}
			//Return the file content as a String
			return $fileContent;
		}

		//Create a new File with uploaded file.
		#Paramenter: String returned from static readFile function
		static function writeFile_gfr_91($fileContent) {

			try {
				//Open the file to write
				$fileHandle = fopen(DATA_OUTPUT,'w');

				if (!$fileHandle) {
					throw new Exception("Error writing the file! DATA_OUTPUT");
				}
				//Write the String inside the file
				fwrite($fileHandle,$fileContent);
				//*IMPORTANT* Close the file
				fclose($fileHandle);
			} catch (Exception $ex) {
				echo $ex->getMessage();
			}
		}

		
		//Static function that Validates the uploaded file
		#Return: An Array of String - string[]
		static function validateFile_gfr_91() {
			//Create an array with errors
			$errorMessage = array();

			//If the button upload was click with no file uploaded
			if ( empty($_FILES['fileCSV']['name']) ) {
				$errorMessage[] = "There are no files available! Please select a file to upload!";
			
			//If there is file uploaded
			} elseif( !empty($_FILES['fileCSV']['name']) ) {

				$fileName = explode(".",$_FILES['fileCSV']['name']);
				$fileType = strtolower($fileName[count($fileName)-1]);
				//But the uploaded file was not a csv
				if ($fileType != "csv") {
					$errorMessage[] = "This is not a CSV file! Please, try again!";
				}

			}
			//Return the array of errors : String
			return $errorMessage;
		}
	}