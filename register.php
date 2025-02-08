<?php

session_start();

$con = mysqli_connect('localhost','root','','userregistration');

mysqli_select_db($con,'userregistration');

$Candidate = $_POST['Candidate'];
$gender = $_POST['gender'];
$age=$_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$applied=$_POST['applied'];
$college=$_POST['college'];
$address=$_POST['address'];
$n=6;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$r = ''; 

  for ($i = 0; $i < $n; $i++) { 
      $index = rand(0, strlen($characters) - 1); 
      $r .= $characters[$index]; 
  } 
//db connection
$conn=new mysqli("localhost","root","","userregistration");
if($conn->connect_error){ echo "Connection ERror";
  die('Connection failed:'.$conn->connect_error);	
}else{
  
  $reg = " insert into usertable(Candidate,Gender,Age,Email,Phone,Applied,College,Address,password) values ('$Candidate','$gender','$age','$email','$phone','$applied','$college','$address','$r')";
   mysqli_query($con,$reg);
  echo "<p><font color=green size='6pt'><br><b>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
Registration Successful</b></font></p>";
}
 ?>

<!-- <html>
 <head>
   <title>Registered users page</title>
   <link rel="stylesheet" type="text/css" href="stylephp.css">
   <style>
   table{
     margin-top:80px;
     margin-left:0px;
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
   </style>
 </head>
 <body>
   <br>
   <a href="task7login.html">LOGIN</a>
   <table>
   <tr>

<th>NAME</th>
<th>EMAIL</th>
<th>PASSWORD</th>
<th>PHONE NUMBER</th>
<th>GENDER</th>
<th>LANGUAGE</th>
<th>FILE</th>
</tr>
//<?php

/*$conn = mysqli_connect('localhost','root','','userregistration');
if($conn-> connect_error)
{
  die("Connection failed:".$conn->connect_error);
}

$sqll="SELECT  Name,Email,Password,Phonenumber,Gender,Language,File from usertable";
$resultt=$conn->query($sqll);

if($resultt-> num_rows >0)
{
  while($row = $resultt->fetch_assoc())
  {
    echo "<tr><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Password"]."</td><td>".$row["Phonenumber"]."</td><td>".$row["Gender"]."</td><td>".$row["Language"]."</td><td>".$row["File"]."</td></tr>";

  }
  echo "</table>";
}
else{
  echo "Table is Empty";
}
$conn->close();*/
 //?>*/
 </table>
 </body>
 </html>-->
