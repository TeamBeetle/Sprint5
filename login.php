<?php
session_start();
$userName = $password = "";

//check and set userName and password
if (isset($_POST["user-name"]) && isset($_POST["password"])) {
    $userName = $_POST["user-name"];
    $password = $_POST["password"];
//check if username is present in DB
    $sql = mysqli_query($cnxn, "SELECT `password-hash` FROM `user_data` WHERE `username` = $userName");
    $hash = mysqli_fetch_assoc($sql);
    password_verify($password, $hash);
//assign session variable
    $sql = mysqli_query($cnxn, "SELECT `uid` FROM `user_data` WHERE `username` = $userName");
    $id = mysqli_fetch_assoc($sql);
    $_SESSION['id'] = $id;
//redirect to dashboard
    echo"
        <script>window.location = 'index.php'</script>
    ";


//display login screen
} else {
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
}