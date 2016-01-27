DROP TABLE IF EXISTS `{DBName01}`;
CREATE TABLE IF NOT EXISTS `{DBName01}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '留言標題',
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '聯絡姓名',
  `EMail` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '電子郵件',
  `Tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '聯絡電話',
  `Note` text COLLATE utf8_unicode_ci NOT NULL COMMENT '內容',
  `PostDate` date NOT NULL COMMENT '日期',
  `Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName01}' AUTO_INCREMENT=1 ;
DROP TABLE IF EXISTS `{DBName02}`;
CREATE TABLE IF NOT EXISTS `{DBName02}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `G0` int(11) NOT NULL COMMENT '聯絡我們流水號',
  `ReplyDate` datetime NOT NULL COMMENT '回覆時間',
  `ReplyNote` text NOT NULL COMMENT '回覆內容',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName02}' AUTO_INCREMENT=1 ;
DELETE FROM `treelist` WHERE `Tree_ID` = '80';
DELETE FROM `treelist` WHERE `Tree_ID` = '8010';
INSERT INTO `treelist` (`Tree_ID`, `Tree_Name`, `Href_File`, `FileName`, `Sort`, `AdminUse`) VALUES
('80','{ModName01}', '', '', 8000, 'N'),
('8010','{ModName01}', '../form/Contact/Contact.php', 'Contact.php', 8010, 'N');
