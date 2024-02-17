<?php
error_reporting(0);

$userName=$userEmail=$userCohort="";
$internship=$job=$searching="";

$nameCheck = "";
$emailCheck="";
$cohortCheck="";

$seekingInternship=$seekingJob=$notSearching="";
$InterncheckBoxCount=$jobCheckBoxCount=$searchingCheckBoxCount="";

$checkboxSum="";
$userInerest=$userInerestCheck="";

//validates name
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['user-name'])){
        $nameCheck = 0;

    } else {
        $nameCheck = 1;
        $userName = $_POST['user-name'];

    }
//validates email
    if(empty($_POST['user-email'])){
        $emailCheck = 0;
    }else{
        $emailCheck = 1;
        $userEmail = $_POST['user-email'];
    }
//validates cohort
    if(empty($_POST['user-cohort'])){
        $cohortCheck = 0;
    }else{
        $cohortCheck = 1;
        $userCohort = $_POST['user-cohort'];
    }
//validate internship checkbox
    if(empty($_POST['internship'])){
        $InterncheckBoxCount = 0;
    }else{
        $seekingInternship="Seeking an Internship";
        $InterncheckBoxCount = 1;
    }
//validate job checkbox
    if(empty($_POST['job'])){
        $jobCheckBoxCount = 0;
    }else{
        $seekingJob="Seeking a Job";
        $jobCheckBoxCount = 1;
    }
//validate not searching checkbox
    if(empty($_POST['searching'])){
        $searchingCheckBoxCount=0;

    }else{
        $notSearching = "Not Actively Searching";
        $searchingCheckBoxCount = 1;

    }
//validate fields of interest
    if(empty($_POST['field-interests'])){
        $userInerestCheck = 0;
    }else{
        $userInerestCheck = 1;
        $userInerest = $_POST['field-interests'];
    }

}
$checkboxSum = ($InterncheckBoxCount + $jobCheckBoxCount + $searchingCheckBoxCount);
$userNameCap = ucfirst("$userName");

//displays "incomplete" form page
if($nameCheck == 0 || $emailCheck == 0 || $cohortCheck == 0 || $checkboxSum < 1){
    echo"
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
    <p>Please enter your name, email address, cohort number, and at least 1 checkbox must be selected.</p>
    </body>
    </html>
    ";
}else{
//displays "complete" form page
    //connect to db
    require '/home/teambeet/dbConnect.php';
    //define insert query
    $sql = "INSERT INTO `user_data` (`uid`, `user_name`, `user_email`, `user_cohort`, `user_seeking_internship`,
                       `user_seeking_job`, `user_not_seeking`, `user_interest`)
                VALUES (NULL,'','','','','','','')";

    $stmt = mysqli_prepare($cnxn, $sql);
    mysqli_stmt_bind_param($stmt,"ssssss",$userName,$userEmail,$userCohort,$seekingInternship,
        $seekingJob,$notSearching,$userInerest);
    $result = mysqli_stmt_execute($stmt);

if($result){

    echo"
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
 <p>Thank you for signing up $userNameCap, we will email you at $userEmail. 
    Welcome to Cohort $userCohort!!!</p>
</body>
</html> 
    ";
}else {
    echo "Error: " . mysqli_error($cnxn);
}
    mysqli_close($cnxn);
}


