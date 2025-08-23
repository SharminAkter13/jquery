<?php 
include("../connect.php");


if (isset($_POST['name'])) {
    $name = $connection->real_escape_string(trim($_POST['name']));
    
    $result = $connection->query("SELECT name FROM manufacturer WHERE name='$name'");
    
    if ($result && $result->num_rows > 0) {
        // name exists in database
        echo "<span style='color:green'>Name available</span>";
    } else {
        // name not found
        echo "<span style='color:red'>Name not available!</span>";
    }
}
?>
