<?php
session_start();
error_reporting(0);
require '/home/teambeet/dbConnect.php';
if(isset($_SESSION['id']) && isset($_SESSION['admin_status']))
{
    $loginId = $_SESSION['id'];
    $loginStatus = $_SESSION['admin_status'];
    if($loginStatus == 1)
    {
        $target = $_POST['app-target'];
        $cohort = $_POST['app-cohort'];

        //to will later redirect to Tyler Email.
        $to = "";
        $user_email_query = null;
        if ($target == "users")
        {
            $user_email_query = mysqli_query($cnxn, "SELECT `user_email` FROM `user_data`");
        }
        else if ($target == "admins")
        {
            $user_email_query = mysqli_query($cnxn, "SELECT `user_email` FROM `user_data` WHERE user_admin_status = 1");
        }
        else if ($target == "cohort")
        {
            $user_email_query = mysqli_query($cnxn, "SELECT `user_email` FROM `user_data` WHERE user_cohort = $cohort");
        }

        while ($row = mysqli_fetch_assoc($user_email_query))
        {
            $to .= $row["user_email"].", ";
        }
        //cutting off the last ", "
        $to = substr($to,0,-2);

        $subject = $_POST['app-position'] . " : ". $_POST['app-employer'];
        $message = "NEW OPPORTUNITIES FOUND AT " . $_POST['app-employer'] . " Looking for a " . $_POST['app-position'] . " This is a " . $_POST['app-status'] . " position. " . "\n"
         . $_POST['app-info'] . " Apply here : " . $_POST['app-link'] . " , " . $_POST['app-date'];

        //header is junk data for now
        $headers ='From: ' . $subject . "\r\n" .
            'Reply-To : ' . $subject . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message)) //removed header
        {
            //connect to db
            $position = $_POST['app-position'];
            $employer = $_POST['app-employer'];
            $seeking = $_POST['app-status'];
            $url = $_POST['app-link'];
            $notes = $_POST['app-info'];

            //define insert query
            // Define insert query with placeholders
            $sql = "INSERT INTO `announcement_data` (`TimeOfUpload`,`aid`, `position`, `employer`, `seeking`, `url`, `notes`, `targeted`, `cohort`) VALUES (CURRENT_DATE(), NULL, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($cnxn, $sql);

            mysqli_stmt_bind_param($stmt, "ssssssi", $position, $employer, $seeking, $url, $notes, $target, $cohort);

            $result = mysqli_stmt_execute($stmt);


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
                <a class='nav-link' href='index.php'>Dashboard</a>
              </li>
              <li class='navbar-nav links'>
                <a class='nav-link' href='admin-page.php'>Admin</a>
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
            <h4>Announcement Sent!</h4>
            <p>Email Forwarded to $to about oportunity of $subject with entailed message: $message</p>
            <table id='receiptPageTable'>
            <tr class='receiptPageRow'>
              <td class='receiptPageData'>Position</td>
              <td class='receiptPageData'>$position</td>
            </tr>
             <tr class='receiptPageRow'>
              <td class='receiptPageData'>Employer</td>
              <td class='receiptPageData'>$employer</td>
            </tr>
            <tr class='receiptPageRow'>
              <td class='receiptPageData'>Status</td>
              <td class='receiptPageData'> $seeking</td>
            </tr>
             <tr class='receiptPageRow'>
              <td class='receiptPageData'>Job URL</td>
              <td class='receiptPageData'>$url</td>
            </tr>
              <tr class='receiptPageRow'>
              <td class='receiptPageData'>Recipient Email</td>
              <td class='receiptPageData'>$to</td>
            </tr>
               <tr class='receiptPageRow'>
              <td class='receiptPageData'>Notes</td>
              <td class='receiptPageData'> $notes</td>
            </tr>
             <tr class='receiptPageRow'>
              <td class='receiptPageData'>Target</td>
              <td class='receiptPageData'> $target</td>
            </tr>
             <tr class='receiptPageRow'>
              <td class='receiptPageData'>Cohort</td>
              <td class='receiptPageData'> $cohort</td>
            </tr>
            </table>
                </div>
            </body>
        </html>";

        }
        else
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
              
            </ul>
          </div>
          <div id='toggleContainer' class='col-2'>
            <button type='button' class='btn toggle active-mode btn-light'>Light</button>
            <button type='button' class='btn toggle btn-dark'>Dark</button>
          </div>
        </nav>
        <div class='receiptPage'>
             <h1>ERROR!</h1>
                <h1> Message Failed to Deliver: $to</h1>
        </div>
        </body>
        </html>";
        }
    }
    else //not an admin
    {
        echo '<script>window.location = "https://teambeetle.greenriverdev.com/SPRINT5/"</script>';
    }
}
else //not logged in
{
    echo '<script>window.location = "https://teambeetle.greenriverdev.com/SPRINT5/login.php"</script>';
}