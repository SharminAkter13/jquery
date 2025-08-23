<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Welcome To Store Admin Panel</h1>

        <div class="row g-4">
            <!-- Add Manufacturer-->
            <div class="col-md-6">
                <?php
                require_once('manufacturer.php');
                ?>
            </div>
            <!-- Add Product -->
            <div class="col-md-6">
                <?php
                require_once('products.php');
                ?>
            </div>
            <div>
                <div>
                    <?php
                    require_once('delete.php');
                    ?>
                </div>
            </div>

            <!-- Product View  list -->
            <div class="row g-4">
                <!-- View All Products -->
                <div class="col-md-6">
                    <?php
                    require_once('view_product_list.php');
                    ?>
                </div>
                <!-- View Product > 5000 list -->
                <div class="col-md-6">
                    <?php
                    require_once('condition_table.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>