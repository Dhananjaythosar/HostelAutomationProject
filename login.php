<?php

session_start();

include 'config.php';



if(isset($_POST['submit'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass = mysqli_real_escape_string($conn, md5($_POST['password']));

	// if($email == "") {
	// 	echo "Email field is empty.";
	// 	echo "<br/>";
	// 	echo "<a href='index.html'>Go back</a>";
	// } 
	// if($pass == "") {
	// 	echo "Password field is empty.";
	// 	echo "<br/>";
	// 	echo "<a href='index.html'>Go back</a>";
	// } 
	
		$result = mysqli_query($conn, "SELECT * FROM registration WHERE email='$email' AND pass='$pass'")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['email'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['email'] = $row['email'];
			$_SESSION['id'] = $row['id'];
		} 
		else{
			echo "<script type='text/javascript'>alert('Invalid email or password!!'); document.location = 'index.php';</script>";
		}
		if(isset($_SESSION['valid'])) {
		    if($row['cat_id']==1)
			{
				// $_SESSION['first_name'] = $row[0];
                $_SESSION['id'] = $row['id'];
				header("Location:dash/officer_dashboard/dashboard.php");
			}
            elseif($row['cat_id'] == 2){
                // $_SESSION['first_name'] = $row[0];
                $_SESSION['id'] = $row['id'];
				header("Location:dash/staff_dashboard/dashboard.php");
            }
            elseif($row['cat_id'] == 3){
                // $_SESSION['first_name'] = $row[0];
				if($row['valid']=='Yes'){
                $_SESSION['id'] = $row['id'];
				header("Location:dash/examples/dashboard.php");
				}
				else{
					echo "<script type='text/javascript'>alert('You are not verified for login!!'); document.location = 'index.php';</script>";
				}
            }
            elseif($row['cat_id'] == 4){
                // $_SESSION['first_name'] = $row[0];
                $_SESSION['id'] = $row['id'];
				header("Location:dash/mess-dashboard/dashboard.php");
            }
            else{
                echo "<script>alert('oops! Something went Wrong.')</script>";
            }
		
		
	}
} 
?>