<?php
// Always start this first
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$dbname = "living_at_southeast";



if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
	
        $con = mysqli_connect($db_host, $db_user, $db_pass, $dbname) or die("Connection Problem" . mysqli_errno($con));
	#$database = mysqli_select_db($con, $dbname) or die("SQL Problem" . mysqli_error($con));
	$sql = "SELECT * FROM user_login WHERE username = '". $_POST['username'] ."';";
	
        $result = mysqli_query($con, $sql);
	
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	if($row['password'] == $_POST['password']){
		$_SESSION['user_id'] = $row['username'];
        	header("Location: /complaint.php");
	}else{
		echo "invalid login";
	}
    }
} else {
    echo "invlaid login";
}
mysqli_close($con);
    }
}
?>
<!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width">
            <center><title>Living at Southeast 2.0</title>
            <link href="style.css" rel="stylesheet" type="text/css" />
            </head>
          <body>
                <h1>Living at Southeast 2.0</h1>
                <h3>Student Sign In</h3>
                      <h4 class="text-normal">Enter your Username and Password</h1>
                      <div class="form-group">
<form action="" method="post">
  <label class="sr-only" for="username"></label>
        <input id="username" name="username" size="20" autofocus type="text" class="form-control" tabindex="1"
               placeholder="Username" required>
    </div>
    <br>
    <div class="form-group">
  <label class="sr-only" for="password"></label>
        <input id="password" name="password" size="20" type="password" class="form-control" placeholder="Password" tabindex="1" required>
    </div>
    <br>
    <div class="form-group">
  <input type="submit" value="Sign In" class="btn btn-default hidden-xs" tabindex="3"> </form>   </div>
  <br>
  <div class="form-group">
  <form action="index.html">
    <input type="submit" value="Home Page" class="btn btn-default hidden-xs" tabindex="3"></div>
  </form>
  </center>
</body>
</html>
