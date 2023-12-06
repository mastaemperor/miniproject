<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css" type=text/css>
    <link rel="stylesheet" href="css/uploadproduct.css" type=text/css>
</head>
<body>
    <div class="form-div">
        <form action="../backend/uploadaction.php" method="post" enctype="multipart/form-data">

        <?php
                if (isset($_SESSION['upload_mssg'])) {
                    if ($_SESSION['upload_mssg'] == 'Product uploaded succussfully') {
                       echo '<p style="font-weight: bold; color: green; text-align: center; margin: 0; padding: 10px;">'.$_SESSION['upload_mssg'].'</p>'; 
                       unset($_SESSION['upload_mssg']);
                    }
                    else {
                        echo '<p style="font-weight: bold; color: red; text-align: center; margin: 0; padding: 10px;">'.$_SESSION['upload_mssg'].'</p>'; 
                        unset($_SESSION['upload_mssg']);
                    }


                }
            ?>
            <fieldset>
                <legend>Upload Product</legend>
                <div class="form-group" style="display: flex;">
                    <span class="input-group-text">Product Image</span>
                    <input class="form-control" type="file" name="pimage" id="">
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="pname" id="" placeholder="Product Name">
                </div>

                <div class="form-group" style="text-align: center;">
                    <input class="btn btn-primary" type="submit" name="btn" id="" value="Upload">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>