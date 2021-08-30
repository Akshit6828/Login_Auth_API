<?php
 require_once "db_connect.php";

     
    $sql = "select * from userstable";

    $res1 = mysqli_query($conn,$sql);
     
    $result = array();//we made an result container and made array for large named as result
     
    while($row = mysqli_fetch_array($res1))//ek ek krke hmne row mai store kr rhe ahi.nd jaise he data khtm 
{
    array_push($result,//result array mai yeh push hora hai..ek ek krke...
    array('id'=>$row[0],//0 1 2 3 4 5 6 sare colums ke index hai//
    'name'=>$row[1],
    'email'=>$row[2],
    'gender'=>$row[3],
	 'phone'=>$row[4],
	  'age'=>$row[5],
	   'address'=>$row[6]// here we dont need password
    ));
    }// json array mai hmne 
    echo json_encode(array("values"=>$result));
     
   // mysqli_close($res);
    ?> 