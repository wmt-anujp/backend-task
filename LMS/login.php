<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>LMS Login</title>
    <link rel="stylesheet" href="login.css">
    <!-- <script language="javascript" type="text/javascript">
        window.history.forward();
    </script> -->
</head>

<body>
    <div class="center">
        <h2>LMS Login</h2>
        <form action="" method="POST">
            <div class=" txt_field">
                <input type="text" name="Email" maxlength="20" onkeypress="return (event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32) || (event.charCode>45 && event.charCode<58)" required>
                <span></span>
                <label>Email<span style="color: red;"> *<?php echo $email_errormsg; ?></span></label>
            </div>

            <div class="txt_field">
                <input type="password" name="pw" maxlength="16" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32) || (event.charCode>47 && event.charCode<58)" required>
                <span></span>
                <label>Password<span style="color: red;"> *<?php echo $password_errormsg; ?></span></label>
            </div>
            <input class="mb-5" type="submit" name="login" onclick="submit_data()" value="Login">
            <div class="container-fluid">
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                $Email = $Password = "";
                $email_errormsg = $password_errormsg = "";
                session_start();

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // if (empty($_POST["Email"])) {
                    //     $email_errormsg = "Email is Required";
                    // } else {
                    //     $Email = test_input($_POST["Email"]);
                    //     if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    //         $email_errormsg = "Invalid email format";
                    //     }
                    // }
                    // if (empty($_POST["pw"])) {
                    //     $password_errormsg = "Password is Required";
                    // } else {
                    //     $Password = test_input($_POST["pw"]);
                    //     $password_errormsg = "Enter valid password format";
                    //     // if(!filter_var($Password,FILTER_))
                    // }
                    function test_input($data)
                    {
                        $data = trim($data);
                        $data = htmlspecialchars($data);
                        $data = stripslashes($data);
                        return $data;
                    }
                    $_SESSION['logged'] = 'yes';
                    $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection Failed");
                    if ($_POST['login']) {
                        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
                        $Password = mysqli_real_escape_string($conn, $_POST['pw']);
                        $login_query = "SELECT * FROM `login` WHERE Email='$Email'";
                        $login_query_execute = mysqli_query($conn, $login_query);
                        $count = mysqli_num_rows($login_query_execute);
                        echo $Password;
                        echo "<br>";
                        if ($count == 1) {
                            while ($row = mysqli_fetch_assoc($login_query_execute)) {
                                echo $row['Password'];
                                if (password_verify($Password, $row['Password'])) {
                                    // $_SESSION["Email"] = $Email;
                                    header("Location:dashboard.php");
                                } else {
                                    echo "<div class='container-fluid alert alert-danger alert-dismissible fade show' role='alert'>
                                    <center><strong>Log-In Unsuccessfull! Please Enter Valid username or password </strong></center>
                                    </div>";
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>