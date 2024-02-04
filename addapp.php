<?php

error_reporting(0);

$employerName = $employerNameCheck = "";
$jobDesc = $jobDescCheck = "";
$appRole = $appRoleCheck = "";
$appDate = $appDateCheck = "";
$appDateFollow = $appDateFollowCheck = "";

$radio1 = $radio1Check = "";
$radio2 = $radio2Check = "";
$radio3 = $radio3Check = "";
$radio4 = $radio4Check = "";
$radio5 = $radio5Check = "";
$radio6 = $radio6Check = "";

$radioSum = 0;


//  $followUPDate = date_create("$appDateFollow");
//     date_add($followUPDate, date_interval_create_from_date_string("14 days"));


//checks employer name
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['app-employer'])) {
        $employerNameCheck = 0;
    } else {
        $employerNameCheck = 1;
        $employerName = $_POST['app-employer'];
    }
//checks job description
    if (empty($_POST['app-job-desc'])) {
        $jobDescCheck = 0;
    } else {
        $jobDescCheck = 1;
        $jobDesc = $_POST['app-job-desc'];
    }
//checks application role
    if (empty($_POST['app-role'])) {
        $appRoleCheck = 0;
    } else {
        $appRoleCheck = 1;
        $appRole = $_POST['app-role'];
    }
//check radio 1 "need to apply"
    if (empty($_POST['apply'])) {
        $radio1Check = 0;
    } else {
        $radio1Check = 1;
        $radio1 = $_POST['apply'];
    }
//check radio 2 "applied"
    if (empty($_POST['applied'])) {
        $radio2Check = 0;
    } else {
        $radio2Check = 1;
        $radio2 = $_POST['applied'];
    }
//check radio 3 "interviewing"
    if (empty($_POST['interviewing'])) {
        $radio3Check = 0;
    } else {
        $radio3Check = 1;
        $radio3 = $_POST['interviewing'];
    }
//check radio 4 "rejected"
    if (empty($_POST['rejected'])) {
        $radio4Check = 0;
    } else {
        $radio4Check = 1;
        $radio4 = $_POST['rejected'];
    }
//check radio 5 "accepted"
    if (empty($_POST['accepted'])) {
        $radio5Check = 0;
    } else {
        $radio5Check = 1;
        $radio5 = $_POST['accepted'];
    }
//check radio 6 "expired"
    if (empty($_POST ['expired'])) {
        $radio6Check = 0;
    } else {
        $radio6Check = 1;
        $radio6 = $_POST['expired'];
    }
//check date applied
    if (empty($_POST['app-date'])) {
        $appDateCheck = 0;
    } else {
        $appDateCheck = 1;
        $appDate = $_POST['app-date'];
    }
//check follow-up date
    if (empty($_POST['app-date-follow'])) {
        $appDateFollowCheck = 0;
    } else {
        $appDateFollowCheck = 1;
        $appDateFollow = $_POST['app-date-follow'];
    }


//print out receipt page
    //radioSum variable calculates the num of checkboxes
    $radioSum += $radio1Check += $radio2Check += $radio3Check
        += $radio4Check += $radio5Check += $radio6Check;


    if ($employerNameCheck == 0 || $jobDescCheck == 0 || $appRoleCheck == 0 ||
        $radio1Check == 0 || $radioSum == 0 || $appDateCheck == 0 || $appDateFollowCheck == 0) {
        //display "incorrect page"
        echo "
          <html lang='en'>
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
        <p>Please fill out: employer's name, job description, role,
         1 radio button, date applied and date to follow up.</p>
         </body>
    </html>
         
         ";
    } else {
        //display "correct page"
        echo "
         <html lang='en'>
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
        <p>Thank you for your entry of: $employerName, $jobDesc, and $appRole</p>
        </body>
        </html>
        ";
    }
}