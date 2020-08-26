<?php
require_once 'inc/config.php';
error_reporting(0);
if (isset($_POST['submit']) ) {
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;

	try{
		while (($csvdata = fgetcsv($handle,1000,",")) !== false) {

			$name = $csvdata[0];
			$person = $csvdata[1];
			$mobile = $csvdata[2];
			$address = $csvdata[3];

			if ($name && $person && $mobile && $address) {
				$q = $conn->query("INSERT INTO clients1(name, person, mobile, address) VALUES('$name', '$person', '$mobile', '$address')");

				$c = $c+1;
			}

		
			
			header('Location: csv.php?response=true');
			exit;

		}

	} catch(Exception $e) {
			echo "fail";
	}
	header('Location: csv.php?response=false');
	exit;
	
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>d3f3ns3l3ss VulnWeb!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body style="background-color:black;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"><img src="img/logo1.png" height="60" width="280" style="margin-top: 0px;">
    </div>
    <ul class="nav navbar-nav" style="margin-left: 650px;">
      <li class="active"><a href="index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="profile-edit.php">Edit Profile</a></li>
          <li><a href="#">Change Password</a></li>
          <li><a href="out.php">Logout</a></li>
        </ul>
      </li>
      <li><a href="clients.php">Clients</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

<div class="col-12 user-img">

          <center><img src="img/upload.png" height="200" width="300"></center><br>
        </div>

        <form method="post" enctype="multipart/form-data">
        	<div class="form-group">
        		<input type="file" name="file" id="file" style="color:deepskyblue; margin-left: 590px; margin-right: auto; font-size: 20px;"><br />
        		<center><button type="submit" class="btn btn-success" name="submit" style="background-color:deepskyblue;"  value="submit">Upload</button></center>
        	</div>
        </form>
        <br />
        <?php
        if (isset($_GET['response'])) {

        	if ($_GET['response'] == true) {
        		
        	} else if ($_GET['response'] == false) {
      
        	}
        	
        }
?>
    </body>
    </html>