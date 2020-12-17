<?php
require("../conn.php");   //连接数据库
session_start();            //开启会话
$username = $_POST["username"];   //用户名
$password = $_POST['userpsw'];    //密码
$verifycode = $_POST['yanzhengma'];   //验证码
$code = $_SESSION['code'];    //获取验证码
// 检查输入的正确性
if (emptyCheck($username, $password, $verifycode)) {
    if (checkVerifycode($verifycode, $code)) {
        if (checkUser($username, $password, $conn)) {
            // 如果输入无误则登录成功，跳转到主页面
            echo '<html><head><Script>alert("登录成功");window.location.href="../main.php";</Script></head></html>';
        }
    }
}
// 判断输入是否为空，若为空则发出提醒
function emptyCheck($username, $password, $verifycode)
{
    if ($username and $password and $verifycode) {
        return true;
    } else if (!$username) {
        echo "<script>alert('用户名不能为空');window.history.back(-1);</script>";
    } else if (!$password) {
        echo "<script>alert('密码不能为空');window.history.back(-1);</script>";
    } else if (!$verifycode) {
        echo "<script>alert('验证码不能为空');window.history.back(-1);</script>";
    }
}
// 对输入的验证码进行校验
function checkVerifycode($verifycode, $code)
{
    if ($verifycode == $code) {
        return true;
    } else {
        echo "<script>alert('验证码错误，请重新输入');window.history.back(-1);</script>";
    }
}
// 检查用户名密码是否对应
function checkUser($username, $password, $conn)
{
    // 从数据库进行查询
    $sql = "SELECT `name`,`psw` FROM `user` WHERE `psw` = '$password' AND `name` = '$username'";
    $result = mysqli_query($conn, $sql);
    // 查得到结果则返回用户名密码正确
    if (mysqli_fetch_row($result) != null) {
        return true;
    }
    // 否则则弹出错误提醒
    else {
        echo "<Script> alert('用户名或密码错误');window.history.back(-1);</Script>";
    }
}
