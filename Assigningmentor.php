<!doctype html>
<html>
<head>
    <title>Mentor Assignment</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link href='https://fonts.googleapis.com/css?family=KronaOne' rel='stylesheet'>
        <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
         <link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet' >
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('keydown', '.username', function() {

                var id = this.id;
                var splitid = id.split('_');
                var index = splitid[1];

                $( '#'+id ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "getDetails.php",
                            type: 'post',
                            dataType: "json",
                            data: {
                                search: request.term,request:1
                            },
                            success: function( data ) {
                                response( data );
                            }
                        });
                    },
                    select: function (event, ui) {
                        $(this).val(ui.item.label); // display the selected text
                        var userid = ui.item.value; // selected id to input

                        // AJAX
                        $.ajax({
                            url: 'getDetails.php',
                            type: 'post',
                            data: {userid:userid,request:2},
                            dataType: 'json',
                            success:function(response){

                                var len = response.length;

                                if(len > 0){
                                    var id = response[0]['id'];
                                    //var name = response[0]['name'];
                                    var email = response[0]['email'];
                                    //var age = response[0]['age'];
                                    var phone = response[0]['phone'];

                                  //  document.getElementById('name_'+index).value = name;
                                  //  document.getElementById('age_'+index).value = age;
                                    document.getElementById('email_'+index).value = email;
                                    document.getElementById('phone_'+index).value = phone;

                                }

                            }
                        });

                        return false;
                    }
                });
            });

            // Add more
            $('#Addmore').click(function(){

                // Get last id
                var lastname_id = $('.tr_input input[type=text]:nth-child(1)').last().attr('id');
                var split_id = lastname_id.split('_');

                // New index
                var index = Number(split_id[1]) + 1;

                // Create row with input elements
                
                var html = "<tr class='tr_input' style='height:50px;'><td><input type='text' class='username' id='username_"+index+"' placeholder='Enter username'></td><td><input type='text' class='email' id='email_"+index+"' ></td><td><input type='text' class='phone' id='phone_"+index+"' ></td></tr>";


                // Append data
                $('tbody').append(html);

            });
        });

    </script>
	<style>
	@media screen and (max-width: 600px) {
			  .column {
				width: 100%;
				display: block;
				margin-bottom: 20px;
			  }
			}
			body
			{
                background-color:#696969;
				padding: 15px;
                font-size:20px;
			}
	</style>
</head><br><br>
<body >
<h2 style="margin-left:600px;color:black;"><u> <b> MENTOR ASSIGNMENT</b></u></h2><br><br>
    <div class="row">
	<div class="">
	</div>
        <div class="col-sm-5">
		<table border='5px' style='border-collapse: collapse;color:whitesmoke; width:108%'>
            <thead>
			<tr >
				<!--<th>Sl.no</th>-->
				<th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
				 </tr>
				 <tr >
			<?php
                //include "getDetails.php";
				$con2 = mysqli_connect("localhost", "root", "", "userregistration");
				// Check connection
				if ($con2->connect_error) {
				die("Connection failed: " . $con2->connect_error);
                }
				$sql = "SELECT * FROM usertable";
                $result = $con2->query($sql);
                //include "getDetails.php";

				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				echo "<tr style='height:50px;' ><td>" . $row["ID"]. "</td><td>" . $row["Candidate"] . "</td><td>"
				. $row["Email"]. "</td><td>" . $row["Phone"]. "</td>";

                }

				//echo "</table>";
				} else { echo "0 results"; }
				//$conn->close();
			?>

            </tr>
			</thead>
		</table>
		</div>
		<div class="col-sm-7">
        <table border='5px' style='border-collapse: collapse;margin-left:15px;color:whitesmoke;width:100%'>
            <thead>
            <tr >
            <th>Mentor name</th>
                <th>Mentor Email</th>
                <th>Mentor Phone</th>
            </tr>
            </thead>
            <tbody style='color:black;'>
            <tr class='tr_input' style="height:50px;">
                <td><input type='text' class='username' id='username_1' placeholder='Enter username'></td>
               <!-- <td><input type='text' class='name' id='name_1' ></td>
                <td><input type='text' class='age' id='age_1' ></td>-->

                <td><input type='text' class='email' id='email_1' ></td>
                <td><input type='text' class='phone' id='phone_1' ></td>

            </tr>
            </tbody>
        </table>
        <br>
       <center> <input type='button' value='Add more' id='Addmore' style='color:black;'></center>
    </div>
	</div>
</body>
</html>
