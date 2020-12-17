<?php 
    $conn = mysqli_connect("localhost","数据库用户名","数据库密码","winter")or die("连接数据库失败".mysqli_connect_error());
    // $conn = new mysqli("localhost","root","80975930","winter") or die("连接数据库失败".mysqli_connect_error());
    mysqli_query($conn,"set names utf8");
?>