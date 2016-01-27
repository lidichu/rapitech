DROP TABLE IF EXISTS `{DBName01}`;
CREATE TABLE IF NOT EXISTS `{DBName01}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `Category` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名稱',
  `ShortCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '簡稱',
  `Sort` int(50) NOT NULL COMMENT '排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName01}' AUTO_INCREMENT=1 ;
DROP TABLE IF EXISTS `{DBName02}`;
CREATE TABLE IF NOT EXISTS `{DBName02}` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `G0` int(11) NOT NULL COMMENT '分類流水號',
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱',
  `Note` text COLLATE utf8_unicode_ci NOT NULL COMMENT '產品內容',
  `Sort` int(50) NOT NULL COMMENT '排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName02}' AUTO_INCREMENT=1 ;
DROP TABLE IF EXISTS `{DBName03}`;
CREATE TABLE IF NOT EXISTS `{DBName03}` (
 `SerialNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `G1` int(11) NOT NULL COMMENT '產品流水號',
  `PICTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片標題',
  `PIC` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片名稱',
  `PICHidden` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片儲存名稱',
  `Sort` int(50) NOT NULL COMMENT '排序',
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY (`SerialNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='{ModName03}' AUTO_INCREMENT=1 ;


