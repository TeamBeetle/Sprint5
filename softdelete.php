<?php
require '/home/teambeet/dbConnect.php';

$receivedValue = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receivedValue = $_POST['hidden-value'];
}



$sql = "DELETE FROM `user_data` WHERE `uid` = '$receivedValue';";

$sql2 = "INSERT INTO `user_data_bin` SELECT * FROM `user_data` WHERE `uid` = '$receivedValue';";

$sql3 = "SELECT * FROM user_data WHERE uid = '$receivedValue'";
$result = @mysqli_query($cnxn, $sql3);
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
    $user_admin_status = $row['user_admin_status'];
}

@mysqli_query($cnxn, $sql2);

@mysqli_query($cnxn, $sql);


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
                        <h1>The user '$name' has been successfully deleted</h1>
                        <h3>Contact database administrator for restoration procedure</h3>
 
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
                              <td class='receiptPageData'>$user_admin_status</td>
                            </tr>
                          </table>
   
                     </div>
                </body>
            </html> 
            ";
?>