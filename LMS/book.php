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
    <div class="container m-4">
        <a class="btn btn-success" href="add_book.php">Add Book <i class="bi bi-plus-circle"></i></a>
    </div>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection Failed");
    ?>
    <div class="container my-4">
        <table class="table table-hover table-bordered" id="displaytable">
            <thead class="table-dark">
                <tr style="text-align:center">
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Pages</th>
                    <th scope="col">Language</th>
                    <th scope="col">Book Author</th>
                    <th scope="col">Cover Image</th>
                    <th scope="col">ISBN No.</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                $book_status_display = "";
                $book_display_query = "SELECT * FROM `book`";
                $book_display_query_execute = mysqli_query($conn, $book_display_query);
                while ($book_rows = mysqli_fetch_array($book_display_query_execute)) {
                    if ($book_rows["Status"] == 1) {
                        $book_status_display = "Available";
                    } else {
                        $book_status_display = "Unavailable";
                    }
                    echo "<tr style='text-align: center;'>
                    <td>" . $id . "</td>
                    <td>" . $book_rows["Title"] . "</td>
                    <td>" . $book_rows["Pages"] . "</td>
                    <td>" . $book_rows["Language"] . "</td>
                    <td>" . $book_rows["Author"] . "</td>
                    <td>" . $book_rows["Cover_Image"] . "</td>
                    <td>" . $book_rows["ISBN_No."] . "</td>
                    <td>" . $book_rows["Price"] . "</td>
                    <td>" . $book_rows["Description"] . "</td>
                    <td>" . $book_status_display . "</td>
                    <td>
                        <a class='btn btn-success' href='authorupdate.php'>Update</a>
                        <a class='btn btn-danger' href='delete.php'>Delete</a>
                    </td></tr>";
                    $id++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#displaytable').DataTable();
        });
    </script>
</body>

</html>

Date:29/03/2022
Project: WMT Training
-continue implementation of LMS
--implemented the List Author,Add Author with validation, List Book, Add Book With Validation