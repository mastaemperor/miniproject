<?php
    session_start();
    if (isset($_POST['btn'])) {
        require_once 'dblogin.php';

        if(!$cobj) {
            echo 'Sorry.... Unable to login';
            exit();
        }
        else{
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $getadmin = mysqli_query($cobj, "select * from admintable where adminemail= '$email'");  
            $getuser = mysqli_query($cobj, "select * from signuptable where email='$email'");

            if(mysqli_num_rows($getadmin) == 1){
                $adminrow = mysqli_fetch_assoc($getadmin);
                if ($adminrow['adminpass'] == $pass) {
                    $_SESSION['user'] = $adminrow['adminname'];
                    header('Location: ../adminportal/adminportal.php');
                    exit();
                }
                else {
                    $_SESSION['login_mssg'] ='Wrong Password';
                    header('Location: ../login.php');
                    exit();
                }
            }

            if (mysqli_num_rows($getuser) == 1) {
                $userrow = mysqli_fetch_assoc($getuser);
                if ($userrow['pass'] == $pass) {
                    $_SESSION['user'] = $userrow['fname'];
                    header('Location: ../index.php');
                    exit();
                }
                else {
                    $_SESSION['login_mssg'] ='Wrong Password';
                    header('Location: ../login.php');
                    exit();
                }
            }
            else {
                $_SESSION['login_mssg'] ='Wrong email';
                header('Location: ../login.php');
                exit();
            }
        }
    }
?>