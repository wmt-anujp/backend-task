<!DOCTYPE html>
<?php
$cookie_name = "user1";
$cookie_value = "Anuj Panchal";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
session_start();
?>
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
    echo '<form action="uploads.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileupload" id="fileupload" required><br><br>
        <input type="submit" name="submit" value="submit">
    </form>';
    echo "<h2 style=color:lightgreen>Cookies</h2>";
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled.<br>";
    } else {
        echo "Cookies are disabled.<br>";
    }
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    // echo "<h2 style=color:lightgreen>SESSION</h2>";
    $_SESSION["favcolor"] = "blue";
    $_SESSION["favcar"] = "lamborgini";

    echo "<h2 style=color:lightgreen>Filter Section</h2>";
    $int = 260;
    $min = 1;
    $max = 200;
    if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === FALSE) {
        echo "Value is not in the mentioned range<br>";
    } else {
        echo "Value is within the mentioned range<br>";
    }
    $url = "http://localhost:8080/php-task/advanced.php";

    if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
        echo ("$url is a valid URL with a query string<br>");
    } else {
        echo ("$url is not a valid URL with a query string<br>");
    }

    echo "<h2 style=color:lightgreen>PHP JSON</h2>";
    $lang = array("JAVA", "JavaScript", "PHP");
    $age = array("AP" => 22, "PS" => 21, "PG" => 20);
    $jsonobj = '{"AP":22,"PS":21,"PG":20}';
    echo json_encode($lang) . "<br>";
    echo json_encode($age) . "<br>";
    $tmp_obj = json_decode($jsonobj);
    echo $tmp_obj->AP;
    ?>
</body>

</html>