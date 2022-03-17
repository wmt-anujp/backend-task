<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced PHP</title>
</head>

<body>
    <?php
    include 'necessary.php';

    date_default_timezone_set("Asia/Kolkata");
    echo "<h2 style=color:lightgreen>Normal Printing current time</h2>";
    echo "Current time is: " . date("h/i/s A");
    echo "<h2 style=color:lightgreen>Showing date using strtotime function</h2>";
    $var1 = strtotime("16 March 2022 05:35pm");
    echo "Date is: " . date("d/m/Y h/i/s A", $var1);

    echo "<h2 style=color:lightgreen>File Handling</h2>";
    // echo readfile("oop.php");
    $fileread_var = fopen("oop.php", "r") or die("File not found");
    // while (!feof($fileread_var)) {
    //     echo fgets($fileread_var);
    // }
    fclose($fileread_var);

    echo "<h2 style=color:lightgreen>Create/Write Section:</h2>";
    // $myfile = fopen("temp.txt", "w") or die("Unable to open file!");
    // $txt = "Anuj Panchal\n";
    // fwrite($myfile, $txt);
    // $txt = "PS\n";
    // fwrite($myfile, $txt);
    // fclose($myfile);
    echo "<h2 style=color:lightgreen>File Upload</h2>";
    ?>
    <form action="uploads.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileupload" id="fileupload" required><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>