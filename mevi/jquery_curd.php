<?php
include("connect.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD with jQuery</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Add New Manufacturer</h5>
            </div>
            <div class="card-body">
                <span class="result mb-3 d-block"></span>
                <form method="POST">
                    <div class="mb-3">
                        <label for="id" class="form-label">Manufacturer ID</label>
                        <input type="number" id="id" name="id" class="form-control" placeholder="Enter Manufacturer ID" required>
                    </div>
                    <div class="mb-3">
                        <label for="m_name" class="form-label">Manufacturer Name</label>
                        <input type="text" id="m_name" name="m_name" class="form-control" placeholder="Enter Manufacturer name" required>
                    </div>
                    <div class="mb-3">
                        <label for="m_address" class="form-label">Address</label>
                        <input type="text" id="m_address" name="m_address" class="form-control" placeholder="Enter Address" required>
                    </div>
                    <div class="mb-3">
                        <label for="m_contact" class="form-label">Contact</label>
                        <input type="text" id="m_contact" name="m_contact" class="form-control" placeholder="Enter Contact" required>
                    </div>

                    <!-- Styled Button Group -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <input type="button" class="btn btn-success me-md-2" id="save" value="Save">
                        <input type="button" class="btn btn-primary me-md-2" id="update" value="Update">
                        <input type="button" class="btn btn-danger me-md-2" id="delete" value="Delete">
                        <input type="button" class="btn btn-secondary" id="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="mt-4">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Manufacturer Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody id="data">
                    <?php
                    $data = $connection->query("SELECT * FROM manufacturer");
                    while (list($_id, $_name, $_add, $_con) = $data->fetch_row()) {
                        echo "<tr>
                            <td>$_id</td>
                            <td>$_name</td>
                            <td>$_add</td>
                            <td>$_con</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Logic -->
    <script type="text/javascript">
        $(function () {
            // Save
            $("#save").click(function () {
                var name = $("#m_name").val();
                var add = $("#m_address").val();
                var con = $("#m_contact").val();
                $.ajax({
                    url: "ajax/curd.php",
                    type: "post",
                    data: {
                        "savem_name": name,
                        "m_address": add,
                        "m_contact": con
                    },
                    success: function (data) {
                        $(".result").html(data);
                    }
                });
            });

            // Update
            $("#update").click(function () {
                var upid = $("#id").val();
                var name = $("#m_name").val();
                var add = $("#m_address").val();
                var con = $("#m_contact").val();
                $.ajax({
                    url: "ajax/curd.php",
                    type: "post",
                    data: {
                        "upid": upid,
                        "name": name,
                        "add": add,
                        "con": con
                    },
                    success: function (data) {
                        $(".result").html(data);
                    }
                });
            });

            // Delete
            $("#delete").click(function () {
                var id = $("#id").val();
                $.ajax({
                    url: "ajax/curd.php",
                    type: "post",
                    data: {
                        "id": id
                    },
                    success: function (data) {
                        $(".result").html(data);
                    }
                });
            });

            // Table row click to fill form
            $("#data tr").on("click", function () {
                var id = $(this).find("td:eq(0)").text();
                var name = $(this).find("td:eq(1)").text();
                var add = $(this).find("td:eq(2)").text();
                var con = $(this).find("td:eq(3)").text();

                $("#id").val(id);
                $("#m_name").val(name);
                $("#m_address").val(add);
                $("#m_contact").val(con);
            });

            // Reset
            $("#reset").click(function () {
                $("#id").val("");
                $("#m_name").val("");
                $("#m_address").val("");
                $("#m_contact").val("");
                $(".result").html("<span style='color:red'>Form reset</span>");
            });
        });
    </script>
</body>

</html>
