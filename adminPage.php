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

	$sql = "select * from admin_login where username='" . $_SESSION['user_id']."';";

	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc();
	
	if($row['username'] == $_SESSION['user_id']){



		 $query = "SELECT * FROM `southeast_2.0`;";
		 
		 $results = mysqli_query($conn, $query);

	
		 if(mysqli_num_rows($results) >= 1)
		 {
			echo '<table class="table table-striped table-bordered table-hover">'; 
			echo "<tr><th>Name</th><th>Ticket Number:</th><th>Description</th></tr>"; 
			while($row = mysqli_fetch_array($results))
			{
			  echo "<tr><td>"; 
			  echo $row['Name'];
			  echo "</td><td>";   
			  echo $row['Ticket_No'];
			  echo "</td><td>";    
			  echo $row['Description'];
			  echo "</td></tr>";  
			}
			echo "</table>";  
		}else{
			echo "There was no matching record for the name " . $searchTerm;
		}
	}else{
		echo "Invalid user";
	}
}else{
	echo "Invalid user";
}
?>


