<?php
require_once 'header.php';
function getToken($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 

    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 

    return $randomString; 
} 
?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<link rel="stylesheet" type="text/css" href="sstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	
	<div class="modal-dialog text-center">
		<div class="col-sm-9 main-section">
			<div class="modal-content">

				<div class="col-12 user-img">
					<center><img src="img/profiledit.png" style="margin-left: auto; margin-right: auto;" height="200" width="300"></center><br>
				</div>
				<br>
				<div class="col-12 form-input">
					<?php
                    if (isset($_POST['submit'])) {
                        try {
                            if (isset($_POST['token']) && strlen($_POST['token'])===15) {
                                $q = $conn->query("UPDATE users SET email='{$_POST['email']}', name='{$_POST['name']}', mobile='{$_POST['mobile']}', address='{$_POST['address']}' WHERE id=".$_SESSION['authData']['id']);
                                $_SESSION['authData']['name'] = $_POST['name'];
                                $_SESSION['authData']['email'] = $_POST['email'];
                                $_SESSION['authData']['mobile'] = $_POST['mobile'];
                                $_SESSION['authData']['address'] = $_POST['address'];
                                ?>
                                <div class="alert alert-success" role="alert">
                                    Profile Updated!!
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Error: Something went wrong, please try again later !!
                                </div>
                                <?php
                            }
                            } catch(Exception $e) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                
                                Error: <?=($e->getCode()=='23000'?'Email already used':'Something went wrong, please try again later');?> !!
                            </div>
                            <?php
                        }
                    }
                ?>
          
                

						<form method="POST">
						<input type="hidden" name="token" value="<?=getToken(15);?>"/>
						<h4 style="color:deepskyblue">Email:</h4><div class="form-group">
							<input type="email" name="email" class="form-control" value="<?=$_SESSION['authData']['email'];?>" placeholder="Enter Email" required>
						</div>
						<h4 style="color:deepskyblue">Full Name:</h4><div class="form-group">
							<input type="Full Name"  name=
							"name" class="form-control" value="<?=$_SESSION['authData']['name'];?>" placeholder="Enter Full Name" required>
						</div>
						<h4 style="color:deepskyblue">Mobile Number:</h4><div class="form-group">
							<input type="Mobile" minlength="10" maxlength="10" name="mobile" class="form-control" value="<?=$_SESSION['authData']['mobile'];?>" placeholder="Enter Mobile Number" required>
						</div>
						<h4 style="color:deepskyblue">Address:</h4><div class="form-group">
							<input type="address" name="address" class="form-control" value="<?=$_SESSION['authData']['address'];?>" placeholder="Enter Address" required>
						</div>
						<button type="submit" name="submit" class="btn btn-success" value="Change Profile" style="margin-left: -50px;">Edit Profile</button>
						
					</form>
				</div>

			</div>
		</div>
</div></head></html>
