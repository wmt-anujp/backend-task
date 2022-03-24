<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Showing Data</title>
</head>

<body>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "notes_crud") or die("Connection Failed");
    $query = "SELECT * FROM `Notes data`";
    $query_execute = mysqli_query($connection, $query);
    $count = mysqli_num_rows($query_execute);
    echo '<table class="table table-striped table-hover table-bordered my-4">
        <tr style="text-align:center">
            <th class="bg-success">Serial Number</th>
            <th class="bg-success">Title</th>
            <th class="bg-success">Description</th>
            <th class="bg-success">Actions</th>
        </tr>';
    while ($row = mysqli_fetch_assoc($query_execute)) {
        echo "<tr style='text-align:center'>
            <td>" . $row['Sr'] . "</td>
            <td>" . $row['Title'] . "</td>
            <td>" . $row['Description'] . "</td>
            <td><a class='btn btn-sm btn-primary' href='update.php?usrno=" . $row['Sr'] . "' style='text-decoration:none'>Update</a>
            <a class='btn btn-sm btn-secondary' href='delete.php?dsrno=" . $row['Sr'] . "' style='text-decoration:none'>Delete</a></td>
        </tr>";
    }
    echo '</table>';
    if (isset($_GET['dsrno'])) {
        $dsrno = $_GET['dsrno'];
        $connection = mysqli_connect("localhost", "root", "", "notes_crud") or die("Connection Failed");
        $query = "DELETE FROM `Notes data` WHERE Sr='$dsrno'";
        $query_execute = mysqli_query($connection, $query);
        if ($query_execute) {
            echo '<div class="container alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Your Note was deleted!
            </div>';
        }
    }
    ?>
</body>

</html>