<?php
    require_once '../backend/dblogin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <script src="../js/jquery.min.js"></script>
</head>
<body>
    <div>
        <?php
            $products = mysqli_query($cobj, "select * from products");
            if (mysqli_num_rows($products) != 0) {
                ?>
    <!--focus-->     <table class="table table-striped table-bordered">
                        <thead>
                        <tr><th>S/N</th><th>Product Name</th><th>Products image</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            <?php
                                $sn = 1;
                                while ($prodrow = mysqli_fetch_assoc($products)) {
                                    $pid = $prodrow['id'];
                                    $pimage = $prodrow['pimage'];
                                  echo '<tr><td>'.$sn.'</td><td><img src="../products/'.$pimage.'" width= "100px";></td><td>'.$prodrow['pname'].'</td><td><span class="btn btn-danger btn-sm" onclick="return delProduct('.$pid.')">Delete</span></td></tr>';
                                  $sn++;
                                }
                            ?>
                        </tbody>
                        <caption style="caption-side: top;">SIGN UPS</caption>
                    </table>              
                <?php
            }
            else {
                echo '<p>No Signup at the moment.</p>';
            }
        ?>
    </div>

    <script type="text/javascript">
       function delProduct(pid) {
            if (confirm('Are you sure of this action?')) {
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert('Product Deleted Sucessfully');
                        location.reload();
                    }   
                }
                xhttp.open('GET', '../backend/deleteproduct.php?pid='+pid, true);
                xhttp.send();
            }
            else {
                return false;
            }
        }
    </script>
</body>
</html>