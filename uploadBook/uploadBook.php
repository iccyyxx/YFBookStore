<?php
require_once("../conn.php");  //连接数据库
// 接受表单的信息并赋值
$bookname = $_POST["bookname"];//书名
$ISBN = $_POST["ISBN"];//书的ISBN码
$category = $_POST["category"];//分类
$price = $_POST["price"];//价格
$num = $_POST["num"];//数量
$publisher = $_POST["publisher"];//出版社
$bookAuthor = $_POST["bookAuthor"];//作者
$tem_imageaddr = $_FILES['imageBook']['tmp_name'];//书的封面路径
// 检查添加的图书信息是否完整，不完整则发出提示
if (!($bookname and $ISBN and $category and $price and $num
    and $publisher and $bookAuthor)) {
    echo '<html><head><Script>alert("输入不能为空");window.location.href="uploadBook.html";</Script></head></html>';
} else {
    // 上传图书封面
    uploadImage();
    // 数据库插入图书信息
    $sql = "insert into book (bookname,ISBN,category,price,num,publisher,bookAuthor,imageaddr) values('" . $bookname . "','" . $ISBN . "','" . $category . "','" . $price . "','" . $num . "','" . $publisher . "','" . $bookAuthor . "','".$imageaddr."')";
    $res = mysqli_query($conn, $sql);
    // 成功添加书籍至数据库
    if ($res ) {
        echo '<html><head><Script>alert("书籍添加成功");window.location.href="uploadBook.html";</Script></head></html>';

    } else {
        echo "书籍添加失败";
    }
}
// 将图书上传至指定文件夹里，使得路径生效
function uploadImage()
{
    $file = $_FILES["imageBook"];
    if ($file["error"] == 0) {
        $typeArr = explode("/", $file["type"]);
        if ($typeArr[0] == "image") {
            $imgType = array("png", "jpg", "jpeg");
            if (in_array($typeArr[1], $imgType)) {
                $imgname = "..\image/" . $_POST["bookname"] . "." . $typeArr[1];
                global $imageaddr;
                $imageaddr="image/" . $_POST["bookname"] . "." . $typeArr[1];
                $bol = move_uploaded_file($file["tmp_name"], $imgname);
                if ($bol) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
