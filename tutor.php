<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- title -->
		<title>Tutor Registration</title>

		<!-- stylesheet -->
		<link rel="stylesheet" type="text/css" href="stylesheet.css"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
	</head>
	<body>
		<!-- header -->
		<header>
			<div>
				<img src="images/logo.jpg" height="80px" width="100px">
				<h1>École Tuition Centre</h1>
			</div>
		</header> <!-- End of header -->
		
		<!-- nav -->
		<nav>
			<div class="navbar">
				<ul>
					<li class="H"><a href="index.html">Home</a></li>
					<li><a href="#">Registration</a>
						<ul>
							<li><a href="parent.html">Parent/ Guardian</a></li>
							<li><a href="subject.html">Subject</a></li>
							<li><a href="tutor.html">Tutor</a></li>
						</ul>
					</li>
					<li><a href="Assignment2.html">Subjects</a></li>
					<li><a href="Assignment2.html">Search</a></li>
					<li><a href="Assignment2.html">Timetable</a></li>
				</ul>
			</div>
		</nav> <!-- End of nav -->
		
		<!-- main -->
		<main>
			<div class="registration-form">
				<form action="" method="">
					<h2>Tutor Registration</h2>
					
					<!-- fullname -->
					<label>
						Full name: <br>
						<input type="text" placeholder="Full name" name="tutor_full_name" required>					
					</label> <!-- End of full name -->
					<br><br>
					
					<!-- email -->
					<label>
						Email: <br>
						<input type="email" placeholder="Email" name="tutor_email" required> 				
					</label> <!-- End of email -->
					<br><br>
					
					<!-- phone_number -->
					<label>
						Phone number: <br>
						<input type="text" placeholder="Phone number" name="tutor_phone_no">					
					</label> <!-- End of phone number-->
					<br><br>
					
					<!-- national id -->
					<label>
						National ID: <br>
						<input type="text" placeholder="National ID" name="tutor_national_id">					
					</label> <!-- End of national id -->
					<br><br>
					
					<!-- gender -->
					<label>
						Gender:
						<select name = "selected_gender">
							<option value="" selected></option>
							<option value="female">Female</option>
							<option value="male">Male</option>
							<option value="other">Other</option>
						</select> 
					</label> <!-- End of gender -->
					<br><br>
					
					
					<!-- experience level -->
					<label>
						Experience level: <br>
						<label>
							<input type="radio" name="experience_level" value="undergraduate">					
							Undergraduate  
						</label>
						<br>
						<label>
							<input type="radio" name="experience_level" value="postgraduate">					
							Postgraduate 
						</label>
						<br>
						<label>
							<input type="radio" name="experience_level" value="working">					
							Working
						</label>
						<br>
					</label> <!-- End of experience level -->
					<br>
					<br>
					
					<!-- subjects -->
					<label>
						Subjects: <br>
						<label>
							<input type="checkbox" name="subjects[]" value="english language">					
							English Language
						</label> 
				
						<label>
							<input type="checkbox" name="subjects[]" value="setswana">					
							Setswana
						</label>
						
						<label>
							<input type="checkbox" name="subjects[]" value="mathematics">
							Mathematics
						</label>
						<br>

						<label>
							<input type="checkbox" name="subjects[]" value="chemistry">							
							Chemistry
						</label> 

						<label>
							<input type="checkbox" name="subjects[]" value="physics">					
							Physics
						</label>
						
						<label>
							<input type="checkbox" name="subjects[]" value="biology">
							Biology
						</label>
						<br>

						<label>
							<input type="checkbox" name="subjects[]" value="computer studies">							
							Computer Studies
						</label> 

						<label>
							<input type="checkbox" name="subjects[]" value="accounting">					
							Accounting 
						</label> 
						
						<label>
							<input type="checkbox" name="subjects[]" value="statistics">					
							Statistics
						</label> 
					</label> <!-- End of subjects -->
					<br><br>
					
					<!-- sumbit -->
					<center>
						<input type="submit" value="Submit">
					</center>
				</form>
			</div>
			
			<?php 
				require "databaseHelperFunctions.php";
				$hasError = false;
				$tutorFullName = $tutorEmail = $tutorPhoneNo = $tutorID = $tutorGender = $tutorExperienceLevel = $tutorSubjects = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$tutorFullName = $_POST["tutor_full_name"];
					$tutorEmail = $_POST["tutor_email"];
					$tutorPhoneNo = $_POST["tutor_phone_no"];
					$tutorID = $_POST["tutor_national_id"];
					$tutorGender = $_POST["selected_gender"];
					$tutorExperienceLevel = $_POST["experience_level"];
					$tutorSubjects = $_POST["subjects[]"];

				function clean($field) {
					$field = trim($field);
					$field = stripslashes($field);
					$field = htmlspecialchars($field);
					return $field;
					}
				// cleaning the data 
				$tutorFullName = clean($tutorFullName);
				$tutorEmail = clean($tutorEmail);
				$tutorPhoneNo = clean($tutorPhoneNo);
				$tutorID = clean($tutorID);
				$tutorExperienceLevel = clean($tutorExperienceLevel);
				$tutorSubjects = clean($tutorSubjects);

				// Validation of data 
				if(preg_match('/[a-zA-Z]+/', $tutorFullName))
				{
					echo "Tutor name formart is good";
					}
			   else{
				   echo " Wrong format , It must only be letters";
				   $hasError = true;
				   }

				if(filter_var($tutorEmail, FILTER_VALIDATE_EMAIL)) 
				{
					echo "Email valid";
				}
				else {
					echo "Email is invalid, please try again";
					$hasError = true;
				}

				if(preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]+/', $tutorID))
				{
					echo "Tutor ID is valid";
				}
				else 
				{
					echo "Tutor ID is invalid, it must only be numbers";
					$hasError = true;
				}

				if(preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]+/', $tutorPhoneNo))
				{
					echo "Tutor phone number is valid";
				}
				else 
				{
					echo "Tutor phone number is invalid, it must only be numbers";
					$hasError = true;
				}

				if(!isset($tutorExperienceLevel))
				{
					echo "Tutor experience level not chosen, please choose your experience level";
					$hasError = true;
				}
				else {
					echo "Experience level set succesfully";
				}

				if(filter_has_var(INPUT_POST, 'subjects[]'))
				{
					echo "Subject chosen";
				}
				else {
					echo "Please select a subject";
					$hasError = true;
				}

				if(!isset($tutorGender))
				{
					echo "Please select an option";
					$hasError = true;
				}
				else {
					echo "Option selected succesfully";
				}

				}
				
				if($hasError == false){
					$conn = connectToDatabase(); // dbName, username and password needs to be defined in databaseHelperFunctions.php

					$sql = $conn->prepare(createInserQuery(/*table name goes here*/, /*column names go here. should be an array e.g array("col-1", "col-2", "col-3")*/));
				
					// check if the data types are correct
					$sql->bind_param("sssssss", $tutorFullName, $tutorEmail, $tutorPhoneNo, $tutorID, $tutorGender, $tutorExperienceLevel, $tutorSubjects);
					if($sql->execute()){
						echo "insert sucess: tutors";
					}else{
						echo "Error: ". $sql->error();
					}
					$sql->close();
					$conn->close();
				}

			?>
		</main> <!-- End of main -->
		
		<!-- footer -->
		<footer>
			© 2022 École Tuition Centre. All Rights Reserved.
		</footer> <!-- End of footer -->
	</body>
</html>