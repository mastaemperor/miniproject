<?php
session_start();
    require_once 'backend/dblogin.php';
    $products = mysqli_query($cobj, "select * from products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Home</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/navmenu.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
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
               <!-- <ul class="subnav-list">
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
    <div class="slider">
        <div class="slide-item item-one">
            <h2>  &copy; Emperor Xchange
                We Love To Respond To Your Queries
                And Help You Succeed, Feel Free To Get In Touch With Us</h2>
        </div>
        <div class="slide-item item-two">
            <h2>Builds, Designs, And Maintains All Websites And Software Applications.
                Regulates Exposure To Business Stakeholders And Executive Management</h2>
        </div>
    </div>
    <div class="catalog">
        <?php
            if (mysqli_num_rows($products) != 0) {
                while ($prodrow = mysqli_fetch_assoc($products)) {
                    ?>
                        <figure class="cat">
                            <img src="products/<?php echo $prodrow['pimage']; ?>" alt="<?php echo $prodrow['pname']; ?>">
                            <figcaption><?php echo $prodrow['pname']; ?></figcaption>
                        </figure>
                    <?php
                }
            }
        ?>
        
        
       <!-- <figure class="cat">
            <img src="images/peppersoup.jpg" alt="Pepper Soup">
            <figcaption>Pepper Soup</figcaption>
        </figure>

        <figure class="cat">
            <img src="images/friedrice.jpg" alt="Pepper Soup">
            <figcaption>Fried Rice</figcaption>
        </figure>-->
    </div>


    <!--FAQ-->


<!--Footer-->
    <div class="footer">
        <p> &copy Emperor Xchange <b>All Rights Reserved 2023</b></p>
    </div>
</body>
</html>