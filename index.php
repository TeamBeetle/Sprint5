<!DOCTYPE html>
<html lang='en'>
<!-- Meta data -->
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="style.css?v=14" rel="stylesheet" type="text/css" />
    <!--extra for nav-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<!-- Page body -->
<body>
<!-- Return button, Team Beetle, Light Toggle -->
<!-- Nav Bar -->
<nav id="background" class="navbar navbar-expand-md  navbar-dark">

    <img id="grc-logo" class="navbar-brand"  src="images/GRC Logo.png" alt="Green River College Logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse links" id="collapsibleNavbar">

        <ul class="navbar-nav links">
            <li class="nav-item">
                <a class="nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link sign-up" href="#">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link add-application" href="#">Add Application</a>
            </li>
            <li class="nav-item">
                <a class="nav-link contact-anchor contact" href="#">Contact</a>
            </li>
            <li>
                <a class="nav-link update-account-settings" href="#">Update Account Settings</a>
            </li>
            <li>
                <a class="nav-link admin-login" href="#">Admin Login</a>
            </li>
        </ul>
    </div>
    <div id="toggleContainer" class="col-2">
        <button id="light-btn" type="button" class="btn toggle active-mode btn-light">Light</button>
        <button id="dark-btn" type="button" class="btn toggle btn-dark">Dark</button>
    </div>
</nav>

<!-- Sign up form -->

<!-- Reminder Review Screen -->
<div class="review-reminder-form d-flex align-items-center justify-content-center">
    <div class="review-reminder-close-button">
        <p>X</p>
    </div>
    <div id="review-reminder-content">
        <h1 id="review-reminder-header"></h1>
        <div>Description: <span id="review-reminder-description"></span></div>
    </div>
</div>
<!-- End Reminder Review -->
<!-- this container will remain hidden until the user clicks the sign-up button. -->


<div class="signup-form d-flex align-items-center justify-content-center">
    <div class="form-close-button">
        <p>X</p>
    </div>
    <div class="d-flex flex-row  row align-items-center justify-content-center img-form-container">
        <div class="sign-up-image col-lg-6">
            <img src="images/code-820275_1920.jpg" alt="computer screen with code">
        </div>
        <div class="pop-up form-content col-lg-6">
            <h2>Sign up for ATT</h2>
            <p>Create a free account or <a href="#">log in</a></p>

            <form name="signup-form" method="post" action="signup.php">
                <div class="form-user-info">
                    <label for="user-name">Name*
                        <span id="signup-name-error" class="error"> Please enter a name.*</span>
                    </label>
                    <input placeholder="Name" name="user-name" id="user-name">
                    <label for="user-email">Email*
                        <span id="signup-email-error" class="error"> Please enter an email.</span>
                    </label>
                    <input placeholder="Email" name="user-email" id="user-email">
                    <label for="user-name">Cohort*
                        <span id="signup-cohort-error" class="error"> Number between 1-100.</span>
                    </label>
                    <input type="number" placeholder="Cohort Number (1-100)" name="user-cohort" id="user-cohort-number">
                </div>
                <div class="form-checkboxes">
                    <input type="checkbox" id = "internship" name="internship" value = "seeking-internship">
                    <label for="internship">Seeking Internship</label>
                    <input type="checkbox" id = "job" name="job" value = "seeking-internship">
                    <label for="job">Seeking Job</label>
                    <input type="checkbox" id = "searching" name="searching" value = "seeking-internship">
                    <label for="searching">Not Actively Searching</label>
                </div>
                <label for="interests">Fields of Interest*
                    <span id="signup-interest-error" class="error"> Please enter at least one field.</span>
                </label>
                <input placeholder="Type fields followed by a comma" id="interests" name="field-interests">
                <button id="signup-submit" type="submit">Create account</button>
                <!--<p class="terms-conditions">By creating an account, you are agreeing to the <a href="https://www.greenriver.edu/conduct/">Terms and Conditions</a></p>
                <div class="full-width center-items">
                  <img src="images/GRC_Logo-Green.png" class="grc-form-logo" alt="Green River College Logo">
                </div>-->
            </form>
        </div>
    </div>
</div>
<!-- End sign up form html -->


<!-- ADD APPLICATION FORM BEGINNING -->

<div class="add-app-form">
    <div class="app-close-button">
        <p>X</p>
    </div>
    <div id="add-app-content" class="pop-up form-content">
        <h1>Add an Application</h1>
        <form name="add-app-form" method="post" action="addapp.php">
            <div class="">
                <div class="col-12 add-app-input">
                    <label for="app-employer">Employer*</label>
                    <input id="app-employer" placeholder="Employers Name" name="app-employer">
                    <span id="app-employer-error" class="error">Please enter a name.</span>
                </div>
                <div class="col-12 add-app-input">
                    <label for="app-job-desc">Job Description*</label>
                    <input id="app-job-desc" placeholder="Job Description" name="app-job-desc">
                    <span id="app-job-error" class="error">Please enter a job description.</span>
                </div>
                <div class="col-12 add-app-input">
                    <label for="app-role">Role*</label>
                    <input id="app-role" placeholder="Name of Role" name="app-role">
                    <span id="app-role-error" class="error">Please enter a role description.</span>
                </div>

                <div class="col-12 add-app-input">
                    <div class="row">
                        <div class="col-6 row">
                            <input type="radio" id="apply" name="status" value="apply" class="col-2 status">
                            <label for="apply" class="col-10">Need to Apply</label>
                        </div>
                        <div class="col-6 row">
                            <input type="radio" id="applied" name="status" value="applied" class="col-2 status">
                            <label for="applied" class="col-10">Applied</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6 row">
                            <input type="radio" id="interviewing" name="status" value="interviewing" class="col-2 status">
                            <label for="interviewing" class="col-10">Interviewing</label>
                        </div>
                        <div class="col-6 row">
                            <input type="radio" id="rejected" name="status" value="rejected" class="col-2 status">
                            <label for="rejected" class="col-10">Rejected</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 row">
                            <input type="radio" id="accepted" name="status" value="accepted" class="col-2 status">
                            <label for="accepted" class="col-10">Accepted</label>
                        </div>
                        <div class="col-6 row">
                            <input type="radio" id="expired" name="status" value="expired" class="col-2 status">
                            <label for="expired" class="col-10">Expired</label>
                        </div>
                    </div>
                </div>
                <span id="app-radio-error" class="error">Please Select One of the Status above.</span>
                <div class="col-12 add-app-input">
                    <label for="app-date">Date Applied*</label>
                    <input id="app-date" type="date" name="app-date">
                    <span id="app-date-error" class="error">Please Select A Date When Applied.</span>
                </div>
                <div class="col-12 add-app-input">
                    <label for="app-date-follow">Date to follow-up*</label>
                    <input id="app-date-follow" type="date" name="app-date-follow">
                    <span id="app-date-follow-error" class="error">Please Select A Follow Up Date</span>
                </div>
                <div class="add-app-notes">
                    <div class="col-12">
                        <label for="app-notes">Additional Notes</label>
                    </div>
                    <div class="col-12">
                        <textarea id="app-notes" name="appNotes" rows="2" cols="30"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" id="add-app-submit">Add Application</button>
            <!--<p class="add-app-flavor-text">Be sure that all Applicant information is correct before clicking
              <strong>Add Application</strong></p>-->
            <p></p>
        </form>
    </div>
</div>
<!-- END OF APPLICATION FORM -->
<!-- UPDATE APPLICATION FORM BEGINNING -->

<div class="update-app-form">
    <div class="update-app-close-button">
        <p>X</p>
    </div>
    <div id="update-app-content" class="pop-up form-content">

        <h1>Update an Application</h1>
        <form name="update-app-form" method="post" action="updateapp.php">

            <div class="">
                <div class="col-12 update-app-input">
                    <label for="update-app-employer">Employer*</label>
                    <input id="update-app-employer" placeholder="Employers Name" name="app-employer">
                    <span id="update-app-employer-error" class="error">Please enter a name.</span>
                </div>
                <div class="col-12 update-app-input">
                    <label for="update-app-job-desc">Job Description*</label>
                    <input id="update-app-job-desc" placeholder="Job Description" name="app-job-desc">
                    <span id="update-app-job-error" class="error">Please enter a job description.</span>
                </div>
                <div class="col-12 update-app-input">
                    <label for="update-app-role">Role*</label>
                    <input id="update-app-role" placeholder="Name of Role" name="app-role">
                    <span id="update-app-role-error" class="error">Please enter a role description.</span>
                </div>

                <div class="col-12 update-app-input">
                    <div class="row">
                        <div class="col-6 row">
                            <input type="radio" id="update-apply" name="update-status" value="apply" class="col-2 status">
                            <label for="update-apply" class="col-10">Need to Apply</label>
                        </div>
                        <div class="col-6 row">
                            <input type="radio" id="update-applied" name="update-status" value="applied" class="col-2 status">
                            <label for="update-applied" class="col-10">Applied</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6 row">
                            <input type="radio" id="update-interviewing" name="update-status" value="interviewing" class="col-2 status">
                            <label for="update-interviewing" class="col-10">Interviewing</label>
                        </div>
                        <div class="col-6 row">
                            <input type="radio" id="update-rejected" name="update-status" value="rejected" class="col-2 status">
                            <label for="update-rejected" class="col-10">Rejected</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 row">
                            <input type="radio" id="update-accepted" name="update-status" value="accepted" class="col-2 status">
                            <label for="update-accepted" class="col-10">Accepted</label>
                        </div>
                        <div class="col-6 row">
                            <input type="radio" id="update-expired" name="update-status" value="expired" class="col-2 status">
                            <label for="update-expired" class="col-10">Expired</label>
                        </div>
                    </div>
                </div>
                <span id="update-app-radio-error" class="error">Please Select One of the Status above.</span>
                <div class="col-12 update-app-input">
                    <label for="update-app-date">Date Applied*</label>
                    <input id="update-app-date" type="date" name="app-date">
                    <span id="update-app-date-error" class="error">Please Select A Date When Applied.</span>
                </div>
                <div class="col-12 update-app-input">
                    <label for="update-app-date-follow">Date to follow-up*</label>
                    <input id="update-app-date-follow" type="date" name="app-date-follow">
                    <span id="update-app-date-follow-error" class="error">Please Select A Follow Up Date</span>
                </div>
                <div class="update-app-notes">
                    <div class="col-12">
                        <label for="update-app-notes">Additional Notes</label>
                    </div>
                    <div class="col-12">
                        <textarea id="update-app-notes" name="updateNotes" rows="2" cols="30"></textarea>
                    </div>
                </div>
            </div>
            <input id="update-id" name="update-id" class="hidden" type="number">
            <button type="submit" id="update-app-submit">Update Application</button>
            <!--<p class="add-app-flavor-text">Be sure that all Applicant information is correct before clicking
              <strong>Add Application</strong></p>-->
            <p></p>
        </form>
    </div>
</div>
<!-- END OF UPDATE APPLICATION FORM -->

<!-- Contact Form-->
<div class="contact-form">
    <div class="contact-close-button">
        <p>X</p>
    </div>
    <div class="pop-up form-content-contact border">
        <h1>Contact Us Now</h1>
        <form name="contact-form" method="post"
              action="contact.php">
            <div class="form-user-info">
                <label for="contact-name">Name*
                    <span id="name-error" class="error"> Please enter a name.</span>
                </label>
                <input id="contact-name" placeholder="Your Name" name="user-name">

                <label for="contact-email">Email*
                    <span id="email-error" class="error"> Please enter your Email.</span>
                </label>
                <input id="contact-email" placeholder="Email" name="user-email">

                <label for="contact-message">Message
                    <span id="message-error" class="error"> Please avoid < > ; and enter no more than 250 characters.</span>
                </label>
                <textarea id="contact-message" name="Message" placeholder="Message Us."
                ></textarea>

                <button id="contact-submit" type="submit">Submit</button>
                <!--<p>***Please allow <strong>several</strong> days for a reply***</p>-->
            </div>

        </form>
    </div>

</div>

<!--end contact form-->

<!--MAIN DISPLAY WINDOWS(RECENT APPLICATIONS & REMINDERS)-->
<div id="maindisplay">
            <table id="apps-table" class="apps">
                <tr class="table-header">
                    <td id="recent-application-title" colspan = "6">
                        Recent Applications
                    </td>
                </tr>
                <tr id="recent-application-columns" class="table-header">
                    <td data-sortable="true" data-sorter="alphanum">Date Applied</td>
                    <td>Employer</td>
                    <td>Job Description</td>
                    <td>Status</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                require '/home/teambeet/dbConnect.php';
                echo "<script> let tempApplications = {}; </script>";
                $sql = "SELECT * FROM application_data WHERE user = 'Default User' ORDER BY date_applied DESC";
                $result = @mysqli_query($cnxn, $sql);
                //for($i = 0; $i < 5; $i++) //remove 4 loop later and add sliding scroll wheel
                //{
                while ($row = mysqli_fetch_assoc($result)) //while loop this instead of if and stop the for loop for all results -Everett
                {
                    $aid = $row['aid'];
                    $user = $row['user'];
                    $employer = $row['employer_name'];
                    $jobDesc = $row['job_description'];
                    $role = $row['role'];
                    $status = $row['status'];
                    $dateApplied = $row['date_applied'];
                    $dateFollowUp = $row['date_followup'];
                    $notes = $row['notes'];
                    echo "
          <script>tempApplications[`recentApplication_$aid`] = {
              id: `$aid`,
              user: `$user`,
              employer: `$employer`,
              job: `$jobDesc`,
              role: `$role`,
              status: `$status`,
              appDate: `$dateApplied`,
              followDate: `$dateFollowUp`,
              notes: `$notes`
          };</script>
           
     
          <tr class='entry'>
              <td class='appinfo'>$dateApplied</td>
              <td class='appinfo'>$employer</td>
              <td class='appinfo'>$jobDesc</td>
              <td class='appinfo'>$status</td>
              <td id='recentApplication_$aid' class='appinfo button update'>Update</td>
              <td class='appinfo'>delete</td>
          </tr>";
                }
                echo "<script>const recentApplications= tempApplications</script>";
                //}
                ?>
            </table>
    <!-- Reminder Container -->
    <div class="apps">
        <div id="remindercontainer" class="remindercontrol">
            <div class="container-title">REMINDERS</div>
            <?php
                require '/home/teambeet/dbConnect.php';
                //create initial script which instantiates an array and a variable for today's date.
                echo "<script> let tempAnnouncements = []; const date = new Date(); const miliToDay = 86400000; </script>";
                $sql1 = "SELECT * FROM application_data WHERE user = 'Default User' ORDER BY date_followup DESC";
                $result1 = @mysqli_query($cnxn, $sql1);
                //run while loop for application data
                while($row = mysqli_fetch_assoc($result1))
                {
                    $aid = $row['aid'];
                    $user = $row['user'];
                    $employer = $row['employer_name'];
                    $jobDesc = $row['job_description'];
                    $role = $row['role'];
                    $status = $row['status'];
                    $dateApplied = $row['date_applied'];
                    $dateFollowUp = $row['date_followup'];
                    $notes = $row['notes'];

                    //per loop in while loop we fill out the array given above.
                echo "
                    <script> tempAnnouncements.push({
                    title: 'Application: follow up with $employer in $dateFollowUp.',
                    description: '$employer $jobDesc, $role $status $notes $dateFollowUp',
                    dateOut: (new Date('$dateFollowUp').getTime() - date.getTime())/miliToDay 
                    });
                    </script>";

                } //end of while loop


                //BEGINNING OF LOOP 2 ELECTRIC BOOGALOO :)
                $sql2 = "SELECT * FROM announcement_data ORDER BY aid DESC";
                $result2 = @mysqli_query($cnxn, $sql2);

            while($row = mysqli_fetch_assoc($result2))
            {
                //time of upload needs to be not NAN at the moment. must convert
                $timeOfUpload = $row['TimeOfUpload'];
                $aid = $row['position'];
                $position = $row['position'];
                $employer = $row['employer'];
                $seeking = $row['seeking'];
                $url = $row['url'];
                $notes = $row['notes'];

                //per loop in while loop we fill out the array given above.
                echo "
                    <script> tempAnnouncements.push({
                    title: 'Recent announcement: $position with $employer posted on $timeOfUpload.',
                    description: '$employer $position, $seeking $url $notes',
                    dateOut: (new Date('$timeOfUpload').getTime() - date.getTime())/miliToDay 
                    });
                    </script>";

            } //end of while loop
                echo "<script> tempAnnouncements.sort(function(a,b) {return a.dateOut - b.dateOut});
                    let recentContainer = document.querySelector('#remindercontainer');
                    for(let i = 0; i < tempAnnouncements.length; i++)
                    {                
                        if (tempAnnouncements[i].dateOut <= 5 && tempAnnouncements[i].dateOut >= -5)
                        {
                            console.log('In if');
                            let html = `<div id='reminder` + i + `' class='reminder-row entry'>
                                    <p>`+ tempAnnouncements[i].title + `</p>
                               </div>`;
                            recentContainer.insertAdjacentHTML('beforeend', html);
                        }
                    }
        
                </script>";

                ?>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container-fluid">
        <h1>Green River College Application Tracking Tool</h1>
        <div class="row welcome-text">
            <div class="col-xl-3 welcome-text-box p-5">
                <h3>About</h3>
                <p>Welcome to the Green River College Software Development Application Tracking Tool (ATT).
                    The purpose of this tool is to provide a centralized place to track your job/internship applications that can be helpful in your application journey!
                </p>
            </div>
            <div class="col-xl-6 welcome-text-box p-5">
                <h3>More about the Software Development Department</h3>
                <p>Affordable tuition, instructors who care, access to tech industry mentors, and project-based learning make our
                    applied bachelor’s program a popular destination for computing majors throughout the Seattle-Tacoma region.
                    This degree prepares graduates for high-demand jobs such as software developer, web developer, software developer in test, and quality assurance (QA) analyst.</p>
                <a href="https://www.greenriver.edu/students/academics/degrees-programs/bachelor-of-applied-science/bachelors-in-software-development/">Learn more here</a>
            </div>

            <div class="col-xl-3 footer-resources p-5">
                <h3>Resources</h3>
                <ul>
                    <li><a href="https://www.linkedin.com/jobs">https://www.linkedin.com/jobs</a></li>
                    <li><a href="https://www.indeed.com/">https://www.indeed.com/</a></li>
                    <li><a href="https://www.devs.greenrivertech.net/">https://www.devs.greenrivertech.net/</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<script src="user.js?v=47"> </script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/extensions/natural-sorting/bootstrap-table-natural-sorting.min.js"></script>
</body>
</html>
