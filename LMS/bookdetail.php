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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- <script language="javascript" type="text/javascript">
        window.history.forward();
    </script> -->
    <title>Book's Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
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
                        <a class="nav-link" href="author.php">AUTHORS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="book.php">BOOKS</a>
                    </li>
                </ul>
                <span class="nav-link" style="color: white;" id="navbarDropdown" role="button">Welcome <?php echo ($_SESSION["Username"]); ?></span>
                <a class="btn btn-outline-success" href="logout.php">Log Out</a>
            </div>
        </div>
    </nav>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection Failed");
    if (isset($_GET["bid"])) {
        $book_id = $_GET["bid"];
        $bdetails_query = "SELECT * FROM `book` WHERE `ID`=$book_id";
        $bdetails_query_execute = mysqli_query($conn, $bdetails_query);
        $bdetails_query_rows = mysqli_fetch_array($bdetails_query_execute);
        if ($bdetails_query_rows['9'] == 1) {
            $bdetails_query_rows['9'] = "Available";
        } else {
            $bdetails_query_rows['9'] = "Unavailable";
        }
    }
    ?>
    <div class="container my-5">
        <h2 style="color: lightgreen;text-decoration: underline;" class="my-5">Details of <?php echo $bdetails_query_rows['1']; ?> Book</h2>
        <p>Title of Book is: <?php echo $bdetails_query_rows['1']; ?></p>
        <p>Pages of the books are: <?php echo $bdetails_query_rows['2']; ?></p>
        <p>Language of the book is: <?php echo $bdetails_query_rows['3']; ?></p>
        <p>Author of the book is: <?php echo $bdetails_query_rows['4']; ?></p>
        <p>Cover Image of the book is: <img class="mx-3" src="<?php echo $bdetails_query_rows['5']; ?>" height='100px' width='170px' alt="some.jpg"></p>
        <p>ISBN Number of the book is: <?php echo $bdetails_query_rows['6']; ?></p>
        <p>Price of the book is: <?php echo $bdetails_query_rows['7']; ?></p>
        <p>Description of the book is: <?php echo $bdetails_query_rows['8']; ?></p>
        <p>Status of the book is: <?php echo $bdetails_query_rows['9']; ?></p>
    </div>
</body>

</html>