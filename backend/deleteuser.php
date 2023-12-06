<?php 
    $uid = $_GET['uid'];
    require_once 'dblogin.php';

    mysqli_query($cobj, "delete from signuptable where id='$uid'");
    exit();
?>