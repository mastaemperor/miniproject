<?php 
    $pid = $_GET['pid'];
    require_once 'dblogin.php';

    mysqli_query($cobj, "delete from products where id='$pid'");
    exit();
?>