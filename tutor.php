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
					<li><a href="search.php">Search</a></li>
					<li><a href="timetable.html">Timetable</a></li>
				</ul>
			</div>
		</nav> <!-- End of nav -->
		
		<!-- main -->
		<main>
			<div class="registration-form">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<h2>Tutor Registration</h2>
					
					<!-- fullname -->
					<label>
						Full name: <br>
						<input type="text" placeholder="Full name" name="tutor_full_name" required>	
						<span><?php echo $tutorFullName; ?></span>				
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
						<input type="number" placeholder="Phone number" name="tutor_phone_no">					
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
					</label>
					<br><br>
					
					<label>
					Upload Copy of Omang
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
				$tutorFullName = $tutorEmail = $tutorPhoneNo = $tutorId = $tutorGender = $tutorExperienceLevel = $tutorSubjects = $omang = "";
				
				# cleaning function
				function clean($field) {
					$field = trim($field);
					$field = stripslashes($field);
					$field = htmlspecialchars($field);
					return $field;
				}
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (empty(clean($_POST["tutor_full_name"]))) {
						$tutorNameError = Tutor name is required";
					} else {
						$tutorFullName = clean($_POST["tutor_full_name"]);
					}
					$tutorEmail = clean($_POST["tutor_email"]);
					$tutorPhoneNo = clean($_POST["tutor_phone_no"]);
					$tutorId = clean($_POST["tutor_national_id"]);
					$tutorGender = clean($_POST["selected_gender"]);
					$tutorExperienceLevel = clean($_POST["experience_level"]);
					$tutorSubjects = clean($_POST["subjects"]);
					$omang = clean($_POST["doc_type"]);

					# tutor input validation 
					if (preg_match('/[a-zA-Z]+/', $tutorFullName)) {
						echo "Tutor name formart is good";
					} else {
					echo " Wrong format , It must only be letters";
					}

					if (filter_var($tutorEmail, FILTER_VALIDATE_EMAIL)) {
						echo "Email valid";
					} else {
						echo "Email is invalid, please try again";
					}

					if (preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]+/', $tutorPhoneNo)) {
						echo "Tutor phone number is valid";
					} else {
						echo "Tutor phone number is invalid, it must only be numbers";
					}

					if (preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]+/', $tutorId)) {
						echo "Tutor ID is valid";
					} else {
						echo "Tutor ID is invalid, it must only be numbers";
					}

					if (!isset($tutorGender)) {
						echo "Please select an option";
					} else {
						echo "Option selected succesfully";
					}

					if (!isset($tutorExperienceLevel)) {
						echo "Tutor experience level not chosen, please choose your experience level";
					} else {
						echo "Experience level set succesfully";
					}

					if (!isset($tutorSubjects)) {
						echo "Please select Subject";
					} else {
						echo "Subject selected succesfully";
					}
				}
				
				require "dbconnect.php";

				$conn = connectToDatabase();

				$tutorId = rand(10, 99);		# generating 2 digit tutor id
				
				$stmt = $conn->prepare("INSERT INTO A2tutor (full_name, email, phone_no,national_id, gender, experience, subjects, omang_copy)
										VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
				
				$stmt->bind_param("ssiissss", $tempTutorName, $tempTutorEmail, $tempTutorNo, $tempNationalId, $tempGender, $tempExperience, $tempSubject, $tempOmangCopy);
				
				$tempTutorName = $tutorFullName;
				$tempTutorEmail = $tutorEmail;
				$tempTutorNo = $tutorPhoneNo;
				$tempNationalId = $tutorId;
				$tempGender = $tutorGender;
				$tempExperience = $tutorExperienceLevel;
				$tempSubject = $tutorSubjects;
				$tempOmangCopy = $omang;
				
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