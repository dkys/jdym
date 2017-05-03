-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017-05-02 23:32:57
-- 服务器版本： 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdzx`
--

-- --------------------------------------------------------

--
-- 表的结构 `jd_admin`
--

CREATE TABLE `jd_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_admin`
--

INSERT INTO `jd_admin` (`id`, `username`, `password`, `last_time`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-21 09:37:29');

-- --------------------------------------------------------

--
-- 表的结构 `jd_adv`
--

CREATE TABLE `jd_adv` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_adv`
--

INSERT INTO `jd_adv` (`id`, `title`, `logo`, `url`) VALUES
(3, 'test', 'Lunbo/2017-04-24/58fdc11fc4176.jpg', '/jdzx/index.php/Index/Contact/contact'),
(4, 'test', 'Lunbo/2017-04-24/58fdc23764fa7.jpg', '/jdzx/index.php/Index/Visa/visa');

-- --------------------------------------------------------

--
-- 表的结构 `jd_cate`
--

CREATE TABLE `jd_cate` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `sort` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_cate`
--

INSERT INTO `jd_cate` (`id`, `cate_name`, `pname`, `pid`, `sort`) VALUES
(1, '首页', NULL, 0, 0),
(2, '关于我们', NULL, 0, 0),
(3, '移民', NULL, 0, 0),
(4, '签证', NULL, 0, 0),
(5, '案例', NULL, 0, 0),
(6, '联系我们', NULL, 0, 0),
(17, '移民', '案例', 5, 0),
(18, '签证', '案例', 5, 1),
(19, '留学', '案例', 5, 2),
(20, '省提名', '案例', 5, 3),
(21, 'test', '案例', 5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jd_client`
--

CREATE TABLE `jd_client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '客户名称',
  `mobile` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL COMMENT '出生年月',
  `passport` varchar(255) DEFAULT NULL COMMENT '护照号',
  `adddate` date DEFAULT NULL COMMENT '申请日期',
  `status` varchar(255) DEFAULT NULL COMMENT '申请状态',
  `pro` text COMMENT '申请项目'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_client`
--

INSERT INTO `jd_client` (`id`, `name`, `mobile`, `birthday`, `passport`, `adddate`, `status`, `pro`) VALUES
(2, '陈生', '18697326032', '2015-08-03', '12213463213213', '2017-04-04', '审核中', '旅游签证');

-- --------------------------------------------------------

--
-- 表的结构 `jd_fenlei`
--

CREATE TABLE `jd_fenlei` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL COMMENT '父id',
  `title` varchar(255) DEFAULT NULL,
  `entitle` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sm_logo` varchar(255) DEFAULT NULL,
  `sort` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_fenlei`
--

INSERT INTO `jd_fenlei` (`id`, `pid`, `title`, `entitle`, `content`, `logo`, `sm_logo`, `sort`) VALUES
(1, 1, '学签', 'STUDY PERMIT', NULL, 'Fenlei/2017-04-24/mid_58fd712c36191.jpg', 'Fenlei/2017-04-24/sm_58fd712c36191.jpg', ''),
(2, 1, '工签', 'WORK PERMIT', NULL, 'Fenlei/2017-04-24/mid_58fd6d20058c3.jpg', 'Fenlei/2017-04-24/sm_58fd712c36191.jpg', ''),
(3, 1, '旅游签证', 'VISITOR PERMIT', NULL, 'Fenlei/2017-04-24/mid_58fd6dfd2a825.jpg', 'Fenlei/2017-04-24/sm_58fd712c36191.jpg', ''),
(4, 2, 'bc省提名', 'BC PROVINCIAL NOMINEE', NULL, 'Fenlei/2017-04-24/mid_58fda89a3d21f.jpg', 'Fenlei/2017-04-24/sm_58fda89a3d21f.jpg', '0'),
(5, 2, '快速通道', 'EXPRESS ENTRY', NULL, 'Fenlei/2017-04-24/mid_58fda947a588e.jpg', 'Fenlei/2017-04-24/sm_58fda947a588e.jpg', '0'),
(6, 2, '家庭团聚移民', 'FAMILY REUNION MIGRANTS', NULL, 'Fenlei/2017-04-24/mid_58fdaa0cdd618.jpg', 'Fenlei/2017-04-24/sm_58fdaa0cdd618.jpg', '0'),
(7, 2, '魁北克投资移民', 'INVESTMENT IMMIGRATION IN QUEBEC', NULL, 'Fenlei/2017-04-24/mid_58fddb144d1c8.jpg', 'Fenlei/2017-04-24/sm_58fddb144d1c8.jpg', '0'),
(8, 1, '移民test', 'TEST', NULL, 'Fenlei/2017-04-24/mid_58fde0c09526e.jpg', 'Fenlei/2017-04-24/sm_58fde0c09526e.jpg', '0');

-- --------------------------------------------------------

--
-- 表的结构 `jd_news`
--

CREATE TABLE `jd_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `entitle` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logo` varchar(255) DEFAULT NULL,
  `sm_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_news`
--

INSERT INTO `jd_news` (`id`, `title`, `entitle`, `content`, `cate_id`, `updatetime`, `logo`, `sm_logo`) VALUES
(1, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:13', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(2, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0ec109840.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:28', 'News/2017-04-22/mid_58fb0ec3c0915.jpg', 'News/2017-04-22/sm_58fb0ec3c0915.jpg'),
(3, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb10c8d677a.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:32', 'News/2017-04-22/mid_58fb10cc00467.jpg', 'News/2017-04-22/sm_58fb10cc00467.jpg'),
(4, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb1151dfce9.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:37', 'News/2017-04-22/mid_58fb1154d408f.jpg', 'News/2017-04-22/sm_58fb1154d408f.jpg'),
(5, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb11ac1c542.jpg\" alt=\"\" />', 17, '2017-04-22 11:13:05', 'News/2017-04-22/mid_58fb11af06c5b.jpg', 'News/2017-04-22/sm_58fb11af06c5b.jpg'),
(6, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb2455014ea.jpg\" alt=\"\" />', 17, '2017-04-22 11:13:09', 'News/2017-04-22/mid_58fb24578b5cf.jpg', 'News/2017-04-22/sm_58fb24578b5cf.jpg'),
(7, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb246fbc9b2.jpg\" alt=\"\" />', 17, '2017-04-22 11:13:13', 'News/2017-04-22/mid_58fb247669142.jpg', 'News/2017-04-22/sm_58fb247669142.jpg'),
(8, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb24a20aad0.jpg\" alt=\"\" />', 17, '2017-04-22 11:13:20', 'News/2017-04-22/mid_58fb24a409e75.jpg', 'News/2017-04-22/sm_58fb24a409e75.jpg'),
(9, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb24c0b33c3.jpg\" alt=\"\" />', 18, '2017-04-22 11:13:29', 'News/2017-04-22/mid_58fb24c332ca5.jpg', 'News/2017-04-22/sm_58fb24c332ca5.jpg'),
(10, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb24c0b33c3.jpg\" alt=\"\" />', 18, '2017-04-22 11:13:35', 'News/2017-04-22/mid_58fb24c332ca5.jpg', 'News/2017-04-22/sm_58fb24c332ca5.jpg'),
(11, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb1151dfce9.jpg\" alt=\"\" />', 18, '2017-04-22 11:13:31', 'News/2017-04-22/mid_58fb1154d408f.jpg', 'News/2017-04-22/sm_58fb1154d408f.jpg'),
(12, '魁北克投资移民', 'Quebec investment immigration', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb1151dfce9.jpg\" alt=\"\" />', 18, '2017-04-22 11:13:48', 'News/2017-04-22/mid_58fb1154d408f.jpg', 'News/2017-04-22/sm_58fb1154d408f.jpg'),
(13, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:13', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(14, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:13', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(15, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:13', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(16, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:13', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(17, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:13', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(18, '魁北克投资移民', 'Quebec investment immigrations', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-22 11:12:13', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(19, '魁北克投资移民', 'Quebec investment immigrations121212', '<img src=\"/jadingzx/Public/Uploads/2017-04-22/58fb0df120e16.jpg\" alt=\"\" />', 17, '2017-04-28 03:06:08', 'News/2017-04-22/mid_58fb0e0d3d187.jpg', 'News/2017-04-22/sm_58fb0e0d3d187.jpg'),
(22, 'test', 'Quebec investment immigration', '的说法', 17, '2017-04-28 04:48:10', 'News/2017-04-28/mid_5902c989e246f.png', 'News/2017-04-28/sm_5902c989e246f.png');

-- --------------------------------------------------------

--
-- 表的结构 `jd_product`
--

CREATE TABLE `jd_product` (
  `id` int(11) NOT NULL,
  `fenlei_id` int(11) DEFAULT NULL COMMENT '项目id',
  `navtitle` varchar(255) DEFAULT NULL,
  `naventitle` varchar(255) DEFAULT NULL,
  `content` text,
  `sort` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_product`
--

INSERT INTO `jd_product` (`id`, `fenlei_id`, `navtitle`, `naventitle`, `content`, `sort`) VALUES
(1, 1, '国内概况', 'Country profiles', '<img src=\"/jdzx/Public/Uploads/2017-04-24/58fd755b30f54.jpg\" alt=\"\" />', 0),
(2, 1, '国际留学', NULL, '<img src=\"/jdzx/Public/Uploads/2017-04-24/58fd832b79cbc.jpg\" alt=\"\" />', 1),
(3, 1, '申请条件', NULL, '<img src=\"/jdzx/Public/Uploads/2017-04-24/58fd840e26cec.jpg\" alt=\"\" />', 2),
(4, 1, '项目优势', NULL, '<img src=\"/jdzx/Public/Uploads/2017-04-24/58fd84a2913e0.jpg\" alt=\"\" />', 3),
(5, 1, '流程图', NULL, '<img src=\"/jdzx/Public/Uploads/2017-04-24/58fd84db2bde0.jpg\" alt=\"\" />', 4),
(6, 1, '备用一', NULL, '<img src=\"/jdzx/Public/Uploads/2017-04-24/58fd84fe239c4.jpg\" alt=\"\" />', 5),
(7, 1, '备用二', NULL, '<img src=\"/jdzx/Public/Uploads/2017-04-24/58fd85963036c.jpg\" alt=\"\" />', 6);

-- --------------------------------------------------------

--
-- 表的结构 `jd_status`
--

CREATE TABLE `jd_status` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) DEFAULT NULL COMMENT '申请状态名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jd_status`
--

INSERT INTO `jd_status` (`id`, `s_name`) VALUES
(2, '审核中'),
(3, '审核中1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jd_admin`
--
ALTER TABLE `jd_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_adv`
--
ALTER TABLE `jd_adv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_cate`
--
ALTER TABLE `jd_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_client`
--
ALTER TABLE `jd_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_fenlei`
--
ALTER TABLE `jd_fenlei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_news`
--
ALTER TABLE `jd_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_product`
--
ALTER TABLE `jd_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jd_status`
--
ALTER TABLE `jd_status`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `jd_admin`
--
ALTER TABLE `jd_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `jd_adv`
--
ALTER TABLE `jd_adv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `jd_cate`
--
ALTER TABLE `jd_cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `jd_client`
--
ALTER TABLE `jd_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `jd_fenlei`
--
ALTER TABLE `jd_fenlei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `jd_news`
--
ALTER TABLE `jd_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用表AUTO_INCREMENT `jd_product`
--
ALTER TABLE `jd_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `jd_status`
--
ALTER TABLE `jd_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
