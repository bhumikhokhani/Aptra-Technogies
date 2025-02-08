<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
</style>
<?php
if(isset($_POST['username']) && isset($_POST['pass'])){
$a=$_POST['username'];
$b=$_POST['pass'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userregistration";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$f=0;
$sql = "SELECT * FROM usertable";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
if($row["Candidate"]==$a && $row["password"]==$b)
{	$f=1;
echo "<h2 >Login Successful!!</h2>";break;
}

}}
if($f==0)
{echo 'INVALID USERNAME/PASSWORD!!';
}}
?>
</head>
<body style="background-color:darkgrey;">
<center><h3 style=""><b style="color=darkblack"> <u>Change Password</u></b></h3></center><br>
<div class="container">
<div class="row">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
 	<div class="col-sm-4" style="text-align:center;">
     <label>Enter User-Name</label><br><br>
	<label>Enter New Password</label><br><br>
	<label>Re-enter New Password</label><br><br>
    </div>
	<div class="col-sm-5">
			<input type="text" name="name" style="width:100%;font-color:black;" placeholder=""required><br><br>
			<input type="password" name="rpass" style="width:100%;font-color:black;" required><br><br>
			<input type="password" name="npass" style="width:100%;font-color:black;" required><br><br>			
		    <button type="submit" class="btn btn-warning"  style="border:5px solid white;border-radius:8px;width:100%;color:black;background:lightgrey">
            <b style="font-size:15px">APPLY CHANGES<b/></button>&nbsp;&nbsp;&nbsp;
   	 </div>
    	</div> </div>
</div></form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userregistration";
if(isset($_POST['name']) && isset($_POST['rpass'])){
  $Candidate= $_POST["name"];
  $password = $_POST["rpass"];
	$npass = $_POST["npass"];

 $mysqli = new mysqli("localhost", "root", "", "userregistration"); 
  
if($mysqli === false){ 
    die("ERROR: Could not connect". $mysqli->connect_error); 
} 
  
$sql = "UPDATE usertable SET password='$npass' WHERE Candidate='$Candidate'"; 
if($mysqli->query($sql) === true){ 
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>Records updated Successfully!!</i>"; 
} else{ 
    echo "ERROR: Could not able to execute $sql". $mysqli->error; 
} 
$mysqli->close();
 }}
?>

</body></html>
