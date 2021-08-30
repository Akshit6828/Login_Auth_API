<?php

require_once "db_connect.php";
if(isset($_POST['email']) && isset($_POST['password']))
{
$name= $_POST["email"];
$pass= $_POST["password"];
//$query= "INSERT INTO user_data VALUES('$name','$pass')";

$query="SELECT email,pass FROM userstable WHERE email='$email' AND password='$password'";
$res= mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0)
{
	//$response[$result]=array();
	//$row=$con->fetch_assoc();
//	$pro=array();
		//$response["pro"]=array();
		
	//$pro["NAME"]=$row["name"];
	//$pro["CONTACT"]=$row["contact"];
	//$pro["ADDRESS"]=$row["address"];
	
	echo "true";
	//echo $pro ["NAME"];

	}
	else
	{
	    echo "Username or password is not correct";
	}
}
else
{
    echo "Invalid Request";
}
?>