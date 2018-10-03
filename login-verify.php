<?php

	include('config.php');
	session_start();

	//Function that will trim the input, and run it through a small security check
	function test_input($input)
	{
	    $input = trim($input);
	    $input = stripslashes($input);
	    $input = htmlspecialchars($input);
	    $input = preg_replace("/[^a-zA-Z0-9]+/", "", $input);
	    return $input;
	}

	$login = test_input($_REQUEST['loginName']);
	$pass = test_input($_REQUEST['pass']);

	$sqlLogin = "SELECT * FROM admin WHERE name = '".$login."' and password = MD5('".$pass."')";

	$result = mysqli_query($connection, $sqlLogin);

	$find = $result->num_rows;

		
	if ($find == 1) {
		$row = mysqli_fetch_assoc($result);

		$_SESSION['user_name'] = $row['name'];
		$_SESSION['user_id'] = $row['password'];
		

		//delete one row
		mysqli_query($connection, "DELETE FROM sessions ORDER BY id_sessions ASC LIMIT 1");

		//register session
		$today = date("F j, Y, g:i a"); 
		$sqlSessionDate = "INSERT INTO Sessions(date_session) VALUES('".$today."')";
		mysqli_query($connection, $sqlSessionDate);

		header('Location:admin.php');

	}else{


		header('Location:login-back-office.php');

		$_SESSION['var'] = " Incorret user/password ";

	}

?>