<?php
include'dbconnection.php';
$phonenumber = $_POST['phonenumber'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $searchsql = "SELECT * from gym_user WHERE phonenumber = ?";
    $result = $connection->prepare($searchsql);
    $result->bind_param('s',$phonenumber);
    $result->execute();
    $x = $result->get_result();

    if($x->num_rows > 0){
        while($row = $x->fetch_assoc()){
            $username = $row['name'];
            $phonenumber = $row['phonenumber'];
            $duration = $row['duration'];
            $age = $row['age'];
            $joined_date = $row['joined_date'];
            $gender = $row['gender'];


echo '<style>
.date{
    text-align:center;
    margin-top:20px;
    width:150px;
    padding:10px;
    border-radius:5px;
    color:black;
    background-color:rgb(232,232,232,1);
}
.attendance_button{
    width:150px;
    font-size:15px;
    color:white;
    background: linear-gradient(to top, #0ba360 0%, #3cba92 100%);
    border-radius:5px;
    padding:10px 30px;
    border:none;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.profile-title {
    text-align: center;
    margin-top: 20px;
}

.card {
    background-color: #fff;
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.user-photo svg {
    display: block;
    margin: 0 auto 20px auto;
}

.username {
    text-align: center;
    margin-bottom: 10px;
}

.user-details {
    margin-bottom: 8px;
    text-align: center;
    color: #666;
}

</style>
';

echo '<div class="card">
<form action="" id="markAttendance" onsubmit="markAttendance(event)" method="POST">';
echo '  <div class="user-photo">';
echo '    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="80" height="80"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z" fill="dimgray"></path></svg>';
echo '  </div>';
echo '  <h1 class="username">' . $username . '</h1><br>';
echo '  <p class="user-details">' . $age . ' yrs, ' . $gender . '</p><br>';
echo '  <p class="user-details">Joined on ' .$joined_date. '&nbsp;,&nbsp;&nbsp;Duration '. $duration .'</p>';

echo "<center><input class='date' value='".date('d/m/Y')."' name='marked_date' type='text' readonly></center>";
echo'<input type="hidden" name="name" value="'.$username.'">';
echo'<input type="hidden" name="phonenumber" value="'.$phonenumber.'">';
echo'<input type="hidden" name="duration" value="'.$duration.'">';
echo'<input type="hidden" name="status" value="Present">';


echo '<br><center><input type="submit" class="attendance_button" value="Mark present"></center>';
echo '</form></div>';


                                    
                                    

                                }
                            }
                            
                            else{
                                 echo "<div><center><img src='17.svg' height='500' width='800'></center>
                                 <p style='font-size:25px;'>Umm, probably the user is not <span style='color:red;position:relative;top:0;'>registered !</span></p></div>";
                            }


                        }
                        ?>

                        </body>
</html>