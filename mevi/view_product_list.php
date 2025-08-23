<?php
include('connect.php');
$sql1 = "SELECT * FROM product_view";
$result = mysqli_query($connection, $sql1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product with Manufacturer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h3 class="text-center mb-4">Product List</h4>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Manufacturer Name</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if ($result->num_rows > 0): ?>
                        <?php
                        $counter = 1;
                        while ($row = $result->fetch_assoc()):
                        ?> <tr>
                                <td><?= $counter++ ?></td>
                                <td><?= ($row['product_name']) ?></td>
                                <td><?= ($row['price']) ?> </td>
                                <td><?= ($row['name']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-danger">No products found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>