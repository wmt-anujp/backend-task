<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Update Page</title>
</head>

<body>
    <?php
    $usrno = $_GET['usrno'];
    if (isset($_GET['usrno'])) {
        $connection = mysqli_connect("localhost", "root", "", "notes_crud") or die("Connection Failed");
        $query = "SELECT `Title`, `Description` FROM `Notes data` WHERE Sr=" . $usrno . "";
        $query_execute = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($query_execute);
    }

    if (isset($_POST["update"])) {
        $husrno = $_POST["hidden_id"];
        $title = $_POST["Title"];
        $description = $_POST["Description"];
        $update_query = "UPDATE `Notes data` SET `Title`=" . $title . ",`Description`=" . $description . " WHERE `Sr`=" . $husrno . "";
        $update_query_execute = mysqli_query($connection, $update_query);
        if ($update_query_execute) {
            echo "<script>alert('Notes were updated')</script>";
            echo "<script>window.location='show_data.php'</script>";
        } else {
            echo "<script>alert('Notes were not update')</scrit>";
        }
    }
    ?>
    <div class="container mt-3">
        <h4>Update Your Notes</h4>
        <form action="update.php" method="POST">
            <input type="hidden" name="hidden_id" value="<?php echo $usrno; ?>">
            <div class="form-group mt-3">
                <label for="title" class="form-label">Notes Title</label>
                <input type="text" style="width: 350px;" class="form-control" name="Title" maxlength="20" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required value="<?php echo $row['Title']; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="description" class="form-label">Notes Description</label>
                <textarea class="form-control" style="width: 350px;" name="Description" cols="30" rows="5" required><?php echo $row['Description']; ?></textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success" name="update">Update Note</button>
            </div>
        </form>
    </div>
</body>

</html>