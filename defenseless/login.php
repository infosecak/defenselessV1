<?php
require_once 'inc/config.php';
if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    header('Location: index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
	<title> d3f3ns3l3ss Login!</title>
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
					<center><img src="img/signin.png" height="200" width="200"></center><br>
				</div>
				<br>
				<div class="col-12 form-input">

					<?php
                if (isset($_POST['submit'])) {
                    try {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $validate = $conn->query("SELECT id, email, password, name, mobile, address FROM users WHERE email='{$email}' AND password='{$password}'");
                        $user = $validate->fetch(PDO::FETCH_ASSOC);
                        if ($user) {
                            $_SESSION['auth'] = true;
                            $_SESSION['authData'] = $user;
                            redirect('index.php');
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Wrong Email or Password!!
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
						


					<form method="post">
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Enter Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Enter Password">
						</div>
						
						<button type="submit" name="submit" class="btn btn-success">Sign In</button>
						<a href='signup.php' class="btn btn-success" style="margin-left: 450px;">Sign Up</a>
						<a href='passwordforgot.php' class="btn btn-success" style="margin-left: 850px;">Reset Password</a>
					</form>
				</div>
			</div>
		</div>
	</IMG>


	</body>
	</html>
