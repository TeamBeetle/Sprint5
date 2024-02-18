<?php
error_reporting(0);
$name = $to = $customerMessage = "";
$nameErr = $toErr = $customerMessageErr = "";
$nameCheck=0;
$emailCheck=0;
$messageCheck=0;

//check name
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["user-name"])) {
        $nameErr = "Name is required";
        $nameCheck = 1;
    } else {
        $name = $_POST["user-name"];
        $nameCheck = 1;
    }

//check email
    if (empty($_POST["user-email"])) {
        $toErr = "Email is required";
        $emailCheck = 0;
    } else {
        $to = $_POST["user-email"];
        $emailCheck = 1;
    }
//check message
    if (isset($_POST['customerMessage']) && $_POST['customerMessage'] != "") {
        $customerMessage = $_POST['customerMessage'];
        $messageCheck = 1;
    } else {
        $customerMessageErr = "Message is required";
    $messageCheck = 0;
}
}
//check if the form was filled out properly and displays error php page
if($nameCheck + $emailCheck + $messageCheck < 2){
    echo"
    <html lang='en'>
    <head>
    <link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity = 'sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN'crossorigin='anonymous'>
    <link href='style.css' rel='stylesheet' type='text/css'/>
    </head>
    <body class='receiptPageBody'>
    <nav id='background' class='navbar navbar-expand-md  navbar-dark'>

  <img id='grc-logo' class='navbar-brand'  src='images/GRC Logo.png'>
  <button class='navbar-toggler' type='button' data-toggle='collapse'
          data-target='#collapsibleNavbar'>
    <span class='navbar-toggler-icon'></span>
  </button>


  <div class='collapse navbar-collapse links' id='collapsibleNavbar'>

    <ul class='navbar-nav links'>
      <li class='nav-item'>
        <a class='nav-link' href='#'>Dashboard</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link sign-up' href='#'>Sign Up</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link add-application' href='#'>Add Applicaion</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link contact-anchor contact' href='#'>Contact</a>
      </li>
    </ul>
  </div>
  <div id='toggleContainer' class='col-2'>
    <button type='button' class='btn toggle active-mode btn-light'>Light</button>
    <button type='button' class='btn toggle btn-dark'>Dark</button>
  </div>
</nav>
    <div class='receiptPage'>
    <h1>ERROR!</h1>
    <p>Please fill out the entire form</p>
    </div>
    </body>
    </html>";
    }else{
    //sends inquire email and displays correct php page
    $txt = "We have received your inquiry and will reach out shortly";
    $headers = "from: webmaster@gmail.com" . "\r\n"
        . "CC: someoneelse@gmail.com";

    $me = "garrett.ballreich@gmail.com, tschrock@greenriver.edu";

    $subject1 = "inquiry from " . $name;
    $subject = "Green River College ATT inquiry";
//send email to customer
    mail($to, $subject, $txt, $headers);
//notify me
    mail($me, $subject1,$customerMessage);
    echo"
     <html lang='en'>
    <body class='receiptPageBody'>
    <head>
      <link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity = 'sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN'crossorigin='anonymous'>
    <link href='style.css' rel='stylesheet' type='text/css'/>
    </head>
    <body>
        <nav id='background' class='navbar navbar-expand-md  navbar-dark'>

  <img id='grc-logo' class='navbar-brand'  src='images/GRC Logo.png'>
  <button class='navbar-toggler' type='button' data-toggle='collapse'
          data-target='#collapsibleNavbar'>
    <span class='navbar-toggler-icon'></span>
  </button>


  <div class='collapse navbar-collapse links' id='collapsibleNavbar'>

    <ul class='navbar-nav links'>
      <li class='nav-item'>
        <a class='nav-link' href='#'>Dashboard</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link sign-up' href='#'>Sign Up</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link add-application' href='#'>Add Applicaion</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link contact-anchor contact' href='#'>Contact</a>
      </li>
    </ul>
  </div>
  <div id='toggleContainer' class='col-2'>
    <button type='button' class='btn toggle active-mode btn-light'>Light</button>
    <button type='button' class='btn toggle btn-dark'>Dark</button>
  </div>
</nav>
    
    
    <div class='receiptPage'>
    <h1>SUCCESS!</h1>
    <p>Thank you for your inquiry $name, we will respond in <em>Several</em> days.</p>
    </div>
    </body>
    </html>
    ";
}







