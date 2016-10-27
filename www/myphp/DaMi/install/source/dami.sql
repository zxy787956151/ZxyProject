-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-07-01 11:21:21
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dami`
--

-- --------------------------------------------------------

--
-- 表的结构 `dami_access`
--

CREATE TABLE IF NOT EXISTS `dami_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dami_access`
--

INSERT INTO `dami_access` (`role_id`, `node_id`, `level`, `module`, `pid`) VALUES
(4, 7, 2, NULL, 37),
(4, 4, 2, NULL, 37),
(4, 3, 2, NULL, 37),
(4, 2, 2, NULL, 37),
(4, 1, 0, NULL, 37),
(4, 37, 1, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dami_ad`
--

CREATE TABLE IF NOT EXISTS `dami_ad` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `content` text,
  `description` text,
  `addtime` varchar(32) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `dami_ad`
--

INSERT INTO `dami_ad` (`id`, `title`, `content`, `description`, `addtime`, `status`, `type`) VALUES
(28, '顶部banner1000*205PX', '<a href="http://www.damicms.cn"><img src="/Public/Uploads/ad/banner.png"/></a>', '', '2014-02-21 11:51:57', 1, 0),
(29, '首页中右广告', '<img src="/Public/Uploads/ad/1361775546.gif"/>', '', '2015-07-01 12:52:47', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dami_admin`
--

CREATE TABLE IF NOT EXISTS `dami_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastlogintime` int(10) NOT NULL,
  `lastloginip` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_client` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 表的结构 `dami_article`
--

CREATE TABLE IF NOT EXISTS `dami_article` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `titlecolor` varchar(80) DEFAULT NULL,
  `author` char(20) DEFAULT NULL,
  `keywords` char(40) DEFAULT NULL,
  `description` mediumtext,
  `note` mediumtext,
  `linkurl` char(100) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `copyfrom` varchar(100) DEFAULT NULL,
  `addtime` varchar(32) DEFAULT NULL,
  `islink` tinyint(1) unsigned DEFAULT '0',
  `isflash` tinyint(1) DEFAULT '0',
  `istop` tinyint(1) unsigned DEFAULT '0',
  `isimg` tinyint(1) unsigned DEFAULT '0',
  `imgurl` varchar(255) DEFAULT NULL,
  `ishot` tinyint(1) unsigned DEFAULT '0',
  `pagenum` int(8) unsigned DEFAULT '0',
  `hits` mediumint(9) DEFAULT '1',
  `content` longtext,
  `typeid` smallint(5) unsigned DEFAULT NULL,
  `voteid` int(10) unsigned DEFAULT '0',
  `is_from_mobile` int(11) DEFAULT '0' COMMENT '是否来自手机发布',
  `price` text,
  `color` text,
  `product_xinghao` text,
  `dami_uid` int(11) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- 转存表中的数据 `dami_article`
--

INSERT INTO `dami_article` (`aid`, `title`, `titlecolor`, `author`, `keywords`, `description`, `note`, `linkurl`, `status`, `copyfrom`, `addtime`, `islink`, `isflash`, `istop`, `isimg`, `imgurl`, `ishot`, `pagenum`, `hits`, `content`, `typeid`, `voteid`, `is_from_mobile`, `price`, `color`, `product_xinghao`, `dami_uid`) VALUES
(55, '企业概况', NULL, '未知', '', '\r\n	大米CMS(又名3gcms)是一个免费开源、快速、简单的PC建站和手机建站集成一体化系统， 我们致力于为用户提供简单、快捷的PC建站和智能手机建站解决方案。 提供开源的安卓手机客户端（APK）和', '...', NULL, 1, '', '2014-02-24 10:35:25', 0, 0, 0, 0, NULL, 0, NULL, 21, '<p style="margin-top:0px;margin-bottom:0px;padding:0px;line-height:30px;letter-spacing:1px;text-align:justify;font-family:Tahoma, ''Microsoft Yahei'', Simsun;font-size:14px;white-space:normal;background-color:#FFFFFF;">\r\n	大米CMS(又名3gcms)是一个免费开源、快速、简单的PC建站和手机建站集成一体化系统， 我们致力于为用户提供简单、快捷的PC建站和智能手机建站解决方案。 提供开源的安卓手机客户端（APK）和对应的服务器端系统源码下载。 您有什么建议或发现什么BUG，请发送邮件至cchaoming@163.com,我们将尽快为您解决\r\n</p>\r\n<div class="detail-bd" style="margin:0px;padding:0px;font-family:Tahoma, ''Microsoft Yahei'', Simsun;font-size:14px;line-height:21px;white-space:normal;background-color:#FFFFFF;">\r\n	<br style="margin:0px;padding:0px;" />\r\n大米CMS特点<br style="margin:0px;padding:0px;" />\r\n<br style="margin:0px;padding:0px;" />\r\n1:扩展字段自定义,根据自己系统需要无限扩展字段<br style="margin:0px;padding:0px;" />\r\n<br style="margin:0px;padding:0px;" />\r\n2:后台栏目分类无限极，并可以控制字段的显示或隐藏,方便管理<br style="margin:0px;padding:0px;" />\r\n<br style="margin:0px;padding:0px;" />\r\n3：列表模板（list目录下）和详细模板（page目录下）自定义<br style="margin:0px;padding:0px;" />\r\n<br style="margin:0px;padding:0px;" />\r\n4:基于thinkphp框架开发（官网www.thinkphp.cn）, 内置大量函数方便前台模板调用标签请参看tp官网<br style="margin:0px;padding:0px;" />\r\n<br style="margin:0px;padding:0px;" />\r\n5:作站灵活,可以将该系统做成任何类型网站，内置新闻类型站、企业站、手机3g站模型,通过http://***安装目录****/?t=xinwen这种查看，方便二次开发出不同模板<br style="margin:0px;padding:0px;" />\r\n<br style="margin:0px;padding:0px;" />\r\n6:支持手机访问\r\n</div>\r\n<br />', 15, NULL, 0, NULL, NULL, NULL, 0),
(56, '企业文化', NULL, '未知', '', '', '', NULL, 1, '', '2013-02-20 15:18:15', 0, 0, 0, 0, NULL, 0, 0, 12, '<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">企业文化写这里</span>', 16, 0, 0, NULL, NULL, NULL, 0),
(57, '企业荣誉', NULL, '未知', '', '', '企业荣誉放这里', NULL, 1, '', '2013-02-20 15:18:38', 0, 0, 0, 0, NULL, 0, 0, 9, '企业荣誉放这里', 17, 0, 0, NULL, NULL, NULL, 0),
(58, '信息时代不用手机,活得很糟糕?', NULL, '不详', '', '', '“我', NULL, 1, '网络', '2013-02-20 15:19:04', 0, 0, 0, 0, NULL, 0, 0, 8, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">“我没有智能手机。我甚至一部手机也没有。”</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">Roz Warren 是一名 57 岁的大叔，在图书馆工作，在给《纽约时报》的撰稿中，他从一个非手机用户的角度，描述了自手机出现后，身边的人荒诞的行为。当然，这些行为在你我看来也许再正常不过。 没有手机给 Roz 的生活带来不少方便。比如当他跟朋友约好下午 1 点在星巴克见面，朋友在 12：50 没办法打电话告诉他：“我得迟一点，大概 20 分钟。”这迫使朋友不得不准时出现。而如果朋友无法准时，Roz 也能预料到。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">然而在有手机的人那里，约会是另一种情形。首先，“1 点星巴克见”并不意味着真的是 1 点，甚至也不是在星巴克。当你出现在星巴克附近时，你就开始跟对方电话： ——我下地铁了。 ——我在停车。 ——我现在从 XX 路口走下来。 ——你在路的哪边？ ——我看到你了。右边，我在挥手。 ——我也看到了。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">Roz 把这形象地称为“Smartphone Tango（智能手机探戈）”。没有手机，他自然无法参与其中，自私地剥夺了朋友的乐趣。他可不想获得这种手机乐趣。在他看来，人们过于追求手机所带来的兴奋，而这些“症状”被他称为“cellgasms（cell+orgasm）”——这就不只是 Smartphone Tango，而是任何与智能手机互动所带来的兴奋，人们已经对手机上瘾了。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">有一天 Roz 与朋友 Deb 去纽约。结果在地铁上，Deb 发现自己的 iPhone 落在家里，那个下午，她无数次提到自己没有带电话，时不时拍下口袋，仿佛她身体丢失的某部分会突然出现。基于手机的一切乐趣——搜索、更新状态、发信息——都丢失了。她只能毫无联系地待在那一刻那个地方，就像很多年前她没有智能手机一样。 Roz 自认过时，要联系他，可以打固话，如果他不在家，你可以留言。在这 57 年里，他认为没有什么事情如此重要，需要立刻联系上，无法等到他回到家。特别当他儿子已经长大，他不需要被叫到学校校医室，而他的图书馆工作更需要保持安静。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">如果有紧急灾难呢？没有手机如何求助？Roz 觉得这个问题很可笑，难道带着一部手机就是为了以防万一？手机真的能在紧要关头救你一命？Roz 认为带着手机更多时候只是在最后一刻跟亲友道别。而他不打算这样做，如果那一刻真的来临，他希望尖叫着、怒吼着，绝望地试图跟上帝讨价还价，如原始人般。 何伟在《寻路中国》一开始就讲到他在中国的“神奇”经历：当他在公路上开着车，农民们在路上晒谷子，特别欢迎他将车轮碾过去。我看了觉得一点都不新奇，但接下来何伟一句话就点醒了我：这同时违反了交通安全和食品安全的法律。 如果你问我为什么要在一个科技网站介绍一个非手机用户的观点，我只能说我们时不时需要换个角度看问题。好不容易放假回到家中，你仍低着头玩手机，可能有时你会后悔，觉得是不是该陪陪爸妈说说话，但实在躲不开手机的诱惑。这难道不反常？甚至我们的情感也寄托在手机上：多少女生因为男朋友没有及时回复自己短信，没有经常打电话，积怨已久，某天突然在电话那端提出分手。</p>', 19, 0, 0, NULL, NULL, NULL, 0),
(59, '通过手机网络发展潜在客户', NULL, '不详', '', '', '...', NULL, 1, '网络', '2013-02-20 15:33:55', 0, 0, 0, 0, NULL, 0, NULL, 33, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">\r\n	年轻有为的程序员 Luke Thomas 不仅喜欢写程序，还十分上心与发展客户 / 用户的技巧。用他自己的话说，“让一个项目从企划成为现实真是太美妙了”。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">\r\n	他认为，一个创业计划在上路的时候是最为艰难的，因为一切都还只是一片空白。对于如何通过网络渠道发展潜在客户，Luke 在博客中分享了自己的秘诀。 利用搜索引擎 Luke 推荐的是 Google 关键字工具（Google Adwords Keyword Tool）。假设有一位创业者想办一家车险公司，创业者在宣传中既可以说自己经营的是“汽车保险（car insurance）”，也可以说自己经营的是“车辆保险（auto insurance）”。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">\r\n	Google 关键字工具提供的信息会显示，人们搜索“汽车保险（car insurance）”的次数比“车辆保险（auto insurance）”要多，所以选择前者更符合消费者的兴趣。 这种做法的理论依据是“使用消费者的惯用语言”。除了利用搜索引擎外，Luke 还推荐了阅读相关书籍、阅读业内博客、逛行业论坛、逛行业相关社交群组、与业内人士聚会等办法。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">\r\n	鉴于国内的情况，Google 能帮上忙的地方可能不多，百度似乎没有提供类似于 Google 关键字工具的服务，但有一个“百度指数搜索”。通过这个工具我们可以获知，对 36 氪感兴趣的网友主要分布在北京、上海、广州、杭州，以男性居多（81.64%），他们多数是 IT 从业者，大部分人的年龄在 30 至 39 岁之间。 如何应用国内搜索引擎提供的数据服务帮助自己发展潜在客户 / 用户呢？大家可以摸索摸索。 利用社交网络的公共主页 Luke 认为，Facebook 等社交网络的兴起极大地简化了市场调研的过程。他举例，一个创业者准备入驻自主学习（Homeschool）行业，社交网络的公共主页就是他最好的市场信息来源。关注自主学习在 Facebook 上的粉丝页，可以看到这个组群里有超过 20000 人。他们最热议的话题是，应该选用哪一本教材。怎样，有灵感了吗？ Luke 表示，这些公共主页的价值不仅如此，你可以给群组内的成员发信息，与他们进一步沟通。你还可以一个一个地点开这些组内成员的个人主页，看看他们的兴趣所在，说不定会有惊人的发现。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">\r\n	利用微博名人 Luke 建议创业者们去搜索一下自己行业内的 Twitter 名人，比如那个准备入驻自主学习行业的创业者就可以在 Twitter 上搜索 Homeschool，看看哪些名字在圈子里面是最有价值的。新浪微博也有搜索的功能，我们通过标签搜索“创业”，可以看到李开复、薛蛮子等人。 找到名人了然后呢，直接给他们发信息让对方 @你吗？当然不是。Luke 建议大家还是脚踏实地，一步一步来，先在小圈子内培养自己的名声，做出一定成果后再去联系他们。当你的名字出现在这些大咖的页面上，这就是很好的推广。 学会发信息找到若干潜在客户 / 用户后，如何经营和他们的关系，从他们身上获取可贵的市场信息呢？发一封电邮不乏为真诚且恰当的做法。邮件内容要简单，没有任何的导向性，这样获取的信息才不会有失偏颇。比如：在 XXX 领域，如果你有能力，你最愿意优化 ____？\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">\r\n	假设你要上线一个网站，你可以直接发去两个网站入口，询问对方更加偏好哪一种。面对大量的采访信息，你可能需要借助于一些数据分析软件来帮助分析结论。 对于如何问问题，这里面有一些讲究。使用选择题会使答案受限于几个你预设的框架，而开放性问题容易答非所问。Luke 表示，自己曾向潜在客户咨询某领域的优化建议，结果对方回复他，该被优化的是 Safari 浏览器，这显然不是他要的结果。福特汽车创始人、让汽车普及的 Henry Ford 有名言：“如果我当时问大众需要什么，大家只会告诉我，他们要跑得更快的马儿。” 推己及人不论你采取哪种方法，请记住推己及人。与潜在客户交洽时把自己放在对方的位置上，让他们感到舒服。\r\n</p>', 19, NULL, 0, NULL, NULL, NULL, 0),
(60, '大米cms1.21发布', NULL, '不详', '', '新增： 1、入口页面UI美化 2、手机客户端访问识别。 3、非手机客户端访问用到某些功能时，提示安装客户端 修正： 1、入口页布局 2、个人中心页布局 3、图片云上传机制优化。', '新增...', NULL, 1, '网络', '2013-02-20 15:34:28', 0, 0, 0, 0, NULL, 1, NULL, 47, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">新增： 1、入口页面UI美化 2、手机客户端访问识别。 3、非手机客户端访问用到某些功能时，提示安装客户端 修正： 1、入口页布局 2、个人中心页布局 3、图片云上传机制优化。</p>', 20, NULL, 0, NULL, NULL, NULL, 0),
(72, '测试测试哈哈哈', NULL, '不详', '', '', 'dfdfsfdfdfdfdfdff\r\n\r\n\r\n	中文测试\r\n\r\n\r\n	\r\n\r\n\r\n	牛人\r\n\r\n\r\n	dfdfdsf...', NULL, 1, '网络', '2013-02-27 14:32:57', 0, 0, 0, 0, NULL, 0, NULL, 36, '<p>\r\n	dfdfsfdfdfdfdfdff\r\n</p>\r\n<p>\r\n	中文测试\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	牛人\r\n</p>\r\n<p>\r\n	dfdfdsf\r\n</p>', 19, NULL, 0, NULL, NULL, NULL, 0),
(61, '大米CMS手机客户端1.2发布', NULL, '不详', '', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试...', NULL, 1, '网络', '2013-02-20 15:34:59', 0, 0, 0, 0, NULL, 0, NULL, 53, '测试测试测试测试测试测试测试测试<span style="white-space:normal;">测试测试测试测试测试测试测试测试<span style="white-space:normal;">测试测试测试测试测试测试测试测试<span style="white-space:normal;">测试测试测试测试测试测试测试测试<span style="white-space:normal;">测试测试测试测试测试测试测试测试</span></span></span></span>', 20, NULL, 0, NULL, NULL, NULL, 0),
(62, '公司公告内测1', NULL, '未知', '', '', '', NULL, 1, '', '2013-02-20 15:35:50', 0, 0, 0, 0, NULL, 0, 0, 23, '<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1 公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1 公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1 公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1</span>', 21, 0, 0, NULL, NULL, NULL, 0),
(63, '大米CMS全新UI内测中', NULL, '未知', '', '大米CMS为改进用户体验，全面更新UI，内测中，在使用的过程中，可能会遇到一些问题，我们会在后续的版本解决。 如果有你建议，请到我们团队论坛中留言。 http://www.damicms.com/bb', '...', NULL, 1, '', '2013-02-20 15:36:17', 0, 0, 0, 0, NULL, 0, NULL, 37, '<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">大米CMS为改进用户体验，全面更新UI，内测中，在使用的过程中，可能会遇到一些问题，我们会在后续的版本解决。 如果有你建议，请到我们团队论坛中留言。 http://www.damicms.com/bbs</span>', 21, NULL, 0, NULL, NULL, NULL, 0),
(66, '测试产品', NULL, '未知', '', '型号: 价格：面议 颜色:', 'android开发android开发android开发a...', NULL, 1, '', '2014-02-24 09:57:45', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1393207060.jpg', 0, NULL, 69, 'android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发<span style="white-space:normal;">android开发</span></span></span></span></span></span></span></span></span></span></span></span></span></span>', 24, NULL, 1, '4000', '灰色', 'M002457J', 0),
(68, '招聘PHP开发人员', NULL, '未知', '', '待遇4K-6k名额:2', '...', NULL, 1, '', '2013-02-20 15:46:25', 0, 0, 0, 0, NULL, 0, NULL, 0, '<h3 class="ui-li-heading" style="font-size:16px;margin:0.6em 0px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;color:#333333;font-family:Helvetica, Arial, sans-serif;line-height:normal;"><span style="font-size:12px;font-weight:normal;">精通PHP +mysql开发，至少熟练掌握一个框架！有项目开发经验</span></h3>', 25, NULL, 0, NULL, NULL, NULL, 0),
(69, '大米CMS手机开发专版', NULL, '未知', '大米测试', '型号: 价格：面议 颜色:', '大米CMS手机开发专版大米CMS手机开发专版大米CMS手机开发专版大米CMS手机开发专版...', NULL, 1, '', '2014-02-24 09:56:18', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1393206337.jpg', 1, NULL, 38, '大米CMS手机开发专版大米CMS手机开发专版大米CMS手机开发专版大米CMS手机开发专版', 23, NULL, 1, '5400', '灰色', 'M002456J', 0),
(70, '大米手机CMS', NULL, '未知', '', '型号: 价格：面议 颜色:', 'PHP项目开发...', NULL, 1, '', '2014-02-24 13:05:48', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1393218295.jpg', 0, NULL, 273, 'PHP项目开发', 23, NULL, 1, '5400', '灰色', 'M002458J', 0),
(124, '联系我们', NULL, '未知', '', '联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们', '联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们', NULL, 1, '', '2014-02-24 13:40:19', 0, 0, 0, 0, NULL, 0, 0, 4, '联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们联系我们', 35, 0, 0, NULL, NULL, NULL, 0),
(125, '测试案例', NULL, '不详', '', '测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例', '测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例', NULL, 1, '网络', '2014-02-24 14:32:58', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1393223678.jpg', 0, 0, 8, '测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例测试案例', 34, 0, 0, NULL, NULL, NULL, 0),
(126, '测试产品案例', NULL, '不详', '', '测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例', '测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例', NULL, 1, '网络', '2014-02-24 14:35:37', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1393223761.jpg', 0, 0, 31, '测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例测试产品案例', 34, 0, 0, NULL, NULL, NULL, 0),
(127, '大米测试产品', NULL, '未知', '', '测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2', '测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2ff...', NULL, 1, '', '2015-07-01 14:23:00', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1393218295.jpg', 0, NULL, 241, '测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2测试产品2ff', 23, NULL, 0, '6000', '灰色', 'M002458J', 0),
(130, '测试行业新闻', NULL, '不详', '', '测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻', '测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻', NULL, 1, '网络', '2014-12-11 17:00:11', 0, 0, 0, 0, NULL, 0, 0, 4, '测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻测试行业新闻', 19, 0, 0, NULL, NULL, NULL, 0),
(131, '大米CMS前端改版', NULL, '不详', '', '大米CMS前端改版，让用户更容易学习大米CMS标签，自己diy模板', '大米CMS前端改版，让用户更容易学习大米CMS标签，自己diy模板', NULL, 1, '网络', '2014-12-11 17:00:38', 0, 0, 0, 0, NULL, 0, 0, 18, '大米CMS前端改版，让用户更容易学习大米CMS标签，自己diy模板', 20, 0, 0, NULL, NULL, NULL, 0),
(132, '大米CMS强大的扩张性您知多少?', NULL, '不详', '', '大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?...', '大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?...', NULL, 1, '网络', '2014-12-11 17:01:15', 0, 0, 0, 0, NULL, 0, NULL, 11, '大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?大米CMS强大的扩张性您知多少?', 20, NULL, 0, NULL, NULL, NULL, 0),
(133, '售后服务', NULL, '不详', '', '售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务', '售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后', NULL, 1, '网络', '2014-12-11 17:13:30', 0, 0, 0, 0, '', 0, NULL, 2, '售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务售后服务', 37, NULL, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dami_config`
--

CREATE TABLE IF NOT EXISTS `dami_config` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `updown` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sitetitle` text,
  `sitetitle2` text,
  `sitedescription` text,
  `siteurl` text,
  `sitetpl` varchar(32) NOT NULL DEFAULT 'default',
  `sitekeywords` text NOT NULL,
  `sitetcp` text NOT NULL,
  `sitelang` tinyint(1) NOT NULL DEFAULT '0',
  `watermark` tinyint(1) NOT NULL DEFAULT '0',
  `watermarkimg` text NOT NULL,
  `sitelx` text NOT NULL,
  `indexrec` tinyint(2) unsigned NOT NULL,
  `indexhot` tinyint(2) unsigned NOT NULL,
  `flashmode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `noticeid` int(5) unsigned NOT NULL,
  `noticenum` tinyint(2) unsigned NOT NULL,
  `rollnum` tinyint(2) unsigned NOT NULL,
  `isping` tinyint(1) unsigned NOT NULL,
  `sitelogo` text NOT NULL,
  `iszy` tinyint(1) unsigned NOT NULL,
  `pingoff` tinyint(1) unsigned NOT NULL,
  `postovertime` tinyint(2) unsigned NOT NULL DEFAULT '15',
  `bookoff` tinyint(1) unsigned NOT NULL,
  `mood` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ishits` tinyint(1) unsigned NOT NULL,
  `iscopyfrom` tinyint(1) unsigned NOT NULL,
  `isauthor` tinyint(1) unsigned NOT NULL,
  `indexvote` tinyint(2) unsigned NOT NULL,
  `xgwz` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ishomeimg` int(11) unsigned NOT NULL,
  `mouseimg` tinyint(1) unsigned NOT NULL,
  `artlistnum` int(2) unsigned NOT NULL,
  `artlisthot` tinyint(2) unsigned NOT NULL,
  `artlistrec` tinyint(2) unsigned NOT NULL,
  `articlehot` tinyint(2) unsigned NOT NULL,
  `articlerec` tinyint(2) unsigned NOT NULL,
  `urlmode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `suffix` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `indexlink` tinyint(1) NOT NULL DEFAULT '1',
  `indexpic` tinyint(1) NOT NULL DEFAULT '1',
  `indexpicnum` tinyint(2) NOT NULL DEFAULT '4',
  `indexpicscroll` tinyint(1) NOT NULL DEFAULT '0',
  `indexnoticetitle` varchar(32) NOT NULL,
  `indexrectitle` varchar(32) NOT NULL,
  `indexhottitle` varchar(32) NOT NULL,
  `indexlinktitle` varchar(32) NOT NULL,
  `indexlinkimg` tinyint(1) NOT NULL DEFAULT '0',
  `indexdiylink` tinyint(1) NOT NULL DEFAULT '1',
  `listrectitle` varchar(32) NOT NULL,
  `listhottitle` varchar(32) NOT NULL,
  `listshowmode` tinyint(1) NOT NULL DEFAULT '0',
  `artrectitle` varchar(32) NOT NULL,
  `arthottitle` varchar(32) NOT NULL,
  `indexvotetitle` varchar(32) NOT NULL,
  `indexpictitle` varchar(32) NOT NULL,
  `is_build_html` int(1) DEFAULT '0',
  `istrade` int(1) DEFAULT '0',
  `isread` int(1) DEFAULT '0' COMMENT '开启用户组阅读权限',
  `defaultup` int(11) DEFAULT '0' COMMENT '默认用户组',
  `defaultmp` int(11) DEFAULT '0' COMMENT '注册用户所在组',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dami_config`
--

INSERT INTO `dami_config` (`id`, `updown`, `sitetitle`, `sitetitle2`, `sitedescription`, `siteurl`, `sitetpl`, `sitekeywords`, `sitetcp`, `sitelang`, `watermark`, `watermarkimg`, `sitelx`, `indexrec`, `indexhot`, `flashmode`, `noticeid`, `noticenum`, `rollnum`, `isping`, `sitelogo`, `iszy`, `pingoff`, `postovertime`, `bookoff`, `mood`, `ishits`, `iscopyfrom`, `isauthor`, `indexvote`, `xgwz`, `ishomeimg`, `mouseimg`, `artlistnum`, `artlisthot`, `artlistrec`, `articlehot`, `articlerec`, `urlmode`, `suffix`, `indexlink`, `indexpic`, `indexpicnum`, `indexpicscroll`, `indexnoticetitle`, `indexrectitle`, `indexhottitle`, `indexlinktitle`, `indexlinkimg`, `indexdiylink`, `listrectitle`, `listhottitle`, `listshowmode`, `artrectitle`, `arthottitle`, `indexvotetitle`, `indexpictitle`, `is_build_html`, `istrade`, `isread`, `defaultup`, `defaultmp`) VALUES
(1, 1, '大米CMS', 'PC、手机APP、微信集成，大米官网生成APK', '大米CMS', '/', 'default', 'damicms', '蜀ICP备123456', 0, 0, 'logo.png', '地&nbsp; 址：成都市建设南路88号<br />\r\n电&nbsp; 话：028-98765432<br />\r\n传&nbsp; 真：028-98765430<br />\r\n手&nbsp; 机：15982072714<br />\r\n网&nbsp; 址：www.damicms.com<br />\r\n邮&nbsp; 编：610000', 5, 8, 1, 5, 5, 1, 1, 'logo.png', 1, 1, 15, 1, 1, 1, 1, 1, 1, 1, 5, 1, 15, 10, 5, 10, 5, 2, 0, 1, 1, 4, 0, '站内公告', '推荐文章', '热点排行', '友情链接', 1, 1, '推荐文章', '热点排行', 1, '推荐文章', '热点排行', '热门投票', '推荐图文', 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dami_extend_fieldes`
--

CREATE TABLE IF NOT EXISTS `dami_extend_fieldes` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `show_text` varchar(80) DEFAULT NULL,
  `field_name` varchar(250) DEFAULT NULL,
  `field_type` int(11) DEFAULT NULL COMMENT '0:单行文本1:多行文本2:编辑器3:下拉列表4:radio 5:多选列表6:多选按钮7:文件上传',
  `set_option` varchar(5000) DEFAULT NULL COMMENT '显示文本|值,显示文本|值',
  `default_option` varchar(5000) DEFAULT NULL,
  `orders` int(11) DEFAULT '255' COMMENT '排序',
  `css` varchar(255) DEFAULT NULL COMMENT 'css样式控制',
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `dami_extend_fieldes`
--

INSERT INTO `dami_extend_fieldes` (`field_id`, `show_text`, `field_name`, `field_type`, `set_option`, `default_option`, `orders`, `css`) VALUES
(19, '产品价格', 'price', 0, NULL, '0', 255, 'style=''width:90px;'''),
(20, '颜色', 'color', 0, NULL, '', 255, ''),
(21, '型号', 'product_xinghao', 0, NULL, '', 255, '');

-- --------------------------------------------------------

--
-- 表的结构 `dami_extend_menu`
--

CREATE TABLE IF NOT EXISTS `dami_extend_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) DEFAULT NULL,
  `typeid` int(11) DEFAULT '0',
  `action_name` varchar(200) DEFAULT NULL COMMENT '控制器名称',
  `table_name` varchar(100) DEFAULT NULL COMMENT '表名称',
  `enable` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `dami_extend_menu`
--

INSERT INTO `dami_extend_menu` (`id`, `menu_name`, `typeid`, `action_name`, `table_name`, `enable`) VALUES
(16, '新闻中心', 18, NULL, NULL, 1),
(17, '产品展示', 22, NULL, NULL, 1),
(18, '招聘', 25, NULL, NULL, 1),
(19, '工程案例', 27, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dami_extend_show`
--

CREATE TABLE IF NOT EXISTS `dami_extend_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL COMMENT '栏目ID',
  `field_id` int(11) DEFAULT NULL COMMENT '扩展字段ID',
  `is_show` int(11) DEFAULT '0' COMMENT '0:不显示1：显示',
  `orders` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- 转存表中的数据 `dami_extend_show`
--

INSERT INTO `dami_extend_show` (`id`, `typeid`, `field_id`, `is_show`, `orders`) VALUES
(19, 23, 19, 1, 255),
(20, 23, 20, 1, 255),
(21, 23, 21, 1, 255),
(22, 24, 19, 1, 255),
(23, 24, 20, 1, 255),
(24, 24, 21, 1, 255),
(25, 35, 19, 0, 255),
(26, 35, 20, 0, 255),
(27, 35, 21, 0, 255),
(28, 34, 19, 0, 255),
(29, 34, 20, 0, 255),
(30, 34, 21, 0, 255),
(31, 38, 19, 1, 255),
(32, 38, 20, 1, 255),
(33, 38, 21, 1, 255),
(34, 39, 19, 1, 255),
(35, 39, 20, 1, 255),
(36, 39, 21, 1, 255),
(37, 40, 19, 1, 255),
(38, 40, 20, 1, 255),
(39, 40, 21, 1, 255),
(40, 41, 19, 1, 255),
(41, 41, 20, 1, 255),
(42, 41, 21, 1, 255),
(43, 19, 19, 0, 255),
(44, 19, 20, 0, 255),
(45, 19, 21, 0, 255);

-- --------------------------------------------------------

--
-- 表的结构 `dami_find_password`
--

CREATE TABLE IF NOT EXISTS `dami_find_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `hash` text,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_flash`
--

CREATE TABLE IF NOT EXISTS `dami_flash` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rank` mediumint(5) unsigned NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `dami_flash`
--

INSERT INTO `dami_flash` (`id`, `url`, `pic`, `title`, `status`, `rank`) VALUES
(7, '/', '1393307680.jpg', '企业站幻灯一', 1, 1),
(8, '/', '1393307691.jpg', '企业站幻灯图片二', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `dami_guestbook`
--

CREATE TABLE IF NOT EXISTS `dami_guestbook` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(32) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `addtime` varchar(20) NOT NULL,
  `recontent` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `tel` varchar(20) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `dami_guestbook`
--

INSERT INTO `dami_guestbook` (`id`, `author`, `title`, `content`, `addtime`, `recontent`, `status`, `tel`, `ip`) VALUES
(1, '游客', NULL, '我是第一个留言的', '2011-11-09 16:26:45', '', 1, NULL, NULL),
(4, '游客', NULL, '再整个论坛吧', '2011-11-09 16:40:31', '', 1, NULL, NULL),
(5, '游客', NULL, '还行,在看看', '2011-11-09 16:42:07', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `dami_key`
--

CREATE TABLE IF NOT EXISTS `dami_key` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `rank` tinyint(2) unsigned NOT NULL,
  `num` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dami_key`
--

INSERT INTO `dami_key` (`id`, `title`, `url`, `rank`, `num`) VALUES
(2, '百度', 'http://www.baidu.com', 1, 5),
(3, '搜狐', 'http://www.sohu.com', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dami_label`
--

CREATE TABLE IF NOT EXISTS `dami_label` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_link`
--

CREATE TABLE IF NOT EXISTS `dami_link` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `url` varchar(80) NOT NULL,
  `logo` text NOT NULL,
  `islogo` tinyint(1) unsigned NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `dami_link`
--

INSERT INTO `dami_link` (`id`, `title`, `url`, `logo`, `islogo`, `rank`, `status`) VALUES
(7, '大米CMS', 'http://www.damicms.com', 'http://www.damicms.com/logo.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `dami_member`
--

CREATE TABLE IF NOT EXISTS `dami_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `userpwd` varchar(60) NOT NULL,
  `realname` varchar(60) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `qq` varchar(30) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `province` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `area` varchar(60) DEFAULT NULL,
  `birthday` varchar(30) DEFAULT NULL,
  `zhiwu` varchar(60) DEFAULT NULL,
  `xuexing` varchar(20) DEFAULT NULL,
  `descript` text,
  `money` float(11,2) DEFAULT '0.00' COMMENT '余额',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `is_lock` int(11) DEFAULT '0' COMMENT '是否锁定',
  `addtime` int(11) DEFAULT NULL,
  `icon` varchar(300) DEFAULT NULL,
  `qid` varchar(300) DEFAULT NULL,
  `last_uptime` int(11) DEFAULT NULL,
  `online` int(1) DEFAULT '0',
  `channel_id` varchar(100) DEFAULT NULL COMMENT '百度云管道id',
  `channel_uid` varchar(100) DEFAULT NULL COMMENT '百度云管道UID',
  `group_id` int(11) DEFAULT '0' COMMENT '用户所在组',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `dami_member`
--

INSERT INTO `dami_member` (`id`, `username`, `userpwd`, `realname`, `tel`, `address`, `email`, `qq`, `sex`, `province`, `city`, `area`, `birthday`, `zhiwu`, `xuexing`, `descript`, `money`, `score`, `is_lock`, `addtime`, `icon`, `qid`, `last_uptime`, `online`, `channel_id`, `channel_uid`, `group_id`) VALUES
(8, 'shadowgirl', 'a3fbcfc2ef4b2d838d4fe3e9762c03f0', '', '', '', 'cchaoming@163.com', NULL, '男', '请选择', '请选择', '请选择', '', '', 'A型', NULL, 0.00, 0, 0, 1418366262, '', NULL, NULL, 0, NULL, NULL, 0),
(9, 'testdami', 'a3fbcfc2ef4b2d838d4fe3e9762c03f0', NULL, NULL, NULL, '279197963@qq.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0, 0, 1432026719, NULL, NULL, 1432027278, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dami_member_group`
--

CREATE TABLE IF NOT EXISTS `dami_member_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(80) DEFAULT NULL,
  `group_vail` text,
  `descript` text,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `dami_member_group`
--

INSERT INTO `dami_member_group` (`group_id`, `group_name`, `group_vail`, `descript`) VALUES
(2, '超级会员', '18,19,20,21', ''),
(3, '游客', '18,19,20,21', '访客权限');

-- --------------------------------------------------------

--
-- 表的结构 `dami_member_menu`
--

CREATE TABLE IF NOT EXISTS `dami_member_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `is_show` int(11) DEFAULT '1' COMMENT '是否显示',
  `drand` int(11) DEFAULT '500' COMMENT '排序',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `dami_member_menu`
--

INSERT INTO `dami_member_menu` (`menu_id`, `name`, `url`, `is_show`, `drand`) VALUES
(1, '会员资料', '/index.php?m=member&a=main', 1, 500),
(2, '修改密码', '/index.php?m=member&a=changepwd', 1, 500),
(3, '我的投稿', '/index.php?m=member&a=tougaolist', 1, 500),
(4, '我的订单', '/index.php?m=member&a=buylist', 1, 500),
(5, '在线充值', '/index.php?m=member&a=chongzhi', 1, 500);

-- --------------------------------------------------------

--
-- 表的结构 `dami_member_trade`
--

CREATE TABLE IF NOT EXISTS `dami_member_trade` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `uid` int(11) DEFAULT '0' COMMENT '购买者ID',
  `price` float(11,2) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `province` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `area` varchar(60) DEFAULT NULL,
  `sh_name` varchar(60) DEFAULT NULL,
  `sh_tel` varchar(60) DEFAULT NULL,
  `group_trade_no` varchar(200) DEFAULT NULL,
  `out_trade_no` varchar(200) NOT NULL COMMENT '订单号',
  `servial` varchar(200) DEFAULT NULL COMMENT '产品型号',
  `status` int(11) DEFAULT '-1' COMMENT '0=>''等待付款'',1=>''已付款，等待发货'',2=>''已收货，交易完成'',3=>''换货处理中'',4=>''换货完成'',5=>''退货处理中'',6=>''退货完成''',
  `remark` text,
  `num` int(11) DEFAULT '1' COMMENT '购买数量',
  `trade_type` int(11) DEFAULT '0' COMMENT '交易方式',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`buy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_money_log`
--

CREATE TABLE IF NOT EXISTS `dami_money_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `price` float(11,2) DEFAULT NULL,
  `log_type` int(11) DEFAULT '0' COMMENT '0：收入 1:支出',
  `remark` text,
  `addtime` int(11) DEFAULT NULL,
  `trade_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_mood`
--

CREATE TABLE IF NOT EXISTS `dami_mood` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mood1` mediumint(8) unsigned DEFAULT '0',
  `mood2` mediumint(8) unsigned DEFAULT '0',
  `mood3` mediumint(8) unsigned DEFAULT '0',
  `mood4` mediumint(8) unsigned DEFAULT '0',
  `mood5` mediumint(8) unsigned DEFAULT '0',
  `mood6` mediumint(8) unsigned DEFAULT '0',
  `mood7` mediumint(8) unsigned DEFAULT '0',
  `mood8` mediumint(8) unsigned DEFAULT '0',
  `aid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `dami_mood`
--

INSERT INTO `dami_mood` (`id`, `mood1`, `mood2`, `mood3`, `mood4`, `mood5`, `mood6`, `mood7`, `mood8`, `aid`) VALUES
(1, 5, 0, 1, 0, 2, 0, 0, 0, 42),
(2, 0, 0, 0, 1, 2, 0, 0, 0, 47),
(3, 0, 0, 0, 1, 2, 0, 0, 0, 55),
(4, 0, 0, 0, 0, 1, 1, 0, 0, 10),
(5, 0, 0, 0, 0, 2, 0, 0, 0, 36),
(6, 0, 0, 1, 1, 2, 1, 1, 0, 53),
(7, 0, 0, 0, 0, 1, 0, 0, 0, 16),
(8, 0, 0, 0, 0, 0, 1, 0, 0, 17),
(9, 0, 0, 0, 0, 0, 1, 0, 0, 20),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 52),
(11, 0, 0, 0, 0, 1, 0, 0, 0, 40),
(12, 0, 0, 0, 1, 1, 0, 0, 0, 22),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 34),
(14, 0, 0, 0, 1, 0, 0, 0, 0, 29),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 35),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 5),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 44),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 21),
(19, 0, 0, 0, 1, 0, 0, 0, 0, 48),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 59),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 61),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(31, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0, 39),
(25, 0, 0, 0, 0, 0, 0, 0, 0, 63),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 64),
(27, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 0, 65),
(32, 0, 0, 0, 0, 0, 0, 0, 0, 46),
(33, 0, 0, 0, 1, 0, 0, 0, 0, 38),
(34, 0, 0, 0, 0, 0, 0, 0, 0, 19),
(35, 0, 0, 0, 0, 0, 0, 0, 0, 54),
(36, 0, 0, 0, 0, 0, 0, 0, 0, 27),
(37, 0, 0, 0, 0, 0, 0, 0, 0, 25),
(38, 0, 0, 0, 0, 0, 0, 0, 0, 28),
(39, 0, 0, 0, 1, 0, 0, 0, 0, 45),
(40, 0, 0, 0, 0, 0, 0, 0, 0, 51),
(41, 0, 0, 0, 0, 0, 0, 0, 0, 58),
(42, 0, 0, 0, 0, 0, 0, 0, 0, 68),
(43, 0, 0, 0, 0, 0, 0, 0, 0, 71),
(44, 0, 0, 0, 0, 0, 0, 0, 0, 56),
(45, 0, 0, 0, 0, 0, 0, 0, 0, 60),
(46, 0, 0, 0, 0, 0, 0, 0, 0, 73),
(47, 0, 0, 0, 0, 0, 0, 0, 0, 57),
(48, 0, 0, 0, 0, 0, 0, 0, 0, 69),
(49, 0, 0, 0, 0, 0, 0, 0, 0, 72),
(50, 0, 0, 0, 0, 0, 0, 0, 0, 127),
(51, 0, 0, 0, 0, 0, 0, 0, 0, 70),
(52, 0, 0, 0, 0, 0, 0, 0, 0, 62),
(53, 0, 0, 0, 0, 0, 0, 0, 0, 126);

-- --------------------------------------------------------

--
-- 表的结构 `dami_node`
--

CREATE TABLE IF NOT EXISTS `dami_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `title` varchar(100) NOT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `menu_pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `pid` smallint(6) DEFAULT '0',
  `ismenu` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `level` (`level`),
  KEY `pid` (`menu_pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `dami_node`
--

INSERT INTO `dami_node` (`id`, `name`, `remark`, `status`, `title`, `sort`, `menu_pid`, `level`, `pid`, `ismenu`) VALUES
(1, 'core', NULL, 1, '系统核心', NULL, 37, 0, 37, 1),
(2, 'Fields', NULL, 1, '扩展字段', NULL, 1, 2, 37, 1),
(3, 'Type', NULL, 1, '栏目管理', NULL, 1, 2, 37, 1),
(4, 'Article', NULL, 1, '内容管理', NULL, 1, 2, 37, 1),
(5, 'BaseM', NULL, 1, '基本管理', NULL, 37, 0, 37, 1),
(6, 'Config', NULL, 1, '网站配置', NULL, 5, 2, 37, 1),
(7, 'Admin', NULL, 1, '管理员管理', NULL, 5, 2, 37, 0),
(8, 'Flash', NULL, 1, '幻灯管理', NULL, 5, 2, 37, 1),
(9, 'Clear', NULL, 1, '附件清理', NULL, 5, 2, 37, 1),
(10, 'Label', NULL, 1, '单页标签', NULL, 5, 2, 37, 1),
(11, 'Ad', NULL, 1, '广告管理', NULL, 5, 2, 37, 1),
(12, 'clearcache', NULL, 1, '清理缓存', NULL, 9, 0, 9, 0),
(13, 'plus', NULL, 1, '插件工具', NULL, 37, 0, 37, 0),
(16, 'Guestbook', NULL, 1, '留言管理', NULL, 13, 2, 37, 1),
(17, 'Pl', NULL, 1, '评论管理', NULL, 13, 2, 37, 1),
(18, 'Link', NULL, 1, '友情链接', NULL, 13, 2, 37, 1),
(19, 'Vote', NULL, 1, '投票管理', NULL, 13, 2, 37, 1),
(20, 'Key', NULL, 1, '文章内链', NULL, 13, 2, 37, 1),
(21, 'Tpl', NULL, 1, '模板管理', NULL, 13, 2, 37, 1),
(22, 'Backup', NULL, 1, '数据工具', NULL, 13, 2, 37, 0),
(23, 'index', NULL, 1, '数据备份', NULL, 22, 3, 22, 1),
(24, 'restore', NULL, 1, '数据还原', NULL, 22, 3, 22, 1),
(25, 'Apk', NULL, 1, 'APK配置', NULL, 37, 2, 37, 1),
(26, 'Caiji', NULL, 1, '数据采集', NULL, 13, 2, 37, 1),
(27, 'Build', NULL, 1, '生成静态页', NULL, 13, 2, 37, 1),
(28, 'Mtable', NULL, 1, '万能表格', NULL, 13, 2, 37, 1),
(29, 'config', NULL, 1, 'APK基础配置', NULL, 25, 2, 37, 1),
(30, 'vip_config', NULL, 1, 'VIP账户配置', NULL, 25, 3, 25, 1),
(31, 'Member', NULL, 1, '会员系统', NULL, 37, 2, 37, 1),
(32, 'ap_set', NULL, 1, '支付宝配置', NULL, 31, 3, 31, 1),
(33, 'qq_set', NULL, 1, 'QQ快捷登陆设置', NULL, 31, 3, 31, 1),
(34, 'cartlist', NULL, 1, '订单管理', NULL, 31, 3, 31, 1),
(35, 'userlist', NULL, 1, '会员管理', NULL, 31, 3, 31, 1),
(36, 'tixianlist', NULL, 1, '用户提现', NULL, 31, 3, 31, 1),
(37, 'Admin', NULL, 1, '系统后台', NULL, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dami_pl`
--

CREATE TABLE IF NOT EXISTS `dami_pl` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `aid` mediumint(5) unsigned NOT NULL,
  `author` varchar(40) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `ptime` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `recontent` text,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_role`
--

CREATE TABLE IF NOT EXISTS `dami_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `pid` smallint(6) DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  `typeids` text,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dami_role`
--

INSERT INTO `dami_role` (`id`, `name`, `pid`, `status`, `remark`, `typeids`) VALUES
(1, 'super', 0, 1, '超级管理员', NULL),
(4, '测试组', 0, 1, '测试下', '18,19,20,22,23,24,28,33');

-- --------------------------------------------------------

--
-- 表的结构 `dami_role_admin`
--

CREATE TABLE IF NOT EXISTS `dami_role_admin` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dami_role_admin`
--

INSERT INTO `dami_role_admin` (`role_id`, `user_id`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- 表的结构 `dami_tixian`
--

CREATE TABLE IF NOT EXISTS `dami_tixian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` float(11,2) DEFAULT '0.00',
  `uid` int(11) DEFAULT NULL,
  `remark` text,
  `status` int(11) DEFAULT '0' COMMENT '提现状态0:待处理1:已处理',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_type`
--

CREATE TABLE IF NOT EXISTS `dami_type` (
  `typeid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(20) NOT NULL,
  `keywords` char(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isindex` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `indexnum` tinyint(2) unsigned NOT NULL,
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` char(255) NOT NULL,
  `isuser` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `target` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `readme` varchar(255) NOT NULL,
  `drank` mediumint(5) unsigned NOT NULL,
  `irank` mediumint(5) NOT NULL,
  `fid` mediumint(5) unsigned NOT NULL,
  `path` varchar(128) NOT NULL,
  `show_fields` varchar(120) DEFAULT NULL,
  `list_path` varchar(250) DEFAULT 'list/list_default.html',
  `page_path` varchar(255) DEFAULT 'page/page_default.html',
  `icon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `dami_type`
--

INSERT INTO `dami_type` (`typeid`, `typename`, `keywords`, `description`, `ismenu`, `isindex`, `indexnum`, `islink`, `url`, `isuser`, `target`, `readme`, `drank`, `irank`, `fid`, `path`, `show_fields`, `list_path`, `page_path`) VALUES
(14, '关于我们', '', '', 1, 0, 10, 0, '/index.php?s=lists/15', 1, 1, '', 1, 10, 0, '0', NULL, 'list/list_default.html', 'page/page_default.html'),
(15, '企业概况', '', '', 0, 0, 10, 0, '', 0, 1, '', 10, 10, 14, '0-14', '1|0|0|0|0|0|0|0|0|0|1|1|0|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(16, '企业文化', '', '', 0, 0, 10, 0, '', 0, 1, '', 10, 10, 14, '0-14', '1|0|0|0|0|0|0|0|0|0|1|1|0|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(17, '企业荣誉', '', '', 0, 0, 10, 0, '', 0, 1, '', 10, 10, 14, '0-14', '1|0|0|0|0|0|0|0|0|0|1|1|0|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(18, '新闻中心', '', '', 1, 1, 10, 0, '', 1, 1, '', 2, 10, 0, '0', NULL, 'list/list_default.html', 'page/page_default.html'),
(19, '行业新闻', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 18, '0-18', '1|1|0|1|1|1|0|0|0|0|1|1|1|1|0|0', 'list/list_default.html', 'page/page_default.html'),
(20, '公司新闻', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 18, '0-18', '1|0|0|1|1|1|0|0|0|0|1|1|1|1|0|0', 'list/list_default.html', 'page/page_default.html'),
(21, '公司公告', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 18, '0-18', '1|0|0|0|0|0|0|0|0|0|1|1|1|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(22, '产品展示', '', '', 1, 1, 10, 0, '', 1, 1, '', 3, 10, 0, '0', NULL, 'list/list_product.html', 'page/page_product.html'),
(23, '移动互联网开发', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 22, '0-22', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html'),
(24, 'JAVA软件开发', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 22, '0-22', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html'),
(25, '招聘信息', '', '', 1, 1, 10, 0, '', 1, 1, '', 5, 10, 0, '0', '1|0|1|0|0|0|0|0|0|0|1|1|1|1|0|0', 'list/list_zhaoping.html', 'page/page_default.html'),
(26, '在线留言', '', '', 1, 1, 10, 1, '/index.php?s=guestbook', 1, 1, '', 10, 10, 0, '0', NULL, 'list/list_default.html', 'page/page_default.html'),
(27, '工程案例', '', '', 1, 1, 10, 0, '', 1, 1, '', 4, 10, 0, '0', NULL, 'list/list_product.html', 'page/page_default.html'),
(28, '网站案例', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 27, '0-27', NULL, 'list/list_product.html', 'page/page_anli.html'),
(33, '安卓开发', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 27, '0-27', NULL, 'list/list_product.html', 'page/page_anli.html'),
(35, '联系我们', '', '', 0, 0, 10, 0, '', 0, 1, '', 10, 10, 14, '0-14', '1|0|0|0|0|1|0|0|0|0|0|1|0|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(34, 'B/S软件', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 27, '0-27', '1|1|1|1|1|1|0|0|1|0|1|1|1|1|1|0', 'list/list_product.html', 'page/page_anli.html'),
(37, '单页管理', '', '', 0, 0, 10, 0, '', 0, 1, '', 10, 10, 0, '0', NULL, 'list/list_default.html', 'page/page_default.html'),
(38, '网站建设', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 23, '0-22-23', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html'),
(39, '手机微应用', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 23, '0-22-23', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html'),
(40, '安卓开发', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 23, '0-22-23', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html'),
(41, '苹果开发', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 23, '0-22-23', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html');

-- --------------------------------------------------------

--
-- 表的结构 `dami_vip_mess`
--

CREATE TABLE IF NOT EXISTS `dami_vip_mess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vip_name` varchar(60) DEFAULT NULL,
  `vip_pwd` varchar(200) DEFAULT NULL,
  `vip_apk_url` varchar(200) DEFAULT NULL,
  `com_apk_url` varchar(200) DEFAULT NULL,
  `vip_sn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_vote`
--

CREATE TABLE IF NOT EXISTS `dami_vote` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `vote` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `stype` tinyint(1) unsigned NOT NULL,
  `starttime` varchar(32) NOT NULL,
  `overtime` varchar(32) NOT NULL,
  `rank` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_wx_menu`
--

CREATE TABLE IF NOT EXISTS `dami_wx_menu` (
  `id` int(11) DEFAULT NULL,
  `menu_name` varchar(60) DEFAULT NULL,
  `menu_value` varchar(300) DEFAULT NULL,
  `menu_type` int(1) DEFAULT '0' COMMENT '0：网页链接1:推送图文',
  `pid` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dami_wx_menu`
--

INSERT INTO `dami_wx_menu` (`id`, `menu_name`, `menu_value`, `menu_type`, `pid`) VALUES
(1, '新闻', '/index.php?s=/lists/18.html', 0, 0),
(2, '产品', '', 2, 0),
(4, '大米CMS', '大米cms', 1, 2),
(5, '移动APP开发', '/index.php?s=/lists/23.html', 0, 2),
(3, '关于我们', '', 2, 0),
(6, '企业概况', '/index.php?s=/lists/15.html', 0, 3),
(7, '企业荣誉', '/index.php?s=/lists/17.html', 0, 3),
(8, '联系我们', '/index.php?s=/lists/35.html', 0, 3),
(9, '安卓开发', '/index.php?s=/lists/24.html', 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `dami_wx_prize`
--

CREATE TABLE IF NOT EXISTS `dami_wx_prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prize_name` varchar(120) DEFAULT NULL COMMENT '抽奖名称',
  `prize_project` text COMMENT '奖项目',
  `start_time` int(11) DEFAULT NULL COMMENT '抽奖开始日期',
  `end_time` int(11) DEFAULT NULL COMMENT '抽奖结束日期',
  `remark` text COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dami_wx_prize_user`
--

CREATE TABLE IF NOT EXISTS `dami_wx_prize_user` (
  `id` int(11) NOT NULL DEFAULT '0',
  `prize_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
