<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Home</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/navmenu.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/aboutus.css">
    <script src="js/accfaq.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
       // $(document).ready(function() {
         //   $('.mynav-toggle').on('click', function() {
           //     $('.nav-list').toggleClass('toggle-menu')
           // })
        //});

        function toggleMenu() {
            document.getElementById('nav-list').classList.toggle('toggle-menu')
        }
       </script>
</head>
<body>
    <nav class="navmenu">
        <div class="mynav-toggle" onclick ="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="nav-logo">
            <img src="images/middleman.png" alt="Logo">
        </div>


        <ul class="nav-list" id="nav-list">
            <li class="navlist-item active"><a href="index.php">Home Page</a></li> 
            <li class="navlist-item"><a href="services.php">Services</a>
              <!--  <ul class="subnav-list">
                    <li><a href="services.php#serv-one">Apply For A Loan</a></li>
                    <li><a href="services.php#serv-two">Apply For A Job</a></li>
                    <li><a href="services.php#serv-three">Apply For A Career</a></li>
                </ul> -->
            </li>  
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
<div class="responsive-container-block bigContainer">
  <div class="responsive-container-block Container bottomContainer">
    <div class="ultimateImg">
      <img class="mainImg" src="images/aboutus.jpg">
      <div class="purpleBox">
        <p class="purpleText">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget purus lectus viverra in semper nec pretium mus.
        </p>
        <img class="stars" src="images/5_stars.svg">
      </div>
    </div>
    <div class="allText bottomText">
      <p class="text-blk headingText">
        About Me
      </p>
      <p class="text-blk subHeadingText">
       EmperorCrib
      </p>
      <p class="text-blk description">
      Writing articles is hard, but making up designs is fun. I made this site so would be able to do both, i have to tip my hat to arte Marie Pom whom found a great deal of inapination, Under the hood of this site you find Textatem,
Nothing brings me more pinamure than making something out of notting. Even when the results am far from my ideal expectations, I find the whole ceremony of creativity completely enthraling
To like to think that I'm a very happy person, but find the art the spikes me thest is the sat. depressing ant. I love music by Maus post-apocalyptic fiction, and movie trailers that can make me squirt tears in under two minutes. Do figure
      </p>
      <a href="services.php" class="explore">
        View Services
      </a>
    </div>
  </div>
</div>
<!--Footer-->
<div class="footer">
        <p> &copy Emperor Xchange <b>All Rights Reserved 2023</b></p>
    </div>
</body>
</html>