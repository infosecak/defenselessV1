<?php
require_once 'inc/config.php';
if (!(isset($_SESSION['auth']) && $_SESSION['auth'])) {
    header('Location: login.php');
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
      <?php
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; 
                    
            ?>
      <li><a href="clients.php?back_url=<?=urlencode($link);?>">Clients</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>