<?php
    session_start();
    if (isset($_POST['btn'])) {
        require_once 'dblogin.php';

        if (!$cobj) {
            echo 'Unable to upload at this time';
            exit();
        }
        else {
            function sanStr($str) {
                return htmlentities(strip_tags(stripslashes($str)));
            }

            $pimage = $_FILES['pimage']['name'];
            $pname = sanStr($_POST['pname']); 

            $checkprod = mysqli_query($cobj, "select * from products where pname='$pname'");
            if (mysqli_num_rows($checkprod) != 0) {
                echo 'product already exists';
                exit();
            }

            mysqli_query($cobj, "insert into products(pname,pimage) values('$pname','$pimage')");

            $destination = '../products/'.$pimage;
            move_uploaded_file($_FILES['pimage']['tmp_name'], $destination);
            $_SESSION['upload_mssg'] = 'Product uploaded succussfully';
            header('Location: ../adminportal/uploadproduct.php');
            exit();
         }
        }
        else {
            header('Location: ../adminportal/uploadproduct.php');
            exit();
        
    }
?>