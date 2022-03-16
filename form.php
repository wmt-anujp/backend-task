<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation using php</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $name = $email = $feedback = $website = "";
    $name_errormsg = $email_errormsg = $feedback_errormsg = $website_errormsg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $name_errormsg = "Name is Required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space are allowed";
            }
        }
        if (empty($_POST["email"])) {
            $email_errormsg = "Email is Required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input(($_POST["website"]));
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "Invalid URL";
            }
        }
        if (empty($_POST["feedback"])) {
            $feedback = "";
        } else {
            $feedback = test_input($_POST["feedback"]);
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        // $data=stripslashes($data);
        return $data;
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: <input type="text" name="name" required><span style="color: red;"> *<?php echo $name_errormsg; ?></span><br><br>
        E-mail: <input type="email" name="email" required><span style="color: red;"> *<?php echo $email_errormsg; ?></span><br><br>
        WebSite URL: <input type="text" name="website"><span><?php echo $website_errormsg; ?></span><br><br>
        Feedback: <textarea name="feedback"></textarea><br><br>
        <input name="submit" type="submit" value="Submit"><br><br>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        echo "OUTPUT<br>";
        echo "Welcome: " . $name . "<br>";
        echo "Your email address is: " . $email . "<br>";
        echo "URL you entered is: " . $website . "<br>";
        echo "Your feedback was: " . $feedback . "<br>";
    }
    ?>
</body>

</html>