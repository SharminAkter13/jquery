<?php

include("connect.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
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
    <table style="border-collapse:collapse" border="1" cellspacing="5">
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
            $data = $db->query("select * from manufacturer");
            while (list($_id, $_name, $_add,$_con) = $data->fetch_row()) {
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $(function() {
            // save data
            $("#save").click(function() {
                var email = $("#email").val();
                var pass = $("#pass").val();
                $.ajax({
                    url: "ajaxdata/crud_data.php",
                    type: "post",
                    data: ({
                        "saveemail": email,
                        "pass": pass
                    }),
                    success: function(data) {
                        $(".result").html(data);
                    }
                });
            });
            // save data
            $("#update").click(function() {
                var upid = $("#id").val();
                var email = $("#email").val();
                var pass = $("#pass").val();
                $.ajax({
                    url: "ajaxdata/crud_data.php",
                    type: "post",
                    data: ({
                        "upid": upid,
                        "email": email,
                        "pass": pass
                    }),
                    success: function(data) {
                        $(".result").html(data);
                    }
                });
            });

            // delete data
            $("#delete").click(function() {
                var id = $("#id").val();
                $.ajax({
                    url: "ajaxdata/crud_data.php",
                    type: "post",
                    data: ({
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
                var email = $(this).find("td:eq(1)").text();
                var pass = $(this).find("td:eq(2)").text();
                $("#id").val(id);
                $("#email").val(email);
                $("#pass").val(pass);
            });

            // reset form
            $("#reset").click(function() {
                $("#id").val("");
                $("#email").val("");
                $("#pass").val("");
                $(".result").html("<span style='color:red'>table reset</span>");
            });
        });
    </script>
</body>

</html>