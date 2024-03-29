<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['admin_status']))
    {
        $loginId = $_SESSION['id'];
        $loginStatus = $_SESSION['admin_status'];
        if($loginStatus == 1)
        {
            echo'
            <!DOCTYPE html>
            <html lang="en">
            <!-- Meta data -->
            <head>
                <meta charset="utf-8" >
                <meta name="viewport" content="width=device-width">
                <title>GRC ATT - Admin</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
                <link href="admin-page-styles.css?v=34" rel="stylesheet" type="text/css" />
            
                <!-- links and scripts related to the table functions -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
                <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
            </head>
            <!-- Page body -->
            <body>
            <!-- Nav Bar -->
            <nav class="navbar navbar-expand-lg navbar-dark navigation">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img id="grc-logo" src="images/GRC%20Logo.png" alt="Green River College Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style="color: aliceblue"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link add-application">Make Announcement</a>
                            </li>
                            <li class="nav-item">
                                <a class="contact-anchor contact nav-link">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log out</a>
                            </li>
                        </ul>
                    </div>
                    <div id="toggleContainer">
                        <button id="light-btn" type="button" class="btn toggle active-mode btn-light">Light</button>
                        <button id="dark-btn" type="button" class="btn toggle btn-dark">Dark</button>
                    </div>
                </div>
            </nav>
            <!-- Application Review Screen -->
            <div class="review-app-form d-flex align-items-center justify-content-center">
                <div class="review-app-close-button">
                    <p>X</p>
                </div>
                <div id="review-app-content">
                    <h1 id="app-review-header">Application Review</h1>
                    <div>User: <span id="app-review-user"></span></div>
                    <div>Employer: <span id="app-review-employer"></span></div>
                    <div>Job Description: <span id="app-review-job-desc"></span></div>
                    <div>Role: <span id="app-review-role"></span></div>
                    <div>Status: <span id="app-review-status"></span></div>
                    <div>Date Applied: <span id="app-review-date-applied"></span></div>
                    <div>Date to Follow-up: <span id="app-review-date-follow"></span></div>
                </div>
            </div>
            <!-- End Application Review -->
            
            <!-- ADD ANNOUNCEMENT FORM BEGINNING -->
            <div class="add-app-form d-flex align-items-center justify-content-center">
                <div class="app-close-button">
                    <p>X</p>
                </div>
                <div id="add-app-content" class="pop-up form-content form-content-app d-flex align-items-center justify-content-center">
                    <h1>Create Announcement</h1>
                    <form name="app-announcement-form" method="post" action="announcement.php">
                        <div>
                            <div class="col-12 add-app-input">
                                <label for="app-position">Position</label>
                                <input id="app-position" placeholder="Position Title" name="app-position" maxlength="255">
                                <span id="app-position-error" class="error">Please enter Applications Position.</span>
                            </div>
                            <div class="col-12 add-app-input">
                                <label for="app-employer">Employer</label>
                                <input id="app-employer" placeholder="Employer Title" name="app-employer" maxlength="255">
                                <span id="app-employer-error" class="error">Please enter the Employer.</span>
                            </div>
                            <div class="col-12 add-app-input">
                                <div class="form-checkboxes">
                                    <input type="radio" id = "app-intern-status" name="app-status" value = "app-status">
                                    <label for="app-intern-status">Seeking Internship</label>
                                    <input type="radio" id = "app-job-status" name="app-status" value = "app-status">
                                    <label for="app-job-status">Seeking Job</label>
                                </div>
                                <span id="app-status-error" class="error">Please select a status above.</span>
                            </div>
                            <div class="col-12 add-app-input">
                                <label for="app-link">Job URL</label>
                                <input id="app-link" placeholder="Link to job opportunity" name="app-link" maxlength="255">
                                <span id="app-link-error" class="error">Please enter a valid link to the application here.</span>
                            </div>
                            <div class="col-12 add-app-input">
                                <label for="app-recipient">Recipient Emails</label>
                                <input id="app-recipient" placeholder="Enter Recipient" name="app-recipient">
                                <span id="app-recipient-error" class="error">Please enter a valid email.</span>
                            </div>
                            <div class="col-12">
                                <label for="app-target">Target Audience</label>
                                <select id="app-target" name="app-target">
                                    <option value="users">All Users</option>
                                    <option value="cohort">Specific Cohort</option>
                                    <option value="admins">Admins Only</option>
                                </select>
                            </div>
                            <div class="col-12" id="cohort-specific">
                                <label for="app-cohort" >Specific Cohort</label>
                                <input id="app-cohort" name="app-cohort" type="number">
                                <span id="app-cohort-error" class="error">Please enter a cohort number (1-100)</span>
                            </div>
                            <div class="col-12 add-app-input">
                                <label for="app-info" class="col-12">Notes</label>
                                <textarea id="app-info" placeholder="Additional information" name="app-info" cols="20" rows="3" maxlength="600"></textarea>
                            </div>
                        </div>
                        <button type="submit" id="app-announce-button">Add Announcement</button>
                        <!--<p class="add-app-flavor-text">Be sure that all Applicant information is correct before clicking
                            <strong>Add Application</strong></p>-->
                        <p></p>
                    </form>
                </div>
            </div>
            <!-- END OF APPLICATION FORM -->
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
                            <label for="contact-name">Name
                                <span id="name-error" class="error"> Please enter a name.</span>
                            </label>
                            <input id="contact-name" placeholder="Your Name" name="user-name">
            
                            <label for="contact-email">Email
                                <span id="email-error" class="error"> Please enter your Email.</span>
                            </label>
                            <input id="contact-email" placeholder="Email" name="user-email">
            
                            <label for="contact-message">Message
                                <span id="message-error" class="error"> Please avoid < > ; and enter no more than 250 characters.</span>
                            </label>
                            <textarea id="contact-message" name="Message" placeholder="Message Us." maxlength="250"
                            ></textarea>
            
                            <button id="contact-submit" type="submit">Submit</button>
                            <p>***Please allow <strong>several</strong> days for a reply***</p>
                        </div>
                    </form>
                </div>
            </div>
            
            <!--end contact form-->
            
            <div class="delete-account-overlay d-flex align-items-center justify-content-center">
                <div class="delete-container">
                    <h2>Account Deletion</h2>
                    <h3>Are you sure you want to delete this account?</h3>
                    <p class="delete-description text-center">This action is permanent and will result in the account being removed from the database and all records</p>
                    <div class="delete-buttons">
                        <form action="softdelete.php" method="post">
                            <input id="delete-input" type="hidden" name="hidden-value" value="">
                            <button class="delete-button" type="submit">DELETE</button>
                        </form>
                        <button class="cancel-button">CANCEL</button>
                    </div>
                </div>
            </div>
            
            <div class="change-permissions-overlay d-flex align-items-center justify-content-center">
                <div class="change-permissions-container">
                    <h2>Change Permissions</h2>
                    <h3>Are you sure you want to change the permission for this account?</h3>
                    <p class="delete-description text-center">Changing user permissions may or may not negatively affect the system</p>
                    <div class="change-permission-buttons">
                        <form action="user-permission-level.php" method="post">
                            <input type="hidden" class="change-permission-level" name="hidden-value" value="">
                            <button class="change-permission-button" type="submit">CHANGE PERMISSIONS</button>
                        </form>
                        <button class="permissions-cancel-button">CANCEL</button>
                    </div>
                </div>
            </div>
            
            <!--MAIN DISPLAY WINDOWS(RECENT APPLICATIONS & REMINDERS)-->
            <div id="maindisplay" class="">
                <div class="appsdisplay">
                    <table id="apps-table" class="apps">
                        <th colspan = "5">
                            Recent Applications
                        </th>';
                        require '/home/teambeet/dbConnect.php';
                        echo "<script> let tempApplications = {}; </script>";
                        $sql = "SELECT * FROM application_data ORDER BY date_applied DESC";
                        $result = mysqli_query($cnxn, $sql);
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
                          <tr>
                              <td class='appinfo'>$dateApplied</td>
                              <td class='appinfo'>$employer $jobDesc</td>
                              <td class='appinfo'>$status</td>
                              <td class='recent-view-padding'>
                                    <button id='recentApplication_$aid' class='appinfo button view view-button '>view</button>
                              </td>
                          </tr>";
                        }
                        echo "<script>const recentApplications= tempApplications</script>";
                        //}
                    echo '</table>
                </div>
            
                <!-- Reminder Container -->
                <div id="announcementcontainer" class="announcmentcontrol">
                    <div class="container-title">RECENT ANNOUNCEMENTS</div>';
                    $sql = "SELECT * FROM announcement_data ORDER BY aid DESC";
                    $result = mysqli_query($cnxn, $sql);
                    //for($i = 0; $i < 5; $i++) //remove 4 loop later and add sliding scroll wheel
                    //{
                    while ($row = mysqli_fetch_assoc($result)) //while loop this instead of if and stop the for loop for all results -Everett
                    {
                        $aid = $row['aid'];
                        $position = $row['position'];
                        $employer = $row['employer'];
                        $seeking = $row['seeking'];
                        $url = $row['url'];
                        $notes = $row['notes'];
                        echo "
                                <div class='announcement-row'>
                                    <p>New $position position at $employer : $notes. Apply here: $url</p>
                                </div>
                                ";
                    }
                    //}
                echo '</div>
            </div>
            
            
            
            <!--
            <div id="bottombuttons">
                <div>
                </div>
            
                <div>
                    <button type="button" class="btn btn-outline-primary">ADD NEW APP</button>
            
                    <button type="button" class="btn btn-outline-success">UPDATE ACCOUNT SETTINGS</button>
                    <button type="button" class="btn btn-outline-info admin-login">ADMIN LOGIN</button>
                </div>
            
                <div>
                </div>
            </div> -->
            
            <div class="spacing">
            
            </div>
            
            <!--MAIN DISPLAY WINDOWS(RECENT APPLICATIONS & REMINDERS)-->
            <div class="container-fluid p-4 main-display">
            
                <div class="row gy-5 gx-5">
                    <div class="col-xl-8">
                        <div class="table-title">USERS</div>
                        <div class="user-display">
                            <table class="users table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center user-header">UserID</th>
                                    <th class="text-center user-header">Name</th>
                                    <th class="text-center user-header">Email</th>
                                    <th class="text-center user-header">Cohort</th>
                                    <th class="text-center user-header">Permission</th>
                                    <th class="text-center no-sort"></th>
                                </tr>
                                </thead>';
                                                                
                                $sql = "SELECT * FROM user_data ORDER BY uid DESC";
                                $result = mysqli_query($cnxn, $sql);
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                    $uid = $row['uid'];
                                    $name = $row['user_name'];
                                    $email = $row['user_email'];
                                    $cohort = $row['user_cohort'];
                                    $user_seeking_internship = $row['user_seeking_internship'];
                                    $user_seeking_job = $row['user_seeking_job'];
                                    $user_not_seeking = $row['user_not_seeking'];
                                    $user_interest = $row['user_interest'];

                                    $sql1 = "SELECT * FROM `login_info` WHERE `useremail` ='".$email."'";
                                    $result1 = mysqli_query($cnxn, $sql1);
                                    if($row1 = mysqli_fetch_assoc($result1)) {
                                        if ($row1['admin_status'] == 0) {
                                            $user_admin_status = 'User';
                                        } else if ($row1['admin_status'] == 1) {
                                            $user_admin_status = 'Admin';
                                        }
                                    }
            
            
                                    echo "
                                                   <tr class='table-user-info'>
                                                        <td class='student-id text-right'>$uid</td>
                                                        <td class='student-name text-right'>$name </td>
                                                        <td class='student-email text-right'>$email</td>
                                                        <td class='student-cohort text-right'>$cohort</td>
                                                        <td class='admin-status text-right'>$user_admin_status</td>
                                                    <td class='no-sort'>
                                                        <div class='view-info text-center bg-transparent'>
                                                            <button class='view-button'>View</button>
                                                        </div>
                                                    </td>
                                                </tr>";
                                }
                            echo '</table>
                        </div>
                    </div>
            
            
                    <div class="col-xl-4">
                        <div class="table-title">USER INFO</div>
                        <div class="user-details p-3">
                            <div class="row user-grid">
                                <div class="user-row col-md-6">
                                    <div class="category category-title">User-ID:</div>
                                    <p class="category category-value category-user-id"> </p>
                                </div>
                                <div class="user-row col-md-6">
                                    <div class="category category-title">User-name:</div>
                                    <p class="category category-value category-user-name"> </p>
                                </div>
                                <div class="user-row col-md-6">
                                    <div class="category category-title">User-email:</div>
                                    <p class="category category-value category-user-email"> </p>
                                </div>
                                <div class="user-row col-md-6">
                                    <div class="category category-title">Cohort:</div>
                                    <p class="category category-value category-user-cohort"> </p>
                                </div>
            
                                <div class="buttons col-md-12">
                                    <div class="info-button-change-permission">
                                        <button class="permissions-button">CHANGE PERMISSIONS</button>
                                    </div>
            
                                    <div class="info-button-delete">
                                        <form action="softdelete.php" method="POST">
                                            <input class="info-box-delete" type="hidden" name="hidden-value" value="">
                                            <div class="delete-account">
                                                <button class="delete-button" type="button" onClick="deleteUser()">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="spacing">
            
            </div>
            
            <footer>
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
            </footer>
            
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            
            <script src="admin.js?v=52"></script>
            </body>
            </html>';

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