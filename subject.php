<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- title -->
		<title>Assignment2</title>

		<!-- stylesheet -->
		<link rel="stylesheet" type="text/css" href="stylesheet.css"> 

		<meta name="viewport" content="width=device-width, initial-scale=1">
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
					<h2>Subject Registration</h2>
					
					<!-- fullname -->
					<label>
						Subject name: <br>
						<input type="text" placeholder="Subject" name="subject_name" required>					
					</label> <!-- End of full name -->
					<br><br>
					
					<!-- email -->
					<label>
						Subject code: <br>
						<input type="text" placeholder="Code" name="subject_code" required> 				
					</label> <!-- End of email -->
					<br><br>
					
					<!-- sumbit -->
					<center>
						<input type="submit" value="Submit">
					</center>
				</form>
			</div>
			<?php
				$subjectName = subjectCode = "";

				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					$subjectName = $_POST["subject_name"];
					$subjectCode = $_POST["subject_code"];

					<!-- Function to clean and sanitize data -->
				function clean($field) {
					$field = trim($field);
					$field = stripslashes($field);
					$field = htmlspecialchars($field);
					return $field;
					}
					clean($subjectName);
					clean($subjectCode);

					<!-- Validating the data -->
					if(preg_match('/[a-zA-Z]+/', $subjectName))
					{
						echo "SUbject name format is good";
						}
				   else{
					   echo " Wrong format , It must only be letters";
					   }

					   if(preg_match('/[a-zA-Z]+/', $subjectCode))
					   {
						   echo "Subject Code formart is correct";
						   }
					  else{
						  echo " Wrong format , It must only be letters";
						  }	   
				}

			?>
		</main> <!-- End of main -->> 
			
		
		<!-- footer -->
		<footer>
			© 2022 École Tuition Centre. All Rights Reserved.
		</footer> <!-- End of footer -->
	</body>
</html>