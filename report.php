

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
					<li><a href="search.html">Search</a></li>
					<li><a href="timetable.html">Timetable</a></li>
				</ul>
			</div>
		</nav> <!-- End of nav -->

		<?php 
			require "dbconnect.php";

			$conn = connectToDatabase();
			
			# list all offered subjects
			// $result = $conn->prepare("SELECT name
			// 						FROM A2subject");
			
			// if ($result->execute()) {
			// 	$result->bind_result($col1, $col2, $col3, $col4, $col5, $col6); # binds returned results into variables
			// 	while ($result->fetch()) {
			// 		$allSubjects .= $col1." ".$col2." ".$col3." ".$col4." ".$col5." ".$col6."<br/>";
			// 	}
			// }
			
			# list all enrolled students
			$result = $conn->prepare("SELECT full_name, email, phone_no, age, gender, subject
									FROM A2student");
			
			if ($result->execute()) {
				$result->bind_result($col1, $col2, $col3, $col4, $col5, $col6); # binds returned results into variables
				while ($result->fetch()) {
					$allStudents .="<tr><td>". $col1."</td><td>".$col2."</td><td>".$col3."</td><td>".$col4."</td><td>".$col5."</td><td>".$col6."</td>";
				}
			}

			# list all tutors
			$result = $conn->prepare("SELECT full_name, email, phone_no, national_id, gender, experience, subjects
									FROM A2tutor");
			
			if ($result->execute()) {
				$result->bind_result($col1, $col2, $col3, $col4, $col5, $col6, $col7);		# binds returned results into variables
				while ($result->fetch()) {
					$allTutors .="<tr><td>". $col1."</td><td>".$col2.
									"</td><td>".$col3."</td><td>".$col4.
									"</td><td>".$col5."</td><td>".$col6.
									"</td><td>".$col7."</td>";
				}
			}

			# close database connection 
			$result->close();		
		?>
		
		<!-- main -->
		<main id="report-main">
			
			<!-- list all offered subjects -->
			<h2 >List all offered subjects</h2>
			<span><?php echo $allSubjects; ?></span>
			<hr>
			
			<!-- list all enrolled students -->
			<h2>List all enrolled students</h2>
			<button id="student-btn">Hide</button>
			<table id="student-table">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone No.</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Subject</th>
					</tr>
				</thead>
				<tbody>
					<?php echo $allStudents; ?>
				</tbody>
			</table>
			<hr>

			<!-- list all tutors -->
			<h2>List all tutors</h2>
			<button id="tutor-btn">Hide</button>
			<table id="tutor-table">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Email</th>
						<th>Phone No.</th>
						<th>National ID</th>
						<th>Gender</th>
						<th>Experience</th>
						<th>Subject</th>
					</tr>
				</thead>
				<tbody>
					<?php echo $allTutors; ?>
				</tbody>
			</table>
			<hr>
		</main> <!-- End of main -->

		<script>
			const studentButton = document.getElementById("student-btn")
			const reportTable = document.getElementById("student-table")
			showStudentTable = false;
			studentButton.addEventListener("click", function() {
				showStudentTable = !showStudentTable		// set true
				reportTable.className = showStudentTable ? "hidden" : "";
				studentButton.innerHTML = showStudentTable ? "Show" : "Hide";
			})

			const tutorButton = document.getElementById("tutor-btn")
			const tutorTable = document.getElementById("tutor-table")
			showTutorTable = false;
			tutorButton.addEventListener("click", function() {
				showTutorTable = !showTutorTable		// set true
				tutorTable.className = showTutorTable ? "hidden" : "";
				tutorButton.innerHTML = showTutorTable ? "Show" : "Hide";
			})
		</script>

		<!-- footer -->
		<footer>
			© 2022 École Tuition Centre. All Rights Reserved.
		</footer> <!-- End of footer -->
	</body>
</html>
