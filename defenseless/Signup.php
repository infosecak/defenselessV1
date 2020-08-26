<?php
require_once 'inc/config.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title> d3f3ns3l3ss Sign up!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:black;">
	<IMG SRC="img/logo1.png" style="display:block; margin-left: auto; margin-right: auto;>

	<div class="modal-dialog text-center">
		<div class="col-sm-9 main-section">
			<div class="modal-content">

				<div class="col-12 user-img">
					<center><img src="img/signup1.png" height="100" width="200"></center><br>
				</div>
				<br>
				<div class="col-12 form-input">
					<?php
                    if (isset($_POST['submit'])) {
                        try {
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $name = $_POST['name'];
                            $mobile = $_POST['mobile'];

                            $validate = $conn->query("SELECT COUNT(*) FROM users WHERE email='{$email}' LIMIT 1");
                            if ($validate->fetchColumn() > 0) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Email already used!!
                                </div>
                                <?php
                            } else {
                                $result = $conn->exec("INSERT INTO users(email, password, name, mobile) VALUES('{$email}', '{$password}', '{$name}', '{$mobile}')");
                                if ($result == 1) {
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                        You have signed up successfully.
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        Something went wrong, please try again later.
                                    </div>
                                    <?php
                                }

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
					<form method="post" action="signup.php">
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
						</div>
						<div class="form-group">
							<input type="password" minlength="5" maxlength="50" name="password" class="form-control" placeholder="Enter Password" required>
						</div>
						<div class="form-group">
							<input type="Full Name"  name=
							"name" class="form-control" placeholder="Enter Full Name" required>
						</div>
						<div class="form-group">
							<input type="Mobile" minlength="10" maxlength="10" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
						</div>
						<button type="submit" name="submit" class="btn btn-success">Sign Up Now</button>
						<a href='login.php' class="btn btn-success" style="margin-left: 875px;">Login Now</a>
					</form>
				</div>

			</div>
		</div>
	</IMG>
</body>
</html>
