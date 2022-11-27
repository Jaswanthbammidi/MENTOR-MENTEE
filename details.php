
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <title>Details</title>
</head>
<body>
    
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database= "mentormentee";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
    }

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$id = $_POST['id'];
		if (strlen($id) == 6 || strlen($id) == 4)
		{
			$sql = "SELECT REGISTRATIONNUMBER, Branch, Course, Degree from details where EmpID = ".$id.";";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
                echo "<div class='filter'></div>";
				echo "<table>";
				echo "<tr>";
				echo "<th>Reg. ID</th>";
				echo "<th>Branch</th>";
				echo "<th>Degree</th>";
				echo "</tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>".$row["REGISTRATIONNUMBER"]."</td>";
					echo "<td>".$row["Branch"]."</td>";
					echo "<td>". $row["Degree"]."</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
                echo "<div class='not-found'>";
                echo "<img src='./robot.jpg' >";
				echo "<span>No Data Found</span>";
                echo "</div>";
			}
		}
		else
		{
			$sql = "select k.mentor , k.MentorMobile, k.MentorEmailID, k.Branch , k.REMARKS  from details k where k.REGISTRATIONNUMBER = '".$id."';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
                echo "<div class='filter'></div>";
				echo "<table>";
				echo "<tr>";
				echo "<th>Mentor</th>";
				echo "<th>Mobile</th>";
				echo "<th>Email</th>";
				echo "</tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>".$row["mentor"]."</td>";
					echo "<td>".$row["MentorMobile"]."</td>";
					echo "<td>".$row["MentorEmailID"]."</td>";
					echo "</tr>";
				}
				echo "</table>";
			} else {
                echo "<div class='not-found'>";
                echo "<img src='./robot.jpg' >";
				echo "<span>No Data Found</span>";
                echo "</div>";
			}
		}
	}
	$conn->close();	
?> 
</body>
</html>