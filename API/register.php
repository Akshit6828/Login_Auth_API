<?php
//We are calling here db_connect.php file as it will tell us that DB is connected or not.
require_once "db_connect.php";

/*POST and GET are two methods to send and respond request to the server.
But we prefer POST over GET due to following reasons:
 1. More Secure(Donot show data in Url when we request/respond in JSON format)
 2. It can show large amount of data as compared to GET.
 3. It Shows Audio/Video/Jpg/Png/Pdf and etc formats while the GET only shows textual Information.
 $_POST['name']: used below with variables like address,email,gender,age,phone,password
 all will be sent togeather only as in single condition and for this reason only we have used '&&' Operator.
 
 'isset()' is a function which checks that whether a request of variable inside
 POST['variable_name']is Coming or Not through POST function
Checking request of variables.
 NOTE: We Wont Check ID as it is AUTO INCREMENTABLE.EVEN WHILE INPUTTING THE DATA WE DONT ASK USER ABOUT THE ID*/
 
 
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['phone']) 
	&& isset($_POST['age']) && isset($_POST['address']) && isset($_POST['password']))
{
// So here we will get the values of variables inputted in simple variable names.
$NAME= $_POST["name"];
$ADDRESS= $_POST["address"];
$EMAIL= $_POST["email"];
$GENDER= $_POST["gender"];
$AGE= $_POST["age"];
$PHONE= $_POST["phone"];
$PASSWORD= $_POST["password"];

//'userstable' is table and we are executing select query on basis of email and phone.
$query="SELECT email FROM userstable WHERE email='$EMAIL' and phone='$PHONE'" ;

/*Executing Query with 1st paramenter of Connection which we have got(in db_connect.php) and second of query type
and storing result in res variable.*/

$res= mysqli_query($conn,$query);

// res>0 signifies that value is already there in table and we have written duplicate values of Phone and Email.
			if(mysqli_num_rows($res)>0)
			{
//'echo json_decode()' will give the print in JSON Encoding which we can use in Our Api as it will be in JSON Format Only.
				echo json_encode("Username already in use");
			}	
			else          // No duplicate values so we will insert the values.
				 {
					 //Insert query lga de...Sequence ek bar same dekhlena...Values and insert ka
					 $query2= "INSERT INTO userstable(name,address,email,gender,age,phone,password) 
					               VALUES ('$NAME','$ADDRESS','$EMAIL','$GENDER','$AGE','$PHONE','$PASSWORD')";        
	/*Response 2 ya connction2*/ $con2= mysqli_query($conn,$query2);  //Execute query2 and data server pr padd jyega...
								if($con2)
									{
									  echo json_encode("Registration Successful");
									}
									 else
										{
											 echo json_encode("Registration Failed")  ;    
										}
								   
				}
			}
			else{
					echo json_encode("Fields can't be empty")  ;    
				}
?>