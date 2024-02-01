<?php
error_reporting(0);
$name = $to = $customerMessage = "";
$nameErr = $toErr = $customerMessageErr = "";

//initial check of server to see if request was sent via POST
//checks if "user-name" is empty if it is it stores an error message into $nameErr
//if true the value of "user-name" is stored into $name variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user-name"])) {
        $nameErr = "Name is required";
//once "user-name" is not null and saved into $name variable
//$name is checked again through preconfigured match and validates no special characters
    } elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        $nameErr="Only letters and white space allowed";
        $name = "";
    }
//if no special characters are found "user-name" value is stored in $name
    else {
        $name = $_POST["user-name"];
    }


//checks if "user-email" is empty if it is an error message is stored in $toErr
//if true the value of "user-email" is stored in $to variable
    if (empty($_POST["user-email"])){
        $toErr = "Email is required";
//uses php filter_var method to check the value of "user-email" if it fails a new error message is stored
//in $toErr for improper email format.
    }elseif(!filter_var($_POST["user-email"], FILTER_VALIDATE_EMAIL)){
        $toErr = "Invalid email format";
    }else{
        $to = $_POST["user-email"];
    }
//
    if(empty($_POST["customerMessage"])){
        $customerMessageErr = "Message is required";
    }else{
        $customerMessage = $_POST["customerMessage"];
    }
}

$txt = "We have received your inquiry and will reach out shortly";
$headers = "from: webmaster@gmail.com" . "\r\n"
    . "CC: someoneelse@gmail.com";

$me = "garrett.ballreich@gmail.com";

$subject1 = "inquiry from " . $name;
$subject = "Green River College ATT inquiry";
//send email to customer
mail($to, $subject, $txt, $headers);
//notify me
mail($me, $subject1,$customerMessage);

?>

<html lang="en">
<body>
thank you for your inquiry .<?php echo '$name' ?>. we will respond in <em>SEVERAL</em> days.
</body>
</html>
