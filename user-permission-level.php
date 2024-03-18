<?php
session_start();
require '/home/teambeet/dbConnect.php';

$receivedValue = '';
if(isset($_SESSION['id']) && isset($_SESSION['admin_status']))
{
    $loginId = $_SESSION['id'];
    $loginStatus = $_SESSION['admin_status'];
    if($loginStatus == 1)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $receivedValue = $_POST['hidden-value'];
        }
        $sql_get_user_data = "SELECT * FROM user_data WHERE uid=".$receivedValue.";";
        $temp = mysqli_query($cnxn, $sql_get_user_data);
        $temp = mysqli_fetch_assoc($temp);
        $uid = $temp['uid'];
        $name = $temp['user_name'];
        $email = $temp['user_email'];
        $cohort = $temp['user_cohort'];
        $user_seeking_internship = $temp['user_seeking_internship'];
        $user_seeking_job = $temp['user_seeking_job'];
        $user_not_seeking = $temp['user_not_seeking'];
        $user_interest = $temp['user_interest'];

        // Queries
        $sql_check_permission_level = "SELECT `admin_status` FROM `login_info` WHERE `useremail` = ".$email.";";
        $sql_make_admin = "UPDATE `login_info` SET `admin_status` = 1 WHERE `useremail` = ?";
        $sql_remove_admin = "UPDATE `login_info` SET `admin_status` = 0 WHERE `useremail` = ?";

        // query to check and save the current admin status
        $current_permission_query = mysqli_query($cnxn, $sql_check_permission_level);

        $permission_column = mysqli_fetch_assoc($current_permission_query);

        $current_permission_level = $permission_column['user_admin_status'];

        if ($current_permission_level['admin_status'] == 1) {
            $execute = mysqli_prepare($cnxn, $sql_remove_admin);
            mysqli_stmt_bind_param($execute, "s", $email);
            $result = mysqli_stmt_execute($execute);
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
                                <h1>The user '$name' has been removed as Admin</h1>
                                <h3>User-ID: $uid</h3>
         
                                   <table id='receiptPageTable'>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Name</td>
                                      <td class='receiptPageData'>$name</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Email</td>
                                      <td class='receiptPageData'>$email</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Cohort Number</td>
                                      <td class='receiptPageData'>$cohort</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Seeking1</td>
                                      <td class='receiptPageData'>$user_seeking_internship</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Seeking2</td>
                                      <td class='receiptPageData'>$user_seeking_job</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Seeking3</td>
                                      <td class='receiptPageData'>$user_not_seeking</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Fields of interest</td>
                                      <td class='receiptPageData'>$user_interest</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Permissions</td>
                                      <td class='receiptPageData'>Admin -> User</td>
                                    </tr>
                                  </table>
           
                             </div>
                        </body>
                    </html> 
                ";
        } elseif ($current_permission_level['admin_status'] == 0) {
            $execute = mysqli_prepare($cnxn, $sql_make_admin);
            mysqli_stmt_bind_param($execute, "s", $email);
            $result = mysqli_stmt_execute($execute);
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
                                <h1>The user '$name' has been added as Admin</h1>
                                <h3>User-ID: $uid</h3>
         
                                   <table id='receiptPageTable'>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Name</td>
                                      <td class='receiptPageData'>$name</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Email</td>
                                      <td class='receiptPageData'>$email</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Cohort Number</td>
                                      <td class='receiptPageData'>$cohort</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Seeking1</td>
                                      <td class='receiptPageData'>$user_seeking_internship</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Seeking2</td>
                                      <td class='receiptPageData'>$user_seeking_job</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Seeking3</td>
                                      <td class='receiptPageData'>$user_not_seeking</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Fields of interest</td>
                                      <td class='receiptPageData'>$user_interest</td>
                                    </tr>
                                    <tr class='receiptPageRow'>
                                      <td class='receiptPageData'>Permissions</td>
                                      <td class='receiptPageData'>User -> Admin</td>
                                    </tr>
                                  </table>
           
                             </div>
                        </body>
                    </html> 
                ";
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