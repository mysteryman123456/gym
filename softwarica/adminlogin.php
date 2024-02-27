<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>
</head>
<body>
<style type="text/css">
    .popup{
        min-width:500px;
        left:0;
        border-radius:10px;
        text-align:center;
        position:absolute;
        top:-60px;
        padding:15px;
        transition:0.3s;
        background:black;
        color:white;
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
        position:absolute;
        transform:translate(-50% , -50%);
        top:50%;
        left:50%;
        background-color:rgb(0, 0, 0, 0.1);
        border-radius:10px;
        padding:30px;
        min-width:500px;
        max-width:500px;
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
        width:calc(100% - 20px);
        color: #fff;
        border: none;
        border-radius:5px;
        background: linear-gradient(to top, #0ba360 , #3cba92);
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

</style>

<?php
session_start();
include'dbconnection.php';
try{
$create_table = "CREATE TABLE IF NOT EXISTS admin(
id INT(15) AUTO_INCREMENT PRIMARY KEY,
password Varchar(100) null
)";
$connection -> query($create_table);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $posted_password = $_POST['password'];

    $sql = "SELECT * FROM admin";
    $runsql = $connection->prepare($sql);
    $runsql->execute();
    $result = $runsql->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fetched_password = $row['password'];
            if ($posted_password == $fetched_password) {
                $_SESSION['admin'] = true;  
                header('location:/softwarica');
                exit();
            }
            else{
                $message = "Invalid password";
            }
        }
    } else {
        
        $insert_sql = "INSERT INTO admin (id, password) VALUES (?, ?)";
        $stmt = $connection->prepare($insert_sql);
        $id = 1; 
        $stmt->bind_param("is", $id, $posted_password);
        if ($stmt->execute()) {
            $_SESSION['admin'] = true;
            $message = "Please re-enter password to login";
        } else {
            $message = "An error occured";
        }
    }
}
}
catch(Exception $e){
    die("<b style='font-size:30px; position:absolute;top:50%;left:50%;transform:translate(-50% , -50%);'>An <span style='color:red;'>error</span> occured<span style='color:red;'>!</span> Check syntax.</b>");
}
?>

  <form action="" id="registerForm" method="POST">
  <div class="container" id="box">

    <?php
    if($message == 'Invalid password'){
        $backgroundColor = "#C21E56";
    }
    else if($message == 'An error occured'){
        $backgroundColor = "#C21E56";
    }
    elseif ($message == '') {
         $backgroundColor = "transparent";
    }
    else{
         $backgroundColor = "black";
    }
    ?>

    <div class="popup" style="background-color:<?php echo $backgroundColor ?>;"><?php echo "$message"; ?></div>
    <center><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="64" height="64"><path d="M12 14V22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM21 17H22V22H14V17H15V16C15 14.3431 16.3431 13 18 13C19.6569 13 21 14.3431 21 16V17ZM19 17V16C19 15.4477 18.5523 15 18 15C17.4477 15 17 15.4477 17 16V17H19Z" fill="rgba(82,106,125,1)"></path></svg></center>
  <div class="second-wrapper">
  <div class="wrapper x-wrapper">
  <input style="cursor:not-allowed;" type="text" value="Admin" required disabled>
  </div>
  <div class="wrapper x-wrapper">
  <input type="text" placeholder="Enter password" name="password" required autocomplete="off">
  </div>
  </div>
  <div class="btn-wrap">
  <input type="submit" class="button" value="Login">
  </div>
  </form>
</div>
</body>
</html>