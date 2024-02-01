
<!-- APPLICATION ANNOUNCEMENT PHP -->
<?php
error_reporting(0);

//to will later redirect to Tyler Email.
$to = "Everett Hanke <hanke.everett@student.greenriver.edu>,";
$subject = $_POST['app-position'] . " : ". $_POST['app-employer'];
$message = "NEW OPPORTUNITIES FOUND AT " . $_POST['app-employer'] . " Looking for a " . $_POST['app-position'] . " This is a " . $_POST['app-status'] . " position. " . "\n"
 . $_POST['app-info'] . " Apply here : " . $_POST['app-link'] . " , " . $_POST['app-date'];

$headers = 'From: ' . $subject . "\r\n" .
    'Reply-To : ' . $subject . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject,$message, $headers))
{
    echo "<h> Message Sent Successfully </h>";
    echo "<p> " . $message . " </p>";
}
else
{
    echo "<h> Message Failed to Deliver </h>";
}


?>

<!--  -->
<?php

?>
