<?php
include 'dbconnection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$phonenumber = $_POST['phonenumber'];

$sql = "SELECT * FROM gym_user WHERE phonenumber = ?";
$checksql = $connection->prepare($sql);
$checksql -> bind_param("s",$phonenumber);
$checksql->execute();
$result = $checksql->get_result();

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){
	$username = $row['name'];
	$phonenumber = $row['phonenumber'];
	$age = $row['age'];
	$gender = $row['gender'];
	$goal = $row['goal'];
	$id = $row['id'];
echo"
<style>
::placeholder {
  color: silver;
}
.container-update{
	display:block;
	padding:20px;
	border-radius:7px;
	z-index:999;
	background-color:rgb(245,245,245,1);
}
.container-update input{
	position:relative;
	width:200px;
	margin:10px;
	padding:10px;
	border-radius:4px;
}
.container-update button{
	cursor:pointer;
	background-color:#0ab6f0;
	width:200px;
	margin:10px;
	padding:10px;
	font-size:15px;
	border:none;
	border-radius:4px;
	color:white;
	font-weight:800;
	margin-top:20px;

}
.close{
	cursor:pointer;
	color:black;
	position:absolute;
	top:25px;
	font-size:25px;
	right:35px;
	color:dimgrey;
}
</style>

<div id='containerUpdate' class='container-update'>
<span onclick='closeUpdatePage()' class='close'>&times</span>
<form onsubmit ='updateDetails(event)' id='updateDetails$phonenumber' action='' method='POST'>
<br>
<input name='username' placeholder='Enter fullname' type='text' value='$username'>
<input readonly style='cursor:not-allowed;' name='phonenumber' placeholder='Enter phonenumber' type='number
' value='$phonenumber'>
<input name='age' placeholder='Enter age' type='number' value='$age'>
<input name='gender' placeholder='Enter gender' type='text' value='$gender'>
<input name='goal' placeholder='Enter goal' type='text' value='$goal'>
<input name='id' placeholder='goal' type='hidden' value='$id'>
<button>Update Info</button>
<br><br>
</form>
</div>

";

}
}
else{
	echo"No record found";
}
}
?>