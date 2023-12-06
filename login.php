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
    <link rel="stylesheet" type="text/css" href="css/footer.css">
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
   <!--Footer-->
   <div class="footer">
      <div class="footer-row">
            <div class="footer-col">
                <h4>Info</h4>
                <ul class="links">
                    <li><a href="aboutus.php">About us</a></li>
                    <li><a href="service.php">Services</a></li>
                    <li><a href="login.php">Sign up</a></li>
                    <li><a href="signup.php">Sign in</a></li>
                </ul>
            </div> 

      <div class="footer-col">
                <h4>Explore</h4>
                <ul class="links">
                <li><a href="services.php#serv-one">Apply For A Loan</a></li>
                    <li><a href="services.php#serv-two">Apply For A Job</a></li>
                    <li><a href="services.php#serv-three">Apply For A Career</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Legal</h4>
                <ul class="links">
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Security</a></li>
                    <li><a href="">New uploads</a></li>
                    <li><a href="">Skills</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Newsletter</h4>
                    <p>
                        Subscribe to our newsletter for weekly 
                        dose of news, updates, helpful 
                        tips and exclusive offers
                    </p>
                    <form action="#">
            <input type="text" placeholder="Your email" required>
            <button type="submit">SUBSCRIBE</button>
          </form>
          <div class="icons">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
            <i class="fa-brands fa-github"></i>
          </div>
            </div>
      </div>
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