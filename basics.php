<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>

<body>
    <h3>Using if_else, functions</h3>
    <form method="POST">
        <input type="number" name="num1" placeholder="Enter a value">
        <input type="number" name="num2" placeholder="Enter a value">
        <input type="submit" value="Click to Add" name="add"><br><br>
    </form>

    <?php

    if (isset($_POST["add"])) {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        echo "Addition of Two Number is: " . add($num1, $num2) . "<br><br>";
    }

    function add($n1, $n2)
    {
        return $n1 + $n2;
    }

    echo "<h3>Using if_elseif</h3>";
    date_default_timezone_set("Asia/Kolkata");
    $t = date("H");

    if ($t < "12") {
        echo "Good Morning";
    } elseif ($t < "20") {
        echo "Good afternoon";
    } else {
        echo "Good night";
    }
    echo "<br>";
    const x = "anuj";
    echo x . "<br>";

    echo "<h3>Using arrays,foreach loop</h3>";
    $colors = array("red", "green", "blue", "yellow", "orange", "purple", "brown", "violet", "maroon");

    foreach ($colors as $x => $value) {
        if ($x == 4) {
            break;
        }
        echo "$x=$value <br>";
    }
    echo "<h3>Switch Case</h3>";
    $favcolor = "blue";

    switch ($favcolor) {
        case "red":
            echo "Favorite color is red!";
            break;
        case "blue":
            echo "Favorite color is blue!";
            break;
        case "green":
            echo "Favorite color is green!";
            break;
        default:
            echo "You have different favorite color";
    }
    echo "<h3>Do While Loop</h3>";
    $x = 1;

    do {
        echo "The number is: $x <br>";
        $x++;
    } while ($x <= 5);

    echo "<h3>Using string functions</h3>";
    $string = "Anuj Panchal";
    echo "Length of string" . strlen($string) . "<br>";
    echo "Word Count of string is:" . str_word_count($string) . "<br>";
    echo "Reverse string is" . strrev($string) . "<br>";
    echo "Searching letter from position" . strpos($string, "Pa") . "<br>";
    echo "Replacing string" . str_replace("Pan", "shah", $string);

    echo "<h3>Using is_int,is_float,is_finite,isInfinite,is_NAN</h3>";
    $x = 5985;
    var_dump(is_int($x));
    echo "<br>";
    $y = 59;
    var_dump(is_float($y));
    echo "<br>";
    $x = 1.9e411;
    var_dump($x);
    echo "<br>is nan";
    $some = 8;
    var_dump(is_nan($some));
    ?>
</body>

</html>