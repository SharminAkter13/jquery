<?php
include("connect.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD with jQuery</title>
</head>

<body>


    <span class="result"></span>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white sh">
                <h5 class="mb-0">Add New Manufacturer</h5>
            </div>
            <div class="card-body">
                <form id="manufacturerForm" method="POST">
                    <input type="hidden" id="m_id" name="m_id">
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
                    <button type="button" class="btn btn-primary" id="save">Save</button>
                    <button type="button" class="btn btn-warning" id="update">Update</button>
                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                    <button type="button" class="btn btn-secondary" id="reset">Reset</button>

                </form>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Manufacturer Name</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody id="data">
            <?php
            $data = $connection->query("select * from manufacturer");
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <script type="text/javascript">
        $(function() {
            // save data
            $("#save").click(function() {
                var name = $("#m_name").val();
                var add = $("#m_address").val();
                var con = $("#m_contact").val();
                $.ajax({
                    url: "ajaxdata/jquery_crud.php",
                    type: "post",
                    data: ({
                        "action": "save",
                        "m_name": name,
                        "m_address": add,
                        "m_contact": con
                    }),
                    success: function(data) {
                        $(".result").html(data);
                    }
                });
            });
            // update data
            $("#update").click(function() {
                var upid = $("#m_id").val();
                var name = $("#m_name").val();
                var add = $("#m_address").val();
                var con = $("#m_contact").val();
                $.ajax({
                    url: "ajaxdata/jquery_crud.php",
                    type: "post",
                    data: ({
                        "action": "update",
                        "upid": upid,
                        "name": name,
                        "add": add,
                        "con": con
                    }),
                    success: function(data) {
                        $(".result").html(data);
                    }
                });
            });

            // delete data
            $("#delete").click(function() {
                var id = $("#m_id").val();
                $.ajax({
                    url: "ajaxdata/jquery_crud.php",
                    type: "post",
                    data: ({
                        "action": "delete",
                        "id": id
                    }),
                    success: function(data) {
                        $(".result").html(data);
                    }
                });
            });

            // select data
            $("#data tr").on("click", function() {
                var id = $(this).find("td:eq(0)").text();
                var name = $(this).find("td:eq(1)").text();
                var add = $(this).find("td:eq(2)").text();
                var con = $(this).find("td:eq(3)").text();
                $("#m_id").val(id);
                $("#m_name").val(name);
                $("#m_address").val(add);
                $("#m_contact").val(con);
            });

            // reset form
            $("#reset").click(function() {
                $("#m_id").val("");
                $("#m_name").val("");
                $("#m_address").val("");
                $("#m_contact").val("");
                $(".result").html("<span style='color:red'>form reset</span>");
            });
        });
    </script>
</body>

</html>
