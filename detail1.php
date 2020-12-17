<?php
require_once("conn.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="UTF-8" />
    <link rel="stylesheet" href="main.css" />
    <title>牙方书城</title>

</head>

<body>
    <!-- 页面最顶端部分 -->
    <div class="topBar">
        <div class="comWidth">
            <div class="rightArea">
                欢迎来到牙方书城!&nbsp;&nbsp;&nbsp;
                <!-- 页面跳转 -->
                <a href="main.php">[ 主页 ]</a>
                <a href="RegisterLogin\login.html">[ 登录 ]</a>
                <a href="RegisterLogin\register.html">[ 注册 ]</a>
                <a href="shopCar.html">[ 购物车 ]</a>
            </div>
        </div>
    </div>
    <div class="logoBar">
        <div class="comWidth">
            <div class="logo fl">
                <img src="image\bookCity1.png" alt="牙方书城" />
            </div>
        </div>
    </div>
    <div class="hr_25"></div>
    <div class="userPosition comWidth">
        <a href="main.php"><strong>首页</strong><span>&nbsp;&gt;&nbsp;</span></a>
        <a href="#">小说<span>&nbsp;&gt;&nbsp;</span></a>
    </div>
    <div class="description_info comWidth">
        <div class="description clearfix">
            <div class="rightArea">
                <div class="des_content">
                    <?php
                    $sql = "select * from book where id ='1'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "<dl><h2>{$row['bookname']}<h2></dl>";
                    echo "<dl><dt>书价</dt><dd><big>￥{$row['price']}</big></dd>
                </dl><div class='opn'>
                <dl>
                    <dt>送到</dt>
                    <dd><select>
                            <option>北京市 海淀区 五环内</option>
                        </select><span>有货，可当日出库</span></dd>
                </dl>
                <dl class='des_dl3'>
                    <dt>数量</dt>
                    <dd><button >-</button><input type='text' placeholder='1' /><button>+</button>
                </dl>
            </div>";
                    ?>
                    <div class="des_shop">
                        <div class="des_shop_buy">
                            <a href="shopCar.html" class="shop_btn">加入购物车</a>
                        </div>
                        <div class="des_shop_buy">
                            <a href="#" class="buy_btn">立即购买</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="leftArea">
                <div class="description_imgs">
                    <div class="big">
                        <?php
                        $sql = "select * from book where id ='1'";
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($res);
                        echo "<img src='{$row['imageaddr']}' alt='' height='250' />"
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="des_info comWidth clearfix">
        <div class="des_infoContent">
            <ul class="des_tit clearfix">
                <li class="active"><i></i>书籍介绍</li>
            </ul>
            <div class="des_img">
                <?php
                $sql = "select * from book where id ='1'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                echo "<img src='{$row['imageaddr']}' alt='' height='250' />"
                ?>
            </div>
            <div class="des_tp">

                <div class="des_text clearfix">
                    <h3>简介</h3>
                </div>
                <p class="info_text">茅盾文学奖得主麦家首部长篇小说，莫言、王家卫鼎力推荐。被译为33种语言，入选“企鹅经典”文库，开启谍战题材小说新纪元。人是世间ZUI深奥的密码。</p>
                <div class="hr_25"></div>
                <?php
                $sql = "select * from book where id ='1'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                echo "<img src='{$row['imageaddr']}' alt='' height='250' />"
                ?>
                <div class="hr_45"></div>
            </div>
            <div class="hr_15"></div>
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