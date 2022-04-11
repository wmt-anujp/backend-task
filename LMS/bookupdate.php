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
    <script src="book_valid.js"></script>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <title>Book Update Page</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection Failed");
    if (isset($_GET["bupid"])) {
        $bupid = $_GET["bupid"];
        $display_book_data_query = "SELECT `ID`, `Title`, `Pages`, `Language`, `Author`, `Cover_Image`, `ISBN_No.`, `Price`, `Description`, `Status` FROM `book` WHERE `ID`='$bupid'";
        $display_book_data_query_result = mysqli_query($conn, $display_book_data_query);
        $book_data_rows = mysqli_fetch_array($display_book_data_query_result);

        // -----------------------------------------------------

        $display_author_query = "SELECT `ID`, concat(`First_Name`,' ',`Last_Name`) as Name FROM `author`";
        $display_author_query_execute = mysqli_query($conn, $display_author_query);
    }

    if (isset($_POST["updatebook"])) {
        $hidden_bupid = $_POST['hidden_id'];
        $title = $_POST["title"];
        $pages = $_POST["pages"];
        $language = $_POST["language"];
        $author = $_POST["bookauthor"];
        $image = $_FILES['coverimg'];
        $isbn = $_POST["isbn"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $bookstatus = $_POST["available"];
        if ($bookstatus == "on") {
            $bookstatus = 1;
        } else {
            $bookstatus = 0;
        }
        $filename = $image["name"];
        $fileerror = $image["error"];
        $filetmp = $image['tmp_name'];
        $fileextension = explode(".", $filename);
        $fileextension_check = strtolower(end($fileextension));
        $fileextension_stored = array("png", "jpg", "jpeg");
        if (in_array($fileextension_check, $fileextension_stored)) {
            $filedestination = "upload/" . $filename;
            move_uploaded_file($filetmp, $filedestination);
        }
        $update_book_query = "UPDATE `book` SET `Title`='$title',`Pages`='$pages',`Language`='$language',`Author`='$author',`Cover_Image`='$filedestination',`ISBN_No.`='$isbn',`Price`='$price',`Description`='$description',`Status`='$bookstatus' WHERE `ID`='$hidden_bupid'";
        $update_book_query_result = mysqli_query($conn, $update_book_query);
        if ($update_book_query_result) {
            echo "<script>alert('Author was updated')</script>";
            echo "<script>window.location = 'book.php'</script>";
        } else {
            echo "<script>alert('Author was not updated')</script>";
        }
    }
    ?>
    <!-- php ends -->
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
    <div class="container mt-4">
        <h3 style="color: lightgreen;">Update Book</h3>
        <form method="POST" id="addbookform" enctype="multipart/form-data">
            <input type="hidden" name="hidden_id" value="<?php echo $bupid; ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title of Book</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="80" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode>47 && event.charCode<58) || (event.charCode==32)" value="<?php echo $book_data_rows['Title']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="pages" class="form-label">Pages of Book</label>
                <input type="text" class="form-control" id="pages" name="pages" maxlength="4" onkeypress="return (event.charCode>47 && event.charCode<58) || (event.charCode==32)" value="<?php echo $book_data_rows['Pages']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Language of Book</label>
                <input type="text" class="form-control" id="language" name="language" maxlength="10" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || (event.charCode==32)" value="<?php echo $book_data_rows['Language']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="bookauthor" class="form-label">Author of Book</label>
                <select class="form-select" name="bookauthor" id="bookauthor">
                    <option>Select the Author</option>
                    <?php
                    while ($display_author_row = mysqli_fetch_array($display_author_query_execute)) {
                        echo "<option value='$display_author_row[1]'>" . $display_author_row[1] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="coverimg" class="form-label">Cover Image of Book</label>
                <input type="file" class="form-control" name="coverimg" id="coverimg" required>
                <?php echo $book_data_rows['Cover_Image']; ?>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN Number of Book</label>
                <input type="text" class="form-control" id="isbn" name="isbn" maxlength="15" onkeypress="return (event.charCode > 48 && event.charCode < 58)" value="<?php echo $book_data_rows['ISBN_No.']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price of Book</label>
                <input type="text" class="form-control" id="price" name="price" maxlength="5" onkeypress="return (event.charCode > 48 && event.charCode < 58)" value="<?php echo $book_data_rows['Price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description of Book</label>
                <textarea class="form-control" name="description" id="description" maxlength="500" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32) || (event.charCode>47) && (event.charCode<58) || (event.charCode==46)" required><?php echo $book_data_rows['Description']; ?></textarea>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div><label for="status" class="mb-1">Status:</label></div>
                    <div class="col-md-1">
                        <label for="unavailable">Unavailable</label>
                    </div>
                    <div class="col-md-1 mx-2 form-check form-switch active">
                        <input class="form-check-input active" <?php echo ($book_data_rows['Status'] == '1') ? 'checked' : '' ?> type="checkbox" role="switch" id="available" name="available">
                        <label class="form-check-label" for="available">Available</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success " name="updatebook">Update Book</button>
            </div>
        </form>
    </div>
    <!-- HTML Ends -->
</body>

</html>