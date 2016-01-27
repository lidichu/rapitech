DROP TABLE IF EXISTS `{DBName}`;
CREATE TABLE IF NOT EXISTS `{DBName}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `LinkUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TargetWindow` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '開啟方式',
  `PIC` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片儲存名稱',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName}' AUTO_INCREMENT=1 ;
DELETE FROM `treelist` WHERE `Tree_ID` = '10';
DELETE FROM `treelist` WHERE `Tree_ID` = '1010';
INSERT INTO `treelist` (`Tree_ID`, `Tree_Name`, `Href_File`, `FileName`, `Sort`, `AdminUse`) VALUES
('10','{ModName}', '', '', 1000, 'N'),
('1010','{ModName}', '../form/Banner/Banner.php', 'Banner.php', 1010, 'N');
