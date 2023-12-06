<?php
    require_once '../backend/dblogin.php';

    $getadmin = mysqli_query($cobj, "select adminname from admintable");
    if (mysqli_num_rows($getadmin) != 0) {
        $adminuser = mysqli_fetch_assoc($getadmin);
        $adminname = $adminuser['adminname'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>We Highly Welcome You <?php echo $adminname; ?> </h1>
</body>
</html>