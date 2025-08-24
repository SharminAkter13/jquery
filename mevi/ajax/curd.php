<?php
include("../connect.php");


// Save new manufacturer
if (isset($_POST['savem_name'])) {
    $name = $connection->real_escape_string(trim($_POST['savem_name']));
    $address = $connection->real_escape_string(trim($_POST['m_address']));
    $contact = $connection->real_escape_string(trim($_POST['m_contact']));

    $sql = "INSERT INTO manufacturer (m_name, m_address, m_contact) VALUES ('$name', '$address', '$contact')";
    if ($connection->query($sql) === TRUE) {
        echo "<span style='color:green'>Manufacturer saved successfully</span>";
    } else {
        echo "<span style='color:red'>Error: " . $connection->error . "</span>";
    }
}

// Update manufacturer
if (isset($_POST['upid'])) {
    $id = (int)$_POST['upid'];
    $name = $connection->real_escape_string(trim($_POST['name']));
    $address = $connection->real_escape_string(trim($_POST['add']));
    $contact = $connection->real_escape_string(trim($_POST['con']));

    $sql = "UPDATE manufacturer SET m_name='$name', m_address='$address', m_contact='$contact' WHERE id=$id";
    if ($connection->query($sql) === TRUE) {
        echo "<span style='color:green'>Manufacturer updated successfully</span>";
    } else {
        echo "<span style='color:red'>Error: " . $connection->error . "</span>";
    }
}

// Delete manufacturer
if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    $sql = "DELETE FROM manufacturer WHERE id=$id";
    if ($connection->query($sql) === TRUE) {
        echo "<span style='color:red'>Manufacturer deleted successfully</span>";
    } else {
        echo "<span style='color:red'>Error: " . $connection->error . "</span>";
    }
}
?>
