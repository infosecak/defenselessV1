<?php
require_once 'header.php';
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
					<center><img src="img/passwdchnge.png" style="margin-left: auto; margin-right: auto;" height="200" width="300"></center><br>
				</div>
				<br>
				<div class="col-12 form-input">
                <?php
                    if (isset($_POST['submit'])) {
                        try {
                            $new_password = $_POST['new_password'];
                            $c_new_password = $_POST['c_new_password'];
                            if ($new_password == $c_new_password) {
                                $q = $conn->query("UPDATE users SET password='{$new_password}'");
                                ?>
                                <div class="alert alert-success" role="alert">
                                    Password changed successfully.
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    New password didn't match.
                                </div>
                                <?php
                            }
                        } catch(Exception $e) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Something went wrong, please try again later.
                            </div>
                            <?php
                        }
                    }
                ?>

                <form method="POST">
                	<h4 style="color:deepskyblue">Current Password:</h4><div class="form-group">
                	<input type="password" name="current_password" class="form-control" placeholder="Enter Current Password" required>
                	</div>
                	<h4 style="color:deepskyblue">New Password:</h4><div class="form-group">
							<input type="password"  name=
							"new_password" class="form-control" placeholder="Enter New Password" required>
						</div>
					<h4 style="color:deepskyblue">Confirm Password:</h4><div class="form-group">
							<input type="password"  name=
							"c_new_password" class="form-control" placeholder="Confirm Password" required>
							</div>
						<button type="submit" name="submit" class="btn btn-success" value="Change Password" style="margin-left: -50px;">Change Now</button>

						</form>
				</div>

			</div>
		</div>
</div></head></html>