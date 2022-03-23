<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    session_start();
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    echo $target_file . "<br>";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . "." . "<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    if ($_FILES["fileupload"]["size"] > 500000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
            echo "Your file was uploaded!";
            // echo "<img src='$target_file' alt='Your Image' width='200' height='200'>";
        } else {
            echo "Sorry, there was an error while uploading your file.<br>";
        }
    }
    echo "Your favourite color is: " . $_SESSION["favcolor"] . "<br>";
    echo "Your facourite car is: " . $_SESSION["favcar"] . "<br>";
    ?>
</body>

</html>