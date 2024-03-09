<?php
session_start();
$userName = $password = "";

//check if username and password are in DB
//if true redirect to dashboard page(index.php)
//if false re-display login


//check and set userName and password
if (isset($_POST["user-name"]) && isset($_POST["password"])) {
    $userName = $_POST["user-name"];
    $password = $_POST["password"];

    password_verify($password, $hash);
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