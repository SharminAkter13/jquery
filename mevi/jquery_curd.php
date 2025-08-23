<?php
// This file assumes 'connect.php' exists and establishes a database connection
include("connect.php");
?>
<!doctype html>
<html lang="en">
<head>
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
            <h5 class="mb-0">Manufacturer Management</h5>
        </div>
        <div class="card-body">
            <span class="result mb-3 d-block"></span>
            <form method="POST" id="crudForm">
                <input type="hidden" id="id" name="id">

                <div class="mb-3">
                    <label for="m_name" class="form-label">Manufacturer Name</label>
                    <input type="text" id="m_name" name="m_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="m_address" class="form-label">Address</label>
                    <input type="text" id="m_address" name="m_address" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="m_contact" class="form-label">Contact</label>
                    <input type="text" id="m_contact" name="m_contact" class="form-control" required>
                </div>

                <div class="d-grid gap-2 d-md-flex">
                    <input type="button" class="btn btn-success" id="save" value="Save">
                    <input type="button" class="btn btn-primary" id="update" value="Update">
                    <input type="button" class="btn btn-danger" id="delete" value="Delete">
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
                // Use the correct column names from the database: 'id', 'name', 'address', 'contact_no'
                $data = $connection->query("SELECT * FROM manufacturer");
                while ($row = $data->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['contact_no']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script >
$(function () {
    // Save data via AJAX
    $("#save").click(function () {
        $.post("ajax/curd.php", {
            "savem_name": $("#m_name").val(),
            "m_address": $("#m_address").val(),
            "m_contact": $("#m_contact").val()
        }, function (data) {
            $(".result").html(data);
            location.reload();
        });
    });

    // Update data via AJAX
    $("#update").click(function () {
        $.post("ajax/curd.php", {
            "upid": $("#id").val(),
            "name": $("#m_name").val(),
            "add": $("#m_address").val(),
            "con": $("#m_contact").val()
        }, function (data) {
            $(".result").html(data);
            location.reload();
        });
    });

    // Delete data via AJAX
    $("#delete").click(function () {
        $.post("ajax/curd.php", { "id": $("#id").val() }, function (data) {
            $(".result").html(data);
            location.reload();
        });
    });

    // Fill form when clicking a table row
    // The jQuery code correctly maps table cell position to form field ID
    $(document).on("click", "#data tr", function () {
        // Simple debugging to see the values being captured
        console.log("Clicked row data:");
        console.log("ID:", $(this).find("td:eq(0)").text());
        console.log("Name:", $(this).find("td:eq(1)").text());
        console.log("Address:", $(this).find("td:eq(2)").text());
        console.log("Contact:", $(this).find("td:eq(3)").text());

        // Populate the form fields based on the cell position
        $("#id").val($(this).find("td:eq(0)").text());
        $("#m_name").val($(this).find("td:eq(1)").text());
        $("#m_address").val($(this).find("td:eq(2)").text());
        $("#m_contact").val($(this).find("td:eq(3)").text());
    });

    // Reset the form
    $("#reset").click(function () {
        $("form")[0].reset();
        $("#id").val("");
        $(".result").html("<span style='color:red'>Form reset</span>");
    });
});
</script>
</body>
</html>
