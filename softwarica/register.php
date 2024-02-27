<?php
include 'dbconnection.php';

$create_table = "CREATE TABLE IF NOT EXISTS gym_user(
id INT(20) AUTO_INCREMENT PRIMARY KEY,
name Varchar(255) null,
phonenumber Varchar(255) null,
gender Varchar(255) null,
joined_date Varchar(255) null,
duration Varchar(255) null
)";
$connection -> query($create_table);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $joined_date = $_POST['joined_date'];
    $duration = $_POST['duration'];
    $goal = $_POST['goal'];
    $newphonenumber = strval($phonenumber);

    $checkquery = "SELECT * from gym_user where phonenumber = ?";
    $stmtCheck = $connection->prepare($checkquery);
    $stmtCheck->bind_param("s", $phonenumber);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
            echo 'phoneExist';
    }
    else {
            if ($age < 100) {
                if (strlen($newphonenumber) == 10 && is_numeric($phonenumber)) {

                    $sql = "INSERT INTO gym_user (name, phonenumber, age, gender, joined_date, duration, goal) VALUES(?,?,?,?,?,?,?)";
                    $stmt = $connection->prepare($sql);
                    $stmt->bind_param("ssissss", $name, $phonenumber, $age, $gender, $joined_date, $duration, $goal);

                    $goal_sql = "INSERT INTO customer_goal (name,phonenumber,goal) VALUES (?,?,?)";
                    $goal_stmt = $connection->prepare($goal_sql);
                    $goal_stmt->bind_param("sss", $name, $phonenumber, $goal);

                    if ($stmt->execute() && $goal_stmt->execute()) {
                                echo 'success';
                    } else {
                                echo 'error';
                    }
                } else {
                                echo 'invalidPhonenumber';
                }
            } else {
                                echo 'invalidAge';
            }
        }
    }
?>