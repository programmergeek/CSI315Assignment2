<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- title -->
		<title>Parent/ Guardian Registration</title>

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
					<h2>Parent/ Guardian Registration</h2>
					
					<!-- fullname -->
					<label>
						Full name: <br>
						<input type="text" placeholder="Full name" name="parent_full_name" required>					
					</label> <!-- End of full name -->
					<br><br>
					
					<!-- email -->
					<label>
						Email: <br>
						<input type="email" placeholder="Email" name="parent_email" required> 				
					</label> <!-- End of email -->
					<br><br>
					
					<!-- phone_number -->
					<label>
						Phone number: <br>
						<input type="text" placeholder="Phone number" name="parent_phone_no">					
					</label> <!-- End of phone number-->
					<br><br>
					
					<!-- gender -->
					<label>
						Gender:
						<select>
							<option value="" selected></option>
							<option value="female">Female</option>
							<option value="male">Male</option>
							<option value="other">Other</option>
						</select> 
					</label> <!-- End of gender -->
					<br><br>
					
					<!-- relationship -->
					<label>
						Relationship to student: <br>
						<input type="text" placeholder="Relation" name="relationship">					
					</label> <!-- End of national id -->
					<br><br>
				</form>
			</div>
			
			<div class="registration-form">
				<form action="" method="">
					<h2>Student Registration</h2>
					
					<!-- fullname -->
					<label>
						Full name: <br>
						<input type="text" placeholder="Full name" name="student_full_name" required>					
					</label> <!-- End of full name -->
					<br><br>
					
					<!-- email -->
					<label>
						Email: <br>
						<input type="email" placeholder="Email" name="student_email" required> 				
					</label> <!-- End of email -->
					<br><br> 
					
					<!-- phone_number -->
					<label>
						Phone number: <br>
						<input type="text" placeholder="Phone number" name="student_phone_no">					
					</label> <!-- End of phone number-->
					<br><br>
					
					<label>
						Age: <br>
						<input type="number" placeholder="Age" name="student_age" required> 				
					</label> <!-- End of email -->
					<br><br> 
					
					<!-- gender -->
					<label>
						Gender:
						<select name ="selected_gender">
							<option value="" selected></option>
							<option value="female">Female</option>
							<option value="male">Male</option>
							<option value="other">Other</option>
						</select> 
					</label> <!-- End of gender -->
					<br><br>
					
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
			$studentFullName = $studentEmail = $studentPhoneNo = $studentAge = $studentGender = $studentSubjects = "";

				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$studentFullName = $_POST["student_full_name"];
					$studentEmail = $_POST["student_email"];
					$studentPhoneNo = $_POST["student_phone_no"];
					$studentAge = $_POST["student_age"];
					$studentGender = $_POST["selected_gender"];
					$studentSubjects = $_POST["subjects[]"];

				function clean($field) {
					$field = trim($field);
					$field = stripslashes($field);
					$field = htmlspecialchars($field);
					return $field;
					}
				// cleaning the data 
				$studentFullName = clean($studentFullName);
				$studentEmail = clean($studentEmail);
				$studentPhoneNo = clean($studentPhoneNo);
				$student_age = clean($student_age);
				$studentGender = clean($studentGender);
				$studentSubjects = clean($studentSubjects);

				// Validation of data  
				if(preg_match('/[a-zA-Z]+/', $studentFullName))
				{
					echo "Student name formart is good";
					}
			   else{
				   echo " Wrong format , It must only be letters";
				   $hasError = true;
				   }

				if(filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) 
				{
					echo "Email valid";
				}
				else {
					echo "Email is invalid, please try again";
					$hasError = true;
				}

				if(preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]+/', $studentPhoneNo))
				{
					echo "Phone number is valid";
				}
				else 
				{
					echo "Phone number is invalid, it must only be numbers";
					$hasError = true;
				}

				if(preg_match('/[0-9][0-9]+/', $studentAge))
				{
					echo "Age is valid";
				}
				else 
				{
					echo "Phone number is invalid, it must only be numbers and must be 2 digits";
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

				if(filter_has_var(INPUT_POST, 'subjects[]'))
				{
					echo "Subject chosen";
				}
				else {
					echo "Please select a subject";
					$hasError = true;
				}

				}

				if($hasError == false){
					$conn = connectToDatabase(); // dbName, username and password needs to be defined in databaseHelperFunctions.php

					$sql = $conn->prepare(createInserQuery(/*table name goes here*/, /*column names go here. should be an array e.g array("col-1", "col-2", "col-3")*/));
				
					// check if the data types are correct
					$sql->bind_param("sssssss", $studentFullName, $studentEmail, $studentPhoneNo, $studentGender, $student_age, $studentSubjects);
					if($sql->execute()){
						echo "insert sucess: parents";
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