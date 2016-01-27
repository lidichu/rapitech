-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 服務器版本:                        10.1.7-MariaDB - mariadb.org binary distribution
-- 服務器操作系統:                      Win64
-- HeidiSQL 版本:                  9.3.0.4998
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 導出 house 的資料庫結構
CREATE DATABASE IF NOT EXISTS `house` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `house`;


-- 導出  表 house.attractions 結構
CREATE TABLE IF NOT EXISTS `attractions` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `IndexShow` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '首頁顯示',
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '標題',
  `PIC` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片',
  `LinkUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網址',
  `TargetWindow` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '目標視窗',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片儲存名稱',
  `Sort` int(50) NOT NULL COMMENT '排序',
  `IndexSort` int(50) NOT NULL COMMENT '首頁排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='週邊景點';

-- 正在導出表  house.attractions 的資料：1 rows
DELETE FROM `attractions`;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
INSERT INTO `attractions` (`SerialNo`, `IndexShow`, `Title`, `PIC`, `LinkUrl`, `TargetWindow`, `PICHidden`, `Sort`, `IndexSort`, `Status`) VALUES
	(2, 'flase', '奇美博物館| Chimei Museum', 'pc.png', 'http://www.chimeimuseum.org/', '_blank', '20151120110656.png', 9999, 9999, '上架');
/*!40000 ALTER TABLE `attractions` ENABLE KEYS */;


-- 導出  表 house.banner_ch 結構
CREATE TABLE IF NOT EXISTS `banner_ch` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `PIC` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片儲存名稱',
  `LinkUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '超連結',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Banner管理';

-- 正在導出表  house.banner_ch 的資料：3 rows
DELETE FROM `banner_ch`;
/*!40000 ALTER TABLE `banner_ch` DISABLE KEYS */;
INSERT INTO `banner_ch` (`SerialNo`, `PIC`, `PICHidden`, `LinkUrl`, `Sort`, `Status`) VALUES
	(3, 'pc.png', '20151120100451.png', NULL, 1, '上架'),
	(4, 'pc2.png', '20151120100459.png', NULL, 2, '上架'),
	(5, 'pc3.png', '20151120100512.png', NULL, 3, '上架');
/*!40000 ALTER TABLE `banner_ch` ENABLE KEYS */;


-- 導出  表 house.contact_us 結構
CREATE TABLE IF NOT EXISTS `contact_us` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Note` text COLLATE utf8_unicode_ci COMMENT '內容',
  `PIC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片儲存名稱',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='房間規格說明';

-- 正在導出表  house.contact_us 的資料：1 rows
DELETE FROM `contact_us`;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` (`SerialNo`, `Note`, `PIC`, `PICHidden`) VALUES
	(1, '聯絡我們', NULL, NULL);
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;


-- 導出  表 house.m_member 結構
CREATE TABLE IF NOT EXISTS `m_member` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT,
  `Acc` varchar(150) CHARACTER SET utf8 NOT NULL COMMENT '帳號',
  `Name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '姓名',
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '信箱',
  `Pwd` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '密碼',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理者資料';

-- 正在導出表  house.m_member 的資料：2 rows
DELETE FROM `m_member`;
/*!40000 ALTER TABLE `m_member` DISABLE KEYS */;
INSERT INTO `m_member` (`SerialNo`, `Acc`, `Name`, `Email`, `Pwd`) VALUES
	(1, 'admin', 'admin', '', '152d596245957c961217547cea098e7e'),
	(2, 'tndg', 'tndg', '', '41e7d119a8d7a214a25fbb56f8295217');
/*!40000 ALTER TABLE `m_member` ENABLE KEYS */;


-- 導出  表 house.popedom 結構
CREATE TABLE IF NOT EXISTS `popedom` (
  `Member_ID` int(20) NOT NULL,
  `Tree_ID` varchar(4) CHARACTER SET utf8 NOT NULL,
  KEY `Member_ID` (`Member_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='權限紀錄';

-- 正在導出表  house.popedom 的資料：358 rows
DELETE FROM `popedom`;
/*!40000 ALTER TABLE `popedom` DISABLE KEYS */;
INSERT INTO `popedom` (`Member_ID`, `Tree_ID`) VALUES
	(6, '21'),
	(6, '2012'),
	(4, '9910'),
	(4, '99'),
	(4, '9810'),
	(4, '98'),
	(4, '7010'),
	(4, '70'),
	(4, '3030'),
	(4, '3020'),
	(4, '3010'),
	(4, '30'),
	(4, '2020'),
	(4, '20'),
	(4, '0110'),
	(4, '01'),
	(4, '0020'),
	(6, '2011'),
	(6, '2010'),
	(6, '20'),
	(1, '9920'),
	(1, '9910'),
	(1, '99'),
	(1, '9810'),
	(1, '98'),
	(1, '9010'),
	(1, '90'),
	(1, '7010'),
	(1, '70'),
	(1, '6020'),
	(1, '6015'),
	(1, '6010'),
	(1, '60'),
	(1, '5220'),
	(1, '5215'),
	(1, '5210'),
	(1, '52'),
	(1, '5120'),
	(1, '5115'),
	(1, '5110'),
	(1, '51'),
	(1, '5020'),
	(1, '5015'),
	(1, '5010'),
	(1, '50'),
	(1, '2225'),
	(1, '2220'),
	(1, '2215'),
	(1, '2210'),
	(1, '2205'),
	(1, '22'),
	(1, '2125'),
	(1, '2120'),
	(1, '2115'),
	(1, '2110'),
	(1, '2105'),
	(1, '21'),
	(1, '2025'),
	(1, '2020'),
	(1, '2015'),
	(1, '2010'),
	(1, '2005'),
	(1, '20'),
	(1, '1030'),
	(1, '1020'),
	(1, '1010'),
	(1, '10'),
	(1, '0520'),
	(2, '9920'),
	(2, '9910'),
	(2, '99'),
	(2, '9810'),
	(2, '98'),
	(2, '7010'),
	(2, '70'),
	(2, '4050'),
	(2, '4040'),
	(2, '4030'),
	(2, '4020'),
	(2, '4010'),
	(2, '40'),
	(2, '3910'),
	(2, '39'),
	(2, '3820'),
	(2, '3810'),
	(2, '38'),
	(2, '3110'),
	(2, '31'),
	(2, '3010'),
	(3, '9920'),
	(3, '9910'),
	(3, '99'),
	(3, '9810'),
	(3, '98'),
	(3, '8030'),
	(3, '8020'),
	(3, '8010'),
	(3, '80'),
	(3, '7010'),
	(3, '70'),
	(3, '2815'),
	(3, '2813'),
	(3, '2812'),
	(3, '2811'),
	(3, '2810'),
	(3, '28'),
	(3, '2715'),
	(3, '2713'),
	(3, '2712'),
	(3, '2711'),
	(3, '2710'),
	(3, '27'),
	(3, '2615'),
	(3, '2613'),
	(3, '2612'),
	(3, '2611'),
	(3, '2610'),
	(3, '26'),
	(3, '2513'),
	(3, '2512'),
	(3, '2511'),
	(3, '2510'),
	(3, '25'),
	(3, '2413'),
	(3, '2412'),
	(3, '2411'),
	(3, '2410'),
	(3, '24'),
	(3, '2313'),
	(3, '2312'),
	(3, '2311'),
	(3, '2310'),
	(3, '23'),
	(3, '2231'),
	(3, '2230'),
	(3, '2226'),
	(3, '2225'),
	(3, '2216'),
	(3, '2215'),
	(3, '22'),
	(3, '2135'),
	(3, '2130'),
	(3, '2125'),
	(3, '2120'),
	(3, '2115'),
	(3, '2110'),
	(3, '21'),
	(3, '2012'),
	(3, '2011'),
	(3, '2010'),
	(3, '20'),
	(3, '1010'),
	(9, '22'),
	(9, '2215'),
	(9, '2216'),
	(9, '2225'),
	(9, '2226'),
	(9, '2230'),
	(9, '2231'),
	(9, '70'),
	(9, '7010'),
	(8, '23'),
	(8, '2310'),
	(8, '2311'),
	(8, '2312'),
	(8, '2313'),
	(8, '24'),
	(8, '2410'),
	(8, '2411'),
	(8, '2412'),
	(8, '2413'),
	(8, '25'),
	(8, '2510'),
	(8, '2511'),
	(8, '2512'),
	(8, '2513'),
	(7, '23'),
	(7, '2310'),
	(7, '2311'),
	(7, '2312'),
	(7, '2313'),
	(7, '24'),
	(7, '2410'),
	(7, '2411'),
	(7, '2412'),
	(7, '2413'),
	(7, '25'),
	(7, '2510'),
	(7, '2511'),
	(7, '2512'),
	(7, '2513'),
	(6, '2110'),
	(6, '2115'),
	(6, '2120'),
	(6, '2125'),
	(6, '2130'),
	(6, '2135'),
	(5, '2815'),
	(5, '2813'),
	(5, '2812'),
	(5, '2811'),
	(5, '2810'),
	(5, '28'),
	(5, '2715'),
	(5, '2713'),
	(5, '2712'),
	(5, '2711'),
	(5, '2710'),
	(5, '27'),
	(5, '2615'),
	(5, '2613'),
	(5, '2612'),
	(5, '2611'),
	(5, '2610'),
	(5, '26'),
	(1, '0515'),
	(1, '0510'),
	(1, '05'),
	(1, '0120'),
	(2, '30'),
	(2, '2020'),
	(2, '2010'),
	(2, '20'),
	(2, '1510'),
	(2, '15'),
	(3, '10'),
	(3, '0111'),
	(3, '0110'),
	(3, '01'),
	(3, '0020'),
	(3, '0010'),
	(10, '80'),
	(10, '8010'),
	(10, '8020'),
	(10, '8030'),
	(1, '0111'),
	(1, '0110'),
	(2, '1020'),
	(2, '10'),
	(1, '01'),
	(1, '0020'),
	(1, '0010'),
	(1, '00'),
	(1, '6011'),
	(1, '6016'),
	(1, '6021'),
	(2, '0110'),
	(2, '01'),
	(11, '01'),
	(11, '0110'),
	(11, '05'),
	(11, '0510'),
	(11, '0515'),
	(11, '0520'),
	(11, '10'),
	(11, '1010'),
	(11, '1020'),
	(11, '1030'),
	(11, '20'),
	(11, '2005'),
	(11, '2010'),
	(11, '2015'),
	(11, '2020'),
	(11, '2025'),
	(11, '21'),
	(11, '2105'),
	(11, '2110'),
	(11, '2115'),
	(11, '2120'),
	(11, '2125'),
	(11, '22'),
	(11, '2205'),
	(11, '2210'),
	(11, '2215'),
	(11, '2220'),
	(11, '2225'),
	(11, '50'),
	(11, '5010'),
	(11, '5015'),
	(11, '5020'),
	(11, '51'),
	(11, '5110'),
	(11, '5115'),
	(11, '5120'),
	(11, '52'),
	(11, '5210'),
	(11, '5215'),
	(11, '5220'),
	(11, '60'),
	(11, '6010'),
	(11, '6011'),
	(11, '6015'),
	(11, '6016'),
	(11, '6020'),
	(11, '6021'),
	(11, '70'),
	(11, '7010'),
	(11, '98'),
	(11, '9810'),
	(11, '99'),
	(11, '9910'),
	(11, '9920'),
	(12, '01'),
	(12, '0110'),
	(12, '05'),
	(12, '0510'),
	(12, '0515'),
	(12, '0520'),
	(12, '10'),
	(12, '1010'),
	(12, '1020'),
	(12, '1030'),
	(12, '20'),
	(12, '2005'),
	(12, '2010'),
	(12, '2015'),
	(12, '2020'),
	(12, '2025'),
	(12, '21'),
	(12, '2105'),
	(12, '2110'),
	(12, '2115'),
	(12, '2120'),
	(12, '2125'),
	(12, '22'),
	(12, '2205'),
	(12, '2210'),
	(12, '2215'),
	(12, '2220'),
	(12, '2225'),
	(12, '50'),
	(12, '5010'),
	(12, '5015'),
	(12, '5020'),
	(12, '51'),
	(12, '5110'),
	(12, '5115'),
	(12, '5120'),
	(12, '52'),
	(12, '5210'),
	(12, '5215'),
	(12, '5220'),
	(12, '60'),
	(12, '6010'),
	(12, '6011'),
	(12, '6015'),
	(12, '6016'),
	(12, '6020'),
	(12, '6021'),
	(12, '70'),
	(12, '7010'),
	(12, '98'),
	(12, '9810'),
	(12, '99'),
	(12, '9910'),
	(12, '9920'),
	(1, '2000'),
	(1, '2010');
/*!40000 ALTER TABLE `popedom` ENABLE KEYS */;


-- 導出  表 house.price_list 結構
CREATE TABLE IF NOT EXISTS `price_list` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Note` text COLLATE utf8_unicode_ci COMMENT '內容',
  `PIC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片儲存名稱',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='安全管理';

-- 正在導出表  house.price_list 的資料：1 rows
DELETE FROM `price_list`;
/*!40000 ALTER TABLE `price_list` DISABLE KEYS */;
INSERT INTO `price_list` (`SerialNo`, `Note`, `PIC`, `PICHidden`) VALUES
	(1, '價格表', NULL, NULL);
/*!40000 ALTER TABLE `price_list` ENABLE KEYS */;


-- 導出  表 house.rooms_are_equipped 結構
CREATE TABLE IF NOT EXISTS `rooms_are_equipped` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Note` text COLLATE utf8_unicode_ci COMMENT '內容',
  `PIC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片儲存名稱',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='房間配備';

-- 正在導出表  house.rooms_are_equipped 的資料：1 rows
DELETE FROM `rooms_are_equipped`;
/*!40000 ALTER TABLE `rooms_are_equipped` DISABLE KEYS */;
INSERT INTO `rooms_are_equipped` (`SerialNo`, `Note`, `PIC`, `PICHidden`) VALUES
	(1, '&lt;div style=&quot;width: 732px;float: right;margin-top: 42px;margin-bottom: 45px;&quot;&gt;\r\n&lt;div style=&quot;background: url({VisualRoot}images/20151120161659.png) no-repeat left top;\r\n    width: 728px;\r\n    height: 809px;&quot;&gt;\r\n&lt;div style=&quot;padding: 380px 0 0 0; width: 680px;&quot;&gt;&lt;span class=&quot;style6&quot;&gt;各房間設獨立式冷氣，&lt;br /&gt;\r\n戶戶有陽台，&lt;br /&gt;\r\n採光足，空氣佳。&lt;/span&gt;&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;span style=&quot;font-family: Arial;font-size: 22px;color: #000;line-height: 160%;&quot;&gt;房內配置原木系統家具、&lt;br /&gt;\r\n電腦桌、德泰雙人彈簧床組、&lt;br /&gt;\r\n加長三門衣櫃、置物櫃、&lt;br /&gt;\r\n平面電視、小鮮綠冰箱。 &lt;/span&gt;&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;span style=&quot;font-family: Arial;font-size: 22px;color: #000;line-height: 160%;&quot;&gt;全棟中華電信光纖網路。&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n', 'room_pc2.png', '20151120102011.png');
/*!40000 ALTER TABLE `rooms_are_equipped` ENABLE KEYS */;


-- 導出  表 house.room_specifications 結構
CREATE TABLE IF NOT EXISTS `room_specifications` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Note` text COLLATE utf8_unicode_ci COMMENT '內容',
  `PIC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片儲存名稱',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='房間規格說明';

-- 正在導出表  house.room_specifications 的資料：1 rows
DELETE FROM `room_specifications`;
/*!40000 ALTER TABLE `room_specifications` DISABLE KEYS */;
INSERT INTO `room_specifications` (`SerialNo`, `Note`, `PIC`, `PICHidden`) VALUES
	(1, '&lt;table border=&quot;0&quot; cellpadding=&quot;3&quot; cellspacing=&quot;0&quot; class=&quot;datetable style9&quot; width=&quot;704&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;center&quot; bgcolor=&quot;#4B1D2C&quot; class=&quot;style8&quot; colspan=&quot;2&quot; height=&quot;35&quot;&gt;房間規格說明&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;center&quot; bgcolor=&quot;#F1EDED&quot; height=&quot;35&quot; width=&quot;104&quot;&gt;建 築 物&lt;/td&gt;\r\n			&lt;td class=&quot;style6&quot; width=&quot;596&quot;&gt;五層樓電梯大樓&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;center&quot; bgcolor=&quot;#F1EDED&quot; height=&quot;35&quot;&gt;房 間 數&lt;/td&gt;\r\n			&lt;td class=&quot;style6&quot;&gt;40 間套房&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;center&quot; bgcolor=&quot;#F1EDED&quot; height=&quot;35&quot;&gt;房間坪數&lt;/td&gt;\r\n			&lt;td class=&quot;style6&quot;&gt;6 至 8 坪&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;center&quot; bgcolor=&quot;#F1EDED&quot; height=&quot;35&quot;&gt;水 電&lt;/td&gt;\r\n			&lt;td class=&quot;style6&quot;&gt;獨立電表（包水不包電）&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;center&quot; bgcolor=&quot;#F1EDED&quot; height=&quot;35&quot;&gt;網 路&lt;/td&gt;\r\n			&lt;td class=&quot;style6&quot;&gt;&lt;img height=&quot;16&quot; src=&quot;images/rooms/l.png&quot; width=&quot;16&quot; /&gt;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;center&quot; bgcolor=&quot;#F1EDED&quot; height=&quot;35&quot;&gt;第 四 台&lt;/td&gt;\r\n			&lt;td class=&quot;style6&quot;&gt;&lt;img alt=&quot;&quot; height=&quot;16&quot; src=&quot;images/rooms/l.png&quot; width=&quot;16&quot; /&gt;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n', 'room_pc1.png', '20151120101310.png');
/*!40000 ALTER TABLE `room_specifications` ENABLE KEYS */;


-- 導出  表 house.sanitary_equipment 結構
CREATE TABLE IF NOT EXISTS `sanitary_equipment` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Note` text COLLATE utf8_unicode_ci COMMENT '內容',
  `PIC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片儲存名稱',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='衛浴設備';

-- 正在導出表  house.sanitary_equipment 的資料：1 rows
DELETE FROM `sanitary_equipment`;
/*!40000 ALTER TABLE `sanitary_equipment` DISABLE KEYS */;
INSERT INTO `sanitary_equipment` (`SerialNo`, `Note`, `PIC`, `PICHidden`) VALUES
	(1, '&lt;div style=&quot;background: url({VisualRoot}images/20151120162513.png) no-repeat left top;width: 530px;height: 490px;&quot;&gt;\r\n&lt;div style=&quot;padding: 105px 0 0 318px; width: 400px; height: 450px&quot;&gt;\r\n&lt;p style=&quot;font-family: Arial;font-size: 22px;color: #000;line-height: 160%;&quot;&gt;時尚衛浴設備，展現好品味。&lt;/p&gt;\r\n\r\n&lt;p style=&quot;font-family: Arial;font-size: 22px;color: #000;line-height: 160%;&quot;&gt;浴室乾溼分離設備、TOTO馬桶、&lt;br /&gt;\r\nTOTO典雅洗手台、花灑蓮蓬頭，&lt;br /&gt;\r\n&lt;br /&gt;\r\n讓您的身心放鬆、舒緩暢快淋浴。&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n', 'room_pc3.png', '20151120103027.png');
/*!40000 ALTER TABLE `sanitary_equipment` ENABLE KEYS */;


-- 導出  表 house.security_management 結構
CREATE TABLE IF NOT EXISTS `security_management` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Note` text COLLATE utf8_unicode_ci COMMENT '內容',
  `PIC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '圖片儲存名稱',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='安全管理';

-- 正在導出表  house.security_management 的資料：1 rows
DELETE FROM `security_management`;
/*!40000 ALTER TABLE `security_management` DISABLE KEYS */;
INSERT INTO `security_management` (`SerialNo`, `Note`, `PIC`, `PICHidden`) VALUES
	(1, '&lt;div style=&quot;width: 732px;float: right;margin-top: 42px;margin-bottom: 45px;&quot;&gt;&lt;!--content--&gt;\r\n&lt;div style=&quot;background: url(../ch/images/sale/sale_bk.png) no-repeat left top;width: 732px;height: 600px;&quot;&gt;\r\n&lt;div style=&quot;padding: 415px 0 0 0px; width: 440px; text-align: right&quot;&gt;\r\n&lt;p style=&quot;font-family: Arial;font-size: 22px;color: #000;line-height: 160%;&quot;&gt;加強賃居房客住屋安全管理。&lt;br /&gt;\r\n&lt;br /&gt;\r\n24HR監控門禁管理，刷卡管制進出。&lt;br /&gt;\r\n各樓層設置緩降機、滅火器、緊急照明設備，&lt;br /&gt;\r\n頂樓無違建，安全性高。&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n', 'room_pc4.png', '20151120104611.png');
/*!40000 ALTER TABLE `security_management` ENABLE KEYS */;


-- 導出  表 house.systememail 結構
CREATE TABLE IF NOT EXISTS `systememail` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名稱',
  `Subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '主旨',
  `Note` text COLLATE utf8_unicode_ci NOT NULL COMMENT '內容',
  `Sort` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系統信件';

-- 正在導出表  house.systememail 的資料：1 rows
DELETE FROM `systememail`;
/*!40000 ALTER TABLE `systememail` DISABLE KEYS */;
INSERT INTO `systememail` (`SerialNo`, `Code`, `Title`, `Subject`, `Note`, `Sort`) VALUES
	(1, '', '聯絡我們問覆', 'Re：{db_Subject}', '&lt;p&gt;Dear {db_Name}&lt;/p&gt;\r\n\r\n&lt;p&gt;根據您的疑問，回覆如下：&lt;/p&gt;\r\n{var_data}\r\n\r\n&lt;p&gt;Best regards,&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;span style=\\&quot;line-height: 1.6em;\\&quot;&gt;如果您有任何疑問，可以利用下列的資訊與我們聯絡：&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;{web_WebName}&lt;br /&gt;\r\n客服：{web_WebTel}&lt;br /&gt;\r\n傳真：{web_WebFax}&lt;br /&gt;\r\n地址：{web_WebAddress}&lt;br /&gt;\r\n信箱：&lt;a href=\\&quot;mailto:{web_ManagerEmail}\\&quot;&gt;{web_ManagerEmail}&lt;/a&gt;&lt;br /&gt;\r\n官網：&lt;a href=\\&quot;{var_host}\\&quot;&gt;{var_host}&lt;/a&gt;&lt;/p&gt;\r\n', 9);
/*!40000 ALTER TABLE `systememail` ENABLE KEYS */;


-- 導出  表 house.treelist 結構
CREATE TABLE IF NOT EXISTS `treelist` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Tree_ID` varchar(4) CHARACTER SET utf8 DEFAULT NULL COMMENT '選單編號',
  `Tree_Name` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '選單名稱',
  `Href_File` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '選單入徑',
  `FileName` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '驗證名稱',
  `Sort` int(11) DEFAULT NULL COMMENT '排序',
  `AdminUse` varchar(1) CHARACTER SET utf8 DEFAULT NULL COMMENT '管理者模式',
  PRIMARY KEY (`SerialNo`),
  KEY `tree_id` (`Tree_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=175 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='功能選單';

-- 正在導出表  house.treelist 的資料：26 rows
DELETE FROM `treelist`;
/*!40000 ALTER TABLE `treelist` DISABLE KEYS */;
INSERT INTO `treelist` (`SerialNo`, `Tree_ID`, `Tree_Name`, `Href_File`, `FileName`, `Sort`, `AdminUse`) VALUES
	(164, '20', '房屋介紹', '', '', 2000, 'N'),
	(165, '2010', '房間規格說明', '../form/RoomSpecifications/RoomSpecifications.php', 'RoomSpecifications.php', 2010, 'N'),
	(77, '00', '管理者', '', '', 0, 'Y'),
	(53, '0010', '資料庫管理', '../form/Mysql/Mysql.php', 'Mysql.php', 10, 'Y'),
	(1, '01', '網站設定', '', '', 100, 'N'),
	(2, '0110', '網站基本資料', '../form/Web/Web.php', 'Web.php', 110, 'N'),
	(3, '0120', '網站關鍵字 ', '../form/Web/Keyword.php', 'Keyword.php', 120, 'Y'),
	(78, '0020', '系統信件', '../form/SystemEmail/SystemEmail.php', 'SystemEmail.php', 200, 'Y'),
	(110, '1020', 'Banner管理', '../form/Banner_ch/Banner.php', 'Banner.php', 1020, 'N'),
	(4, '90', '選單管理', '', '', 9000, 'Y'),
	(5, '9010', '選單管理', '../form/Tree/Tree.php', 'Tree.php', 9010, 'Y'),
	(9, '98', '瀏覽人次', '', '', 9800, 'N'),
	(10, '9810', '瀏覽人次', '../form/Counter/index.php', 'Counter.php', 9810, 'N'),
	(6, '99', '權限管理', '', '', 9900, 'N'),
	(7, '9910', '管理者資料', '../form/System/M_Member.php', 'MMember.php', 9910, 'N'),
	(8, '9920', '權限維護', '../form/System/Control.php', 'Control.php', 9920, 'N'),
	(169, '30', '價格表', '', '', 3000, 'N'),
	(170, '4010', '週邊景點', '../form/Attractions/Attractions.php', 'Attractions.php', 4100, 'N'),
	(171, '50', '聯絡我們', '', '', 5000, 'N'),
	(172, '3010', '價格表', '../form/PriceList/PriceList.php', 'PriceList.php', 3100, 'N'),
	(173, '40', '週邊景點', '', '', 4000, 'N'),
	(174, '5010', '聯絡我們', '../form/ContactUs/ContactUs.php', 'ContactUs.php', 5100, 'N'),
	(139, '10', 'Banner管理', '', '', 1000, 'N'),
	(167, '2030', '衛浴設備', '../form/SanitaryEquipment/SanitaryEquipment.php', 'SanitaryEquipment.php', 2030, 'N'),
	(168, '2040', '安全管理', '../form/SecurityManagement/SecurityManagement.php', 'SecurityManagement.php', 2040, 'N'),
	(166, '2020', '房間配備', '../form/RoomsAreEquipped/RoomsAreEquipped.php', 'RoomsAreEquipped.php', 2020, 'N');
/*!40000 ALTER TABLE `treelist` ENABLE KEYS */;


-- 導出  表 house.web 結構
CREATE TABLE IF NOT EXISTS `web` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT,
  `G0` int(11) NOT NULL COMMENT '測試',
  `WebTitle` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '網站標題',
  `WebTitleEn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網站標題(英文)',
  `WebTitleCn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網站標題(簡体)',
  `WebTitleCh` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網站標題(繁體)',
  `WebName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網站名稱',
  `WebNameEn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網站名稱(英文)',
  `WebNameCh` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網站名稱(繁體)',
  `WebNameCn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網站名稱(簡体)',
  `WebTel` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '電話(中文)',
  `WebPhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '電話(中文)',
  `WebTelEn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebTelCn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebTelCh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '服務時間',
  `WebFax` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '傳真(中文)',
  `WebFaxCh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebFaxCn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebFaxEn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebAddress` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '地址(中文)',
  `WebAddressCh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebAddressCn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `WebAddressEn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `OtherUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '其他超連結',
  `FacebookUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'facebook超連結',
  `FacebookAppID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FacebookAppPWD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ManagerEmail` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '管理者EMail',
  `ManagerEmailAccount` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '管理者EMail帳號',
  `ManagerEmailPWD` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '管理者EMail密碼',
  `EMailServer` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '郵件伺服器位址',
  `Description` text CHARACTER SET utf8 NOT NULL COMMENT '內容描述',
  `DescriptionCn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '內容描述',
  `DescriptionEn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '內容描述',
  `DescriptionCh` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '內容描述',
  `Copyright` text COLLATE utf8_unicode_ci NOT NULL COMMENT '版權說明',
  `CopyrightEn` text COLLATE utf8_unicode_ci NOT NULL COMMENT '版權說明',
  `CopyrightCn` text COLLATE utf8_unicode_ci NOT NULL COMMENT '版權說明',
  `CopyrightCh` text COLLATE utf8_unicode_ci NOT NULL COMMENT '版權說明',
  `Keywords` text COLLATE utf8_unicode_ci NOT NULL COMMENT '關鍵字',
  `KeywordsEn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '關鍵字',
  `KeywordsCn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '關鍵字',
  `KeywordsCh` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '關鍵字',
  `OrderNote` text COLLATE utf8_unicode_ci NOT NULL COMMENT '訂購說明',
  `datedb` text COLLATE utf8_unicode_ci NOT NULL,
  `recentdb` text COLLATE utf8_unicode_ci NOT NULL,
  `startdb` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在導出表  house.web 的資料：1 rows
DELETE FROM `web`;
/*!40000 ALTER TABLE `web` DISABLE KEYS */;
INSERT INTO `web` (`SerialNo`, `G0`, `WebTitle`, `WebTitleEn`, `WebTitleCn`, `WebTitleCh`, `WebName`, `WebNameEn`, `WebNameCh`, `WebNameCn`, `WebTel`, `WebPhone`, `WebTelEn`, `WebTelCn`, `WebTelCh`, `WebTime`, `WebFax`, `WebFaxCh`, `WebFaxCn`, `WebFaxEn`, `WebAddress`, `WebAddressCh`, `WebAddressCn`, `WebAddressEn`, `OtherUrl`, `FacebookUrl`, `FacebookAppID`, `FacebookAppPWD`, `ManagerEmail`, `ManagerEmailAccount`, `ManagerEmailPWD`, `EMailServer`, `Description`, `DescriptionCn`, `DescriptionEn`, `DescriptionCh`, `Copyright`, `CopyrightEn`, `CopyrightCn`, `CopyrightCh`, `Keywords`, `KeywordsEn`, `KeywordsCn`, `KeywordsCh`, `OrderNote`, `datedb`, `recentdb`, `startdb`) VALUES
	(1, 0, '雅苑麗緻會館', '', '', '', '雅苑麗緻會館', '', '', '', '06-5990-031', '0932-469-496', '+886-6-5990-031', '', '', '週一至週六 AM10:00~PM20:00 (星期日公休) ', '+886 6 2973446', '', '', '', '台南市新市區和平街 166 號', '', '', 'No.166, Heping St., Xinshi Dist.,  Tainan City 74448, Taiwan (R.O.C.)', 'http://tqr.tw/cn/search.aspx', '', '', '', 'yes1688@tndg.com.tw', '', '', 'msa.hinet.net', '南科租屋,南科商務套房出租,南科住宿,南科旅館,南科民宿,南科旅遊飯店', '', '', '', '© 雅苑麗緻會館 2015', '', '', '', '南科租屋,南科商務套房出租,南科住宿,南科旅館,南科民宿,南科旅遊飯店', '', '', '', '&lt;style type=&quot;text/css&quot;&gt;\r\n.h1{\r\n	font-family: Arial, Helvetica, sans-serif;\r\n	font-size: 15px;\r\n	font-weight: bold;\r\n	color: #870118;\r\n	text-decoration: none;\r\n	}\r\n.h1 a:link{\r\n	color: #870118;\r\n	text-decoration: none;\r\n	}\r\n.h1 a:visited{\r\n	color: #870118;\r\n	text-decoration: none;\r\n	}\r\n.h1 a:hover{\r\n	color: #C00;\r\n	text-decoration: none;\r\n	}\r\n.text02{\r\n	font-family: Arial, Helvetica, sans-serif;\r\n	font-size: 13px;\r\n	color: #C2C2C2;\r\n	}\r\n.text04{\r\n	font-family: Arial, Helvetica, sans-serif;\r\n	font-size: 13px;\r\n	color: #CE8B00;\r\n	}\r\n}&lt;/style&gt;\r\n&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; colspan=&quot;2&quot; style=&quot;padding:3px&quot; valign=&quot;middle&quot;&gt;\r\n				■ 王家老木訂購說明&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text02&quot; colspan=&quot;2&quot; style=&quot;padding:5px 5px 5px 19px&quot; valign=&quot;middle&quot;&gt;\r\n				來電訂購：07-349-8335&lt;br /&gt;\r\n				傳真訂購：07-350-0198 電話預約來店自取 或網站下單。&lt;br /&gt;\r\n				訂購時間：(10:00AM~10:00PM)&lt;br /&gt;\r\n				您在本網站下單後，我們將主動與您聯繫確認訂單金額及運費。&lt;br /&gt;\r\n				完成匯款動作之後，將於三個工作天內為您出貨。&lt;br /&gt;\r\n				(電話預約來店自取於當日12:00PM前完成訂購於翌日05:00PM即可取件。但為熟食而非冷凍包裝。)&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; colspan=&quot;2&quot; style=&quot;padding:10px 3px 3px 3px&quot; valign=&quot;middle&quot;&gt;\r\n				■ 訂購資料填寫&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text02&quot; colspan=&quot;2&quot; style=&quot;padding:5px 5px 5px 19px&quot; valign=&quot;middle&quot;&gt;\r\n				請註明:收件人姓名(或公司名稱) 訂購人手機(或電話) 收貨地址。&lt;br /&gt;\r\n				我們將依此資料寄送貨品，請務必清楚填寫以確保貨品正確送達。&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; style=&quot;padding:10px 3px 3px 3px&quot; valign=&quot;middle&quot; width=&quot;42%&quot;&gt;\r\n				■ 匯款資訊&lt;/td&gt;\r\n			&lt;td align=&quot;center&quot; rowspan=&quot;2&quot; valign=&quot;middle&quot; width=&quot;58%&quot;&gt;\r\n				&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text04&quot; style=&quot;padding:5px 5px 5px 19px&quot; valign=&quot;top&quot;&gt;\r\n				銀行名稱： 新光商業銀行---左營華夏路分行&lt;br /&gt;\r\n				帳戶名稱：王秀美&lt;br /&gt;\r\n				帳 號： 0365&amp;ndash;10&amp;ndash;10148&amp;ndash;7&lt;br /&gt;\r\n				電 話： 07-349-8335&lt;br /&gt;\r\n				傳 真：07-350-0198&lt;br /&gt;\r\n				本店地址： 高雄市左營區華夏路1055號&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; colspan=&quot;2&quot; style=&quot;padding:10px 3px 3px 3px&quot; valign=&quot;middle&quot;&gt;\r\n				■ 退換貨資訊&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; colspan=&quot;2&quot; style=&quot;padding-left:16px&quot; valign=&quot;middle&quot;&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:2px&quot; valign=&quot;middle&quot; width=&quot;4%&quot;&gt;\r\n								&lt;span class=&quot;text02&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot; width=&quot;96%&quot;&gt;\r\n								任何的退換貨請於接獲產品後&lt;span class=&quot;text04&quot;&gt;1個工作天內&lt;/span&gt;提出(以週休二日為準，含國定例假日)。並請保留產品本身及包裝。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:2px&quot; valign=&quot;middle&quot;&gt;\r\n								&lt;span class=&quot;text02&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot;&gt;\r\n								退換貨前請先以電子郵件、電話或傳真與本公司服務人員聯絡，以加快處理速度。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:5px 2px 2px 2px&quot; valign=&quot;top&quot;&gt;\r\n								&lt;span class=&quot;text02&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot;&gt;\r\n								退換貨經確認受理後，本公司服務人員會與您討論收取退換貨之日期、方式、時間及其他相關之退換貨處理細節。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:2px&quot; valign=&quot;middle&quot;&gt;\r\n								&lt;span class=&quot;text02&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot;&gt;\r\n								未經上述程序之任何退換貨，本公司礙難受理，不便之處，尚祈見諒！&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:2px&quot; valign=&quot;middle&quot;&gt;\r\n								&lt;span class=&quot;text02&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot;&gt;\r\n								可歸責於本公司或物流貨運公司之產品毀損不在此限，請您於收到貨品時先行檢查再簽收。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; class=&quot;text02&quot; style=&quot;padding:2px&quot; valign=&quot;middle&quot;&gt;\r\n								◎&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot;&gt;\r\n								其餘原因之退換貨，均須酌收運送商品的手續費及運費。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text02&quot; colspan=&quot;2&quot; style=&quot;padding-left:16px&quot; valign=&quot;middle&quot;&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:2px&quot; valign=&quot;middle&quot; width=&quot;4%&quot;&gt;\r\n								◆&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot; width=&quot;96%&quot;&gt;\r\n								&lt;p&gt;\r\n									如對商品有任何疑問，歡迎來電洽詢:&lt;span class=&quot;text04&quot;&gt; 07-349-8335&lt;/span&gt; 或 &lt;span class=&quot;link2&quot;&gt;&lt;a href=&quot;http://www.tndgdemo2.com/motherwang/ch/contact.php&quot;&gt;來信&lt;/a&gt;&lt;/span&gt; 洽詢。&lt;/p&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:5px 2px 2px 2px&quot; valign=&quot;top&quot;&gt;\r\n								◆&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot;&gt;\r\n								退款辦法當本商店收到您的退貨郵件後，本商店將先對商品進行審查，於確認退貨商品係因本商店商品瑕疵之原因或商品非因瑕疵而符合退貨標準時，我們將為您辦理退款手續。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding:5px 2px 2px 2px&quot; valign=&quot;top&quot;&gt;\r\n								◆&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text04&quot; style=&quot;padding:5px&quot; valign=&quot;middle&quot;&gt;\r\n								以匯款方式付款者，我們會將款項退到您的銀行或郵局個人帳戶內，有任何問題歡迎您以e-mail或來電給本商店，我們將會立即為您處理。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n', 'a:8:{s:4:"snap";a:11:{i:0;i:213;i:1;i:1;i:2;i:1;i:3;i:1;i:4;i:213;i:5;i:2;i:6;i:1447061681;i:7;s:10:"2015-03-27";i:8;i:19;i:9;s:7:"2015-04";i:10;i:105;}s:4:"hour";a:2:{s:6:"recent";a:24:{i:0;i:0;i:1;i:0;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;i:6;i:0;i:7;i:0;i:8;i:0;i:9;i:1;i:10;i:1;i:11;i:1;i:12;i:0;i:13;i:1;i:14;i:1;i:15;i:1;i:16;i:1;i:17;i:1;i:18;i:2;i:19;i:1;i:20;i:0;i:21;i:0;i:22;i:0;i:23;i:0;}s:3:"all";a:24:{i:0;i:0;i:1;i:0;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;i:6;i:0;i:7;i:0;i:8;i:0;i:9;i:25;i:10;i:27;i:11;i:34;i:12;i:0;i:13;i:30;i:14;i:22;i:15;i:32;i:16;i:22;i:17;i:18;i:18;i:2;i:19;i:1;i:20;i:0;i:21;i:0;i:22;i:0;i:23;i:0;}}s:3:"day";a:2:{s:6:"recent";a:31:{i:1;i:7;i:2;i:3;i:3;i:0;i:4;i:0;i:5;i:2;i:6;i:1;i:7;i:2;i:8;i:1;i:9;i:1;i:10;i:1;i:11;i:1;i:12;i:0;i:13;i:1;i:14;i:0;i:15;i:0;i:16;i:0;i:17;i:0;i:18;i:0;i:19;i:1;i:20;i:6;i:21;i:1;i:22;i:2;i:23;i:2;i:24;i:6;i:25;i:2;i:26;i:13;i:27;i:16;i:28;i:12;i:29;i:13;i:30;i:10;i:31;i:16;}s:3:"all";a:31:{i:1;i:7;i:2;i:3;i:3;i:0;i:4;i:0;i:5;i:2;i:6;i:1;i:7;i:19;i:8;i:11;i:9;i:8;i:10;i:1;i:11;i:1;i:12;i:0;i:13;i:1;i:14;i:0;i:15;i:0;i:16;i:0;i:17;i:0;i:18;i:0;i:19;i:1;i:20;i:6;i:21;i:1;i:22;i:3;i:23;i:16;i:24;i:14;i:25;i:9;i:26;i:13;i:27;i:35;i:28;i:12;i:29;i:13;i:30;i:20;i:31;i:16;}}s:5:"month";a:2:{s:6:"recent";a:12:{i:1;i:0;i:2;i:0;i:3;i:91;i:4;i:105;i:5;i:11;i:6;i:5;i:7;i:0;i:8;i:0;i:9;i:0;i:10;i:0;i:11;i:1;i:12;i:0;}s:3:"all";a:12:{i:1;i:0;i:2;i:0;i:3;i:91;i:4;i:105;i:5;i:11;i:6;i:5;i:7;i:0;i:8;i:0;i:9;i:0;i:10;i:0;i:11;i:1;i:12;i:0;}}s:4:"week";a:2:{s:6:"recent";a:7:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:1;i:4;i:2;i:5;i:1;i:6;i:0;}s:3:"all";a:7:{i:0;i:0;i:1;i:44;i:2;i:59;i:3;i:41;i:4;i:37;i:5;i:32;i:6;i:0;}}s:4:"year";a:1:{i:0;i:213;}s:7:"browser";a:5:{s:13:"Safari 537.36";i:182;s:6:"Others";i:28;s:12:"FireFox 35.0";i:1;s:14:"Safari 600.1.4";i:1;s:12:"FireFox 37.0";i:1;}s:2:"os";a:5:{s:9:"Windows 7";i:202;s:10:"Windows XP";i:7;s:5:"Linux";i:2;s:6:"Others";i:1;s:10:"Windows NT";i:1;}}', 'a:20:{i:0;a:4:{i:0;i:1447061681;i:1;s:3:"::1";i:2;s:60:"http://localhost/www.caregoods.com.tw/caregoods/ch/index.php";i:3;s:38:"http://localhost/www.caregoods.com.tw/";}i:1;a:4:{i:0;i:1435037944;i:1;s:9:"127.0.0.1";i:2;s:32:"http://localhost:81/ch/index.php";i:3;s:0:"";}i:2;a:4:{i:0;i:1435023231;i:1;s:9:"127.0.0.1";i:2;s:32:"http://localhost:81/ch/index.php";i:3;s:0:"";}i:3;a:4:{i:0;i:1434966403;i:1;s:9:"127.0.0.1";i:2;s:29:"http://localhost/ch/index.php";i:3;s:0:"";}i:4;a:4:{i:0;i:1434957047;i:1;s:9:"127.0.0.1";i:2;s:29:"http://localhost/ch/index.php";i:3;s:0:"";}i:5;a:4:{i:0;i:1433905138;i:1;s:9:"127.0.0.1";i:2;s:29:"http://localhost/ch/index.php";i:3;s:0:"";}i:6;a:4:{i:0;i:1432518970;i:1;s:13:"59.125.159.77";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:7;a:4:{i:0;i:1432517236;i:1;s:13:"59.125.159.77";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:8;a:4:{i:0;i:1432026746;i:1;s:12:"59.127.3.192";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:9;a:4:{i:0;i:1431499919;i:1;s:13:"59.125.159.77";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:10;a:4:{i:0;i:1431327850;i:1;s:12:"59.127.3.192";i:2;s:47:"http://www.tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:11;a:4:{i:0;i:1431076194;i:1;s:12:"59.127.3.192";i:2;s:47:"http://www.tndgdemo2.com/caregoods/ch/index.php";i:3;s:51:"http://www.tndgdemo2.com/caregoods/manager/down.php";}i:12;a:4:{i:0;i:1430988212;i:1;s:12:"59.127.3.192";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:13;a:4:{i:0;i:1430969711;i:1;s:13:"59.125.159.77";i:2;s:64:"http://tndgdemo2.com/caregoods/ch/productin.php?Page=1&G0=9&G1=3";i:3;s:45:"http://tndgdemo2.com/caregoods/ch/product.php";}i:14;a:4:{i:0;i:1430913063;i:1;s:13:"61.62.172.163";i:2;s:47:"http://www.tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:15;a:4:{i:0;i:1430796227;i:1;s:13:"59.125.159.77";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:16;a:4:{i:0;i:1430795849;i:1;s:13:"59.125.159.77";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:17;a:4:{i:0;i:1430379494;i:1;s:12:"59.127.3.192";i:2;s:45:"http://tndgdemo2.com/caregoods/ch/caption.php";i:3;s:64:"http://tndgdemo2.com/caregoods/ch/productin.php?Page=1&G0=9&G1=3";}i:18;a:4:{i:0;i:1430379474;i:1;s:13:"59.125.159.77";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}i:19;a:4:{i:0;i:1430370983;i:1;s:15:"223.139.224.127";i:2;s:43:"http://tndgdemo2.com/caregoods/ch/index.php";i:3;s:0:"";}}', '1426821286');
/*!40000 ALTER TABLE `web` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
