<?php 
include("connect.php");


if(isset($_POST['disid'])) {	
    $disid = $connection->real_escape_string(trim($_POST['disid']));
    
    $result = $connection->query("SELECT id, name FROM districts WHERE id = '$disid'");
    
    while(list($id, $name) = $result->fetch_row()) {
        echo "<option value='$id'>$name</option>";
    }
}
?>
