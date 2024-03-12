<?php
session_start();
$userName = $password = "";

//check and set userName and password
if (isset($_POST["user-name"]) && isset($_POST["password"])) {
    $userName = $_POST["user-name"];
    $password = $_POST["password"];
//check if username is present in DB
    $sql = mysqli_query($cnxn, "SELECT `password-hash` FROM `login_info` WHERE `username` = $userName");
    $hash = mysqli_fetch_assoc($sql);
    if (password_verify($password, $hash)) {
//assign session variable
        $sql = mysqli_query($cnxn, "SELECT `uid` FROM `login_info` WHERE `username` = $userName");
        $id = mysqli_fetch_assoc($sql);
        $_SESSION['id'] = $id;
//get user roles with SQL
        $sql = mysqli_query($cnxn, "SELECT `user_admin_status` FROM `login_info` WHERE `username` = $userName");
        $status = mysqli_fetch_assoc($sql);
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
    <title>Title</title>
</head>
<body>
<div class='container'>
    <form action='login.php' method='POST'>
        <label>Username</label>
        <input type='text' name='user-name'>
        <label>Password</label>
        <input type='password' name='password'>
        <button type='submit' value='Submit'>Submit</button>
    </form>
</div>
</body>
</html>";
