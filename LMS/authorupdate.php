<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_start();
    if (!isset($_SESSION['logged'])) {
        header('Location:login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="author_valid.js"></script>
    <title>Update Author Details</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection Failed");
    if (isset($_GET['aupid'])) {
        $aupid = $_GET['aupid'];
        $display_author_data_query = "SELECT `ID`, `First_Name`,`Last_Name`, `DOB`, `Gender`, `Address`, `Mobile`, `Description`, `Status` FROM `author` WHERE `ID`=$aupid";
        $display_author_data_query_execute = mysqli_query($conn, $display_author_data_query);
        $author_rows = mysqli_fetch_array($display_author_data_query_execute);
    }

    if (isset($_POST["updateauthor"])) {
        $hidden_aupid = $_POST['hidden_id'];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $mno = $_POST["mno"];
        $description = $_POST["description"];
        $status = $_POST["available"];
        if ($status == "on") {
            $status = 1;
        } else {
            $status = 0;
        }
        $update_author_query = "UPDATE `author` SET `First_Name`='$fname',`Last_Name`='$lname',`DOB`='$dob',`Gender`='$gender',`Address`='$address',`Mobile`='$mno',`Description`='$description',`Status`='$status' WHERE `ID`='$hidden_aupid'";
        $update_author_query_result = mysqli_query($conn, $update_author_query);
        if ($update_author_query_result) {
            echo "<script>alert('Author was updated')</script>";
            echo "<script>window.location = 'author.php'</script>";
        } else {
            echo "<script>alert('Author was not updated')</script>";
        }
    }
    ?>
    <!-- HTML Starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Library Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="dashboard.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="author.php">AUTHORS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book.php">BOOKS</a>
                    </li>
                </ul>
                <span class="nav-link" style="color: white;" id="navbarDropdown" role="button">Welcome <?php echo ($_SESSION["Username"]); ?></span>
                <a class="btn btn-outline-success" href="logout.php">Log Out</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h3 style="color: lightgreen;">Update Author</h3>
        <form method="POST" id="addauthorform" action="authorupdate.php">
            <input type="hidden" name="hidden_id" value="<?php echo $aupid; ?>">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" maxlength="15" value="<?php echo $author_rows['First_Name']; ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" value="<?php echo $author_rows['Last_Name']; ?>" id="lname" name="lname" maxlength="15" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date</label>
                <input type="date" class="form-control" value="<?php echo $author_rows['DOB']; ?>" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="me-3">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Male" <?php echo ($author_rows['Gender'] == 'Male') ? 'checked' : '' ?> type="radio" name="gender" id="mgender" required>
                    <label class="form-check-label" for="mgender">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="fgender" value="Female" <?php echo ($author_rows['Gender'] == 'Female') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="fgender">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" maxlength="100" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32) || (event.charCode>47) && (event.charCode<58)" required><?php echo $author_rows['Address']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="mno" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mno" value="<?php echo $author_rows['Mobile']; ?>" name="mno" maxlength="10" onkeypress="return (event.charCode > 48 && event.charCode < 58)" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" value="<?php echo $author_rows['Description']; ?>" name="description" maxlength="500" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div><label for="status" class="mb-1">Status:</label></div>
                    <div class="col-md-1">
                        <label for="unavailable">Unavailable</label>
                    </div>
                    <div class="col-md-1 mx-2 form-check form-switch">
                        <input class="form-check-input" <?php echo ($author_rows['Status'] == '1') ? 'checked' : '' ?> type="checkbox" role="switch" id="available" name="available">
                        <label class="form-check-label" for="available">Available</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success" name="updateauthor">Update Author</button>
            </div>
        </form>
    </div>
    <!-- HTML Ends -->
</body>

</html>