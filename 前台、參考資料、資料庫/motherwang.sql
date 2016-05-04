-- phpMyAdmin SQL Dump
-- version 2.8.2.4
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost:3306
-- 建立日期: May 04, 2016, 09:19 AM
-- 伺服器版本: 5.0.22
-- PHP 版本: 5.0.5
-- 
-- 資料庫: `motherwang`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `banner`
-- 

CREATE TABLE `banner` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `PIC` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '圖片',
  `PICHidden` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '圖片儲存名稱',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='橫幅管理' AUTO_INCREMENT=49 ;

-- 
-- 列出以下資料庫的數據： `banner`
-- 

INSERT INTO `banner` (`SerialNo`, `PIC`, `PICHidden`, `Sort`, `Status`) VALUES (47, '20121024011154.png', '20160310010536.png', 9999, '上架'),
(48, '20121024011158.png', '20160310010749.png', 9999, '上架');

-- --------------------------------------------------------

-- 
-- 資料表格式： `contact`
-- 

CREATE TABLE `contact` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `Lang` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '語言版本',
  `Subject` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '主旨',
  `Name` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '姓名',
  `Sex` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '性別',
  `Tel` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '電話',
  `EMail` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '信箱',
  `Address` text collate utf8_unicode_ci NOT NULL COMMENT '地址',
  `Note` text collate utf8_unicode_ci NOT NULL COMMENT '內容',
  `PostDate` date NOT NULL COMMENT '日期',
  `Status` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='聯絡我們' AUTO_INCREMENT=20 ;

-- 
-- 列出以下資料庫的數據： `contact`
-- 

INSERT INTO `contact` (`SerialNo`, `Lang`, `Subject`, `Name`, `Sex`, `Tel`, `EMail`, `Address`, `Note`, `PostDate`, `Status`) VALUES (16, '', '訂購雞湯', '陳彥萍', 'Female', '0923220234', 'apinlbear@yahoo.cim.tw', '221新北市汐止區樟樹二路330巷68號3樓', '我要訂一個蒜頭蜆雞<br />收件人:劉皇佩<br />地址:新北市汐止區樟樹二路330巷68號3樓<br />0917657728', '2014-01-11', '已處理'),
(17, '', '宅配', '姒元元', 'Female', '0987227495', 'b0987227495@gmail.com', '333桃園縣龜山鄉復興南路lo6巷52號一樓', '東波肉', '2014-02-09', '已處理'),
(18, '', '訂購產品包裝', '柳景元', 'Male', '0932798074', '111111111111', '隔壁', '叮噹:<br /><br />     麻煩你將2份東坡肉 包在一起,註明李吳滿<br />                     1份東坡肉+砂鍋魚頭+什菜 包在一起,註明黑人<br /><br />                以上產品全部包在同一箱 2/2(二)寄出<br /><br />     感謝你的合作,謝謝', '2016-01-25', '已處理'),
(19, '', '橙鎰商業攝影業務洽詢', '陳仕鎰', 'Male', '0963718841', 'proorangeone@gmail.com', '710台南市永康區竹南街56巷15弄19號', '您好，我是橙鎰商業攝影，想與您接洽產品攝影的業務，再一個平面化時代在行銷觀念中，產品固然再完美，客戶沒有購買衝動時並無法得到具體的認知，一個好的產品照片代表著公司的正面形象，真正的商業攝影師必須考慮並整和所有問題達到正確傳達產品資訊及兼具美感的能力，我們注重產品的質感真實傳達產品本身的材質以及細緻紋路，堅持拍出產品的價值，讓產品可以得到更好的賣相，我有完整技術且專業的拍攝器材可以完成您的要求，以你們想要的風格結合我的專業技術獲得更好的產品形象照片，甚至結合後期美編來討論如何進行更完美的包裝效果，一個成功的品牌並非偶然，他們注重每個細節與環結才能打造完美的形象，您有需要產品攝影的服務請隨時與我聯絡，代請管理人員幫忙轉達此訊息給行銷經理或者相關負責單位，非常感謝您的幫忙。<br /><br />我們提供的服務<br /><br />產品目錄去背照拍攝<br />產品情境照拍攝<br />後製去除背景<br />產品照片修飾(顏色校正，基本調光)<br />建築攝影<br /><br />陳仕鎰<br />0963718841<br />LINE ID：0963718841<br /><br />附上我的網頁連結提供您參考。<br />http://proorangeone.wix.com/ orangeone', '2016-04-27', '未處理');

-- --------------------------------------------------------

-- 
-- 資料表格式： `contactreply`
-- 

CREATE TABLE `contactreply` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '聯絡我們回覆流水號',
  `G0` int(11) NOT NULL COMMENT '聯絡我們流水號',
  `ReplyDate` datetime NOT NULL COMMENT '回覆時間',
  `ReplyNote` text collate utf8_unicode_ci NOT NULL COMMENT '回覆內容',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='聯絡我們回覆' AUTO_INCREMENT=9 ;

-- 
-- 列出以下資料庫的數據： `contactreply`
-- 

INSERT INTO `contactreply` (`SerialNo`, `G0`, `ReplyDate`, `ReplyNote`) VALUES (7, 16, '2014-01-13 00:10:13', '收到您的訂單囉! 將盡快為您出貨。&lt;br /&gt;\r\n請問雞要切好還是要整隻呢?'),
(8, 17, '2014-02-10 14:28:01', '已收到訂單，今日將會您製作。謝謝您的訂購。');

-- --------------------------------------------------------

-- 
-- 資料表格式： `m_member`
-- 

CREATE TABLE `m_member` (
  `SerialNo` int(11) NOT NULL auto_increment,
  `Acc` varchar(15) character set utf8 NOT NULL,
  `Name` varchar(20) character set utf8 NOT NULL,
  `Email` varchar(50) character set utf8 NOT NULL,
  `Pwd` varchar(10) character set utf8 NOT NULL,
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理者資料' AUTO_INCREMENT=5 ;

-- 
-- 列出以下資料庫的數據： `m_member`
-- 

INSERT INTO `m_member` (`SerialNo`, `Acc`, `Name`, `Email`, `Pwd`) VALUES (1, 'admin', 'Admin', '', '0113'),
(3, 'maggie', '蔡小寶', 'maggie@tndg.com', '0403'),
(4, 'service', '柯品宏', 'ss855171tw@gmail.com', 'Pinhong01');

-- --------------------------------------------------------

-- 
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `Name` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL COMMENT '姓名',
  `EMail` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL COMMENT '信箱',
  `Sex` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL COMMENT '性別',
  `Address` text character set utf8 collate utf8_unicode_ci NOT NULL COMMENT '地址',
  `Tel` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL COMMENT '聯絡電話',
  `LoginID` varchar(255) NOT NULL COMMENT '登入帳號',
  `LoginPWD` varchar(255) NOT NULL COMMENT '登入密碼',
  `AddDate` datetime NOT NULL COMMENT '建立帳號日期',
  `Status` varchar(50) NOT NULL COMMENT '啟用狀態',
  `ActiveCode` varchar(50) NOT NULL COMMENT '啟用密碼',
  `FacebookID` varchar(255) NOT NULL COMMENT 'FaceBookID',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='會員資料' AUTO_INCREMENT=2 ;

-- 
-- 列出以下資料庫的數據： `member`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `news`
-- 

CREATE TABLE `news` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `IndexShow` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '首頁顯示',
  `PostDate` date NOT NULL COMMENT '日期',
  `Title` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '標題(繁體)',
  `Note` text collate utf8_unicode_ci NOT NULL COMMENT '內容(繁體)',
  `PIC` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '消息小圖',
  `PICHidden` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '消息小圖儲存名稱',
  `Sort` int(50) NOT NULL COMMENT '排序',
  `IndexSort` int(50) NOT NULL COMMENT '首頁排序',
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='最新消息' AUTO_INCREMENT=84 ;

-- 
-- 列出以下資料庫的數據： `news`
-- 

INSERT INTO `news` (`SerialNo`, `IndexShow`, `PostDate`, `Title`, `Note`, `PIC`, `PICHidden`, `Sort`, `IndexSort`, `Status`) VALUES (81, 'false', '2014-09-15', '＊膠原蛋白凍宅配規則異動', '由於保存條件的關係，為避免爭議，將停止90公分宅配紙箱免運費(72顆免運)&lt;br /&gt;\r\n改為48顆即免運費(兩箱保麗龍盒分裝合併寄送)&lt;br /&gt;\r\n', '', '', 9999, 9999, '上架'),
(82, 'false', '2015-12-14', '關於王家老木食品之食用水', '本店食用水採用安麗益之源淨水器，外加三道濾棉、樹脂、活性碳過濾，敬請放心使用。', '', '', 9999, 1, '上架');

-- --------------------------------------------------------

-- 
-- 資料表格式： `newsfile`
-- 

CREATE TABLE `newsfile` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `G0` int(11) NOT NULL COMMENT '最新消息流水號',
  `Title` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '標題(繁體)',
  `File` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '檔案名稱',
  `FileHidden` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '檔案儲存名稱',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='最新消息-檔案下載' AUTO_INCREMENT=18 ;

-- 
-- 列出以下資料庫的數據： `newsfile`
-- 

INSERT INTO `newsfile` (`SerialNo`, `G0`, `Title`, `File`, `FileHidden`, `Sort`, `Status`) VALUES (6, 57, 'test', 'Tulips.jpg', '20121023095456.jpg', 9999, '上架'),
(7, 58, 'test', '1003.jpg', '20121024124438.jpg', 9999, '上架'),
(8, 61, '檔案可載入', 'test.docx', '20121025090736.docx', 9999, '上架'),
(11, 65, '→宅配訂購單下載請按我←', '商品傳真(EMAIL)訂購單3.docx', '20121203011350.docx', 1, '上架'),
(13, 66, '→宅配訂購單下載請按我←', '商品傳真(EMAIL)訂購單.docx', '20121220125430.docx', 9999, '上架'),
(16, 69, '商品傳真(EMAIL)訂購單', '商品傳真(EMAIL)訂購單2003版.doc', '20130105011843.doc', 9999, '上架'),
(15, 70, 'QQ', '搜尋列01.jpg', '20121224014844.jpg', 9999, '上架'),
(17, 72, '年菜菜單下載', '年菜預購文案97-2003版.doc', '20130105102501.doc', 9999, '上架');

-- --------------------------------------------------------

-- 
-- 資料表格式： `newslink`
-- 

CREATE TABLE `newslink` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `G0` int(11) NOT NULL COMMENT '最新消息流水號',
  `Title` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '標題(繁體)',
  `Url` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '網址',
  `TargetWindow` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '目標視窗',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='最新消息-相關連結' AUTO_INCREMENT=7 ;

-- 
-- 列出以下資料庫的數據： `newslink`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `orderitem`
-- 

CREATE TABLE `orderitem` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '訂單明細流水號',
  `G0` int(11) NOT NULL COMMENT '訂單編號流水號',
  `StyleSerialNo` int(11) NOT NULL COMMENT '產品流水號',
  `PrdName` varchar(255) character set utf8 NOT NULL COMMENT '產品名稱',
  `ColorName` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '顏色',
  `SizeName` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '尺寸',
  `PrdAmount` int(11) NOT NULL COMMENT '購買數量',
  `PrdPrice` int(50) NOT NULL COMMENT '原價',
  `Temp` text collate utf8_unicode_ci NOT NULL COMMENT '出貨明細',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='訂單明細' AUTO_INCREMENT=78 ;

-- 
-- 列出以下資料庫的數據： `orderitem`
-- 

INSERT INTO `orderitem` (`SerialNo`, `G0`, `StyleSerialNo`, `PrdName`, `ColorName`, `SizeName`, `PrdAmount`, `PrdPrice`, `Temp`) VALUES (50, 2, 37, '美妍凍(香醇冬瓜糖)', '', '', 2, 40, ''),
(51, 2, 34, '美妍凍(紅棗枸杞-原味)', '', '', 2, 40, ''),
(49, 2, 38, '美妍凍(綿密紅豆)', '', '', 2, 40, ''),
(48, 2, 36, '美妍凍(清爽檸檬)', '', '', 2, 40, ''),
(47, 2, 39, '美妍凍(馥鬱百香果)', '', '', 2, 40, ''),
(46, 1, 38, '美顏凍(紅豆)', '', '', 1, 40, ''),
(44, 1, 36, '美顏凍(清爽檸檬)', '', '', 1, 40, ''),
(45, 1, 37, '美顏凍(冬瓜糖)', '', '', 1, 40, ''),
(52, 3, 10, '招牌東坡肉', '', '', 1, 400, ''),
(53, 3, 12, '古早味什錦', '', '', 1, 350, ''),
(54, 4, 16, '蒜頭蜆雞(全雞)', '', '', 1, 700, ''),
(55, 5, 19, '酸菜白肉鍋', '', '', 1, 450, ''),
(56, 5, 16, '蒜頭蜆雞(全雞)', '', '', 1, 700, ''),
(57, 5, 17, '養生菇菇雞(全雞)', '', '', 2, 700, ''),
(58, 5, 10, '招牌東坡肉', '', '', 1, 400, ''),
(59, 5, 12, '古早味什錦', '', '', 1, 350, ''),
(60, 5, 22, '老味芋頭油飯', '', '', 1, 500, ''),
(61, 5, 39, '美妍凍(馥郁百香果)', '', '', 6, 50, ''),
(62, 5, 36, '美妍凍(清爽檸檬)', '', '', 6, 50, ''),
(63, 5, 38, '美妍凍(綿密紅豆)', '', '', 6, 50, ''),
(64, 6, 38, '膠原蛋白凍/綿密紅豆', '', '', 1, 40, ''),
(65, 6, 43, '膠原蛋白凍/低糖百香', '', '', 1, 40, ''),
(66, 6, 41, '膠原蛋白凍/低糖檸檬', '', '', 1, 40, ''),
(67, 7, 4, '生日蹄膀', '', '', 1, 600, ''),
(68, 7, 22, '老味芋頭油飯', '', '', 1, 500, ''),
(69, 7, 18, '砂鍋魚頭', '', '', 1, 500, ''),
(70, 8, 46, '手工膠原蛋白凍/24入', '', '', 2, 950, ''),
(71, 9, 18, '砂鍋魚頭', '', '', 1, 500, ''),
(72, 9, 10, '招牌東坡肉', '', '', 3, 400, ''),
(73, 9, 12, '古早味什錦', '', '', 1, 350, ''),
(74, 10, 15, '麻油補補雞(全雞)', '', '', 1, 700, ''),
(75, 10, 24, '人蔘紅棗雞(半雞)', '', '', 1, 400, ''),
(76, 10, 27, '養生菇菇雞(半雞)', '', '', 1, 400, ''),
(77, 10, 18, '砂鍋魚頭', '', '', 1, 500, '');

-- --------------------------------------------------------

-- 
-- 資料表格式： `ordermain`
-- 

CREATE TABLE `ordermain` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `MemberSerialNo` int(11) NOT NULL COMMENT '會員流水號',
  `OrderDate` datetime NOT NULL COMMENT '訂單時間',
  `OrderNumber` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '訂單編號',
  `PayMethod` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT '付款方式',
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '會員身分',
  `Freight` int(100) NOT NULL COMMENT '運費金額',
  `TotalPrice` int(100) NOT NULL COMMENT '總金額',
  `MailString` text collate utf8_unicode_ci NOT NULL COMMENT '信件內容',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='訂單總表' AUTO_INCREMENT=11 ;

-- 
-- 列出以下資料庫的數據： `ordermain`
-- 

INSERT INTO `ordermain` (`SerialNo`, `MemberSerialNo`, `OrderDate`, `OrderNumber`, `PayMethod`, `Status`, `Freight`, `TotalPrice`, `MailString`) VALUES (1, 123, '2013-08-21 20:45:00', '2013082120451', '銀行匯款', '已處理', 0, 120, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 李心凡  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2013082120451 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >美顏凍(清爽檸檬)</td><td align="center" >40</td><td align="center" >1</td><td align="center" >40</td></tr><tr><td align="center" >美顏凍(冬瓜糖)</td><td align="center" >40</td><td align="center" >1</td><td align="center" >40</td></tr><tr><td align="center" >美顏凍(紅豆)</td><td align="center" >40</td><td align="center" >1</td><td align="center" >40</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">120</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >李心凡</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>e123456804@yahoo.com.tw</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0918213728</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">811高雄市楠梓區德賢路267巷7號17樓</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">李心凡</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0918213728</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">811高雄市楠梓區德賢路267巷7號17樓</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(2, 123, '2013-09-06 16:39:17', '2013090616392', '銀行匯款', '已處理', 0, 400, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 黃光裕  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2013090616392 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >美妍凍(馥鬱百香果)</td><td align="center" >40</td><td align="center" >2</td><td align="center" >80</td></tr><tr><td align="center" >美妍凍(清爽檸檬)</td><td align="center" >40</td><td align="center" >2</td><td align="center" >80</td></tr><tr><td align="center" >美妍凍(綿密紅豆)</td><td align="center" >40</td><td align="center" >2</td><td align="center" >80</td></tr><tr><td align="center" >美妍凍(香醇冬瓜糖)</td><td align="center" >40</td><td align="center" >2</td><td align="center" >80</td></tr><tr><td align="center" >美妍凍(紅棗枸杞-原味)</td><td align="center" >40</td><td align="center" >2</td><td align="center" >80</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">400</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >黃光裕</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>yao@yao-chuan.com.tw</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0960210420</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">814高雄市仁武區澄仁西街99號</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">黃光裕</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0960210420</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">814高雄市仁武區澄仁西街99號</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(3, 123, '2013-10-09 13:41:18', '2013100913413', '銀行匯款', '已處理', 0, 750, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 莊仁旭  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2013100913413 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >招牌東坡肉</td><td align="center" >400</td><td align="center" >1</td><td align="center" >400</td></tr><tr><td align="center" >古早味什錦</td><td align="center" >350</td><td align="center" >1</td><td align="center" >350</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">750</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >莊仁旭</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>mtalps2001@hotmail.com</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0973370933</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">330桃園縣桃園市泰昌3街 152號8F</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">莊仁旭</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0973370933</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">330桃園縣桃園市泰昌3街 152號8F</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(4, 123, '2014-01-06 11:29:10', '2014010611294', '銀行匯款', '已處理', 0, 700, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 陳婉茹  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2014010611294 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >蒜頭蜆雞(全雞)</td><td align="center" >700</td><td align="center" >1</td><td align="center" >700</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">700</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >陳婉茹</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>eva616ave@hotmail.com</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0960419802</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">811高雄市楠梓區高雄大學路203號2樓</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">楊秋香</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">089342496</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">950台東縣台東市漢陽南路28巷40號</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(5, 123, '2014-01-17 19:38:09', '2014011719385', '銀行匯款', '已處理', 0, 4700, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 陳婉茹  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2014011719385 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >酸菜白肉鍋</td><td align="center" >450</td><td align="center" >1</td><td align="center" >450</td></tr><tr><td align="center" >蒜頭蜆雞(全雞)</td><td align="center" >700</td><td align="center" >1</td><td align="center" >700</td></tr><tr><td align="center" >養生菇菇雞(全雞)</td><td align="center" >700</td><td align="center" >2</td><td align="center" >1,400</td></tr><tr><td align="center" >招牌東坡肉</td><td align="center" >400</td><td align="center" >1</td><td align="center" >400</td></tr><tr><td align="center" >古早味什錦</td><td align="center" >350</td><td align="center" >1</td><td align="center" >350</td></tr><tr><td align="center" >老味芋頭油飯</td><td align="center" >500</td><td align="center" >1</td><td align="center" >500</td></tr><tr><td align="center" >美妍凍(馥郁百香果)</td><td align="center" >50</td><td align="center" >6</td><td align="center" >300</td></tr><tr><td align="center" >美妍凍(清爽檸檬)</td><td align="center" >50</td><td align="center" >6</td><td align="center" >300</td></tr><tr><td align="center" >美妍凍(綿密紅豆)</td><td align="center" >50</td><td align="center" >6</td><td align="center" >300</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">4,700</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >陳婉茹</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>eva616ave@hotmail.com</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0960419802</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">811高雄市楠梓區高雄大雄路203號2樓</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">楊秋香</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">089342496</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">950台東縣台東市漢陽南路28巷40號</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(6, 123, '2014-08-10 22:32:07', '2014081022326', '銀行匯款', '已處理', 0, 120, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 朱湘婷  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2014081022326 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >膠原蛋白凍/綿密紅豆</td><td align="center" >40</td><td align="center" >1</td><td align="center" >40</td></tr><tr><td align="center" >膠原蛋白凍/低糖百香</td><td align="center" >40</td><td align="center" >1</td><td align="center" >40</td></tr><tr><td align="center" >膠原蛋白凍/低糖檸檬</td><td align="center" >40</td><td align="center" >1</td><td align="center" >40</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">120</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >朱湘婷</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>h28486044@yahoo.co.tw</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0989656722</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">833高雄市鳥松區中正路355-1號</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">朱湘婷</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0989656722</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">833高雄市鳥松區中正路355-1號</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(7, 123, '2015-02-12 17:57:31', '2015021217577', '銀行匯款', '已處理', 0, 1600, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 柳景元  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2015021217577 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >生日蹄膀</td><td align="center" >600</td><td align="center" >1</td><td align="center" >600</td></tr><tr><td align="center" >老味芋頭油飯</td><td align="center" >500</td><td align="center" >1</td><td align="center" >500</td></tr><tr><td align="center" >砂鍋魚頭</td><td align="center" >500</td><td align="center" >1</td><td align="center" >500</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">1,600</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >柳景元</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>liu.papa2@gmail.com</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0956291007</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">813高雄市左營區華夏路1053號</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">柳景元</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0956291007</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">813高雄市左營區華夏路1053號</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(8, 123, '2015-07-31 23:07:26', '2015073123078', '銀行匯款', '已處理', 0, 1900, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 陳素芳  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2015073123078 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >手工膠原蛋白凍/24入</td><td align="center" >950</td><td align="center" >2</td><td align="center" >1,900</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">1,900</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >陳素芳</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>lois0216@yahoo.com.tw</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0910646828</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">231新北市新店區明德路67巷6號1樓</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">陳素芳</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0910646828</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">231新北市新店區明德路67巷6號1樓</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(9, 123, '2016-01-25 21:09:08', '2016012521099', '銀行匯款', '已處理', 0, 2050, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 柳景元  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2016012521099 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >砂鍋魚頭</td><td align="center" >500</td><td align="center" >1</td><td align="center" >500</td></tr><tr><td align="center" >招牌東坡肉</td><td align="center" >400</td><td align="center" >3</td><td align="center" >1,200</td></tr><tr><td align="center" >古早味什錦</td><td align="center" >350</td><td align="center" >1</td><td align="center" >350</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">2,050</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >柳景元</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a></a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0932798074</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">813高雄市左營區華夏路1053號</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">李吳滿   小姐</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0958-725133   055-982112</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">649雲林縣二崙鄉大義村7鄰大義路62號</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>'),
(10, 123, '2016-01-27 10:59:14', '2016012710590', '銀行匯款', '已處理', 0, 2000, '<html><head><meta http-equiv="Content-Type" Content="text/html;charset=utf-8" /><title>王家老木_台南鹹水意麵</title></head><body><span style="font-size:10pt;">親愛的 林美玲  您好 :<br />這封信件是由 王家老木_台南鹹水意麵 系統自動發出，通知您本次的訂購程序已經完成，請勿直接回信！<br /><br />您的訂單編號：2016012710590 ，以下為訂購清單：<br /><br /><table width="100%" border="0"><tr><td align="left" valign="top"><font color="blue" size="3">購物明細</font></td></tr><tr><td ><table width="70%" border="0" cellspacing="1" cellpadding="1"><tr><td width="50%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">商品名稱</td><td width="16%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">價格</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">數量</td><td width="17%" align="center" bgcolor="#666666" style="border-right:1px solid #000; border-left:1px solid #333; border-bottom:1px solid #333; border-top:1px solid #333">小計</td></tr><tr><td align="center" >麻油補補雞(全雞)</td><td align="center" >700</td><td align="center" >1</td><td align="center" >700</td></tr><tr><td align="center" >人蔘紅棗雞(半雞)</td><td align="center" >400</td><td align="center" >1</td><td align="center" >400</td></tr><tr><td align="center" >養生菇菇雞(半雞)</td><td align="center" >400</td><td align="center" >1</td><td align="center" >400</td></tr><tr><td align="center" >砂鍋魚頭</td><td align="center" >500</td><td align="center" >1</td><td align="center" >500</td></tr></table></td></tr><tr><td colspan="6" ><table width="70%" bgcolor="#CCCCCC" border="0" cellspacing="1" cellpadding="1"><tr><td width="83%" align="right">商品金額總計</td><td width="17%" align="center">2,000</td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">訂購人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left" >林美玲</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">電子郵件</td><td height="25" align="left"><a>o918442336@yahoo.com.tw</a></td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0918442336</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">983花蓮縣富里鄉富里村和平剩22號</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">發票資訊</td><td height="25" align="left"></td></tr></table></td></tr><tr><td align="left" valign="top"><font color="blue" size="3">收件人資訊</font></td></tr><tr><td align="left" valign="top"><table border="0" cellspacing="1" cellpadding="3"><tr><td width="100" height="25" align="center" bgcolor="#CCCCCC">中文全名</td><td height="25" align="left">林美玲</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡電話</td><td height="25" align="left">0918442336</td></tr><tr><td height="25" align="center" bgcolor="#CCCCCC">聯絡地址</td><td height="25" align="left">983花蓮縣富里鄉富里村和平剩22號</td></tr></table></td></tr></table>當您有任何使用上的問題時，可以利用下列的資訊與我們聯絡：<br/>客服信箱：<a href="service@motherwang.com?phpMyAdmin=CMCgLDqGafilrbSHE%2C%2C1czNjux1">service@motherwang.com</a><br/>王家老木_台南鹹水意麵:http://www.motherwang.com<br/></span></body></html>');

-- --------------------------------------------------------

-- 
-- 資料表格式： `ordermember`
-- 

CREATE TABLE `ordermember` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '訂購人流水號',
  `G0` int(11) NOT NULL COMMENT '訂單流水號',
  `MemberSerialNo` int(11) NOT NULL COMMENT '會員流水號',
  `OrderName` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '訂購人姓名',
  `OrderSex` varchar(255) collate utf8_unicode_ci NOT NULL,
  `OrderEMail` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '訂購人Email',
  `OrderTel` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '訂購人手機',
  `OrderAddress` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '訂購人地址',
  `TickectType` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '發票類型',
  `TicketID` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '統一編號',
  `TicketTitle` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '公司名稱',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='訂單訂購人資料' AUTO_INCREMENT=11 ;

-- 
-- 列出以下資料庫的數據： `ordermember`
-- 

INSERT INTO `ordermember` (`SerialNo`, `G0`, `MemberSerialNo`, `OrderName`, `OrderSex`, `OrderEMail`, `OrderTel`, `OrderAddress`, `TickectType`, `TicketID`, `TicketTitle`) VALUES (1, 1, 123, '李心凡', '', 'e123456804@yahoo.com.tw', '0918213728', '811高雄市楠梓區德賢路267巷7號17樓', '', '', ''),
(2, 2, 123, '黃光裕', '', 'yao@yao-chuan.com.tw', '0960210420', '814高雄市仁武區澄仁西街99號', '', '', ''),
(3, 3, 123, '莊仁旭', '', 'mtalps2001@hotmail.com', '0973370933', '330桃園縣桃園市泰昌3街 152號8F', '', '', ''),
(4, 4, 123, '陳婉茹', '', 'eva616ave@hotmail.com', '0960419802', '811高雄市楠梓區高雄大學路203號2樓', '', '', ''),
(5, 5, 123, '陳婉茹', '', 'eva616ave@hotmail.com', '0960419802', '811高雄市楠梓區高雄大雄路203號2樓', '', '', ''),
(6, 6, 123, '朱湘婷', '', 'h28486044@yahoo.co.tw', '0989656722', '833高雄市鳥松區中正路355-1號', '', '', ''),
(7, 7, 123, '柳景元', '', 'liu.papa2@gmail.com', '0956291007', '813高雄市左營區華夏路1053號', '', '', ''),
(8, 8, 123, '陳素芳', '', 'lois0216@yahoo.com.tw', '0910646828', '231新北市新店區明德路67巷6號1樓', '', '', ''),
(9, 9, 123, '柳景元', '', '', '0932798074', '813高雄市左營區華夏路1053號', '', '', ''),
(10, 10, 123, '林美玲', '', 'o918442336@yahoo.com.tw', '0918442336', '983花蓮縣富里鄉富里村和平剩22號', '', '', '');

-- --------------------------------------------------------

-- 
-- 資料表格式： `orderreceiver`
-- 

CREATE TABLE `orderreceiver` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '收件人流水號',
  `G0` int(11) NOT NULL COMMENT '訂單流水號',
  `ReceiverName` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '收件人姓名',
  `ReceiverSex` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ReceiverTel` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '收件人電話',
  `ReceiverAddress` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '收件人地址',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='訂單收件人資料' AUTO_INCREMENT=11 ;

-- 
-- 列出以下資料庫的數據： `orderreceiver`
-- 

INSERT INTO `orderreceiver` (`SerialNo`, `G0`, `ReceiverName`, `ReceiverSex`, `ReceiverTel`, `ReceiverAddress`) VALUES (1, 1, '李心凡', '', '0918213728', '811高雄市楠梓區德賢路267巷7號17樓'),
(2, 2, '黃光裕', '', '0960210420', '814高雄市仁武區澄仁西街99號'),
(3, 3, '莊仁旭', '', '0973370933', '330桃園縣桃園市泰昌3街 152號8F'),
(4, 4, '楊秋香', '', '089342496', '950台東縣台東市漢陽南路28巷40號'),
(5, 5, '楊秋香', '', '089342496', '950台東縣台東市漢陽南路28巷40號'),
(6, 6, '朱湘婷', '', '0989656722', '833高雄市鳥松區中正路355-1號'),
(7, 7, '柳景元', '', '0956291007', '813高雄市左營區華夏路1053號'),
(8, 8, '陳素芳', '', '0910646828', '231新北市新店區明德路67巷6號1樓'),
(9, 9, '李吳滿   小姐', '', '0958-725133   055-982112', '649雲林縣二崙鄉大義村7鄰大義路62號'),
(10, 10, '林美玲', '', '0918442336', '983花蓮縣富里鄉富里村和平剩22號');

-- --------------------------------------------------------

-- 
-- 資料表格式： `popedom`
-- 

CREATE TABLE `popedom` (
  `Member_ID` int(20) NOT NULL,
  `Tree_ID` varchar(4) character set utf8 NOT NULL,
  KEY `Member_ID` (`Member_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='權限紀錄';

-- 
-- 列出以下資料庫的數據： `popedom`
-- 

INSERT INTO `popedom` (`Member_ID`, `Tree_ID`) VALUES (1, '9920'),
(1, '9910'),
(1, '99'),
(1, '9810'),
(1, '98'),
(1, '9010'),
(1, '90'),
(1, '5510'),
(1, '55'),
(1, '5010'),
(1, '50'),
(1, '4510'),
(1, '45'),
(1, '4010'),
(1, '40'),
(1, '3520'),
(1, '3510'),
(1, '35'),
(1, '3010'),
(1, '30'),
(1, '2510'),
(1, '25'),
(1, '2010'),
(1, '20'),
(1, '1520'),
(1, '1510'),
(1, '15'),
(1, '1020'),
(1, '1010'),
(1, '10'),
(1, '0120'),
(1, '0110'),
(1, '01'),
(1, '05'),
(1, '0510'),
(1, '30'),
(1, '3010'),
(3, '99'),
(2, '9920'),
(2, '9910'),
(2, '99'),
(2, '9810'),
(2, '98'),
(2, '4510'),
(2, '45'),
(2, '3020'),
(2, '3010'),
(2, '30'),
(2, '1520'),
(2, '1510'),
(2, '15'),
(2, '1020'),
(2, '1010'),
(2, '10'),
(2, '0510'),
(2, '05'),
(2, '0110'),
(1, '3020'),
(2, '01'),
(3, '9810'),
(3, '98'),
(3, '9010'),
(3, '90'),
(3, '4510'),
(3, '45'),
(3, '3020'),
(3, '3010'),
(3, '30'),
(3, '1520'),
(3, '1510'),
(3, '15'),
(3, '1020'),
(3, '1010'),
(3, '10'),
(3, '0510'),
(3, '05'),
(3, '0110'),
(3, '01'),
(4, '01'),
(4, '0110'),
(4, '05'),
(4, '0510'),
(4, '10'),
(4, '1010'),
(4, '1020'),
(4, '15'),
(4, '1510'),
(4, '1520'),
(4, '30'),
(4, '3010'),
(4, '3020'),
(4, '45'),
(4, '4510'),
(4, '98'),
(4, '9810'),
(4, '99'),
(4, '9910'),
(4, '9920'),
(3, '9910'),
(3, '9920');

-- --------------------------------------------------------

-- 
-- 資料表格式： `product`
-- 

CREATE TABLE `product` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `G0` int(11) NOT NULL COMMENT '產品分類流水號',
  `IndexShow` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '首頁顯示',
  `PrdName` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '產品名稱(繁體)',
  `PrdPrice` int(11) NOT NULL COMMENT '價格',
  `PrdNote` text collate utf8_unicode_ci NOT NULL COMMENT '功用(繁體)',
  `Notes` text collate utf8_unicode_ci NOT NULL COMMENT '產品介紹(繁體)',
  `PIC` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '產品圖片',
  `PICHidden` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '產品圖片儲存名稱',
  `IndexSort` int(50) NOT NULL COMMENT '首頁排序',
  `Sort` int(11) NOT NULL COMMENT '排序',
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品' AUTO_INCREMENT=49 ;

-- 
-- 列出以下資料庫的數據： `product`
-- 

INSERT INTO `product` (`SerialNo`, `G0`, `IndexShow`, `PrdName`, `PrdPrice`, `PrdNote`, `Notes`, `PIC`, `PICHidden`, `IndexSort`, `Sort`, `Status`) VALUES (4, 2, 'false', '生日蹄膀', 600, '生日蹄膀<br /><br />「蹄膀壽麵」寓意如麵線長般的生命，可依照喜好更換成筍干；蹄膀經過油炸、煨米酒、文火慢滷，費時1日。外皮Q彈、肉質入味軟嫩不柴。適合下飯、節慶、生日食用。<br /><br />※商品內容：<br />蹄膀、醬汁包、筍干（麵線）<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />電鍋加入一杯水(300cc)<br />跳起後悶15分鐘好菜上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊<br /><br />', '', '生日蹄膀.JPG', '20121202054458.JPG', 9999, 3, '上架'),
(10, 2, 'true', '招牌東坡肉', 400, '招牌東坡肉<br /><br />新鮮溫體豬三層肉，先油炸、煨紹興、<br />文火慢滷，靜置一日入味。皮Q肉嫩、入口即化。<br />招牌商品，非試不可!<br /><br />※商品內容：<br />東坡肉、醬汁包、筍干。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />電鍋加入一杯水(300cc)<br />跳起後好菜上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '招牌東坡肉.JPG', '20121202044623.JPG', 5, 2, '上架'),
(9, 6, 'true', '人蔘紅棗雞(全雞)', 700, '人蔘紅棗雞---糯米+50元<br /><br />新鮮山雞、精選人蔘與紅棗等材料精心燉煮而成。味甘補氣，開心益智。小朋友也愛吃!<br />也可填入糯米，經典的一雞兩吃。<br /><br />※商品內容：<br />人蔘紅棗雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '人蔘雞.JPG', '20121202055641.JPG', 3, 1, '上架'),
(11, 2, 'false', '古早味肉燥', 350, '古早味肉燥<br /><br />使用上等手工切肉丁，拌炒後精心滷製4小時入味，再悶一個晚上製成。拌飯、拌麵皆宜。<br /><br />※商品內容：<br />古早味肉燥1000g。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />電鍋加入一杯水(300cc)<br />跳起後即可拌飯食用。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '古早味肉燥.JPG', '20121202055246.JPG', 9999, 7, '上架'),
(12, 2, 'false', '古早味什錦', 350, '古早味什錦<br /><br />獨家香辛料炒香後，加入大白菜、桶筍、鴨肉、扁魚等多達15樣精選食材燉煮8個小時而成。<br />湯頭鮮美、口感豐富。<br />濃郁的古早味，下飯良伴。<br /><br />※商品內容：<br />古早味什錦1000g。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />電鍋加入一杯水(300cc)<br />跳起後即可享用。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '華麗什錦.JPG', '20121202055506.JPG', 3, 5, '上架'),
(13, 2, 'false', '冬瓜排骨酥湯', 400, '冬瓜排骨酥湯<br /><br />特選新鮮排骨與冬瓜，獨家香辛料醃製入味後再酥炸熬煮，餘韻無窮、齒頰留香。<br /><br />※商品內容：<br />3200CC排骨酥湯(含料)。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />電鍋加入一杯水(300cc)<br />跳起後即可享用。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '冬瓜排骨酥湯.JPG', '20121202055535.JPG', 4, 6, '上架'),
(14, 6, 'false', '四物雞(全雞)', 700, '四物雞<br /><br />精選上等四物與新鮮山雞，加入紅棗、枸杞等中藥材燉煮而成。湯頭味甘鮮美，雞肉滑Q軟嫩。養血疏筋、滋潤肌膚。特別適合月事之後行氣補血或坐月子食用。平日亦是適合闔家享用之美食。<br /><br />※商品內容：<br />四物雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '四物雞.JPG', '20121202055726.JPG', 9999, 9, '上架'),
(15, 6, 'false', '麻油補補雞(全雞)', 700, '麻油補補雞<br /><br />新鮮山雞切塊後與精選麻油爆香後燉煮而成。<br />適合闔家享用，男女皆宜。<br /><br />※商品內容：<br />麻油雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '麻油補補雞.JPG', '20121202055749.JPG', 9999, 5, '上架'),
(16, 6, 'false', '蒜頭蜆雞(全雞)', 700, '蒜頭蜆雞<br /><br />補身護肝治歹嘴斗，山雞與鮮蜆蒜頭燉煮入味。湯頭鹹香帶鮮味、雞肉滑Q富嚼勁。<br /><br />※商品內容：<br />蒜頭蜆雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '蒜頭蜆雞.JPG', '20121202055903.JPG', 9999, 3, '上架'),
(17, 6, 'false', '養生菇菇雞(全雞)', 700, '養生菇菇雞<br /><br />新鮮山雞、季節菇、與味道甘美的中藥包燉煮而成。<br />養生清爽口感，四季皆宜。<br /><br />※商品內容：<br />養生菇菇雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後不掀蓋悶15分鐘好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '養生菇耳雞.JPG', '20121202060005.JPG', 9999, 7, '上架'),
(18, 4, 'false', '砂鍋魚頭', 500, '砂鍋魚頭<br />精選深海鮭魚頭酥炸提味後，加入火鍋料、新鮮海產、牛頭牌沙茶、芋頭與豬骨高湯等食材燉煮而成。湯頭濃郁富層次。闔家圍爐首選!<br /><br />※商品內容：<br />鮭魚頭、火鍋料、<br />2550CC原味湯頭、另附豬骨高湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，與魚頭加熱至滾燙即可享用。<br /><br />電話預約隔日取件－熟食<br />(高雄地區滿千送到府)<br />宅配(三個工作天)－冷凍真空包裝', '', '砂鍋魚頭.JPG', '20121202060042.JPG', 5, 1, '上架'),
(19, 4, 'false', '酸菜白肉鍋', 450, '酸菜白肉鍋<br />選用遵循古法醃製之酸白菜、新鮮海產、火鍋料與精選豬五花肉片，搭配豬骨高湯燉煮而成。清爽不油膩、四季皆宜。<br /><br />※商品內容：<br />豬五花肉片、火鍋料、<br />2550CC原味湯頭、另附豬骨高湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，加熱至滾燙放入肉片即可享用。<br /><br />電話預約隔日取件－熟食<br />(高雄地區滿千送到府)<br />宅配(三個工作天)－冷凍真空包裝', '', '酸菜白肉鍋.JPG', '20121202060106.JPG', 6, 2, '上架'),
(20, 2, 'false', '麻油雞米糕', 800, '麻油雞米糕<br /><br />採用整隻新鮮山雞與精選麻油拌炒後、蒸煮而成。糯米軟Q彈牙，雞肉滑嫩入味。開鍋濃郁麻油香撲鼻而來，令人食指大動。<br /><br />※商品內容：<br />2000g全雞米糕。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />電鍋加入一杯水(300cc)<br />跳起後悶10分鐘好菜上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '麻油雞米糕正式版-官網用.jpg', '20130125111139.jpg', 9999, 4, '上架'),
(22, 2, 'true', '老味芋頭油飯', 500, '老味芋頭油飯<br /><br />精選上等芋頭、蝦米、三層肉、香菇、糯米等材料炊製而成。口感Q彈鹹香入味，芋頭鬆軟入口即化。<br />送禮自用皆宜~<br /><br />※商品內容：<br />2台斤芋頭油飯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />電鍋加入一杯水(300cc)<br />跳起後好菜上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '古早味芋頭油飯(官網專用).jpg', '20130223115846.jpg', 4, 8, '上架'),
(45, 7, 'false', '手工膠原蛋白凍/12入', 480, '深海魚鱗與天然素材製成的手工膠原蛋白凍<br />自然、健康、無添加<br />只選用當季盛產素材<br />無化學助凝劑、香精等<br /><br />檸檬 / 鳳梨 / 桂圓 / 紅豆 / 洛神花<br /><br />12入/口味隨選<br /><br />寶麗龍箱/禮盒紙箱<br /><br />＊下單後將有專員與您聯繫，選定口味與包裝方式。', '', '原味-官網用圖.jpg', '20150908102806.jpg', 9999, 1, '上架'),
(27, 6, 'false', '養生菇菇雞(半雞)', 400, '養生菇菇雞<br /><br />新鮮山雞、季節菇、與味道甘美的中藥包燉煮而成。<br />養生清爽口感，四季皆宜。<br /><br />※商品內容：<br />養生菇菇雞、1700CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後不掀蓋悶15分鐘好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '養生菇耳雞.JPG', '20130322113950.JPG', 9999, 8, '上架'),
(24, 6, 'false', '人蔘紅棗雞(半雞)', 400, '人蔘紅棗雞(半雞)---糯米+50元<br /><br />新鮮山雞、精選人蔘與紅棗等材料精心燉煮而成。味甘補氣，開心益智。小朋友也愛吃!<br />也可填入糯米，經典的一雞兩吃。<br /><br />※商品內容：<br />人蔘紅棗雞、1700CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '人蔘雞.JPG', '20130322113122.JPG', 9999, 2, '上架'),
(25, 6, 'false', '蒜頭蜆雞(半雞)', 400, '蒜頭蜆雞<br /><br />補身護肝治歹嘴斗，山雞與鮮蜆蒜頭燉煮入味。湯頭鹹香帶鮮味、雞肉滑Q富嚼勁。<br /><br />※商品內容：<br />蒜頭蜆雞、1700CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '蒜頭蜆雞.JPG', '20130322113237.JPG', 9999, 4, '上架'),
(26, 6, 'false', '麻油補補雞(半雞)', 400, '麻油補補雞<br /><br />新鮮山雞切塊後與精選麻油爆香後燉煮而成。<br />適合闔家享用，男女皆宜。<br /><br />※商品內容：<br />麻油雞、1700CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '麻油補補雞.JPG', '20130322113700.JPG', 9999, 6, '上架'),
(28, 6, 'false', '四物雞(半雞)', 400, '四物雞<br /><br />精選上等四物與新鮮山雞，加入紅棗、枸杞等中藥材燉煮而成。湯頭味甘鮮美，雞肉滑Q軟嫩。養血疏筋、滋潤肌膚。特別適合月事之後行氣補血或坐月子食用。平日亦是適合闔家享用之美食。<br /><br />※商品內容：<br />四物雞、1700CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)<br />＊高雄市區滿千送到府＊', '', '四物雞.JPG', '20130322114117.JPG', 9999, 10, '上架'),
(29, 8, 'false', '招牌蹄膀+人蔘雞', 1099, '招牌蹄膀+人蔘雞<br /><br />※商品內容：<br />招牌蹄膀、醬汁包、筍干<br />人蔘雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)', '', '招牌蹄膀+人蔘雞(官網).jpg', '20130328101503.jpg', 9999, 1, '上架'),
(30, 8, 'false', '招牌蹄膀+養生雞', 1099, '招牌蹄膀+養生雞<br /><br />※商品內容：<br />招牌蹄膀、醬汁包、筍干<br />養生雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)', '', '招牌蹄膀+養生雞(官網).jpg', '20130328101846.jpg', 9999, 2, '上架'),
(31, 8, 'false', '招牌蹄膀+麻油雞', 1099, '招牌蹄膀+麻油雞<br /><br />※商品內容：<br />招牌蹄膀、醬汁包、筍干<br />麻油雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)', '', '招牌蹄膀+麻油雞(官網).jpg', '20130328101934.jpg', 9999, 3, '上架'),
(32, 8, 'false', '招牌蹄膀+蒜頭蜆雞', 1099, '招牌蹄膀+蒜頭蜆雞<br /><br />※商品內容：<br />招牌蹄膀、醬汁包、筍干<br />蒜頭蜆雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)', '', '招牌蹄膀+蒜頭雞(官網).jpg', '20130328102014.jpg', 9999, 4, '上架'),
(33, 8, 'false', '招牌蹄膀+四物雞', 1099, '招牌蹄膀+四物雞<br /><br />※商品內容：<br />招牌蹄膀、醬汁包、筍干<br />四物雞、3400CC雞湯。<br /><br />※建議加熱方式：<br />(冷凍狀態請先冷藏退冰)<br />拆袋倒入鍋中，電鍋加入一杯水(300cc)<br />跳起後好湯上桌。<br /><br />熟食自取－－－－－隔日取件<br />冷凍真空包自取－－２個工作天<br />宅配－－－－－－－３個工作天<br />(含運送時間)', '', '招牌蹄膀+四物雞(官網).jpg', '20130328102058.jpg', 9999, 5, '上架'),
(34, 7, 'false', '膠原蛋白凍/紅棗枸杞-原味', 45, '使用大片深海石斑魚鱗燉煮9個小時、<br />再加入紅棗枸杞調味而成。<br />富含膠原蛋白與鈣質，<br />強鈣養顏、有飽足感。<br />接觸舌尖溫度瞬間化開的神奇口感，<br />100%純天然甜品。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br /><br />＊商品內容<br />美顏凍125ml±2', '', '紅棗枸杞口味-官網-800-600.jpg', '20130902015324.jpg', 9999, 5, '下架'),
(35, 7, 'false', '膠原蛋白凍/糖漬鳳梨', 45, '使用大片深海魚鱗燉煮9個小時、<br />再加入當季新鮮水果調味而成。<br />富含膠原蛋白與鈣質，<br />強鈣養顏、有飽足感。<br />接觸舌尖溫度瞬間化開的神奇口感，<br />100%純天然甜品。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br /><br />＊商品內容<br />美顏凍125ml±2', '', '02-logo官網.jpg', '20130427053033.jpg', 9999, 6, '下架'),
(36, 7, 'true', '膠原蛋白凍/清爽檸檬', 45, '使用大片深海石斑魚鱗燉煮9個小時、<br />再加入新鮮現榨檸檬調味而成。<br />富含膠原蛋白與鈣質，<br />強鈣養顏、有飽足感。<br />接觸舌尖溫度瞬間化開的神奇口感，<br />100%純天然甜品。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br />*兩箱(48顆)免運費<br /><br />＊商品內容<br />美顏凍125ml±2', '', '檸檬口味-官網800-600.jpg', '20130901113127.jpg', 2, 2, '下架'),
(37, 7, 'false', '膠原蛋白凍/冬瓜桂圓', 45, '使用大片深海石斑魚鱗燉煮9個小時、<br />再加入精選冬瓜糖磚調味而成。<br />富含膠原蛋白與鈣質，<br />強鈣養顏、有飽足感。<br />接觸舌尖溫度瞬間化開的神奇口感，<br />100%純天然甜品。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁等化學助凝劑。<br />*兩箱(48顆)免運費<br /><br />＊商品內容<br />美顏凍125ml±2', '', '冬瓜口味-字體改-800-600.jpg', '20130905070515.jpg', 9999, 4, '下架'),
(38, 7, 'false', '膠原蛋白凍/綿密紅豆', 45, '使用大片深海石斑魚鱗燉煮9個小時、<br />再加入綿密的糖漬紅豆調味而成。<br />富含膠原蛋白與鈣質，<br />強鈣養顏、有飽足感。<br />接觸舌尖溫度瞬間化開的神奇口感，<br />100%純天然甜品。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁等化學助凝劑。<br />*兩箱(48顆)免運費<br /><br />＊商品內容<br />美顏凍125ml±2', '', '官網-美顏凍-紅豆.jpg', '20130901115749.jpg', 9999, 3, '下架'),
(40, 7, 'false', '膠原蛋白凍/冰糖白玉', 45, '使用大片深海石斑魚鱗燉煮9個小時<br />加入冰糖、白木耳、枸杞、黑棗、桂圓乾製作<br />富含膠原蛋白與鈣質，<br />強鈣養顏、有飽足感。<br />接觸舌尖溫度瞬間化開的神奇口感，<br />100%純天然甜品。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br /><br />＊商品內容<br />美顏凍125ml±2<br />', '', '02-logo官網.jpg', '20140526011719.jpg', 9999, 1, '下架'),
(39, 7, 'false', '膠原蛋白凍/馥郁百香果', 45, '使用大片深海石斑魚鱗燉煮9個小時、<br />再加入當季新鮮百香果調味而成。<br />富含膠原蛋白與鈣質，<br />強鈣養顏、有飽足感。<br />接觸舌尖溫度瞬間化開的神奇口感，<br />100%純天然甜品。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br />*兩箱(48顆)免運費<br /><br />＊商品內容<br />美顏凍125ml±2', '', '百香果口味-官網-800-600.jpg', '20130905070753.jpg', 9999, 1, '下架'),
(41, 7, 'false', '膠原蛋白凍/低糖檸檬', 45, '清爽檸檬的低糖版本<br />長期食用無負擔<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br />*兩箱(48顆)免運費<br /><br />＊商品內容<br />美顏凍125ml±2', '', '02-logo官網.jpg', '20140526012326.jpg', 9999, 9999, '下架'),
(42, 7, 'false', '膠原蛋白凍/洛神花', 45, '玫瑰茄與烏梅的組合<br />淡淡桂花香的濃醇口感<br />和深海魚鱗之天然膠原蛋白巧妙搭配。<br />傳統台灣風味的健康果凍<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br />*兩箱(48顆)免運費<br /><br />＊商品內容<br />美顏凍125ml±2', '', '02-logo官網.jpg', '20140811030431.jpg', 9999, 6, '下架'),
(43, 7, 'false', '膠原蛋白凍/低糖百香', 45, '天然百香果製成的膠原蛋白凍<br />只添加微量份，體貼不願意或不適合<br />攝取過多熱量的您。<br /><br />*每週限量<br />*本商品不含果凍粉、吉利丁、香精等化學原料。<br />*兩箱(48顆)免運費<br /><br /><br />＊商品內容<br />美顏凍125ml±2', '', '馥郁百香果.jpg', '20140811030804.jpg', 9999, 9999, '下架'),
(46, 7, 'false', '手工膠原蛋白凍/24入', 840, '深海魚鱗與天然素材製成的手工膠原蛋白凍<br />自然、健康、無添加<br />只選用當季盛產素材<br />無化學助凝劑、香精等<br /><br />檸檬 / 鳳梨 / 桂圓 / 紅豆 / 洛神花<br /><br />24入/口味隨選/48入(兩箱免運費)<br /><br />寶麗龍箱/禮盒紙箱<br /><br />＊下單後將有專員與您聯繫，選定口味與包裝方式。', '', '02-logo官網.jpg', '20150126011648.jpg', 9999, 2, '上架'),
(47, 7, 'false', '手工膠原蛋白凍/48入(免運費)', 1680, '深海魚鱗與天然素材製成的手工膠原蛋白凍<br />自然、健康、無添加<br />只選用當季盛產素材<br />無化學助凝劑、香精等<br /><br />檸檬 / 鳳梨 / 桂圓 / 紅豆 / 洛神花<br /><br />48入/口味隨選<br /><br />寶麗龍箱<br /><br />＊下單後將有專員與您聯繫，選定口味與包裝方式。', '', '冬瓜桂圓-官網用圖.jpg', '20150908102844.jpg', 9999, 9999, '上架'),
(48, 2, 'true', '老木鹹湯圓', 135, '使用上等胛心豬絞肉、香菇、蝦米、冬菜、紅蔥頭等爆香內餡，加上香Q彈牙的粿脆，鹹而不膩。是令人懷念的老味道。<br /><br />作法:<br />將水煮開後，置入冷凍湯圓再加熱，水滾後關小火，待湯圓浮起3~5分鐘即可食用。加入冬菜、茼蒿(小白菜)、芹菜末、胡椒粉。風味迷人。<br /><br />一盒10顆包裝/135元', '', '老木鹹湯圓-3-官網.JPG', '20151217022435.JPG', 9999, 1, '上架');

-- --------------------------------------------------------

-- 
-- 資料表格式： `productcategory`
-- 

CREATE TABLE `productcategory` (
  `SerialNo` int(11) NOT NULL auto_increment COMMENT '流水號',
  `Category` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '分類名稱(繁體)',
  `Sort` int(50) NOT NULL COMMENT '排序',
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品分類' AUTO_INCREMENT=11 ;

-- 
-- 列出以下資料庫的數據： `productcategory`
-- 

INSERT INTO `productcategory` (`SerialNo`, `Category`, `Sort`, `Status`) VALUES (2, '招牌系列', 2, '上架'),
(6, '雞湯系列', 3, '上架'),
(4, '火鍋系列', 4, '上架'),
(5, '即食系列', 5, '下架'),
(7, '魚鱗源膠原蛋白凍', 1, '上架'),
(8, '母親節優惠專案（活動至5/3號止）', 6, '下架');

-- --------------------------------------------------------

-- 
-- 資料表格式： `treelist`
-- 

CREATE TABLE `treelist` (
  `SerialNo` int(11) NOT NULL auto_increment,
  `Tree_ID` varchar(4) character set utf8 NOT NULL,
  `Tree_Name` varchar(20) character set utf8 NOT NULL,
  `Href_File` varchar(50) character set utf8 NOT NULL,
  `FileName` varchar(50) character set utf8 NOT NULL,
  `Sort` int(11) NOT NULL,
  `AdminUse` varchar(1) character set utf8 NOT NULL,
  PRIMARY KEY  (`SerialNo`),
  KEY `tree_id` (`Tree_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='功能選單' AUTO_INCREMENT=39 ;

-- 
-- 列出以下資料庫的數據： `treelist`
-- 

INSERT INTO `treelist` (`SerialNo`, `Tree_ID`, `Tree_Name`, `Href_File`, `FileName`, `Sort`, `AdminUse`) VALUES (1, '01', '網站設定', '', '', 100, 'N'),
(2, '0110', '網站基本資料', '../form/Web/Web.php', 'Web.php', 110, 'N'),
(3, '0120', '網站關鍵字 ', '../form/Web/Keyword.php', 'Keyword.php', 120, 'Y'),
(4, '90', '選單管理', '', '', 9000, 'Y'),
(5, '9010', '選單管理', '../form/Tree/Tree.php', 'Tree.php', 9010, 'Y'),
(6, '99', '權限管理', '', '', 9900, 'N'),
(7, '9910', '管理者資料', '../form/System/M_Member.php', 'MMember.php', 9910, 'N'),
(8, '9920', '權限維護', '../form/System/Control.php', 'Control.php', 9920, 'N'),
(9, '98', '瀏覽人次', '', '', 9800, 'N'),
(10, '9810', '瀏覽人次', '../form/Counter/index.php', 'Counter.php', 9810, 'N'),
(11, '10', '最新消息', '', '', 1000, 'N'),
(12, '1020', '最新消息', '../form/News/News.php', 'News.php', 1020, 'N'),
(13, '1010', '首頁最新消息', '../form/NewsIndex/NewsIndex.php', 'NewsIndex.php', 1010, 'N'),
(14, '15', '產品介紹', '', '', 1500, 'N'),
(15, '1520', '產品介紹', '../form/Product/ProductCategory.php', 'Product.php', 1520, 'N'),
(16, '1510', '推薦產品', '../form/ProductIndex/ProductIndex.php', 'ProductIndex.php', 1510, 'N'),
(28, '45', '聯絡我們', '', '', 4500, 'N'),
(29, '4510', '聯絡我們', '../form/Contact/Contact.php', 'Contact.php', 4510, 'N'),
(38, '3020', '訂單管理', '../form/Order/Order.php', 'Order.php', 3020, 'N'),
(37, '3010', '訂購說明', '../form/Order/OrderNote.php', 'OrderNote.php', 3010, 'N'),
(36, '30', '訂購專區', '', '', 3000, 'N'),
(34, '05', 'Banner管理', '', '', 500, 'N'),
(35, '0510', 'Banner管理', '../form/Banner/Banner.php', 'Banner.php', 510, 'N');

-- --------------------------------------------------------

-- 
-- 資料表格式： `web`
-- 

CREATE TABLE `web` (
  `SerialNo` int(11) NOT NULL auto_increment,
  `WebTitle` varchar(255) character set utf8 NOT NULL COMMENT '網站標題',
  `WebName` varchar(255) character set utf8 NOT NULL COMMENT '網站名稱',
  `WebTel` varchar(255) character set utf8 NOT NULL COMMENT '電話',
  `WebTime` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '服務時間',
  `WebFax` varchar(255) character set utf8 NOT NULL COMMENT '傳真',
  `WebAddress` varchar(255) character set utf8 NOT NULL COMMENT '地址',
  `OtherUrl` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT '高明寺超連結',
  `FacebookUrl` varchar(255) collate utf8_unicode_ci NOT NULL COMMENT 'facebook超連結',
  `ManagerEmail` varchar(255) character set utf8 NOT NULL COMMENT '管理者EMail',
  `ManagerEmailAccount` varchar(255) character set utf8 NOT NULL COMMENT '管理者EMail帳號',
  `ManagerEmailPWD` varchar(255) character set utf8 NOT NULL COMMENT '管理者EMail密碼',
  `EMailServer` varchar(255) character set utf8 NOT NULL COMMENT '郵件伺服器位址',
  `Keywords` text character set utf8 NOT NULL COMMENT '關鍵字',
  `Description` text character set utf8 NOT NULL COMMENT '網頁描述',
  `OrderNote` text collate utf8_unicode_ci NOT NULL COMMENT '訂購說明',
  `datedb` text collate utf8_unicode_ci NOT NULL,
  `recentdb` text collate utf8_unicode_ci NOT NULL,
  `startdb` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`SerialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- 列出以下資料庫的數據： `web`
-- 

INSERT INTO `web` (`SerialNo`, `WebTitle`, `WebName`, `WebTel`, `WebTime`, `WebFax`, `WebAddress`, `OtherUrl`, `FacebookUrl`, `ManagerEmail`, `ManagerEmailAccount`, `ManagerEmailPWD`, `EMailServer`, `Keywords`, `Description`, `OrderNote`, `datedb`, `recentdb`, `startdb`) VALUES (1, '王家老木', '王家老木', ' 07-349-8335', '週一至週六 AM10:00~PM20:00 (星期日公休) ', '05-3701384', '高雄市左營區華夏路1055號', 'http://www2.kmkg.cyc.edu.tw/introduce.php', '', 'service@motherwang.com', '', '', 'localhost', '禮盒,糯米雞.酸菜白肉鍋,家常菜,媽媽的味道,東坡肉,排骨酥湯,宅配美食,人蔘雞,酸菜白肉鍋,雞湯	,古早味,團購美食,王家老木,台南塩水意麵,肉燥,蹄膀,冷凍食品,鹽水意麵,真空包裝', '本站提供新鮮食材烹調而成的餐點宅配服務，具備購物車系統，歡迎線上下單。', '&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; style=&quot;color: rgb(140, 140, 140); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(0, 0, 0);&quot; width=&quot;100%&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; colspan=&quot;2&quot; style=&quot;font-size: 15px; font-weight: bold; color: rgb(135, 1, 24); padding: 3px;&quot; valign=&quot;middle&quot;&gt;\r\n				■ 王家老木訂購說明&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text02&quot; colspan=&quot;2&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px 5px 5px 19px;&quot; valign=&quot;middle&quot;&gt;\r\n				來電訂購：07-349-8335&amp;nbsp;&lt;br /&gt;\r\n				傳真訂購：07-350-0198 電話預約來店自取 或網站下單。&lt;br /&gt;\r\n				訂購時間：(10:00AM~10:00PM)&lt;br /&gt;\r\n				您在本網站下單後，我們將主動與您聯繫確認訂單金額及運費。&lt;br /&gt;\r\n				完成匯款動作之後，將於三個工作天內為您出貨。&lt;br /&gt;\r\n				(電話預約來店自取於當日12:00PM前完成訂購於翌日05:00PM即可取件。但為熟食而非冷凍包裝。)&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; colspan=&quot;2&quot; style=&quot;font-size: 15px; font-weight: bold; color: rgb(135, 1, 24); padding: 10px 3px 3px;&quot; valign=&quot;middle&quot;&gt;\r\n				■ 訂購資料填寫&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text02&quot; colspan=&quot;2&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px 5px 5px 19px;&quot; valign=&quot;middle&quot;&gt;\r\n				請註明:收件人姓名(或公司名稱) 訂購人手機(或電話) 收貨地址。&lt;br /&gt;\r\n				我們將依此資料寄送貨品，請務必清楚填寫以確保貨品正確送達。&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; style=&quot;font-size: 15px; font-weight: bold; color: rgb(135, 1, 24); padding: 10px 3px 3px;&quot; valign=&quot;middle&quot; width=&quot;42%&quot;&gt;\r\n				■ 匯款資訊&lt;/td&gt;\r\n			&lt;td align=&quot;center&quot; rowspan=&quot;2&quot; valign=&quot;middle&quot; width=&quot;58%&quot;&gt;\r\n				&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text04&quot; style=&quot;color: rgb(206, 139, 0); padding: 5px 5px 5px 19px;&quot; valign=&quot;top&quot;&gt;\r\n				銀行名稱： 新光商業銀行---左營華夏路分行&lt;br /&gt;\r\n				帳戶名稱：王秀美&lt;br /&gt;\r\n				帳 號： 0365&amp;ndash;10&amp;ndash;10148&amp;ndash;7&amp;nbsp;&lt;br /&gt;\r\n				電 話： 07-349-8335&lt;br /&gt;\r\n				傳 真：07-350-0198&lt;br /&gt;\r\n				本店地址： 高雄市左營區華夏路1055號&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;h1&quot; colspan=&quot;2&quot; style=&quot;font-size: 15px; font-weight: bold; color: rgb(135, 1, 24); padding: 10px 3px 3px;&quot; valign=&quot;middle&quot;&gt;\r\n				■ 退換貨資訊&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; colspan=&quot;2&quot; style=&quot;padding-left: 16px;&quot; valign=&quot;middle&quot;&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 2px;&quot; valign=&quot;middle&quot; width=&quot;4%&quot;&gt;\r\n								&lt;span class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194);&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px;&quot; valign=&quot;middle&quot; width=&quot;96%&quot;&gt;\r\n								任何的退換貨請於接獲產品後&lt;span class=&quot;text04&quot; style=&quot;color: rgb(206, 139, 0);&quot;&gt;1個工作天內&lt;/span&gt;提出(以週休二日為準，含國定例假日)。並請保留產品本身及包裝。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 2px;&quot; valign=&quot;middle&quot;&gt;\r\n								&lt;span class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194);&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px;&quot; valign=&quot;middle&quot;&gt;\r\n								退換貨前請先以電子郵件、電話或傳真與本公司服務人員聯絡，以加快處理速度。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 5px 2px 2px;&quot; valign=&quot;top&quot;&gt;\r\n								&lt;span class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194);&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px;&quot; valign=&quot;middle&quot;&gt;\r\n								退換貨經確認受理後，本公司服務人員會與您討論收取退換貨之日期、方式、時間及其他相關之退換貨處理細節。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 2px;&quot; valign=&quot;middle&quot;&gt;\r\n								&lt;span class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194);&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px;&quot; valign=&quot;middle&quot;&gt;\r\n								未經上述程序之任何退換貨，本公司礙難受理，不便之處，尚祈見諒！&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 2px;&quot; valign=&quot;middle&quot;&gt;\r\n								&lt;span class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194);&quot;&gt;◎&lt;/span&gt;&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px;&quot; valign=&quot;middle&quot;&gt;\r\n								可歸責於本公司或物流貨運公司之產品毀損不在此限，請您於收到貨品時先行檢查再簽收。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194); padding: 2px;&quot; valign=&quot;middle&quot;&gt;\r\n								◎&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;color: rgb(194, 194, 194); padding: 5px;&quot; valign=&quot;middle&quot;&gt;\r\n								其餘原因之退換貨，均須酌收運送商品的手續費及運費。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td align=&quot;left&quot; class=&quot;text02&quot; colspan=&quot;2&quot; style=&quot;color: rgb(194, 194, 194); padding-left: 16px;&quot; valign=&quot;middle&quot;&gt;\r\n				&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; width=&quot;100%&quot;&gt;\r\n					&lt;tbody&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 2px;&quot; valign=&quot;middle&quot; width=&quot;4%&quot;&gt;\r\n								◆&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding: 5px;&quot; valign=&quot;middle&quot; width=&quot;96%&quot;&gt;\r\n								&lt;p&gt;\r\n									如對商品有任何疑問，歡迎來電洽詢:&lt;span class=&quot;text04&quot; style=&quot;color: rgb(206, 139, 0);&quot;&gt;&amp;nbsp;07-349-8335&lt;/span&gt;&amp;nbsp;或&amp;nbsp;&lt;span class=&quot;link2&quot; style=&quot;color: rgb(206, 139, 0);&quot;&gt;&lt;a href=&quot;contact.html&quot; style=&quot;color: rgb(206, 139, 0);&quot;&gt;來信&lt;/a&gt;&lt;/span&gt;&amp;nbsp;洽詢。&lt;/p&gt;\r\n							&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 5px 2px 2px;&quot; valign=&quot;top&quot;&gt;\r\n								◆&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text02&quot; style=&quot;padding: 5px;&quot; valign=&quot;middle&quot;&gt;\r\n								退款辦法當本商店收到您的退貨郵件後，本商店將先對商品進行審查，於確認退貨商品係因本商店商品瑕疵之原因或商品非因瑕疵而符合退貨標準時，我們將為您辦理退款手續。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n						&lt;tr&gt;\r\n							&lt;td align=&quot;center&quot; style=&quot;padding: 5px 2px 2px;&quot; valign=&quot;top&quot;&gt;\r\n								◆&lt;/td&gt;\r\n							&lt;td align=&quot;left&quot; class=&quot;text04&quot; style=&quot;color: rgb(206, 139, 0); padding: 5px;&quot; valign=&quot;middle&quot;&gt;\r\n								以匯款方式付款者，我們會將款項退到您的銀行或郵局個人帳戶內，有任何問題歡迎您以e-mail或來電給本商店，我們將會立即為您處理。&lt;/td&gt;\r\n						&lt;/tr&gt;\r\n					&lt;/tbody&gt;\r\n				&lt;/table&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;br /&gt;\r\n', 'a:8:{s:4:"snap";a:11:{i:0;i:7884;i:1;i:1;i:2;i:3;i:3;i:17;i:4;i:678;i:5;i:6;i:6;i:1462323764;i:7;s:10:"2013-01-04";i:8;i:72;i:9;s:7:"2013-03";i:10;i:419;}s:4:"hour";a:2:{s:6:"recent";a:24:{i:0;i:1;i:1;i:1;i:2;i:1;i:3;i:1;i:4;i:1;i:5;i:1;i:6;i:1;i:7;i:1;i:8;i:1;i:9;i:1;i:10;i:1;i:11;i:1;i:12;i:1;i:13;i:1;i:14;i:1;i:15;i:1;i:16;i:1;i:17;i:1;i:18;i:4;i:19;i:1;i:20;i:1;i:21;i:1;i:22;i:1;i:23;i:1;}s:3:"all";a:24:{i:0;i:322;i:1;i:223;i:2;i:197;i:3;i:145;i:4;i:127;i:5;i:116;i:6;i:136;i:7;i:151;i:8;i:241;i:9;i:302;i:10;i:391;i:11;i:386;i:12;i:350;i:13;i:451;i:14;i:472;i:15;i:479;i:16;i:498;i:17;i:478;i:18;i:371;i:19;i:380;i:20;i:392;i:21;i:387;i:22;i:458;i:23;i:431;}}s:3:"day";a:2:{s:6:"recent";a:31:{i:1;i:6;i:2;i:2;i:3;i:6;i:4;i:3;i:5;i:4;i:6;i:4;i:7;i:6;i:8;i:2;i:9;i:3;i:10;i:6;i:11;i:8;i:12;i:3;i:13;i:1;i:14;i:4;i:15;i:5;i:16;i:5;i:17;i:2;i:18;i:3;i:19;i:1;i:20;i:3;i:21;i:10;i:22;i:7;i:23;i:11;i:24;i:17;i:25;i:9;i:26;i:7;i:27;i:8;i:28;i:5;i:29;i:8;i:30;i:12;i:31;i:3;}s:3:"all";a:31:{i:1;i:280;i:2;i:269;i:3;i:242;i:4;i:309;i:5;i:252;i:6;i:241;i:7;i:292;i:8;i:198;i:9;i:289;i:10;i:321;i:11;i:252;i:12;i:250;i:13;i:179;i:14;i:225;i:15;i:234;i:16;i:209;i:17;i:242;i:18;i:208;i:19;i:242;i:20;i:319;i:21;i:289;i:22;i:243;i:23;i:201;i:24;i:255;i:25;i:262;i:26;i:271;i:27;i:259;i:28;i:345;i:29;i:305;i:30;i:251;i:31;i:150;}}s:5:"month";a:2:{s:6:"recent";a:12:{i:1;i:236;i:2;i:146;i:3;i:107;i:4;i:172;i:5;i:17;i:6;i:110;i:7;i:149;i:8;i:135;i:9;i:207;i:10;i:164;i:11;i:122;i:12;i:314;}s:3:"all";a:12:{i:1;i:1097;i:2;i:749;i:3;i:851;i:4;i:789;i:5;i:555;i:6;i:437;i:7;i:476;i:8;i:432;i:9;i:482;i:10;i:575;i:11;i:428;i:12;i:1013;}}s:4:"week";a:2:{s:6:"recent";a:7:{i:0;i:6;i:1;i:2;i:2;i:6;i:3;i:3;i:4;i:5;i:5;i:8;i:6;i:12;}s:3:"all";a:7:{i:0;i:1034;i:1;i:1162;i:2;i:1095;i:3;i:1150;i:4;i:1257;i:5;i:1175;i:6;i:1011;}}s:4:"year";a:5:{i:0;i:378;i:1;i:3156;i:2;i:1698;i:3;i:1974;i:4;i:678;}s:7:"browser";a:109:{s:21:"Internet Explorer 9.0";i:197;s:12:"FireFox 16.0";i:48;s:13:"Safari 537.11";i:157;s:16:"Safari 7534.48.3";i:24;s:21:"Internet Explorer 7.0";i:70;s:13:"Safari 534.30";i:939;s:12:"Safari 533.1";i:120;s:6:"Others";i:2090;s:13:"Safari 535.19";i:44;s:13:"Safari 533.16";i:9;s:21:"Internet Explorer 8.0";i:343;s:12:"FireFox 17.0";i:136;s:12:"Safari 536.5";i:1;s:15:"Safari 534.57.2";i:3;s:35:"(Internet Explorer 535.12) Maxthon ";i:2;s:14:"Safari 8536.25";i:125;s:22:"Internet Explorer 10.0";i:98;s:13:"Safari 536.25";i:2;s:21:"Internet Explorer 6.0";i:41;s:12:"FireFox 12.0";i:4;s:13:"Safari 537.17";i:65;s:12:"Safari 537.4";i:9;s:32:"(Internet Explorer 7.0) Maxthon ";i:1;s:13:"Safari 534.13";i:8;s:14:"FireFox 3.6.24";i:1;s:12:"FireFox 18.0";i:39;s:10:"Opera 9.80";i:5;s:12:"Safari 537.1";i:3;s:11:"FireFox 3.5";i:6;s:12:"FireFox 11.0";i:2;s:16:"Safari 536.26.17";i:1;s:14:"FireFox 14.0.1";i:1;s:12:"FireFox 19.0";i:93;s:16:"Safari 6533.18.5";i:4;s:13:"Safari 534.24";i:57;s:13:"Safari 537.22";i:83;s:13:"Safari 534.35";i:1;s:13:"Safari 537.31";i:157;s:12:"FireFox 13.0";i:1;s:12:"Safari 534.3";i:3;s:12:"FireFox 20.0";i:44;s:13:"Safari 537.36";i:1857;s:16:"Safari 536.29.13";i:3;s:13:"Safari 534.34";i:60;s:13:"Safari 535.11";i:1;s:12:"FireFox 21.0";i:20;s:12:"Safari 535.2";i:1;s:16:"Safari 534.53.10";i:1;s:13:"Safari 536.11";i:36;s:12:"FireFox 22.0";i:30;s:16:"Safari 531.21.10";i:1;s:15:"Safari 536.30.1";i:2;s:12:"FireFox 23.0";i:53;s:15:"Safari 534.59.8";i:1;s:12:"FireFox 24.0";i:23;s:14:"Safari 9537.53";i:123;s:16:"Safari 536.28.10";i:1;s:12:"FireFox 25.0";i:19;s:16:"Safari 534.59.10";i:6;s:14:"FireFox 13.0.1";i:12;s:12:"FireFox 26.0";i:21;s:15:"Safari 533.22.3";i:2;s:26:"FireFox 15.0.1,Mozilla/5.0";i:1;s:16:"Safari 537.73.11";i:2;s:12:"FireFox 27.0";i:8;s:14:"FireFox 15.0.1";i:153;s:13:"Safari 534.31";i:1;s:12:"FireFox 28.0";i:9;s:14:"FireFox 10.0.2";i:1;s:12:"FireFox 29.0";i:8;s:12:"FireFox 30.0";i:4;s:15:"Safari 537.77.4";i:2;s:12:"FireFox 31.0";i:15;s:12:"FireFox 32.0";i:10;s:14:"Safari 534.30;";i:1;s:14:"Safari 600.1.4";i:193;s:13:"Safari 537.16";i:2;s:12:"FireFox 33.0";i:3;s:12:"FireFox 34.0";i:4;s:12:"FireFox 35.0";i:11;s:15:"Safari 600.3.18";i:1;s:13:"Safari 530.17";i:1;s:12:"FireFox 36.0";i:1;s:12:"FireFox 37.0";i:6;s:13:"FireFox 3.6.4";i:1;s:15:"Safari 600.4.10";i:1;s:12:"FireFox 39.0";i:5;s:14:"Safari 600.6.3";i:2;s:15:"Safari 600.7.12";i:1;s:12:"FireFox 38.0";i:3;s:12:"FireFox 40.0";i:4;s:12:"FireFox 10.0";i:1;s:12:"Safari 601.1";i:48;s:16:"Safari 537.85.17";i:1;s:12:"FireFox 41.0";i:1;s:14:"Safari 601.2.7";i:1;s:12:"FireFox 42.0";i:8;s:15:"Safari 601.1.56";i:1;s:16:"Safari 537.85.11";i:1;s:15:"Safari 601.1.46";i:24;s:12:"FireFox 43.0";i:11;s:14:"Safari 601.3.9";i:1;s:14:"Safari 534.30)";i:1;s:12:"FireFox 44.0";i:9;s:12:"FireFox 45.0";i:3;s:15:"Safari 537.86.3";i:1;s:14:"Safari 601.4.4";i:2;s:13:"FireFox 6.0.2";i:4;s:15:"Safari 601.5.17";i:2;}s:2:"os";a:9:{s:9:"Windows 7";i:1944;s:6:"Others";i:2687;s:10:"Windows XP";i:776;s:10:"Windows 95";i:110;s:5:"Linux";i:2129;s:13:"Windows Vista";i:36;s:10:"Windows NT";i:143;s:12:"Windows 2000";i:14;s:10:"Windows 98";i:45;}}', 'b:0;', '1353466074');
