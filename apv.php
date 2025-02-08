<!DOCTYPE html>
<html>
<body>
<?php
if(!empty($_POST['id'])){
  $identity=$_POST['id'];
} 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userregistration";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM usertable";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
if($row["ID"]==$identity)
{	$em=$row["Email"];$u=$row["Candidate"];$p=$row["password"];
}
}}

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
$mail = new PHPMailer\PHPMailer\PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "bhumikhokhani@gmail.com";                 
$mail->Password = "";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = "bhummikhokhani@gmail.com";
$mail->FromName = "Bhumi Khokhani";

$mail->addAddress("$em", "RecepientName");

$mail->isHTML(true);
$file_to_attach = 'index.html';
$mail->AddAttachment( $file_to_attach , 'index.html' );
$file_to_attach = 'change_pass.php';
$mail->AddAttachment( $file_to_attach , 'change_pass.php' );
$mail->Subject="Confirmation Mail";
$mail->Body="Please enter your registered name in the username field <br> Also, your generated password is ".$p." <br> To change your password";
$mail->AltBody = "";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}?>
</body>
</html>
