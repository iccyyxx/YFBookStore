<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../conn.php");
session_start();            //开启会话
$username = $_POST["username"];
$email = $_POST['email']; //邮箱
$verifycode = $_POST["yanzhengma"];
$regtime = time();
$code = $_SESSION['code'];    //获取验证码
$token = md5($username . $email . $regtime); //创建用于激活识别码
$token_exptime = time() + 60 * 60 * 24; //过期时间为24小时后
if (emptyCheck($username, $email, $verifycode)) {
    if (checkVerifycode($verifycode, $code)) {
        if (checkUser($username, $email,$conn)) {
            $_SESSION['username'] = $username;

            if (sendMail($email, $username, $token)) {
                echo '<html><head><Script>alert("请登录到您的邮箱及时更改密码！");window.location.href="login.html";</Script></head></html>';
            }
        }
    }
}
function emptyCheck($username, $email, $verifycode)
{
    if ($username and $verifycode) {
        return true;
    } else {
        if (!$username) {
            echo "<script>alert('用户名不能为空');window.history.back(-1);</script>";
        } else if (!$email) {
            echo "<script>alert('邮箱不能为空');window.history.back(-1);</script>";
        } else if (!$verifycode) {
            echo "<script>alert('验证码不能为空');window.history.back(-1);</script>";
        }
    }
}
function checkVerifycode($verifycode, $code)
{
    if ($verifycode == $code) {
        return true;
    } else {
        echo "<script>alert('验证码错误，请重新输入');window.history.back(-1);</script>";
    }
}

function checkUser($username, $email,$conn)
{
    $sql = "SELECT `name`,`email` FROM `user` WHERE name = '$username' AND `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_row($result) != null) {
        return true;
    } else {
        echo "<Script> alert('用户名邮箱不匹配');window.history.back(-1);</Script>";
    }
}

function sendMail($email, $username, $token)
{

    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = 'smtp.qq.com';    // SMTP服务器
        $mail->SMTPAuth = true;
        $mail->Username = 'example@qq.com';
        $mail->Password = 'password';             // SMTP 密码  部分邮箱是授权码(例如163邮箱) 
        $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议 
        $mail->Port = 465;
        $mail->setFrom('example@qq.com', '牙方书城');  //发件人 
        $mail->addAddress("$email", "$username");  // 收件人 
        $mail->addReplyTo('example@qq.com', '牙方书城'); //回复的时候回复给哪个邮箱 建议和发件人一致 

        $mail->isHTML(true);
        $mail->Subject = '牙方书城用户密码重置';
        $mail->Body    = "亲爱的" . $username . "：<br/>请点击链接重置密码。<br/><a href='http://localhost/winter/RegisterLogin/findS1.html?verify=" . $token . "' target='_blank'>http://localhost/winter/RegisterLogin/findS1.html?verify=" . $token . "</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- 牙方书城敬上</p>"
            . date('Y-m-d H:i:s');
        $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo '邮件发送失败: ', $mail->ErrorInfo;
    }
}
