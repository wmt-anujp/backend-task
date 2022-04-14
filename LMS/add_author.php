<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_start();
    if (!isset($_SESSION['logged'])) {
        header('Location:login.php');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="author_valid.js"></script>
    <title>Adding Author Page</title>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection Failed");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $query = "INSERT INTO `author`(`First_Name`, `Last_Name`, `DOB`, `Gender`, `Address`, `Mobile`, `Description`, `Status`) VALUES ('$fname','$lname','$dob','$gender','$address','$mno','$description','$status')";
        $query_execute_result = mysqli_query($conn, $query);
        if ($query_execute_result) {
            echo "<script>alert('Author was added')</script>";
            echo "<script>window.location='author.php'</script>";
        } else {
            echo "<script>alert('Author was not added')</script>";
        }
    }
    ?>
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
        <form method="POST" id="addauthorform">
            <div class="mb-3">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" maxlength="15" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" maxlength="15" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="me-3">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="mgender" value="Male" required>
                    <label class="form-check-label" for="mgender">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="fgender" value="Female">
                    <label class="form-check-label" for="fgender">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" maxlength="100" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32) || (event.charCode>47) && (event.charCode<58)" required></textarea>
            </div>
            <div class="mb-3">
                <label for="mno" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mno" name="mno" maxlength="10" onkeypress="return (event.charCode > 48 && event.charCode < 58)" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="500" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div><label for="status" class="mb-1">Status:</label></div>
                    <div class="col-md-1">
                        <label for="unavailable">Unavailable</label>
                    </div>
                    <div class="col-md-1 mx-2 form-check form-switch active">
                        <input class="form-check-input active" type="checkbox" role="switch" id="available" name="available" checked>
                        <label class="form-check-label" for="available">Available</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success" name="addauthor">Add Author</button>
            </div>
        </form>
    </div>

</body>

</html>