<?php
/*
##########################################################
 公农历互转类PHP版 V1.0
 1.互转年限从1901~2100。
 2.附带采用该类制作的公历节日和农历节日混合的节日倒计时程序

 Class OT_NongLiGongLi 用于农历与公历间的相互转换
 本类可处理1900-2100年(农历)之间的公农历转换
 本类不输出错误信息，如输出结果为1800-1-1则意味发生错误。

 作者：网钛工作室
 日期：2010-09-23
 网址：http://www.oneti.cn/
 邮箱：877873666@qq.com
 版权：可自由传播，也可修改后应用到自己程序里，但请保留该版权及注释信息

 应用示例：
  $nongGong = new OT_NongLiGongLi();

 公历转农历(查询日期范围1901-2-19至2100-12-31,格式yyyy-mm-dd，第二个参数（可选）showMode显示模式，1.效果:农历2000年(闰)四月初六  2.效果:农历2000年(闰)4月6日  其他值.效果:2000-4-6 (闰))
  echo($nongGong->GongToNong("1984-12-10"));

 农历转公历（查询日期范围1901-1-1至2100-12-29,格式yyyy-mm-dd，第二个参数（可选）Ntype为"闰"或"1"，表示查询农历的月份是闰月；Ntype为""或其他值，表示不是闰月）
  echo($nongGong->NongToGong("1984-10-18"));
##########################################################
*/

// 定义类
class OT_NongLiGongLi{
	const NongLiStart = 1900;
	public $gongLiArr=array();
	public $nongLiArr=array();

	// 定义构造方法（初始化）
	function __construct(){
		$this->gongLiArr=array(0,31,28,31,30,31,30,31,31,30,31,30,31);	// 公历月份数据
		$this->nongLiArr=array("",
			"49,0,14AE","38,0,1A57","28,5,2A9A","46,0,1D26","34,0,1D95","24,4,2EAA","43,0,156A","32,0,19AD","21,2,22BB","40,0,14AE",
			"29,6,3437","48,0,1A4D","36,0,1D25","25,5,3B4A","44,0,1B54","33,0,1D6A","22,2,35B4","41,0,195B","31,7,296E","50,0,1497",
			"38,0,1A4B","27,5,3696","46,0,16A5","35,0,16D4","23,4,376A","43,0,12B6","32,0,1957","22,2,225F","40,0,1497","29,6,2C2D",
			"47,0,1D4A","36,0,1EA5","25,5,2D53","44,0,15AD","34,0,12B6","23,3,34DC","41,0,192E","30,7,395A","49,0,1C95","38,0,1D4A",
			"26,6,3B94","45,0,1B55","35,0,156A","24,4,36B6","43,0,125D","32,0,192D","21,2,3257","40,0,1A95","28,7,36AA","47,0,16CA",
			"36,0,1B55","26,5,2B6A","44,0,14DA","33,0,1A5B","23,3,2CAE","42,0,152B","30,8,3515","48,0,1E95","38,0,16AA","27,6,3555",
			"45,0,1AB5","35,0,14B6","24,4,355C","43,0,1A57","32,0,1526","20,3,3A4D","39,0,1D95","29,7,2B2B","47,0,156A","36,0,196D",
			"26,5,28BB","45,0,14AD","33,0,1A4D","22,4,389B","41,0,1D25","30,8,3A8B","48,0,1B54","37,0,1B6A","27,6,32B5","46,0,195B",
			"35,0,149B","24,4,352E","43,0,1A4B","32,10,3647","50,0,16A5","39,0,16D4","28,6,3569","47,0,1AB6","36,0,1957","26,5,285F",
			"45,0,1497","34,0,164B","22,3,2A95","40,0,1EA5","30,8,2D4B","49,0,15AC","37,0,1AB6","27,5,32DA","46,0,192E","35,0,1C96",
			"23,4,392B","42,0,1D4A","31,0,1DA5","21,2,26AB","39,0,156A","28,7,3537","48,0,125D","37,0,192D","25,5,3857","44,0,1A95",
			"33,0,1B4A","22,4,3555","40,0,1AD5","30,9,2AAB","49,0,14BA","38,0,1A5B","27,6,2AAE","46,0,152B","35,0,1A93","24,4,2D2B",
			"42,0,16AA","31,0,1AD5","21,2,236B","40,0,14B6","28,6,345D","47,0,1A4E","36,0,1D26","25,5,3C4D","43,0,1D53","33,0,15AA",
			"22,3,2AD5","41,0,196D","30,11,295B","49,0,14AD","38,0,1A4D","27,6,3A96","45,0,1D25","34,0,1D52","23,5,3AA9","42,0,1B5A",
			"31,0,156D","21,2,22B7","40,0,149B","29,7,34AE","47,0,1A4B","36,0,1AA5","25,5,374A","44,0,16D2","32,0,1ADA","22,3,2D6C",
			"41,0,1937","31,8,291F","49,0,1497","38,0,164B","27,6,2D94","45,0,1EA5","34,0,16AA","23,4,36D8","42,0,1AAE","32,0,192E",
			"20,3,3A5C","39,0,1C96","28,7,3AAA","47,0,1D4A","35,0,1DA5","25,5,2AAB","44,0,156A","33,0,1A6D","22,4,28BB","41,0,152D",
			"30,8,3517","49,0,1A95","37,0,1B4A","26,6,3655","45,0,1AD5","35,0,155A","23,4,3574","42,0,1A5B","32,0,152B","21,3,324F",
			"39,0,1693","28,7,2E27","47,0,16AA","36,0,1AD5","25,5,296B","44,0,14B6","33,0,1A57","23,4,289D","40,0,1D16","29,8,3D0D",
			"48,0,1D52","37,0,1DAA","26,6,2DD4","45,0,156D","35,0,14AE","24,4,353A","42,0,1A2D","31,0,1D15","20,2,364B","39,0,1D53"
			);	// 农历1901~2100年数据
	}


	// 16进制数据转化为原始数据
	function C16ToData($str){
		$dataArr	= explode(",",$str);
		$Ndata		= substr(base_convert($dataArr[2],16,2),1);
		$NdataLen	= strlen($Ndata);
		$newData	= $dataArr[0];
		for ($i2=0; $i2<$NdataLen; $i2++){
			if ($i2 == intval($dataArr[1])-1){
				$newData .= ",". (intval(substr($Ndata,$i2,1))+29 + intval(substr($Ndata,12,1))+29);
			}else{
				$newData .= ",". (intval(substr($Ndata,$i2,1))+29);
			}		
		}
		return $newData;
	
	}



	// 公历该月的天数(y：年份； m：月份)
	function GongliMonth($y,$m){
		if ($m==2 && ( ($y % 400 == 0) || ($y % 4 == 0 && $y % 100 != 0) )){
			return 29;
		}else{
			return $this->gongLiArr[$m];
		}
	}

	// 农历月份名称转换(m：月份)
	function NongliMonth($m){
		if ($m>=1 && $m<=12){
			$monthArr=array("","正","二","三","四","五","六","七","八","九","十","十一","十二");
			return $monthArr[$m];
		}else{
			return $m;
		}
	}

	// 农历月份名称转换(d：日)
	function NongliDay($d){
		if ($d>=1 && $d<=30){
			$dayArr=array("",
				"初一","初二","初三","初四","初五","初六","初七","初八","初九","初十",
				"十一","十二","十三","十四","十五","十六","十七","十八","十九","二十",
				"廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十"
				);
			return $dayArr[$d];
		}else{
			return $d;
		}
	}



	// 公历转农历(Gdate：公历日期)
	// $Gdate 必填，公历日期，格式yyyy-mm-dd
	// $showMode 可选，显示模式，可以自行在代码里添加
	// $errStr 可选，收集错误原因
	function GongToNong($Gdate,$showMode=0,&$errStr=""){
		$Gyear = $Gmonth = $Gday = $Glen = $Nyear = $Nmonth = $Nday = $Ni = 0;
		$Narr = array();$Ntype = "";

		@list($Gyear,$Gmonth,$Gday) = explode("-",$Gdate);
		$Gmonth = intval($Gmonth);

		if (! checkdate($Gmonth,$Gday,$Gyear)){
			$errStr = "出错！非日期类型，错误会输出1800-1-1";
			return "1800-1-1";		
		}

		if ($this->DateDiffDay(1901,2,19,$Gyear,$Gmonth,$Gday)<0 || $this->DateDiffDay($Gyear,$Gmonth,$Gday,2100,12,31)<0){
			$errStr = "出错！目前公历只支持1901-2-19至2100-12-31，错误会输出1800-1-1";
			return "1800-1-1";
		}


		// 获取查询日期到当年1月1日的天数
		$Glen	= $this->DateDiffDay($Gyear,1,1,$Gyear,$Gmonth,$Gday)+1;

		$Narr	= explode(",",$this->C16ToData($this->nongLiArr[$Gyear-self::NongLiStart]));	// 获取相应年度农历数据，化成数组Narr
		if ($Glen<=intval($Narr[0])){
			$Nyear	= $Gyear-1;
			$Glen	= intval($Narr[0])-$Glen;
			$Narr	= explode(",",$this->C16ToData($this->nongLiArr[$Gyear-self::NongLiStart]));
			if ($Glen < intval($Narr[12])){
				$Nmonth	= 12;
				$Nday	= intval($Narr[12])-$Glen;
			}else{
				$Nmonth	= 11;
				$Glen	-= intval($Narr[12]);
				$Nday	= intval($Narr[11])-$Glen;
			}
		
		}else{
			$Nyear	= $Gyear;
			$Glen	= $Glen-intval($Narr[0]);
			for ($Ni=1; $Ni<=12; $Ni++){
				if ($Glen>intval($Narr[$Ni])){
					$Glen -= intval($Narr[$Ni]);
				}else{
					if ($Glen>30){			
						$Glen -= intval($Narr[13]);
						$Ntype="闰";	 	// 闰月
					}
					$Nmonth	= $Ni;
					$Nday	= $Glen;
					break;
				}
			
			}
		}

		switch ($showMode){
			case 1:
				return "农历". $Nyear ."年". $Ntype . $this->NongliMonth($Nmonth) ."月". $this->NongliDay($Nday);	// 效果:农历2000年(闰)四月初六
				break;
		
			case 2:
				return "农历". $Nyear ."年". $Ntype . $Nmonth ."月". $Nday ."日";	 // 效果:农历2000年(闰)4月6日
				break;
		
			default :
				return $Nyear ."-". $Nmonth ."-". $Nday;		 // 效果:2000-4-6 (闰)
				break;
		} 

	}








	// 农历转公历(Ndate：农历日期； Ntype：是否闰月)
	// $Ndate 必填，农历日期，格式yyyy-mm-dd
	// $Ntype 可选，值 “闰”或“1”表示是闰月，其他均视为平月，
	// $errStr 可选，收集错误原因
	function NongToGong($Ndate,$Ntype="",&$errStr=""){
		$Nyear = $Nmonth = $Nday = $Nlen = $Ni = $Gyear = $Gmonth = $Gday = $Gi = 0;
		$Narr = array();

		// 因为农历日期存在2月29或30，故人工截取年、月、日
		@list($Nyear,$Nmonth,$Nday)	= explode("-",$Ndate);
		$Nmonth = intval($Nmonth);

		if (checkdate($Nmonth,$Nday,$Nyear)==false && substr($Ndate,-4)!="2-29" && substr($Ndate,-4)!="2-30"){
			$errStr = "出错！非日期类型，错误会输出1800-1-1";
			return "1800-1-1";		
		}
		if (intval($Nyear) < 1901 || intval($Nyear) > 2100){
			$errStr = "出错！目前农历只支持1901-1-1至2100-12-29，错误会输出1800-1-1";
			return "1800-1-1";
		}

		// 判断查询日期是否是闰月
		if ($Ntype=="闰" || $Ntype=="1"){
			$Ntype="闰";
		}else{
			$Ntype="";
		}

		// 获取相应年度农历数据，化成数组Narr
		$Narr	= explode(",",$this->C16ToData($this->nongLiArr[$Nyear-self::NongLiStart]));
		if ($Ntype=="闰" && count($Narr)<=13){
			$errStr = "农历". $Ndate ."无闰月，将按照平月计算";
		}

		// 如果查询的农历是闰月并该年度农历数组存在闰月数据就获取
		if ($Narr[$Nmonth]>30 && $Ntype="闰" && count($Narr)>=14){
			$Nday += intval($Narr[13]);	
		}

		// 获取该年农历日期到公历1月1日的天数
		$Nlen = $Nday;
		for ($Ni=0; $Ni<$Nmonth; $Ni++){
			$Nlen += intval($Narr[$Ni]);
		}

		if ($Nlen>366 || ($this->GongliMonth($Nyear,2)!=29 && $Nlen>365)){
		// 当查询农历日期距离公历1月1日超过一年时
			$Gyear=$Nyear+1;
			if ($this->GongliMonth($Nyear,2)!=29){
				$Nlen -= 365;
			}else{
				$Nlen -= 366;
			}
			if ($Nlen>intval($this->gongLiArr[1])){
				$Gmonth=2;
				$Gday=$Nlen-$this->gongLiArr[1];
			}else{
				$Gmonth=1;
				$Gday=$Nlen;
			}
		
		}else{
			$Gyear=$Nyear;
			for ($Gi=1; $Gi<=12; $Gi++){
				if ($Nlen>$this->GongliMonth($Gyear,$Gi)){
					$Nlen -= $this->GongliMonth($Gyear,$Gi);
				}else{
					$Gmonth=$Gi;
					$Gday=$Nlen;
					break;
				}
			}
		}

		return $Gyear ."-". $Gmonth ."-". $Gday;
	}

	// 计算2个日期相差天数
	function DateDiffDay($year1,$month1,$day1,$year2,$month2,$day2){
		$month1 = intval($month1);
		$month2 = intval($month2);
		$dayNum = 0;
		for ($i=$month1; $i<=12; $i++){
			$dayNum += $this->GongliMonth($year1,$i);
		}
		$dayNum -= $day1;

		if ($year1==$year2){
			for ($i=$month2; $i<=12; $i++){
				$dayNum -= $this->GongliMonth($year2,$i);
			}
			$dayNum += $day2;
		}elseif ($year1<$year2){
			for ($y=$year1+1; $y<$year2; $y++){
				if ( $y % 400 == 0 || ($y % 4 == 0 && $y % 100 != 0) ){
					$dayNum += 366;
				}else{
					$dayNum += 365;
				}
			}

			for ($i=1; $i<$month2; $i++){
				$dayNum += $this->GongliMonth($year2,$i);
			}
			$dayNum += $day2;
		}else{
			for ($y=$year2; $y<$year1+1; $y++){
				if ( $y % 400 == 0 || ($y % 4 == 0 && $y % 100 != 0) ){
					$dayNum -= 366;
				}else{
					$dayNum -= 365;
				}
			}

			for ($i=1; $i<$month2; $i++){
				$dayNum += $this->GongliMonth($year2,$i);
			}
			$dayNum += $day2;
		}

		return $dayNum;
	}

	// 计算2个日期相差天数（2个日期参数）
	function DateDiffDay2($date1,$date2){
		list($year1,$month1,$day1) = explode("-",$date1);
		list($year2,$month2,$day2) = explode("-",$date2);

		return $this->DateDiffDay($year1,$month1,$day1,$year2,$month2,$day2);
	}
}

?>