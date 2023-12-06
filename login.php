<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/navmenu.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
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
                    <li class="navlist-item"><a href="signup.php">Sign Up</a></li>
                    <li class="navlist-item"><a href="login.php">Log In</a></li>
                    <?php
                }
            ?>
        </ul>
    </nav>

    <div class="form-div">
        <form method="post" action="backend/loginaction.php">
        <?php
                if (isset($_SESSION['login_mssg'])) {
                    echo '<p style="font-weight: bold; color: red; text-align: center; margin: 0; padding: 10px;">'.$_SESSION['login_mssg'].'</p>'; 
                    unset($_SESSION['login_mssg']);
                }
            ?>
            <fieldset>
                <legend>Sign In</legend>    
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address">
                </div>

                
                <div class="form-group" style="display: flex;">
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="Password">
                    <span class="input-group-text" style="cursor: pointer;" onclick="passToggle(this)">View</span>
                </div>


                <div class="form-group" style="text-align: center; cursor: pointer;">
                    <!-- <input type="submit" value="Sign Up"> -->
                    <button class="btn btn-primary" type="submit" name="btn">Sign In</button>

                </div>
                
            </fieldset>
        </form>
    </div>
    <div class="footer">
        <p> &copy Emperor Xchange <b>All Rights Reserved 2023</b></p>
    </div>
    <script type="text/javascript">
         let status = 0;
        function passToggle(obj) {
           if (status == 0) {
            
            document.querySelector('#pass').setAttribute('type','text');
            obj.textContent = 'Hide';
            status = 1;
           }
    
           else {
            document.querySelector('#pass').setAttribute('type','password');
            obj.textContent = 'View';
            status = 0;
           }
        }
    </script>
</body>
</html>