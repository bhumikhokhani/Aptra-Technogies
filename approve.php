<!DOCTYPE html>
<html lang="en"><head>
 <title>Candidate Approve</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body >
<style>
table{
     margin-top:80px;
     
     padding:15px;
     border-collapse: collapse;
     border:1px solid lightgrey;
   }
   tr,td,th{
     border:1px solid lightgrey;
     padding:15px;
     width:200px;
     text-align:center;
     color:black;
   }
   th{
     color:white;
     background-color:rgb(14,77,146);
   }
   tr:nth-child(even){
     background-color:#f2f2f2;
   }
   .a1{
     padding:10px;
     border-radius: 10px;
     color:white;
     background-color: green;
   }
   .a2{
     padding:11px;
     color:white;
     border-radius: 10px;
     background-color: red;
   }
   a:visited{
     text-decoration: none;
   }
   a:active{
     text-decoration: none;
   }
   a:link{
     text-decoration: none;
   }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userregistration";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM usertable";
$result = $conn->query($sql);
echo'
<div class="table">
<table class="table">
<tr><thead><th>SL.NO.</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>STATUS</th>';
$id=0;$t=1;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id+=1;
 
echo'
<tr><td>'.$id.'</td><td>'.$row["Candidate"].'</td><td>'.$row["Email"].'</td><td>'.$row["Phone"].'</td>
<td><a href="#" style="color:black;text-decoration:none;" >
<form action="apv.php" method="POST"><button name="id" class="a1" value='.$t.'  >&nbspApprove &nbsp</button></form></a><br>
<button class="a2"  >&nbsp&nbsp Reject &nbsp&nbsp</button></td>
</tr>';
$t+=1;
//
}}//whileif
 echo'</table><a href="register.html">
</div>';
$conn->close();
?>
<script> 
var buttons=document.getElementByTagName("button");
var c=buttons.length;
function fun(e){alert(this.id);};
</script>
</body>
</html>
