<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../conn.php");

$username = $_POST["username"];
$psw = $_POST['userpsw'];
$email = $_POST['useremail']; //邮箱
$regtime = time();
$tele = $_POST["usertele"];
$name = $_POST["truename"];
//还没有做好验证
if (!($username and $psw and $email and $tele and $name)) {
    echo '<html><head><Script>alert("输入不能为空");window.location.href="register.html";</Script></head></html>';
} else {
    $sqlstr1 = "insert into user (name,psw,email,tele,truename,regtime) values('" . $username . "','" . $psw . "','" . $email . "','" . $tele . "','" . $name . "','" .   $regtime . "')";
    $result = mysqli_query($conn, $sqlstr1);
    if ($result) {
        if (sendMail($email, $username, $token)) {
            echo '<html><head><Script>alert("请登录到您的邮箱查看注册结果！");window.location.href="login.html";</Script></head></html>';
        }
    } else {
        echo "注册失败";
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
        $mail->Username = '80975930@qq.com';
        $mail->Password = 'qvinkdbpdzjnbjfh';             // SMTP 密码 
        $mail->SMTPSecure = 'ssl';                    //ssl协议 
        $mail->Port = 465;
        $mail->setFrom('80975930@qq.com', '牙方书城');  //发件人 
        $mail->addAddress("$email", "$username");  // 收件人 
        $mail->addReplyTo('80975930@qq.com', '牙方书城'); //回复

        $mail->isHTML(true);
        $mail->Subject = '牙方书城';
        $mail->Body    = "亲爱的" . $username . "：<br/>注册成功</br>感谢您在我站注册了新帐号。</br>请返回登录页面进行登录。<br/><p style='text-align:right'>-------- 牙方书城敬上</p>"
            . date('Y-m-d H:i:s');
        $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo '邮件发送失败: ', $mail->ErrorInfo;
    }
}
