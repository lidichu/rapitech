DROP TABLE IF EXISTS `{DBName01}`;
CREATE TABLE IF NOT EXISTS `{DBName01}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `IndexShow` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '首頁顯示',
  `PostDate` date NOT NULL COMMENT '日期',
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '標題',
  `Note` text COLLATE utf8_unicode_ci NOT NULL COMMENT '內容',
  `Sort` int(50) NOT NULL COMMENT '排序',
  `IndexSort` int(50) NOT NULL COMMENT '首頁排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName01}' AUTO_INCREMENT=1 ;
DROP TABLE IF EXISTS `{DBName02}`;
CREATE TABLE IF NOT EXISTS `{DBName02}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `G0` int(11) NOT NULL COMMENT '最新消息流水號',
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '標題',
  `LinkUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '網址',
  `TargetWindow` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '目標視窗',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName02}' AUTO_INCREMENT=1 ;
DROP TABLE IF EXISTS `{DBName03}`;
CREATE TABLE IF NOT EXISTS `{DBName03}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `G0` int(11) NOT NULL COMMENT '最新消息流水號',
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '標題',
  `File` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '檔案名稱',
  `FileHidden` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '檔案儲存名稱',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName03}' AUTO_INCREMENT=1 ;
