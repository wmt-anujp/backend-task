<?php
    session_start();
    error_reporting(0);
    require '../LMS/config/config.php';
    if(strlen($_SESSION['alogin'])==0){
        header('location: admin_login.php');
    }
    else
    {
        if(isset($_GET['did'])){
            $did=$_GET['did'];
            $select="select * from books where book_id='$did'";
            $result=mysqli_query($conn,$select);
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_array($result))
                {
                    $imageurl=$_DIR_.'../LMS/bookimg/'.$row['book_image'];
                    if(file_exists($imageurl)){
                        unlink($imageurl);
                        $sql="DELETE FROM books WHERE book_id='{$did}'";
                        if(mysqli_query($conn,$sql)){
                            echo "<script>alert('Book is deleted!!!');</script>";
                            echo "<script>window.location='list-book.php'</script>";
                        }
                        else{
                            echo "<script>No data deleted!!</script>";
                        }
                    }
                }
            }
        }
        mysqli_close($conn);
    }
