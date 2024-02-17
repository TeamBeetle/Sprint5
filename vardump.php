
<!-- APPLICATION ANNOUNCEMENT PHP -->
<?php
error_reporting(0);

//to will later redirect to Tyler Email.
$to = "Everett Hanke <hanke.everett@student.greenriver.edu>, " . $_POST['app-recipient'];
$subject = $_POST['app-position'] . " : ". $_POST['app-employer'];
$message = "NEW OPPORTUNITIES FOUND AT " . $_POST['app-employer'] . " Looking for a " . $_POST['app-position'] . " This is a " . $_POST['app-status'] . " position. " . "\n"
 . $_POST['app-info'] . " Apply here : " . $_POST['app-link'] . " , " . $_POST['app-date'];

$headers = 'From: ' . $subject . "\r\n" .
    'Reply-To : ' . $subject . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject,$message, $headers))
{
    echo "    
    <html lang='en'>
    <body>
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
    
    
    
    <p>Email Forwarded to $to about oportunity of $subject with entailed message: $message</p>
    </body>
    </html>";
    //connect to db
    require '/home/teambeet/dbConnect.php';
    $position = $_POST['app-position'];
    $employer = $_POST['app-employer'];
    $seeking = $_POST['app-status'];
    $url = $_POST['app-link'];
    $notes = $_POST['app-info'];
    //define insert query
    // Define insert query with placeholders
    $sql = "INSERT INTO `announcement_data` (`aid`, `position`, `employer`, `seeking`, `url`, `notes`) VALUES (NULL, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($cnxn, $sql);

    mysqli_stmt_bind_param($stmt, "sssss", $position, $employer, $seeking, $url, $notes);

    $result = mysqli_stmt_execute($stmt);
}
else
{
    echo "<h> Message Failed to Deliver </h>";
}


?>

