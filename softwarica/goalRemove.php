<?php
include 'dbconnection.php';
$phonenumber = $_POST['phonenumber'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$sql = "DELETE from customer_goal WHERE phonenumber = ?";
$runsql = $connection->prepare($sql);
$runsql -> bind_param("s",$phonenumber);
$runsql -> execute();
if($runsql){
    echo "success";
}
else{
    echo"failure";
}
}
?>