<?php
session_start();
require '/home/teambeet/dbConnect.php';
$userEmail = $password = "";

//check and set userName and password
if (isset($_POST["user-email"]) && isset($_POST["password"])) {
    $userEmail = $_POST["user-email"];
    $password = $_POST["password"];
//check if username is present in DB
    $temp = 'SELECT `passwordhash` FROM `login_info` WHERE `useremail` = "'.$userEmail.'"';
    $sql = mysqli_query($cnxn, $temp);
    $hash = mysqli_fetch_assoc($sql);
    if (password_verify($password, $hash['passwordhash'])) {
//assign session variable
        $sql = mysqli_query($cnxn, "SELECT `uid` FROM `user_data` WHERE `user_email` = $userEmail");
        $id = mysqli_fetch_assoc($sql);
        $_SESSION['id'] = $id;
//get user roles with SQL
        $sql = mysqli_query($cnxn, "SELECT `admin_status` FROM `login_info` WHERE `useremail` = $userEmail");
        $status = mysqli_fetch_row($sql);
        $_SESSION['admin_status'] = $status;
//redirect to dashboard or admin page
        if($status == 0) {
            echo "
        <script>window.location = 'index.php'</script>
    ";
    }else{
            echo "
        <script>window.location = 'admin-page.php'</script>
    ";
        }
    }
}

//display login screen
echo"
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>GRC ATT Login Page</title>
    <link rel='stylesheet' href='loginStyle.css?v=1'>
</head>
<body>
<div class='title'>
    <img src='images/GRC%20Logo.png' alt='GRC Logo'>
    <h>Green River College ATT</h>
</div>
<div class='container'>
    <form action='login.php' method='POST'>
        <div>
            <h1>Login Here</h1>
        </div>
        <div>
            <label>User Email</label>
            <br>
            <input type='text' name='user-email'>
        </div>
        <br>
        <div>
            <label>Password</label>
            <br>
            <input type='password' name='password'>
        </div>
        <br>
        <div>
            <button type='submit' value='Submit'>Submit</button>
        </div>
        <div>
            <p>Don't have an account with us? <a href='#'>Sign up here</a></p>
        </div>
    </form>
</div>
</body>
</html>";

