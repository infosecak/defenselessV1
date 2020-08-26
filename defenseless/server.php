<?php
	$email="";
	$name="";
	$errors=array();

	// connect to the database
	$db = mysqli_connect('localhost','root','','testapp');

	// if the sign up now button is clicked
	if (isset($_POST['submit'])) {
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$name = mysql_real_escape_string($_POST['name']);
		$mobile = mysql_real_escape_string($_POST['mobile']);

		// form validation check
		if (empty($email)){
			array_push($errors, "Email is required.");
		}

		if (empty($password)){
			array_push($errors, "Password is required.");
		}

		if (empty($name)){
			array_push($errors, "Name is required.");
		}

		if (empty($mobile)){
			array_push($errors, "Mobile is required.");
		}

		if (count($errors) == 0) {
			$sql = "INSERT into users (email,password,name,mobile) VALUES ('$email', '$password', '$name', '$mobile')";
			mysqli_query($db, $sql);
		}

	}