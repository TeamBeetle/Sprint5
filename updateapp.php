<?php

error_reporting(0);
$id = $_POST['update-id'];
$employerName = $employerNameCheck = 0;
$jobDesc = $jobDescCheck = 0;
$appRole = $appRoleCheck = 0;
$appDate = $appDateCheck = 0;
$appDateFollow = $appDateFollowCheck = 0;
$radioButton=$radioButtonCheck=0;

//echo "<h1>" . $_POST['app-employer'] .$_POST['app-job-desc'] . $_POST['app-role'] . $_POST['update-status'] . $_POST['app-date'] .$_POST['app-date-follow'] . $_POST['updateNotes'] . $id = $_POST['update-id'] . "</h1>";
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
    if(empty($_POST['update-status'])){
        $radioButtonCheck=0;
    }else{
        $radioButtonCheck=1;
        $radioButton = $_POST['update-status'];
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
    //check for notes
    if(!empty($_POST['updateNotes']))
    {
        $notes = $_POST['updateNotes'];
    }
    else
    {
        $notes = "";
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
          <h1>ERROR!</h1>
          <p>Please fill out: employer's name, job description, role,
             1 radio button, date applied and date to follow up.</p>
         </div>
         </body>
    </html>
         
         ";
    } else {
        //display "correct page"

        //connect to db
        require '/home/teambeet/dbConnect.php';
        //define insert query
        $sql = "UPDATE `application_data` SET `employer_name` = ?, `job_description` = ?, `role` = ?, `status` = ?, `date_applied` = ?, `date_followup` = ?, `notes` = ? WHERE application_data.aid = ?";
        //gather notes + sanitizing notes
        //$notes = isset($_POST['Additional Notes Here']) ? $_POST['Additional Notes Here'] : '';
        //$notes = mysqli_real_escape_string($cnxn, $notes);


        //convert $appDate and $appDateFollow to be proper for sql
        $appDate = date('Y-m-d', strtotime($appDate));
        $appDateFollow = date('Y-m-d', strtotime($appDateFollow));

        $stmt = mysqli_prepare($cnxn, $sql);

        mysqli_stmt_bind_param($stmt,'sssssssi',$employerName,$jobDesc, $appRole,
            $radioButton, $appDate, $appDateFollow, $notes, $id);
        $result = mysqli_stmt_execute($stmt);

        if(result)
        {
            echo "
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
             <a class='nav-link' href='index.php'>Dashboard</a>
             </li>
            </ul>
            </div>
             <div id='toggleContainer' class='col-2'>
             <button type='button' class='btn toggle active-mode btn-light'>Light</button>
             <button type='button' class='btn toggle btn-dark'>Dark</button>
            </div>
          </nav>
          <!-- in the <p> I added the radio button appdate and follow date and notes for debugging purposes. we can remove this later ~Everett -->
          <div class='receiptPage center-items'>
          <h1>SUCCESS!</h1>
        <p>Thank you for your entry of: $employerName, $jobDesc, and $appRole, $radioButton 
        with a start date of $appDate with a follow-up $appDateFollow. $notes</p>
        
        <table id='receiptPageTable'>
    <tr class='receiptPageRow'>
      <td class='receiptPageData'>Employer Name</td>
      <td class='receiptPageData'>$employerName</td>
    </tr>
    <tr class='receiptPageRow'>
      <td class='receiptPageData'>Job Description</td>
      <td class='receiptPageData'>$jobDesc</td>
    </tr>
    <tr class='receiptPageRow'>
      <td class='receiptPageData'>Job Role</td>
      <td class='receiptPageData'>$appRole</td>
    </tr>
    <tr class='receiptPageRow'>
      <td class='receiptPageData'>Status</td>
      <td class='receiptPageData'>$radioButton</td>
    </tr>
    <tr class='receiptPageRow'>
      <td class='receiptPageData'>Date Applied</td>
      <td class='receiptPageData'>$appDate</td>
    </tr>
    <tr class='receiptPageRow'>
      <td class='receiptPageData'>Follow-UP Date</td>
      <td class='receiptPageData'>$appDateFollow</td>
    </tr>
    <tr class='receiptPageRow'>
      <td class='receiptPageData'>Notes</td>
      <td class='receiptPageData'>$notes</td>
    </tr>
  </table>   
        </div>
        </body>
        </html>
        ";
        }
        else
        {
            //log the error but this seems to be redundant due to the checks we make at the top of this php file -E
            echo "<p>Error: " . mysqli_error($cnxn) . "</p>";
            echo "<p> Connection Error: " . mysqli_connect_error() . "</p>";
        }
        //close the mysqli
        mysqli_close($cnxn);
    }
}