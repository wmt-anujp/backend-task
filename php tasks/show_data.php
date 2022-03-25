<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Showing Data</title>
</head>

<body>
    <?php
    session_start();
    include "necessary.php";
    $connection = mysqli_connect("localhost", "root", "", "notes_crud") or die("Connection Failed");
    $query = "SELECT * FROM `Notes data`";
    $query_execute1 = mysqli_query($connection, $query);
    echo '<div class="container"><table class="table table-striped table-hover table-bordered my-4">
        <tr style="text-align:center">
            <th class="bg-success">Serial Number</th>
            <th class="bg-success">Title</th>
            <th class="bg-success">Description</th>
            <th class="bg-success">Actions</th>
        </tr>';
    while ($row = mysqli_fetch_assoc($query_execute1)) {
        echo "<tr style='text-align:center'>
            <td>" . $row['Sr'] . "</td>
            <td>" . $row['Title'] . "</td>
            <td>" . $row['Description'] . "</td>
            <td><a class='btn btn-sm btn-primary' href='update.php?usrno=" . $row['Sr'] . "' style='text-decoration:none'>Update</a>
            <a class='btn btn-sm btn-secondary' href='show_data.php?dsrno=" . $row['Sr'] . "' style='text-decoration:none'>Delete</a></td>
        </tr>";
        if (isset($_GET['dsrno'])) {
            $_SESSION["dsrno"] = $_GET['dsrno'];
            $connection = mysqli_connect("localhost", "root", "", "notes_crud") or die("Connection Failed");
            $query = "DELETE FROM `Notes data` WHERE Sr=" . $_SESSION["dsrno"] . "";
            $query_execute2 = mysqli_query($connection, $query);
            if ($query_execute2) {
                echo '<div class="container alert alert-danger" role="alert">
                <button type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> Note was deleted!
                </div>';
                sleep(1);
            } else {
                echo "<script>alert('Notes were not deleted')</script>";
            }
        }
    }
    echo '</table></div>';
    ?>
</body>

</html>