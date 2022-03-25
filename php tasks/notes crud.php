<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Notes App</title>
</head>

<body>
    <?php
    session_start();
    include "necessary.php";
    $connection = mysqli_connect("localhost", "root", "", "notes_crud") or die("Connection Failed");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "INSERT INTO `Notes_data`(`Title`, `Description`) VALUES ('$title','$description')";
        $query_execute = mysqli_query($connection, $query);
        if ($query_execute) {
            echo "<script>alert('Your Notes were added')</script>";
            // sleep(3);
            echo "<script>window.location = 'show_data.php'</script>";
            // header("Location:show_data.php");
            // echo '<div class="container alert alert-success alert-dismissible" role="alert">
            // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            // <strong>Success!</strong> Your Note was added!
            // </div>';
        } else {
            echo "<script>alert('Your Notes were not added')</script>";
            // echo '<div class="container alert alert-danger alert-dismissible fade show" role="alert">
            // <strong>ERROR!</strong> Your note was not added!
            // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>';
        }
    }
    ?>
    <div class="container mt-3">
        <h4>Add Your Notes</h4>
        <form action="" method="POST">
            <div class="form-group mt-3">
                <label for="title" class="form-label">Notes Title</label>
                <input type="text" style="width: 350px;" class="form-control" id="title" name="title" maxlength="20" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div>
            <div class="form-group mt-3">
                <label for="description" class="form-label">Notes Description</label>
                <textarea class="form-control" style="width: 350px;" name="description" id="description" cols="30" rows="5" required></textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success" name="addnote">Add Note</button>
            </div>
        </form>
    </div>
</body>

</html>