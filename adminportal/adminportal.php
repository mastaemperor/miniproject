<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/adminportal.css">
</head>
<body>
    <div class="left-pane">
        <ul>
            <li><a href="viewsignups.php" target="admin-frame">View Sign Ups</a></li>
            <li><a href="uploadproduct.php" target="admin-frame">Upload Products</a></li>
            <li><a href="viewproduct.php" target="admin-frame">View Products</a></li>
            <li><a href="../backend/logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="display-div">
        <iframe src="default.php" name="admin-frame" frameborder="0"></iframe>
    </div>
</body>
</html>