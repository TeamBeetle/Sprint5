<?php
    require '/home/teambeet/dbConnect.php';
    
    $inputText = $_POST['inputText'];

    // Process the input (in this example, just echoing it back)
    echo "You entered: " . $inputText;
    
    
    
    $sql = "DELETE FROM `student`
WHERE `sid` = '123-34-6123';";

    $sql2 = "INSERT INTO `student_bin`
SELECT *
FROM `student`
WHERE `sid` = '123-34-6123';";
        
    @mysqli_query($cnxn, $sql2);
    
    @mysqli_query($cnxn, $sql);
    echo "<h1>Deleted</h1>";
?>