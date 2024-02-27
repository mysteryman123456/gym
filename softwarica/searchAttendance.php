<?php
include 'dbconnection.php';
try{
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$marked_date = $_POST['marked_date'];
$date = new DateTime($marked_date);
$newdate = $date->format('d/m/Y');

$sql = "SELECT * FROM attendance WHERE marked_date = ?";
$runsql = $connection->prepare($sql);
$runsql -> bind_param("s",$newdate);
$runsql->execute();
$result = $runsql -> get_result();
if($result->num_rows > 0){
	echo'<table>
	<tr>
	<th>S.no</th>
	<th>Name</th>
	<th>Phonenumber</th>
	<th>Date</th>
	<th>Status</th>
	</tr>
	';
	$count = 1;
while($row = $result->fetch_assoc()){
$name = $row['name'];
$phonenumber = $row['phonenumber'];
$marked_date = $row['marked_date'];
$status = $row['status'];
echo'<tr>';
echo'<td>'.$count.'</td>';
echo'<td>'.$name.'</td>';
echo'<td>'.$phonenumber.'</td>';
echo'<td>'.$marked_date.'</td>';
echo'<td>'.$status.'</td>';
echo'</tr>';
$count = $count + 1;
}
echo'</table>';
echo'
        <div class="dateAttendance">
        <form onsubmit="searchAttendanceForm(event)" id="searchAttendance" action="" method="POST">
            <input type="date" name="marked_date" selected>
            <div>
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="17" height="17" fill="rgba(255,255,255,1)"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path></svg></button>
            </div>
        </form>
        </div>
';
}
else{
	echo '<p style="color:black;font-size:25px; position:relative;transform:translate(-50% , -50%);top:45%;left:50%;"><img src="17.svg"><br>
		No record\'s <span style="color:red;position:relative;top:0px;">found</span> in the selected date !</p>

	<div class="dateAttendance">
        <form onsubmit="searchAttendanceForm(event)" id="searchAttendance" action="" method="POST">
            <input type="date" name="marked_date" selected>
            <div>
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="17" height="17" fill="rgba(255,255,255,1)"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path></svg></button>
            </div>
        </form>
        </div>
	';
}
}
}
catch (Exception $e){
	die("Server issues !");
}
?>