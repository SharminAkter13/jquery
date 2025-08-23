<?php
include('connect.php');

if (isset($_POST['submit'])) {
    $m_name = $_POST['m_name'];
    $m_address = $_POST['m_address'];
    $m_contact = $_POST['m_contact'];
if ($connection->query("CALL insert_manufacturer('$m_name','$m_address','$m_contact')")) {
    echo "<h3 style='color:green;'>Manufacturer added successfully.</h3>";
} else {
    echo "<h3 style='color:red;'>Error: </h3>" . $connection->error;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white sh">
            <h5 class="mb-0">Add New Manufacturer</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="m_name" class="form-label"> Name :</label>
                    <input type="text" id="m_name" name="m_name" class="form-control" placeholder="Enter Manufacturer name" required>
                </div>
                 <div class="mb-3">
                    <label for="m_address" class="form-label"> Address :</label>
                    <input type="text" id="m_address" name="m_address" class="form-control" placeholder="Enter Address" required>
                </div>
                 <div class="mb-3">
                    <label for="m_contact" class="form-label">Contact :</label>
                    <input type="text" id="m_contact" name="m_contact" class="form-control" placeholder="Enter Contact" required>
                </div>
                <button type="submit" name="submit" class="btn btn-dark fw-bold text-white">Add Manufacturer</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
