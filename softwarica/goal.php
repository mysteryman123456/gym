<?php
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phonenumber = $_POST['phonenumber'];

    $sql = "UPDATE customer_goal SET Achievement = 'Achieved' WHERE phonenumber = ?";
    $checksql = $connection->prepare($sql);
    $checksql -> bind_param("s",$phonenumber);
    $checksql -> execute();
        
        if ($checksql == True) {
            echo "success";
        }
        else {
            echo "failed";
        }
    }
    
    $connection -> close();
?>
