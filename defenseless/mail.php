<?php
$contest=mysqli_connect("localhost","root","");
mysqli_select_db($contest,"testapp");
$email=$_REQUEST["email"];
$qry=mysqli_query($contest,"SELECT * from users where email='$email'");
$row=mysqli_fetch_array($qry);

					require 'PHPMailerAutoload.php';

					$mail = new PHPMailer();

								              $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp1.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = true;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587; 
    $mail->Mailer = "smtp";

								//$mail->SMTPDebug = 3;        

								                       // Enable verbose debug output

								//$mail->isSMTP(); 
								//$mail->SMTPKeepAlive = true;   
								//$mail->Mailer = "smtp"; // don't change the quotes!                                     // Set mailer to use SMTP
								//$mail->Host = 'smtp1.gmail.com';  // Specify main and backup SMTP servers
								//$mail->SMTPAuth = true;                               // Enable SMTP authentication
								//$mail->Username = '';                 // SMTP username
								//$mail->Password = '';                           // SMTP password
								//$mail->SMTPSecure = "true";                            // Enable TLS encryption, `ssl` also accepted
								//$mail->Port = 587; 
								                                    // TCP port to connect to

								$mail->setFrom('defenseless.vulnweb@gmail.com', 'Defenseless Support', 0);
								$mail->addAddress($row["email"]);     // Add a recipient
								
								$mail->isHTML(true);                                  // Set email format to HTML
								$mail->Sendmail = '/usr/sbin/sendmail';
								$mail->Subject = 'text';
								$mail->Body    = 'This is your password:<i>'.$row["password"];
								$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


								if(!$mail->send()) {
								    echo '<font color=deepskyblue size=18pt>User does not Exist.';

								    echo '<img src="img/usernot.png" height=500 weight=500 />';
								
								} else {
									 echo ' <font color=deepskyblue size=18pt>Please Check Your Mail.';
								    echo '<img src="img/successmail.png" height=500 weight=500 />';
								    

								}


