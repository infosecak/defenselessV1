<?php
require_once 'inc/config.php';
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
          <center><img src="img/clients.png" height="200" width="300"></center><br>
        </div>

        <div class="container ">
    <a href="<?=(isset($_GET['back_url'])?urldecode($_GET['back_url']):'#')?>" class="btn btn-primary btn-sm mt-5 mb-3">Go Back</a>
    <div class="card ">
        <div class="card-body">
            <?php
                if (isset($_POST['submit'])) {
                    try {
                        $q = $conn->query("INSERT INTO clients1 VALUES(NULL, '{$_POST['name']}', '{$_POST['person']}', '{$_POST['mobile']}', '{$_POST['address']}')");
                    } catch(Exception $e) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Something went wrong, please try again later.
                        </div>
                        <?php
                    }
                }
            ?>
<br/>
            <form method="post">
            <div class="form-group">
              <input type="name"  name=
              "name" class="form-control"  placeholder="Enter Client Name" required>
            </div>
            <div class="form-group">
              <input type="person"  name="person" class="form-control"  placeholder="Enter Name of Point of Contact" required>
            </div>
            <div class="form-group">
              <input type="mobile" name="mobile" minlength="10" maxlength="10" class="form-control"  placeholder="Enter Phone Number" required>
            </div>
            <div class="form-group">
              <input type="address" name="address" class="form-control"  placeholder="Enter City" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success" style="background-color:deepskyblue;">Add Client</button>
            <br/>
            <br/>

            </form>

            <form method="post" enctype="multipart/form-data" action="csv.php">
            <button type="submit" name="submit" class="btn btn-success" style="background-color:deepskyblue;">Import Client List</button>
            </form>


<br/> <br/>
           <div class="card mt-4">
        <div class="card-body">
            <table class="table" style="color:deepskyblue;">
                <tr>
                    <th>CLIENT'S NAME</th>
                    <th>CLIENT'S PoC</th>
                    <th>CLIENT'S NUMBER</th>
                    <th>CLIENT'S ADDRESS</th>
                </tr>
               <?php
                $data = $conn->query('SELECT * FROM clients1')->fetchAll();
                foreach($data as $item) {
                    ?>
                     <tr>
                        <td><?=$item['name']?></td>
                        <td><?=$item['person']?></td>
                        <td><?=$item['mobile']?></td>
                        <td><?=$item['address']?></td>
                    </tr>

                    

      

                     

                    <?php
                }
                
               ?>
            </table>
        </div>
    </div>
</div>
            