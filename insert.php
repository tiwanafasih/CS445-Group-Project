<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "living_at_southeast";
	
	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname) or die("Connection Problem");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    }

	$sql = "select * from user_login where username='" . $_SESSION['user_id']."';";

	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc();
	
	if($row['username'] == $_SESSION['user_id']){
		$Name = $_POST['name'];
		$Southeast_ID = $_POST['id'];
		$Ticket_No = $_POST['ticket'];
		$Permit_No = $_POST['permit'];
		$Plate_No = $_POST['plate'];
		$Car_Make = $_POST['carmake'];
		$Car_Model = $_POST['carmodel'];
		$Description = $_POST['desciption'];



		$sql = "INSERT INTO `southeast_2.0` (name, southeast_id, ticket_no, permit_no, plate_no, car_make, car_model, description) VALUES ('$Name', '$Southeast_ID', '$Ticket_No', '$Permit_No', '$Plate_No', '$Car_Make', '$Car_Model', '$Description')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	$conn->close();
	}
} else {
    // Redirect them to the login page
    header("Location: studentSignIn.php");
}
?>



