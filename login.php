<?php
session_start();
$userEmail = $password = "";

//check and set userName and password
if (isset($_POST["user-email"]) && isset($_POST["password"])) {
    $userEmail = $_POST["user-email"];
    $password = $_POST["password"];
//check if username is present in DB
    $sql = mysqli_query($cnxn, "SELECT `passwordhash` FROM `login_info` WHERE `useremail` = $userEmail");
    $hash = mysqli_fetch_assoc($sql);
    if (password_verify($password, $hash)) {
//assign session variable
        $sql = mysqli_query($cnxn, "SELECT `uid` FROM `user_data` WHERE `user_email` = $userEmail");
        $id = mysqli_fetch_assoc($sql);
        $_SESSION['id'] = $id;
//get user roles with SQL
        $sql = mysqli_query($cnxn, "SELECT `admin_status` FROM `login_info` WHERE `useremail` = $userEmail");
        $status = mysqli_fetch_assoc($sql);
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
    <title>Title</title>
</head>
<body>
<div class='container'>
    <form action='login.php' method='POST'>
        <label>User Email</label>
        <input type='text' name='user-email'>
        <label>Password</label>
        <input type='password' name='password'>
        <button type='submit' value='Submit'>Submit</button>
    </form>
</div>
</body>
</html>";
