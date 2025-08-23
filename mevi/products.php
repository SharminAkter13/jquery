<?php
include('connect.php');

$manufacturer = $connection->query("SELECT * FROM manufacturer");

if (isset($_POST['add_product'])) {
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $mid = $_POST['id'];

    if ($connection->query("call insert_product ('$p_name', '$p_price', '$mid')")) {
        echo "<h3 style='color:green;'>Product added successfully.</h3>";
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
    <title>Products </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Add New Product</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="p_name" class="form-label">Product Name</label>
                        <input type="text" id="p_name" name="p_name" class="form-control" placeholder="Enter product name" required>
                    </div>

                    <div class="mb-3">
                        <label for="p_price" class="form-label">Price </label>
                        <input type="number" id="p_price" name="p_price" step="0.01" class="form-control" placeholder="Enter price" required>
                    </div>

                    <div class="mb-3">
                        <label for="manufacturer_id " class="form-label">Manufacturer</label>
                        <select id="manufacturer_id " name="id" class="form-select" required>
                            <option value="">-- Select Manufacturer --</option>
                            <?php while ($row = $manufacturer->fetch_assoc()): ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <button type="submit" name="add_product" class="btn btn-dark text-white fw-bold">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>