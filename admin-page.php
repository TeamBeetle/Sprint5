<!DOCTYPE html>
<html lang='en' data-bs-theme="light">
<!-- Meta data -->
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width">
    <title>GRC ATT - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="admin-page-styles.css?v=5" rel="stylesheet" type="text/css" />
</head>
<!-- Page body -->
<body>
<!-- Nav Bar -->
<nav class="navbar navbar-expand-lg navbar-dark navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
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
                <li class="Account-settings">
                    <a class="contact-anchor contact nav-link">Update Account Settings</a>
                </li>
            </ul>
        </div>
        <div id="toggleContainer">
            <button type="button" class="btn toggle active-mode btn-light">Light</button>
            <button type="button" class="btn toggle btn-dark">Dark</button>
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

<!-- ADD APPLICATION FORM BEGINNING -->
<div class="add-app-form d-flex align-items-center justify-content-center">
    <div class="app-close-button">
        <p>X</p>
    </div>
    <div id="add-app-content" class="pop-up form-content form-content-app d-flex align-items-center justify-content-center">
        <h1>Application Announcement</h1>
        <form name="app-announcement-form" method="post" action="vardump.php">
            <div>
                <div class="col-12 add-app-input">
                    <label for="app-position">Position</label>
                    <input id="app-position" placeholder="Position Title" name="app-position">
                    <span id="app-position-error" class="error">Please enter Applications Position.</span>
                </div>
                <div class="col-12 add-app-input">
                    <label for="app-employer">Employer</label>
                    <input id="app-employer" placeholder="Employer Title" name="app-employer">
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
                    <input id="app-link" placeholder="Link to job opportunity" name="app-link">
                    <span id="app-link-error" class="error">Please enter a valid link to the application here.</span>
                </div>
                <div class="col-12 add-app-input">
                    <label for="app-recipient">Recipient Emails</label>
                    <input id="app-recipient" placeholder="Enter Recipient" name="app-recipient">
                    <span id="app-recipient-error" class="error">Please enter a valid email.</span>
                </div>
                <div class="col-12 add-app-input">
                    <label for="app-info" class="col-12">Notes</label>
                    <textarea id="app-info" placeholder="Additional information" name="app-info" cols="20" rows="3"></textarea>
                </div>
            </div>
            <button type="submit" id="app-announce-button">Add Application</button>
            <p class="add-app-flavor-text">Be sure that all Applicant information is correct before clicking
                <strong>Add Application</strong></p>
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
                <textarea id="contact-message" name="Message" placeholder="Message Us."
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
            <button class="delete-button">DELETE</button>
            <button class="cancel-button">CANCEL</button>
        </div>
    </div>
</div>

<!--MAIN DISPLAY WINDOWS(RECENT APPLICATIONS & REMINDERS)-->
<div id="maindisplay" class="">
    <div class="appsdisplay">
        <table id="apps-table" class="apps">
            <th colspan = "5">
                Recent Applications
            </th>
            <?php
            require '/home/teambeet/dbConnect.php';
            echo "<script> let tempApplications = {}; </script>";
            $sql = "SELECT * FROM application_data ORDER BY date_applied DESC";
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
      <tr>
          <td class='appinfo'>$dateApplied</td>
          <td class='appinfo'>$employer $jobDesc</td>
          <td class='appinfo'>$status</td>
          <td id='recentApplication_$aid' class='appinfo button view'>view</td>
          <td class='appinfo'>delete</td>
      </tr>";
            }
            echo "<script>const recentApplications= tempApplications</script>";
            //}
            ?>
        </table>
    </div>

    <!-- Reminder Container -->
    <div id="announcementcontainer" class="announcmentcontrol">
        <div class="container-title">RECENT ANNOUNCEMENTS</div>
        <?php
        require '/home/teambeet/dbConnect.php';
        $sql = "SELECT * FROM announcement_data ORDER BY aid DESC";
        $result = @mysqli_query($cnxn, $sql);
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
        ?>
    </div>
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
                <table class="users">
                    <?php
                    require '/home/teambeet/dbConnect.php';
                    $sql = "SELECT * FROM user_data";
                    $result = @mysqli_query($cnxn, $sql);
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


                        echo "
                                       <tr class='table-user-info'>
                                            <td class='student-email'>$uid</td>
                                            <td class='student-name'>$name </td>
                                            <td class='student-email'>$email</td>
                                            <td class='student-email'>$cohort</td>

                                        <td>
                                            <div class='view-info'>
                                                View
                                            </div>
                                        </td>
                                         <td>
                                            <div class='delete-account'>
                                                Delete
                                            </div>
                                         </td>
                                    </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>


        <div class="col-xl-4">
            <div class="table-title">USER INFO</div>
            <div class="user-details p-3">
                <img class="col-md-6" src="images/user-profile.png" alt="empty-user-icon">

                <div class="row user-grid">
                    <div class="user-row col-md-6">
                        <div class="category category-title">User-ID: </div>
                        <p class="category category-value">885123</p>
                    </div>
                    <div class="user-row col-md-6">
                        <div class="category category-title">User-name: </div>
                        <p class="category category-value">John Doe</p>
                    </div>
                    <div class="user-row col-md-6">
                        <div class="category category-title">User-email: </div>
                        <p class="category category-value">johndoe@gmail.com</p>
                    </div>
                    <div class="user-row col-md-6">
                        <div class="category category-title">Last-Login Date: </div>
                        <p class="category category-value">09/09/2024</p>
                    </div>
                    <div class="user-row col-md-6">
                        <div class="category category-title">Account Created: </div>
                        <p class="category category-value">05/16/2024</p>
                    </div>
                    <div class="user-row col-md-6">
                        <div class="category category-title">Number of Applications: </div>
                        <p class="category category-value">23</p>
                    </div>

                    <div class="buttons col-md-12">
                        <div class="info-button-message">
                            MESSAGE
                        </div>

                        <div class="info-button-delete">
                            DELETE
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

<script src="admin.js?v=14"></script>
</body>
</html>
