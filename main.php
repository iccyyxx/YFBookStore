<?php
require_once("conn.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link  rel="stylesheet" href="main.css" />
    <title>牙方书城</title>
</head>

<body>
    <div class="topBar">
        <div class="comWidth">
            <div class="rightArea theme">
                欢迎来到牙方书城!&nbsp;&nbsp;&nbsp;
                <a href="RegisterLogin\login.html">[ 登录 ]</a>
                <a href="RegisterLogin\register.html">[ 注册 ]</a>
                <a href="shopCar.html">[ 购物车 ]</a>
                <a href="uploadBook/uploadBook.html">[ 添加书籍 ]</a>
                <a href="RegisterLogin/findS.html">[ 找回密码 ]</a>
            </div>
        </div>
    </div>
    <div class="logoBar">
        <div class="comWidth">
            <div class="logo fl">
                <a href="detail.html"></a>
                <img src="image\bookCity1.png" alt="牙方书城" />
                </a>
            </div>
            <div class="search_box fl">
                <input type="text" class="search_text fl" />
                <input type="button" class="search_btn fr" value="搜 索" />
            </div>
        </div>
    </div>
    <div class="navBox">
        <div class="comWidth">
            <div class="shopClass fl">
                <h3>全部书籍分类<i></i></h3>
            </div>
            <ul class="nav fl">
                <li><a href="#">图书</a></li>
                <li><a href="#">电子书</a></li>
            </ul>
        </div>
    </div>
    <div class="hr_17"></div>
    <div class="comWidth clearfix products">
        <div class="leftArea">
            <div class="leftNav vertical">
                <h3 class="nav_title">书籍分类</h3>
                <div class="nav_cont h3">
                    <h3>教育</h3>
                </div>
                <div class="nav_cont">
                    <ul class="navCont_list clearfix">
                        <!--clearfix  否则li标签内容不在背景层-->
                        <li><a href="#"> 教材</a></li>
                        <li><a href="#"> 外语</a></li>
                        <li><a href="#"> 考试</a></li>
                        <li><a href="#"> 工具书</a></li>
                        <li><a href="#"> 中小学教辅</a></li>
                    </ul>
                </div>
                <div class="nav_cont h3">
                    <h3>小说</h3>
                </div>
                <div class="nav_cont">
                    <ul class="navCont_list clearfix">
                        <!--clearfix  否则li标签内容不在背景层-->
                        <li><a href="#"> 外国小时</a></li>
                        <li><a href="#"> 世界名著</a></li>
                        <li><a href="#"> 中国当代小说</a></li>
                        <li><a href="#"> 社会</a></li>
                        <li><a href="#"> 军事</a></li>
                        <li><a href="#"> 历史</a></li>
                        <li><a href="#"> 情感</a></li>
                    </ul>
                </div>
                <div class="nav_cont h3">
                    <h3>科技</h3>
                </div>
                <div class="nav_cont">
                    <ul class="navCont_list clearfix">
                        <!--clearfix  否则li标签内容不在背景层-->
                        <li><a href="#"> 科普</a></li>
                        <li><a href="#"> 建筑</a></li>
                        <li><a href="#"> 医学</a></li>
                        <li><a href="#"> 计算机</a></li>
                        <li><a href="#"> 自然科学</a></li>
                        <li><a href="#"> 工业</a></li>
                        <li><a href="#"> 农林</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="rightArea">
            <div class="products_list screening_list_more clearfix">
                <?php
                $sql = "select * from book";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_row($res)) {
                    echo "<div class='item'><div class='item_cont'>
                        <div class='img_item'>
                            <a href='detail{$row[0]}.php'><img src='{$row[5]}' alt='' /></a>
                        </div>
                        <p><a href='detail{$row[0]}.php'>{$row[1]}</a></p>
                        <p class='money'>￥{$row[4]}</p>
                        <p><a href='shopCar.html' class='addCar'>加入购物车</a></p>
                    </div>
                </div>";
                }
                ?>
            </div>
            <div class="products_list screening_list_more clearfix">
                <div class="page">
                    <a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><span class="hl">...</span>
                    <a href="#">200</a><a href="#">下一页</a><span class="hl">共200页，到第</span> <input type="text" class="pageNum" />页
                </div>
            </div>

        </div>
    </div>
    <div class="hr_25"></div>
    <div class="footer">
        <p><a href="#">书城简介</a><i>|</i><a href="#">书城公告</a><i>|</i><a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：XXX-XXX-XXXX</p>
        <p>Copyright&copy;2006 - 2014
            牙方书城版权所有&nbsp;&nbsp;&nbsp;京ICP备0903XXXX号&nbsp;&nbsp;&nbsp;京ICP证BXXXX-XXXX号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123
        </p>
    </div>
</body>

</html>