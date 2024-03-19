<?php
session_start();

require '/home/teambeet/dbConnect.php';
error_reporting(0);

if(isset($_SESSION['id']) && isset($_SESSION['admin_status']))
{
$aid = $_GET['aid'];

$sql = "SELECT * FROM `application_data` WHERE aid = '".$aid."'";

$stmt = mysqli_query($cnxn, $sql);

$result = mysqli_fetch_assoc($stmt);


if ($_SESSION['id'] == $result['user'])
{
    $sql = "DELETE FROM `application_data` WHERE aid = ?";
    $stmt = mysqli_prepare($cnxn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $aid);

    $result = mysqli_stmt_execute($stmt);

    if ($result)
    {
        echo "<html lang='en'>
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
              
            </ul>
          </div>
          <div id='toggleContainer' class='col-2'>
            <button type='button' class='btn toggle active-mode btn-light'>Light</button>
            <button type='button' class='btn toggle btn-dark'>Dark</button>
          </div>
        </nav>
            <div class='receiptPage'>
            <h1>SUCCESS!</h1>
            <h4>APPLICATION DELETED</h4>
            </div>
            </body>
        </html>";
    }
    else
    {
        echo "<html lang='en'>
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
              
            </ul>
          </div>
          <div id='toggleContainer' class='col-2'>
            <button type='button' class='btn toggle active-mode btn-light'>Light</button>
            <button type='button' class='btn toggle btn-dark'>Dark</button>
          </div>
        </nav>
            <div class='receiptPage'>
            <h1>ERROR</h1>
            <h4>FAILURE TO DELETE</h4>
            </div>
            </body>
        </html>";
    }
}
else
{
    echo "<html lang='en'>
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
              
            </ul>
          </div>
          <div id='toggleContainer' class='col-2'>
            <button type='button' class='btn toggle active-mode btn-light'>Light</button>
            <button type='button' class='btn toggle btn-dark'>Dark</button>
          </div>
        </nav>
            <div class='receiptPage'>
            <h1>ERROR</h1>
            <h4>SUSPICIOUS ACTIVITY RECOGNIZED</h4>
            <p>Cyber police notified to your IP address</p>
            </div>
            </body>
        </html>";
    echo "<style>
        body{
        background-image: url('images/easterEgg.jpg');
        }
</style>";
}
}
else
{
    echo "<script>window.location = 'https://teambeetle.greenriverdev.com/SPRINT5/login.php'</script>";
}