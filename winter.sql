-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-12-17 05:19:02
-- 服务器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `winter`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `bookname` varchar(25) CHARACTER SET gb2312 DEFAULT NULL COMMENT '书名',
  `ISBN` varchar(255) CHARACTER SET gb2312 DEFAULT NULL COMMENT '书ISBN码',
  `category` varchar(25) CHARACTER SET gb2312 DEFAULT NULL COMMENT '分类',
  `price` double DEFAULT NULL COMMENT '书的价格',
  `imageaddr` varchar(30) CHARACTER SET gb2312 DEFAULT NULL COMMENT '书籍封面路径',
  `num` mediumint(255) DEFAULT NULL COMMENT '书籍数量',
  `publisher` varchar(30) CHARACTER SET gb2312 DEFAULT NULL COMMENT '书籍出版社',
  `bookAuthor` varchar(100) CHARACTER SET gb2312 NOT NULL COMMENT '书的作者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `bookname`, `ISBN`, `category`, `price`, `imageaddr`, `num`, `publisher`, `bookAuthor`) VALUES
(1, '解密', '9787530219300', '小说', 58, 'image/解密.png', 3, '北京十月文艺出版社', '麦家'),
(2, '人生海海', '9787530219218', '书籍分类', 55, 'image/人生海海.png', 3, '北京十月文艺出版社', '麦家'),
(3, '人间失格', '9787506380263', '小说', 25, 'image/人间失格.png', 5, '作家出版社', '太宰治'),
(4, '你当像鸟飞往你的山', '9787544276986', '小说', 59, 'image/你当像鸟飞往你的山.png', 3, '南海出版公司', '塔拉 ? 韦斯特弗'),
(17, '你当像鸟飞往你的山', '9787530219218', '小说', 59, 'image/你当像鸟飞往你的山.png', 3, '南海出版公司', '塔拉 ? 韦斯特弗');

-- --------------------------------------------------------

--
-- 表的结构 `orderform`
--

CREATE TABLE `orderform` (
  `id` int(4) NOT NULL,
  `number` varchar(25) DEFAULT NULL COMMENT '订单号',
  `books` varchar(255) DEFAULT NULL COMMENT '书籍串',
  `nums` varchar(255) DEFAULT NULL COMMENT '数量串',
  `consignee` varchar(25) DEFAULT NULL COMMENT '收货人名字',
  `address` varchar(255) DEFAULT NULL COMMENT '收获地址',
  `tele` varchar(250) DEFAULT NULL COMMENT '联系人电话',
  `email` varchar(25) DEFAULT NULL COMMENT '邮箱',
  `time` varchar(25) DEFAULT NULL COMMENT '下单时间',
  `buyer` varchar(25) DEFAULT NULL COMMENT '下单人',
  `isbuy` varchar(25) DEFAULT NULL COMMENT '订单状态',
  `sumprice` double DEFAULT NULL COMMENT '总价格',
  `sumnum` int(4) DEFAULT NULL COMMENT '总数量',
  `payway` varchar(25) DEFAULT NULL COMMENT '支付方式'
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE `shop` (
  `id` int(4) NOT NULL,
  `name` varchar(25) DEFAULT NULL COMMENT '商家名称',
  `password` varchar(25) DEFAULT NULL COMMENT '密码'
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `truename` varchar(25) DEFAULT NULL COMMENT '用户真实姓名',
  `regtime` int(10) DEFAULT NULL COMMENT '用户注册时间',
  `token` varchar(50) NOT NULL COMMENT '账号激活码',
  `name` varchar(30) NOT NULL COMMENT '用户名',
  `psw` varchar(30) DEFAULT NULL COMMENT '密码',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `tele` varchar(30) DEFAULT NULL COMMENT '联系方式',
  `token_exptime` int(50) DEFAULT NULL COMMENT '激活码有效期',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '激活状态'
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COMMENT='用户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`truename`, `regtime`, `token`, `name`, `psw`, `email`, `tele`, `token_exptime`, `status`) VALUES
('AA', 1607801466, '342666a2cdce3ca0395aa6fa42a2d678', '6666666', '123456', '123@qq.com', '123', 1607887866, 0);
--
-- 转储表的索引
--

--
-- 表的索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `orderform`
--
ALTER TABLE `orderform`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `orderform`
--
ALTER TABLE `orderform`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
