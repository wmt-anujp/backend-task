<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="validate.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>LMS Login</title>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
</head>

<body>
    <div class="center">
        <h2>LMS Login</h2>
        <form method="POST" id="form">
            <div class=" txt_field">
                <input type="text" name="Email" maxlength="20" onkeypress="return (event.charCode > 63 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32) || (event.charCode>45 && event.charCode<58)" required placeholder="Email">
                <span></span>
                <!-- <label>Email<span style="color: red;"> *</span></label> -->
            </div>

            <div class="txt_field">
                <input type="password" name="pw" maxlength="16" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32) || (event.charCode>47 && event.charCode<58) || (event.charCode==13)" required placeholder="Password">
                <span></span>
                <!-- <label>Password<span style="color: red;"> *</span></label> -->
            </div>
            <input class="mb-5" type="submit" name="login" onclick="submit_data()" value="Login">
            <div class="container-fluid">
                <?php
                session_start();
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_SESSION['logged'] = 'yes';
                    $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection Failed");
                    if (isset($_POST['login'])) {
                        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
                        $Password = mysqli_real_escape_string($conn, $_POST['pw']);
                        $login_query = "SELECT * FROM `login` WHERE `Email`='$Email' AND `Password`='$Password'";
                        $login_query_result = mysqli_query($conn, $login_query);
                        $count = mysqli_num_rows($login_query_result);
                        if ($count == 1) {
                            while ($row = mysqli_fetch_assoc($login_query_result)) {
                                $_SESSION["Email"] = $Email;
                                $_SESSION["Username"] = $row['UserName'];
                                header("Location:dashboard.php");
                            }
                        } else {
                            echo "<div class='container-fluid alert alert-danger alert-dismissible fade show' role='alert'>
                            <center><strong>Log-In Unsuccessfull! Please Enter Valid Email or password </strong></center>
                            </div>";
                        }
                    }
                    mysqli_close($conn);
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>