<?php
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$phonenumber = $_POST['phonenumber'];
$gymsql = "DELETE FROM gym_user WHERE phonenumber = ?";

$runsql = $connection -> prepare($gymsql);
$runsql -> bind_param("s",$phonenumber);
$runsql -> execute();

if($runsql == true){
	echo "success";
}
else{
	echo"failure";
}
}
else{
	echo"failure";
}
$connection -> close();
?>
