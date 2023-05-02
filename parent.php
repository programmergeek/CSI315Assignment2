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
					<li><a href="search.php">Search</a></li>
					<li><a href="timetable.html">Timetable</a></li>
				</ul>
			</div>
		</nav> <!-- End of nav -->
		
		<!-- main -->
		<main>
			<div class="registration-form">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<!-- 
						parent 
					-->
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
				
					<!-- relationship -->
					<label>
						Relationship to student: <br>
						<input type="text" placeholder="Relationship" name="relationship">					
					</label> <!-- End of national id -->
					<br><br>
					<!-- End of parent -->
			
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
					
					<label>
						Subject:
						<select name ="subjects">
							<option value="" selected></option>
							<option value="eng">English</option>
							<option value="sets">Setswana</option>
							<option value="math">Mathematics</option>
							<option value="chem">Chemistry</option>
							<option value="phy">Physics</option>
							<option value="bio">Biology</option>
							<option value="cs">Computer Studies</option>
							<option value="acc">Accounting</option>
							<option value="stats">Statistics</option>
						</select> 
					</label> <!-- End of gender -->
					<br><br>
					
					<label>
					Upload student past school reports
					<br><br>
					<input type="file" id="docpicker" name="doc_type" accept=".doc,.docx,.xml,application/msword,application/pdf" />
					</label>
					<br><br>
					
					<!-- sumbit -->
					<center>
						<input type="submit" value="Submit">
					</center>
				</form>
			</div>
			
			<?php

				$parentId = $parentFullName = $parentEmail = $parentPhoneNo = $parentAge = $relation = "";
				$studentId = $studentFullName = $studentEmail = $studentPhoneNo = $studentAge = 
					$studentGender = $studentSubjects = $report = "";
			
				# cleaning function 
				function clean($field) {
					$field = trim($field);
					$field = stripslashes($field);
					$field = htmlspecialchars($field);
					return $field;
				}
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") {

					# parent input
					$parentFullName = clean($_POST["parent_full_name"]);
					$parentEmail = clean($_POST["parent_email"]);
					$parentPhoneNo = clean($_POST["parent_phone_no"]);
					$relation = clean($_POST["relationship"]);

					# student input
					$studentFullName = clean($_POST["student_full_name"]);
					$studentEmail = clean($_POST["student_email"]);
					$studentPhoneNo = clean($_POST["student_phone_no"]);
					$studentAge = clean($_POST["student_age"]);
					$studentGender = clean($_POST["selected_gender"]);
					$studentSubjects = clean($_POST["subjects"]);
					$report = clean($_POST["doc_type"]);
					

					# parent input validation
					if (preg_match('/[a-zA-Z]+/', $parentFullName)) {
						echo "Parent name formart is good";
					} else {
					   echo " Wrong format , It must only be letters";
					}

					if (filter_var($parentEmail, FILTER_VALIDATE_EMAIL)) {
						echo "Email valid";
					} else {
						echo "Email is invalid, please try again";
					}

					if (preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]+/', $parentPhoneNo)) {
						echo "Phone number is valid";
					} else {
						echo "Phone number is invalid, it must only be numbers";
					}
				
					if (preg_match('/[a-zA-Z]+/', $relation)) {
						echo "Relationship formart is good";
					} else {
					   echo " Wrong format , It must only be letters";
				    }

				    # student input validation
					if (preg_match('/[a-zA-Z]+/', $studentFullName)) {
						echo "Student name formart is good";
					} else {
					   echo " Wrong format , It must only be letters";
					}

					if (filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
						echo "Email valid";
					} else {
						echo "Email is invalid, please try again";
					}

					if (preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]+/', $studentPhoneNo)) {
						echo "Phone number is valid";
					} else {
						echo "Phone number is invalid, it must only be numbers";
					}

					if ( (preg_match('/[0-9][0-9]/', $studentAge) ) )  {
						echo "Age is valid";
					} else {
						echo "Age is invalid, it must only be numbers and must be 2 digits";
					}

					if (!isset($studentGender)) {
						echo "Please select an option";
					} else {
						echo "Option selected succesfully";
					}
					if (!isset($studentSubjects)) {
						echo "Please select a subject";
					} else {
						echo "subject selected succesfully";
					}
		
					// if(filter_has_var(INPUT_POST, 'subjects[]'))
					// {
						// echo "Subject chosen";
					// }
					// else {
						// echo "Please select a subject";
					// }
			
				}
			
				require "dbconnect.php";

				$conn = connectToDatabase();

				$parentId = rand(1000, 9999);		# generating 4 digit parent id
				$studentId = rand(100, 999);		# generating 3 digit student id 
				
				$stmt = $conn->prepare("INSERT INTO A2parent (pid, full_name, email, phone_no, relationship, sid)
										VALUES (?, ?, ?, ?, ?, ?)");
				
				$stmt->bind_param("issisi", $tempParentId, $tempParentName, $tempParentEmail, $tempParentNo, $tempRelationship, $tempStudentId);
				
				$tempParentId = $parentId;
				$tempParentName = $parentFullName;
				$tempParentEmail = $parentEmail;
				$tempParentNo = $parentPhoneNo;
				$tempRelationship = $relation;
				$tempStudentId = $studentId;

				if ($stmt->execute()){
					echo("record inserted");
				} else {
					echo "Error inserting record:" . $stmt->error;  // print any error messages 
				}
				
				$stmt = $conn->prepare("INSERT INTO A2student (sid, full_name, email, phone_no, age, gender, subject, report, pid)
										VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
				
				$stmt->bind_param("issiisssi", $tempStudentId, $tempStudentName, $tempStudentEmail, $tempStudentPhoneNo, $tempAge, $tempGender, $tempSubject, $tempReport, $tempParentId);
				
				$tempStudentId = $studentId;
				$tempStudentName = $studentFullName;
				$tempStudentEmail = $studentEmail;
				$tempStudentPhoneNo = $studentPhoneNo;
				$tempAge = $studentAge;
				$tempGender = $studentGender;
				$tempSubject = $studentSubjects;
				$tempReport = $report;
				$tempParentId = $parentId;
				
				if ($stmt->execute()) {
					echo("record inserted");
				} else {
					echo "Error inserting record: " . $stmt->error;  //print any error messages 
				}

				$stmt->close();
			?>
		</main> <!-- End of main -->
		
		<!-- footer -->
		<footer>
			© 2022 École Tuition Centre. All Rights Reserved.
		</footer> <!-- End of footer -->
	</body>
</html>