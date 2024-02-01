<?php
error_reporting(0);
$name = $email = $cohort ="";
$nameErr = $emailErr = $cohortErr = $boxErr = "";
$seeking= $seekingErr = "";
$interests= $interestsErr = "";


//checks name
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user-name"])) {
        $nameErr = "Name is required";
//once "user-name" is not null and saved into $name variable
//$name is checked again through preconfigured match and validates no special characters
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
        $name = "";
    } //if no special characters are found "user-name" value is stored in $name
    else {
        $name = $_POST["user-name"];
    }
//checks email
    if (empty($_POST["user-email"])){
        $emailErr = "Email is required";
//uses php filter_var method to check the value of "user-email" if it fails a new error message is stored
//in $toErr for improper email format.
    }elseif(!filter_var($_POST["user-email"], FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format";
    }else{
        $email = $_POST["user-email"];
    }
    //checks cohort
    if(empty($_POST['user-cohort'])){
        $cohortErr = "Cohort is required";
    }elseif($_POST['user-cohort']<1 || $_POST['user-cohort']>100){
        $cohortErr = "Please enter a value between 1 - 100";
    }elseif(is_numeric(["user-cohort"])){
        $cohortErr = "Please enter a number";
    }else{
        $cohort = $_POST['user-cohort'];
    }
//checks for at least 1 checkbox to be clicked
    if (isset($_POST['submit'])) {
        if(empty($_POST['seeking']))
        {
            $seekingErr = "You must select 1 checkbox";
        }else{
            $seeking = $_POST['seeking'];
        }
    }
//checks for field of interest
    if(empty(["field-interest"])){
        $interestsErr = "Please enter at least 1 field of interest";
    }else{
        $interests = $_POST["field-interests"];
    }
}
?>
<html lang="en">
<body>
thank you for signing up .<?php echo '$name' ?>.
</body>
</html>

