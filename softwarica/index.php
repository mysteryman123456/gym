<?php
session_start();
if(isset($_SESSION['admin']) == true){
true;
}
else{
    header('location:adminlogin.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<style type="text/css">
    * {
    -webkit-tap-highlight-color: transparent;

    }
    .settings input::placeholder{
        color:darkgrey;
    }
    .center-message{
        position:relative;
        transform:translate(-50% , -50%);
        top:50%;
        font-size:25px;
        left:50%;
    }
    table {
        position: relative;
        width:calc(100% - 0px);
        border-collapse:collapse;
        font-size: 15px; 
        overflow: hidden;    
    }

    th, td ,tr{
    position: relative;
    padding:20px;
    text-align:center;
    }

    th {
    background-color:rgb(0, 152, 131, 1.0); 
    font-weight: bold; 
    color:white;   
    }
    tr{
        border:none;
        border-bottom:1px solid lightgrey;;
    }
    ::-webkit-scrollbar{
        height:0;
        width:0;
    }
    *{
        font-family:sans-serif;
        margin:0;
        padding:0;
    }
    .wrap{
        display:flex;
        flex-direction:row;
    }
    .dashboard-nav{
        z-index:9999999;
        height:100vh;
        overflow:scroll;
        background-color:#303030;
        min-width:320px;
        max-width:320px;
    }
    .element{
        margin-top:20px;
        background-color:#404040;
        cursor:pointer;
        font-family:sans-serif;
        font-size:20px;
        text-align:left;
        font-weight:bold;
        padding:20px;
    }
    .element-top{
        font-weight:bold;
        color:white;
        padding:20px;
        font-size:25px;
    }
    span{
        color:white;
        position: relative;
        bottom:10px;
    }
    .dashboard-content {
    text-align: center;
    width:100%;
    }

    .user,.attendance,.payment,.membership,.goal,.settings,.register,.attendanceRecord{
        color:black;
        height:100vh;
        overflow:scroll;
    }
    .register{
        background-image:url("gym.avif");
        background-size:cover;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .user{
        display:none;
    }
    .payment{
        display:none;
    }
    .attendance{
        display:none;
    }
    .membership{
        display: none;
    }
    .attendanceRecord{
        display:none;
    }
    .search-bar-content{
        padding:20px;
        overflow: hidden;
        width: calc(100% - 320px);
        position:absolute;
        display:flex;
        flex-direction:row;

    }
    .search{
        font-size:16px;
        border-radius:50px;
        border:.1px solid lightgrey;
        margin:0 auto;
        background-color:transparent;
        padding:20px;
        width:900px;
        margin-right:20px;
    }
    .search-submit{
        border-radius:50px;
        font-size:16px;
        font-weight:bold;
        border:none;
        color:white;
        width:300px;
        background-color:black;
        padding:20px;
    }

    .settings{
        background-image:url("settings.jpeg");
        justify-content:center;
        height:100vh;
        background-size:cover;
        align-items:center;
        display:none;
    }

    .goal{
        display:none;
    }

    .inner-setting{
        display:flex;
        flex-direction:row;
    }
    #t0{
        color:cyan;
    }

    h2{
        position: relative;
        top:20px;
        text-align: center;
        color:dimgray;
    }
    h1{
        font-size:32px;
        margin-top:20px;
    }
    .h1-top{
        position: relative;
    }
    .input,.input-button{
        min-width:400px;
        border:1px solid lightgrey;
        outline:none;
        padding:20px;
        border-radius:5px;
        margin-left:10px;
        font-size:20px;
    }
    .input-button{
        cursor:pointer;
        letter-spacing:2px;
        border:none;
        color:white;
        background: radial-gradient(circle at 10% 20%, rgb(221, 49, 49) 0%, rgb(119, 0, 0) 90%);
    }
    .achieve-button{
        padding:10px 20px;
        border-radius:5px;
        border: none;
        color:white;
        background:black;
    }

.customPopup {
    z-index:99;
    width:700px;
    padding:20px;
    color:white;
    top:20px;
    position:absolute;
    font-weight: bold;
    transition:opacity 0.3s;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.customPopup.hidden {
    opacity: 0;
    pointer-events: none;
}
    .close-btn {
    font-size:20px;
    color:white;
    position:absolute;
    top:15px;
    right:20px;
    cursor: pointer;
    }

    body, h1, h2, h3, , ul, li {
    margin: 0;
    padding: 0;
    }

    .btn-wrap{
    display:flex;
    justify-content: flex-start;

    }
    input:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px #fff inset;
        background-color: transparent;
        color: grey;
    }

    * {
        -webkit-tap-highlight-color: transparent;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    h2 {
        color:#505050;
        text-align:left;
        padding: 10px 0;
        margin: 10px 20px;
        font-weight: 1200;
    }

    .container {
        background-color:rgb(0, 0, 0, 0.4);
        border-radius:10px;
        padding:30px;
        width:700px;
        min-width:700px;
        max-width:700px;
    }
    .second-wrapper{
        display:flex;
    }

    .wrapper,
    input {
        background-color: #fff;
        padding: 10px 0;
        border: none;
    }

    input {
        width:100%;
        padding:5px 0px;
        font-weight: 500;
        font-size: 15px;
        outline: 0;
        color:dimgray;
    }
    .x-wrapper{
        width:100%;
    }

    .wrapper {
        margin:10px;
        margin-top:20px;
        padding:10px;
        position: relative;
        border:1px solid rgba(222, 222, 222, 1.0);
        border-radius:5px;
    }
    select{
        appearance: none;
        font-size:15px;
        outline:none;
        width:100%;
        height:100%;
        color:dimgray;
        border:none;
        padding:5px;
        background-color:transparent;
    }

    .button {
        color: #fff;
        border: none;
        border-radius:5px;
        background: radial-gradient(circle at 10% 20%, rgb(221, 49, 49) 0%, rgb(119, 0, 0) 90%);
        padding: 15px 60px;
        font-weight: 800;
        font-size: 18px;
        letter-spacing: 2px;
        margin: 20px 10px;
    }
    .icon{
        position: relative;
        top:2px;
        width:17px;
        height:17px;
    }
    #response{
        position:relative;
        transform: translate(-50% , -50%);
        top:50%;
        left:50%;
    }
    .remove-user{
        border:none;
        border-radius:3px;
        background-color:crimson;
        padding:8px 20px;
        color:white;
        font-weight:800;
        transition:0.2s;
    }

    .remove-user:active{
        transform:scale(0.94);
    }

    .edit-user{
        border:none;
        border-radius:3px;
        background-color:orange;
        padding:8px 30px;
        color:white;
        font-weight:800;
        transition:0.2s;  
    }

</style>
<body>

<div class="wrap">

    <div class="dashboard-nav">

        <div class="element-top"><h1><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="46" height="46"><path d="M3 13H11V3H3V13ZM3 21H11V15H3V21ZM13 21H21V11H13V21ZM13 3V9H21V3H13Z" fill="rgba(173,184,194,1)"></path></svg><span class="h1-top"> Dashboard</span></h1></div>

        <div onclick="register()" class="element"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z" fill="rgba(173,184,194,1)"></path></svg><span id="t0"> Registration</span></div>

        <div onclick="user()" class="element"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path d="M21.0082 3C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082ZM20 5H4V19H20V5ZM18 15V17H6V15H18ZM12 7V13H6V7H12ZM18 11V13H14V11H18ZM10 9H8V11H10V9ZM18 7V9H14V7H18Z" fill="rgba(173,184,194,1)"></path></svg><span id="t1"> Customer</span></div>

        <div onclick="attendance()" class="element"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path d="M12 14V22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM21.4462 20.032L22.9497 21.5355L21.5355 22.9497L20.032 21.4462C19.4365 21.7981 18.7418 22 18 22C15.7909 22 14 20.2091 14 18C14 15.7909 15.7909 14 18 14C20.2091 14 22 15.7909 22 18C22 18.7418 21.7981 19.4365 21.4462 20.032ZM18 20C19.1046 20 20 19.1046 20 18C20 16.8954 19.1046 16 18 16C16.8954 16 16 16.8954 16 18C16 19.1046 16.8954 20 18 20Z" fill="rgba(173,184,194,1)"></path></svg><span id="t4"> Attendance</span></div>

        <div onclick="attendanceRecord()" class="element"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path d="M16 2L21 6.999V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13 9H11V15H16V13H13V9Z" fill="rgba(173,184,194,1)"></path></svg><span id="t2"> Attendance record</span></div>

        <div onclick="goal()" class="element"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path d="M19.9381 13C19.4869 16.6187 16.6187 19.4869 13 19.9381V17H11V19.9381C7.38128 19.4869 4.51314 16.6187 4.06189 13H7V11H4.06189C4.51314 7.38128 7.38128 4.51314 11 4.06189V7H13V4.06189C16.6187 4.51314 19.4869 7.38128 19.9381 11H17V13H19.9381ZM2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12ZM12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="rgba(173,184,194,1)"></path></svg><span id="t6"> Customer Goal's</span></div>

        <div onclick="settings()" class="element"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16ZM11 14V16H13V14H11ZM7 14V16H9V14H7ZM15 14V16H17V14H15Z" fill="rgba(173,184,194,1)"></path></svg><span id="t5"> Password</span></div>

        <div onclick="logout()" class="element"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path d="M5 22C4.44772 22 4 21.5523 4 21V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V21C20 21.5523 19.5523 22 19 22H5ZM15 16L20 12L15 8V11H9V13H15V16Z" fill="rgba(173,184,194,1)"></path></svg><span id="t5"> Log-out</span></div>

    </div>

    <div class="dashboard-content">

  <div class="register" id="register">
  <form onsubmit="registerForm(event)" id="registerForm">
  <div class="container" id="box">
  <div class="second-wrapper">
  <div class="wrapper x-wrapper">
  <input type="text" placeholder="Full Name" name="name" id="username" required autocomplete="off">
  </div>
  <div class="wrapper x-wrapper">
  <input type="text" placeholder="Age" name="age" required autocomplete="off">
  </div>
  </div>

  <div class="second-wrapper">
  <div class="wrapper x-wrapper">
  <input type="tel" placeholder="Phone number" name="phonenumber" id="phone" pattern="[0-9]{10}" required autocomplete="off">
  </div>
  <div class="wrapper x-wrapper">
  <select name="gender" required>
        <option value="" disabled selected>Gender</option>
        <option value="Male" name="Male">Male</option>
        <option value="Female" name="Female">Female</option>
    </select>
  </div>
  </div>

  <div class="wrapper">
  <input type="date" name="joined_date" required selected>
  </div>

  <div class="wrapper" style="margin-top:30px;">
  <select name="duration" required>
        <option value="" disabled selected>Select Duration</option>
        <option value="Day wise" name="Day wise">Day wise</option>
        <option value="1 month" name="1 month">1 month</option>
        <option value="3 months" name="3 months">3 months</option>
        <option value="6 months" name="6 months">6 months</option>
        <option value="1 year" name="1 year">1 year</option>
    </select>
  </div>

  <div class="wrapper" style="margin-top:30px;">
  <input type="text" placeholder="Enter Goal to achieve" name="goal"  required autocomplete="off">
  </div>

  <div class="btn-wrap">
  <input type="submit" class="button" value="Register">
  </div>
  </div>

  </form>
  <script type="text/javascript">
 function registerForm(event){
    event.preventDefault();
    const form = document.getElementById('registerForm');
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            if (this.responseText.trim() === 'success') {
                alert('Registered');
            } else if (this.responseText.trim() === 'phoneExist') {
                alert('Phone already exists');
            } else if (this.responseText.trim() === 'error') {
                alert('Error registering');
            } else if (this.responseText.trim() === 'invalidPhonenumber') {
                alert('Please enter a valid phone number');
            } else if (this.responseText.trim() === 'invalidAge') {
                alert('Please enter a valid age');
            }
        }
    };
    xhr.send(formData);
}
</script>
</div>

        <div class="user" id="user">
            <?php
            include 'dbconnection.php';
            
            $sql = "SELECT * from gym_user";
            $result = $connection->query($sql);
            if ($result->num_rows > 0){
                echo"<table>";
                echo"<tr>";
                echo"<th>S.no</th>";
                echo"<th>Name</th>";
                echo"<th>Age</th>";
                echo"<th>Gender</th>";
                echo"<th>Joined Date</th>";
                echo"<th>Phonenumber</th>";
                echo"<th>Update</th>";
                echo"<th>Remove</th>";
                echo "</tr>";
                $count = 1;
            while ($row=$result->fetch_assoc()){
                $username = $row['name'];
                $age = $row['age'];
                $gender = $row['gender'];
                $id = $row['id'];
                $joined_date = $row['joined_date'];
                $user_id = $row['phonenumber'];
                if($gender == "Female"){
                    $bgColor = "rgb(246,246,246,1)";
                }
                else{
                    $bgColor = "white";
                }

                echo"<tr style='background-color:$bgColor;'>";
                echo"<td>$count</td>";
                echo"<td>$username</td>";
                echo"<td>$age</td>";
                echo"<td>$gender</td>";
                echo"<td>$joined_date</td>";
                echo"<td>$user_id</td>";
                echo"<td>
                
                <form onsubmit='updateForm(event)' method='POST' id='updateForm$user_id' action=''>
                <input type='hidden' name='phonenumber' value='$user_id'>
                <button class='edit-user' type='submit'>Edit</button>
                </form>
                </td>";


                echo"<td>

                <form onsubmit='deleteform(event)' id='deleteForm$user_id' action='' method='POST'>
                    <input type='hidden' value='$user_id' name='phonenumber'><button class='remove-user' type='submit'>Remove</button>
                </form>

                </td>";
                echo"</tr>";
                $count = $count + 1;
                }
                echo"</table>";
            }
                else{
                    echo "<div class='center-message'>
                    <img src='thinking.svg' height='400' width='700'><br>
                    No customer till now !</div>";
                    }
            ?>

              <script type="text/javascript">
                function updateForm(event){
                    event.preventDefault();
                    const Form = event.currentTarget;
                    const formData = new FormData(Form);
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST','updateuser.php',true);
                    xhr.onload = function(){
                        if(this.status === 200){
                            document.getElementById('updatePage').style.display="block";
                            document.getElementById('updatePage').innerHTML = (this.responseText);
                        }
                        else{
                            alert('Failure');
                        }
                    };
                    xhr.send(formData);

                }
            </script>

            <script>
                function deleteform(event){
                    event.preventDefault();
                    const Form = event.currentTarget;
                    const formData = new FormData(Form);
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST','deleteuser.php',true);
                    xhr.onload = function(){
                        if(this.status == 200){
                            if(this.responseText.trim() === 'success'){
                                alert('Removed !');
                            }
                            else{
                                alert('Could not remove !');
                            }
                        }
                        else{
                            alert('Could not remove!');
                        }
                    };
                    xhr.send(formData);
                }
            </script>

            <style>
                #updatePage{
                    display:none;
                    position:absolute;
                    transform:translate(-50% , -50%);
                    top:50%;
                    left:60%;
                    padding:20px;
                    border-radius:6px;
                }
            </style>

            <div id="updatePage">
            </div>

            <script>

            function updateDetails(event){
                event.preventDefault();
                const form = event.currentTarget;
                const formData = new FormData(form);
                const xhr = new XMLHttpRequest();
                xhr.open('POST','updateDetails.php',true);
                xhr.onload = function(){
                    if(this.status === 200){
                        if(this.responseText.trim() == 'success'){
                            alert("Updated successfully");
                        }
                        else{
                            alert("Could not update");
                        }
                    }
                    else{
                        alert("Failed to update ");
                    }

                };xhr.send(formData);

            }


            const closeUpdatePage =() => {
            var containerUpdate = document.getElementById('containerUpdate');
            containerUpdate.style.display='none';
        }
        
</script>


        </div>



        <div class="attendance" id="attendance">
            <div class="search-bar">
                <form action="" onsubmit="searchForm(event)" id="searchForm" method="post">
                    <div class="search-bar-content">
                        <input type="text" name="phonenumber" class="search" placeholder="Enter phonenumber to search....">
                        <button class="search-submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path d="M12 14V22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM21.4462 20.032L22.9497 21.5355L21.5355 22.9497L20.032 21.4462C19.4365 21.7981 18.7418 22 18 22C15.7909 22 14 20.2091 14 18C14 15.7909 15.7909 14 18 14C20.2091 14 22 15.7909 22 18C22 18.7418 21.7981 19.4365 21.4462 20.032ZM18 20C19.1046 20 20 19.1046 20 18C20 16.8954 19.1046 16 18 16C16.8954 16 16 16.8954 16 18C16 19.1046 16.8954 20 18 20Z" fill="rgba(255,255,255,1)"></path></svg></button>
                    </div>
                </form>
            </div>
                    <div class="response" id="response">
                        <img src="17.svg"><br>
                        <p style="font-size:25px;">Search the desired phonenumber to update the <span style="color:red;position:relative;top:0;">attendance !</span></p>
                    </div>

        </div>


<script type="text/javascript">
    function markAttendance(event){
        event.preventDefault();
        const form = document.getElementById('markAttendance');
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open('POST','mark_attendance.php',true);
        xhr.onload = function(){
            if(this.status=== 200){
                if(this.responseText.trim() === 'Success'){
                    alert('Attendance done');

                }
                else if(this.responseText.trim() === 'Failure'){
                    alert('Try later');
                }
                else if(this.responseText.trim() === 'Already'){
                    alert('Attendance already done');
                }
            }
            else{
                alert('Could not mark right now');
            }
        };
        xhr.send(formData);

    }
</script>

<script>
function searchForm(event) {
    event.preventDefault(); 
    const response = document.getElementById('response');
    response.style.display="block";
    const form = document.getElementById('searchForm');
    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'attendance.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            response.innerHTML = (this.responseText);
        }
        else{
            alert('Could not show right now');
        }
    };
    xhr.send(formData);
}
</script>


<style type="text/css">
          .dateAttendance{
                width:200px;
                border:1px solid lightgrey;
                right:20px;
                bottom:20px;
                border-radius:10px;
                padding:5px;
                background-color:white;
                position:fixed;
            }
            .dateAttendance input{
                width:150px;
                border:.1px solid lightgrey;
                margin:10px;
                padding:7px;
                border-radius:5px;
            }

            .dateAttendance button{
                cursor:pointer;
                border:none;
                background-color:black;
                color:white;
                width:calc(100% - 40px);
                font-size:12px;
                font-weight:bold;
                padding:10px 15px;
                border-radius:5px;
                margin-bottom:10px;
            }
</style>

        <div class="attendanceRecord" id="attendanceRecord">
            <?php 
            include 'dbconnection.php';
            $sql ="SELECT * from attendance";
            $checksql = $connection->prepare($sql);
            $checksql->execute();
            $result = $checksql->get_result();
            if($result->num_rows > 0){
                    echo"<table>";
                    echo"<tr>";
                    echo"<th>S.no</th>";
                    echo"<th>Name</th>";
                    echo"<th>Phonenumber</th>";
                    echo"<th>Date</th>";
                    echo"<th>Status</th>";
                    echo"</tr>";
                     $count = 1;
                while($row = $result->fetch_assoc()){
                    $username = $row['name'];
                    $phonenumber = $row['phonenumber'];
                    $status = $row['status'];
                    $markeddate = $row['marked_date'];
                    $today = date('d/m/Y');

                    if ($markeddate == $today) {
                        $background = "rgb(248,248,248,1)";
                    } else {
                        $background = "white";
                    }

                     echo "<tr style='background-color:$background;'>";
                    echo"<td>$count</td>";
                    echo"<td>$username</td>";
                    echo"<td>$phonenumber</td>";
                    echo"<td>$markeddate</td>";
                    echo"<td>$status</td>";
                     echo "</tr>";
                    $count++;
                }
                echo "</tr>";
                echo"</table>";
            }
            else{
            echo "<div class='center-message'>
                    <img src='thinking.svg' height='400' width='700'><br>
                    No customer present till now !</div>";
            }
        ?>
        <div class="dateAttendance">
        <form onsubmit="searchAttendanceForm(event)" id='searchAttendance' action="" method="POST">
            <input type="date" name="marked_date" selected>
            <div>
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="17" height="17" fill="rgba(255,255,255,1)"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path></svg></button>
            </div>
        </form>
        </div>
        <script type="text/javascript">
            const searchAttendanceForm =(event)=>{
                event.preventDefault();
                var x = document.getElementById('attendanceRecord');
                const form = event.currentTarget;
                const formData = new FormData(form);
                const xhr = new XMLHttpRequest();
                xhr.open('POST','searchAttendance.php',true);
                xhr.onload = function (){
                    if(this.status == 200){
                        x.innerHTML = (this.response);
                    }
                    else{
                        alert("failure");
                    }
                };
                xhr.send(formData);
            }
        </script>

        </div>


        <div class="goal" id="goal">
            <?php
            $sql = "SELECT * FROM customer_goal";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                    echo"<table>";
                    echo"<tr>";
                    echo"<th>S.no</th>";
                    echo"<th>Name</th>";
                    echo"<th>Phonenumber</th>";
                    echo"<th>Goal</th>";
                    echo"<th>Achievement</th>";
                    echo"<th>Action</th>";
                    echo"<th>Remove</th>";
                    echo"</tr>";
                     $count = 1;
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $goal = $row['goal'];
                    $phonenumber = $row['phonenumber'];
                    $achieve = $row['Achievement'];
                    if ($achieve == null) {
                        $achieve = "Not achieved yet";
                    }
                    echo "<tr>";
                    echo"<td>$count</td>";
                    echo"<td>$name</td>";
                    echo"<td>$phonenumber</td>";
                    echo"<td>$goal</td>";
                    echo"<td id='$phonenumber'>$achieve</td>";
                    echo "<td>
                    <form onsubmit='goalForm(event)' method='POST' id='updateForm$id' action=''><input name='phonenumber' type='hidden' value='$phonenumber'>
                    <button class='achieve-button'>
                        Achieve
                    </button>
                    </form>
                    </td>";
                    echo "<td>
                    <form onsubmit='goalRemoveForm(event)' method='POST' id='updateForm$id' action=''><input name='phonenumber' type='hidden' value='$phonenumber'>
                    <button class='remove-user'>
                        Remove
                    </button>
                    </form>
                    </td>";
                    $count++;
                }
                echo "</tr>";
                echo"</table>";
            }
            else{
                echo "<div class='center-message'>
                    <img src='thinking.svg' height='400' width='700'><br>
                    No customer present till now !</div>";
            }
            ?>

            <script type="text/javascript">
                function goalForm(event){
                    event.preventDefault();
                    const form = event.currentTarget;
                    const formData = new FormData(form);
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST','goal.php',true);
                    xhr.onload = function(){
                        if(this.status === 200){
                            if(this.responseText === 'success'){
                                alert('Achieved !');
                            }
                            else if(this.responseText === 'failed'){
                                alert('Could not achieve !');
                            }
                            else{
                                alert('Could not achieve !');
                            }
                        }
                        else{
                            alert('Could not achieve !');
                        }
                    };
                    xhr.send(formData);
            };
            </script>
                        <script type="text/javascript">
                function goalRemoveForm(event){
                    event.preventDefault();
                    const form = event.currentTarget;
                    const formData = new FormData(form);
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST','goalRemove.php',true);
                    xhr.onload = function(){
                        if(this.status === 200){
                            if(this.responseText === 'success'){
                                alert('Removed');
                            }
                            else if(this.responseText === 'failure'){
                                alert('Could not remove !');
                            }
                            else{
                                alert('Could not remove !');
                            }
                        }
                        else{
                            alert('Could not remove !');
                        }
                    };
                    xhr.send(formData);
            };
            </script>
    </div>

        <div class="settings" id="settings">
            <div class="inner-setting">
                <form onsubmit="updatepassword(event)" action="" method="POST" id="passwordForm">
                    <center></center>
                <div style="padding:35px 50px 50px 50px;border-radius:10px; background:rgba(0, 0, 0, 0.3);">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="85" height="85"><path d="M12 14V22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM21 17H22V22H14V17H15V16C15 14.3431 16.3431 13 18 13C19.6569 13 21 14.3431 21 16V17ZM19 17V16C19 15.4477 18.5523 15 18 15C17.4477 15 17 15.4477 17 16V17H19Z" fill="white"></path></svg>
                    </div>
                    <input type="text" autocomplete="off" placeholder="Enter new password for admin login" name="password" class="input"required><br><br><input type="submit" value="Change Password" class="input-button">
                </div>
                </form>

                <?php
                include 'dbconnection.php';
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $password = $_POST['password'];
                    $updatesql = "UPDATE admin SET password = ? WHERE id ='1'";
                    $checkupdatesql = $connection->prepare($updatesql);
                    $checkupdatesql -> bind_param("s",$password);
                    $x = $checkupdatesql -> execute();
                if($x == TRUE){
                    session_start();
                    session_destroy(); 
                    header("Location:adminlogin.php");
                    exit();
                }
                else{
                echo"";
                    }
                }
                ?>
            </div>
        </div>

    </div>

</div>



<script>
function updatepassword(event) {
    event.preventDefault(); 
    const form = document.getElementById('passwordForm');
    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '', true);
    xhr.onload = function() {
        if (this.status === 200) {
            alert('Password changed');
            window.location.href="adminlogin.php";
        }
    };
    xhr.send(formData);
}
</script>

<script type="text/javascript">
    var r = document.getElementById('register').style;
    var u = document.getElementById('user').style;
    var a = document.getElementById('attendance').style;
    var ad = document.getElementById('attendanceRecord').style;
    var s = document.getElementById('settings').style;
    var g = document.getElementById('goal').style;
    var t0 = document.getElementById('t0').style;
    var t1 = document.getElementById('t1').style;
    var t2 = document.getElementById('t2').style;
    var t4 = document.getElementById('t4').style;
    var t5 = document.getElementById('t5').style;
    var t6 = document.getElementById('t6').style;


        function register() {
            t0.color="cyan";
            t1.color="white";
            t2.color="white";
            t4.color="white";
            t5.color="white";
            t6.color="white";
            r.display="flex";
            u.display="none";
           ad.display="none";
            a.display="none";
            s.display="none";
            g.display="none";

    }


            function user() {
            t0.color="white";
            t1.color="cyan";
            t4.color="white";
            t2.color="white";
            t5.color="white";
            t6.color="white";
            r.display="none";
            u.display="block";
            ad.display="none";
            a.display="none";
            s.display="none";
            g.display="none";

    }

        function attendance() {
            t0.color="white";
            t1.color="white";
            t4.color="cyan";
            t5.color="white";
            t6.color="white";
            t2.color="white";
            r.display="none";
            ad.display="none";
            u.display="none";
            a.display="block";
            s.display="none";
            g.display="none";
    }

        function attendanceRecord() {
            t0.color="white";
            t1.color="white";
            t4.color="white";
            t2.color="cyan";
            t5.color="white";
            t6.color="white";
            ad.display="block";
            r.display="none";
            u.display="none";
            a.display="none";
            s.display="none";
            g.display="none";
    }

        function settings() {
            t0.color="white";
            t1.color="white";
            t4.color="white";
            t2.color="white";
            t5.color="cyan";
            t6.color="white";
            r.display="none";
            u.display="none";
            ad.display="none";
            a.display="none";
            s.display="flex";
            g.display="none";
    }


            function goal() {
            t0.color="white";
            t1.color="white";
            t4.color="white";
            t5.color="white";
            t2.color="white";
            t6.color="cyan";
            r.display="none";
            u.display="none";
            a.display="none";
            ad.display="none";
            s.display="none";
            g.display="block";
    }

            function logout() {
                window.location.href="logout.php";
            }
</script>
<script type="text/javascript">
function seepassword() {
  var x = document.getElementById('inputpassword')
  if (x.type === "password"){
    x.type="text";
  }
  else{
    x.type="password";
  }
}
</script>
<script type="text/javascript">
    window.onload = function() {
    if (window.location.hash === '#goal') {
        goal();
    }
}

</script>
</body>
</html>         