<?php

error_reporting(0);

$employerName = $employerNameCheck = "";
$jobDesc = $jobDescCheck = "";
$appRole = $appRoleCheck = "";
$appDate = $appDateCheck = "";
$appDateFollow = $appDateFollowCheck = "";
$radioButton=$radioButtonCheck="";
$notes = $_POST['Additional Notes Here'];

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
//check radio button "status"
    if(empty($_POST['status'])){
        $radioButtonCheck=0;
    }else{
        $radioButtonCheck=1;
        $radioButton = $_POST['status'];
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
    if ($employerNameCheck == 0 || $jobDescCheck == 0 || $appRoleCheck == 0 ||
        $radioButtonCheck == 0 || $appDateCheck == 0 || $appDateFollowCheck == 0) {
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

        //connect to db
        require '/home/teambeet/dbConnect.php';
        //define insert query
        $sql = "INSERT INTO `application_data` (`aid`, `employer_name`, `job_description`, `role`, `status`, `date_applied`, `date_followup`, `notes`) VALUES (NULL, '', '', '', '', '', '', '')";

        //quick test
        /*
        $emp = $_POST['app-employer'];
        $pos = $_POST['app-job-desc'];
        $rol = $_POST['app-role'];
        $rad = $_POST['status'];
        $date = $_POST['app-date'];
        $dateF = $_POST['app-date-follow'];
        */

        $stmt = mysqli_prepare($cnxn, $sql);
        //mysqli_stmt_bind_param($stmt, "ssssss" ,$emp,$pos, $rol, $rad, $date, $dateF, $notes);

        mysqli_stmt_bind_param($stmt, "ssssss" ,$employerName,$jobDesc, $appRole, $radioButton, $appDate, $appDateFollow, $notes);
        $result = mysqli_stmt_execute($stmt);

    if(result)
    {
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
          <!-- in the <p> I added the radio button appdate and follow date and notes for debugging purposes. we can remove this later ~Everett -->
        <p>Thank you for your entry of: $employerName, $jobDesc, and $appRole, $radioButton with a start date of $appDate with a follow up $appDateFollow. $notes</p>
        </body>
        </html>
        ";
    }
    else
    {
        //log the error but this seems to be redundant due to the checks we make at the top of this php file -E
        echo "Error: " . mysqli_error($cnxn);
    }
    //close the mysqli
      mysqli_close($cnxn);
    }
}