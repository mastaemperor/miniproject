<?php
    session_start();
    if (isset($_POST['btn'])) {
        require_once 'dblogin.php';

        if (!$cobj) {
            echo 'cannot signup at this time';
            exit();
        }
        else {
            $fname =  $_POST['fname'];
            $lname =  $_POST['lname'];
            $email =  $_POST['email'];
            $phone =  $_POST['phone'];
            $pass =  $_POST['pass'];
        

            $checkuser = mysqli_query($cobj, "select * from signuptable where email='$email'");
            if (mysqli_num_rows($checkuser) != 0) {
                $_SESSION['signup_mssg'] = 'A user already exists with this email';
                header('Location: ../signup.php');
                exit();
            }

            $query1 = "insert into signuptable";
            $query1 .="(fname,lname,email,phone,pass) ";
            $query1 .= "values('$fname', '$lname', '$email', '$phone', '$pass')";

            mysqli_query($cobj,$query1);
            
            $subject = 'Welcome On Board';
            $message = '<html><body style="font-family: verdana;">';
            $message .= '<p>Hi, '.ucfirst(strtolower($fname)).' </p>';
            $message .= '<p>Welcome to Emperor Arena</p>';
            $message .= '<p>Cheers</p>';
            $message .= '</body></html>';

            $headers = "From: info@emp217.com\r\n";
            $headers .= "Reply-To: info@emp217.com\r\n";
            $headers .= "NIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "X-Mailer: PHP/".phpversion();

            mail($email, $subject, $message, $headers);

            $_SESSION['signup_mssg'] = 'signup successful';
            header('Location: ../signup.php');
            exit();
        }
    }
        else {
            header('Location: ../signup.php');
            exit();
        
    }
?>