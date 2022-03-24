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
            <th class="bg-success" scope="col">Sr. No.</th>
            <th class="bg-success" scope="col">Title</th>
            <th class="bg-success" scope="col">Description</th>
            <th class="bg-success" scope="col">Actions</th>
        </tr>';
    while ($row = mysqli_fetch_assoc($query_execute)) {
        echo "<tr style='text-align:center'>
            <td>" . $row['Sr'] . "</td>
            <td>" . $row['Title'] . "</td>
            <td>" . $row['Description'] . "</td>
            <td><button type='submit' class='update btn btn-sm btn-primary' name='update' id=" . $row['Sr'] . ">Update</button>
            <button type='submit' class='delete btn btn-sm btn-secondary' name='delete' id=" . $row['Sr'] . ">Delete</button></td>
        </tr>";
    }
    echo '</table>';
    ?>
</body>

</html>