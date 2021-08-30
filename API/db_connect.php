<?php
//All variables in PHP are prefixed with '$' sign. So these all are below variables for our database.
$db_name="id14933784_mimitdb";
$db_host="localhost";
$db_user="id14933784_mimit";
$db_pass="Qwertymimit@2093";

//echo"hello"; is print statement which is only printable in PHP and not in JSON format.
//inbuilt function of SQL which determines which DB to Connect.
$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if($conn)// if value of variable res is not null that if gets executed and we get print message.
{
	//echo"connection sucessfull";
	
}

?>