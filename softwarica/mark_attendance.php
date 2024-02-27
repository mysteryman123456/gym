<?php
include 'dbconnection.php';
try{
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	        $username = $_POST['name'];
            $phonenumber = $_POST['phonenumber'];
            $duration = $_POST['duration'];
            $status = $_POST['status'];
            $marked_date = $_POST['marked_date'];

    $sql = "INSERT into attendance (name,phonenumber,duration,status,marked_date) Values (?,?,?,?,?)";
    $runsql = $connection->prepare($sql);
    $runsql->bind_param("sssss",$username,$phonenumber,$duration,$status,$marked_date);
    $x = $runsql->execute();

    	if($x){
    		echo"Success";
    }
    else{
    	echo"Failure";
    }
}
}
catch(Exception $e){
    die("Server error occured !");
}
?>