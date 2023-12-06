<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Signup</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/navmenu.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link rel="shortcut icon" href="../images/1.png" type="image/x-icon">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.mynav-toggle').on('click', function() {
                $('.nav-list').toggleClass('toggle-menu')
            })
        });
    </script>

</head>
<body>
    <nav class="navmenu">
        <div class="mynav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="nav-logo">
            <img src="images/middleman.png" alt="Mini Project Logo">
        </div>
        <ul class="nav-list">
            <li class="navlist-item"><a href="index.php">Home Page</a></li>
            
            <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <li class="navlist-item"><a href="backend/logout.php">Log Out</a></li>
                    <?php
                }
                else {
                    ?>
                    <li class="navlist-item active"><a href="signup.php">Sign Up</a></li>
                    <li class="navlist-item"><a href="login.php">Log In</a></li>
                    <?php
                }
            ?>
        </ul>
    </nav>
    <div class="form-div">
        <form method="post" action="backend/signupaction.php">
            <?php
                if (isset($_SESSION['signup_mssg'])) {
                    if ($_SESSION['signup_mssg'] == 'signup successful') {
                       echo '<p style="font-weight: bold; color: green; text-align: center; margin: 0; padding: 10px;">'.$_SESSION['signup_mssg'].'</p>'; 
                       unset($_SESSION['signup_mssg']);
                    }
                    else {
                        echo '<p style="font-weight: bold; color: red; text-align: center; margin: 0; padding: 10px;">'.$_SESSION['signup_mssg'].'</p>'; 
                        unset($_SESSION['signup_mssg']);
                    }


                }
            ?>
            <fieldset>
                <legend>Sign Up</legend>
                <div class="form-group">
                    <input class="form-control" type="text" name="fname" placeholder="First Name">
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="lname" placeholder="Last Name">
                </div>

                
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address">
                </div>

                
                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="Phone Number">
                </div>

                
                <div class="form-group">
                    <input class="form-control" id="pass1" type="password" name="pass" placeholder="Password" onchange="return passCheck()">
                </div>

                
                <div class="form-group">
                    <input class="form-control" id="pass2" type="Confirn password" name="" placeholder="Confirm Password" onchange="return passCheck()">
                </div>

                <div class="form-group" style="text-align: center; cursor: pointer;">
                    <!-- <input type="submit" value="Sign Up"> -->
                    <button class="btn btn-primary" name="btn" type="submit">Sign Up</button>
                </div>
                
            </fieldset>
        </form>
    </div>
    <div class="footer">
        <p> &copy Emperor Xchange <b>All Rights Reserved 2023</b></p>
    </div>


    <script type="text/javascript">
        function passCheck() {
            let p1 = document.querySelector('#pass1');
            
            let p2 = document.querySelector('#pass2');

            if (p1 != '' && p2 != '') {
                if (p1 != p2) {
                    alert('Paassword mismatch');
                    return false;
                }
                else {
                    return true;
                }
            }
        }
    </script>
</body>
</html>