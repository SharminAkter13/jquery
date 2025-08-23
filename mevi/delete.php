<?php
include("connect.php");

if (isset($_POST['delman'])) {
    $mid = $_POST['manufacturer_id'];

    $connection->query("DELETE FROM manufacturer WHERE id = $mid");
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5  p-5 border shadow-black rounded">
        <form action="#" method="post">

            <label for="manufacturer_id" style="margin-right: 10px; font-size:16pt; font-weight:bold;">Manufacturer ID : </label>
            <select name="manufacturer_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <?php
                $cust = $connection->query("select * from manufacturer");
                while (list($_mid, $_mname) = $cust->fetch_row()) {
                    echo "<option value='$_mid'>$_mname</option>";
                }
                ?>
            </select>

            <input type="submit" name="delman" class="form-control bg-danger text-white fw-bold" value="Delete" />
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>