<?php
include 'dbconnection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$username = $_POST['username'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phonenumber = $_POST['phonenumber'];
$goal = $_POST['goal'];


$sql = "UPDATE gym_user SET name=?,phonenumber=?,age=?,gender=?,goal=? WHERE phonenumber = ?";
$csql = "UPDATE customer_goal SET name=?,phonenumber=?,goal=? WHERE phonenumber=?";

$checksql = $connection->prepare($sql);
$checkcsql = $connection->prepare($csql);

$checksql -> bind_param("ssssss",$username,$phonenumber,$age,$gender,$goal,$phonenumber);
$checkcsql -> bind_param("ssss",$username,$phonenumber,$goal,$phonenumber);

$checksql -> execute();
$checkcsql -> execute();
if($checksql && $checkcsql){
echo "success";
}
else{
	echo"failure";
}
}
?>