<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
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
		echo "Hello " . $_SESSION['user_id'];
	} else {
    // Redirect them to the login page
    header("Location: studentSignIn.php");
}
}
?>
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width">
            <title>Living at Southeast 2.0</title>
            <link href="style.css" rel="stylesheet" type="text/css" />
            </head>
          <body><br>
		<form action = "/logout.php"> <input type="submit" value="Logout"></form>
                <h1>Living at Southeast 2.0</h1>
                      
           <div id = "Background">   
            <p align = "center">Please fill out this form to submit a complaint to DPS. 
              </p>
            <form action ="insert.php" method ="POST">
              <table align = "center">
                <tr>
                  <td>Name:</td>
                  <td><input type="text" name="name"></td>
                    </tr>
                  <tr>
                    <td>Southeast ID/S0 Number:</td>
                    <td><input type="text" name="id">
                      </td>
                      </tr>
                    <tr>
                      <td>Ticker Number:</td>
                      <td><input type="text" name="ticket">
                        </td>
                        </tr>
                      <tr>
                        <td>Permit Number:</td>
                        <td><input type="text" name="permit">
                          </td> 
                          </tr>
                        <tr>
                          <td>Car Make:</td>
                          <td><input type="text" name="carmake"> </td> 
                            </tr>
			<tr>
                          <td>Car Model:</td>
                          <td><input type="text" name="carmodel"> </td> 
                            </tr>
                          <tr>
                            <td >License Plate Number:</td>
                            <td><input type="text" name="plate"></td> 
                              </tr>
                            <tr>
                              <td valign="top">Description of Complaint:</td>
                              <td>
                                <textarea rows="3" cols="20" name = "desciption">Please describe your complaint.
                                </textarea> 
                              </td> 
                            </tr>
                            
                            <tr>
                              <th colspan="2">
                                  <input type="submit" value="Submit">
                                </th>
                            </tr>
                            </table>                             
                            </form>
                            </div> 

                            
           
                          </body>
                        </html>

