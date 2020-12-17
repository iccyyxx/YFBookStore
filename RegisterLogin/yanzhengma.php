<?php
 
session_start();//开启会话
 
$image=imagecreatetruecolor(268,80);//创建画布
$bgcolor=imagecolorallocate($image,255,255,255);//背景颜色
imagefill($image,0,0,$bgcolor);
 
$captch_code='';//存储验证码
 
//字母和数字混合验证码
for($i=0;$i<4;$i++) {   
    // 验证码颜色
    $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));//验证码颜色
    // 验证码内容
    $data = 'abcdefghijklmnopqrstuvwxyz1234567890';   //数据字典
    $fontcontent = substr($data, rand(0, strlen($data)), 1);    //从data取一个字符
    // 将生成的验证码存放到captch_code
    $captch_code.=$fontcontent;
    //  验证码出现的阿范围
    $x = ($i*268/4)+rand(10,20);
    $y = rand(5, 40);
    // 将验证码呈现在画布中
    imagestring($image,5, $x, $y, $fontcontent, $fontcolor);
}
//将验证码存到session里
$_SESSION['code']=$captch_code;
 
//增加干扰点
for($i=0;$i<400;$i++){
    $pointcolor=imagecolorallocate($image,rand(50,192),rand(50,192),rand(50,192));
    imagesetpixel($image,rand(1,268),rand(1,60),$pointcolor);//
}
 
//增加干扰线
for($i=0;$i<4;$i++){
    $linecolor=imagecolorallocate($image,rand(0,192),rand(0,192),rand(0,192));
    imageline($image,rand(1,268),rand(1,60),rand(1,268),rand(1,60),$linecolor);
}
 
//输出格式
header('content-type:image.png');
imagepng($image);
 
//销毁图片
imagedestroy($image);
?>