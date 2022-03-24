<?php
$connection = mysqli_connect("localhost", "root", "", "notes_crud") or die("Connection Failed");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['usrno'])) {
        $usrno = $_GET['usrno'];
        $query = "SELECT `Title`, `Description` FROM `Notes data` WHERE Sr=$usrno";
        $query_execute = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($query_execute);
        print_r($row['title']);
        print_r($row['description']);
        print_r($row['Sr']);
    }
    if (isset($_POST['update'])) {
    }
}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Update</title>
</head>

<body>
    <div class="container">
        <h4>Update Your Notes</h4>
        <form action="show_data.php" method="POST">
            <div class="form-group mt-3">
                <label for="title" class="form-label">Notes Title</label>
                <input type="text" style="width: 350px;" class="form-control" id="title" name="title" maxlength="20" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group mt-3">
                <label for="description" class="form-label">Notes Description</label>
                <textarea class="form-control" style="width: 350px;" name="description" id="description" cols="30" rows="5" maxlength="254" required value="<?php echo $row['description']; ?>"></textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success" name="update">Update Note</button>
            </div>
        </form>
    </div>

</body>

</html>