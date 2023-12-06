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
</head>
<body>
    <div>
        <?php
            $signups = mysqli_query($cobj, "select * from signuptable");
            if (mysqli_num_rows($signups) != 0) {
                ?>
    <!--focus-->     <table class="table table-striped table-bordered">
                        <thead>
                        <tr><th>S/N</th><th>Full Name</th><th>Email Address</th><th>Phone Number</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            <?php
                                $sn = 1;
                                while ($signuprow = mysqli_fetch_assoc($signups)) {
                                    $uid= $signuprow["id"];
                                    $fullname = $signuprow['fname'].' '.$signuprow['lname'];
                                  echo '<tr><td>'.$sn.'</td><td>'.$fullname.'</td><td>'.$signuprow['email'].'</td><td>'.$signuprow['phone'].'</td><td><span class="btn btn-danger btn-sm" onclick="return delUser('.$uid.')">Delete</span></td></tr>';
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
       function delUser(uid) {
            if (confirm('Are you sure of this action?')) {
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert('User Deleted Sucessfully');
                        location.reload();
                    }   
                }
                xhttp.open('GET', '../backend/deleteuser.php?uid='+uid, true);
                xhttp.send();
            }
            else {
                return false;
            }
        }
    </script>
</body>
</html>