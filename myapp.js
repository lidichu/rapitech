	<script>
	(function() {
	  var app = angular.module('myapp', []);

	  app.controller('navController', function(){
	    this.nav=navs;
	  });
//	
	 var navs = [
	    { name: 'Azurite', price: 2.95 },
	    { name: 'Bloodstone', price: 5.95 },
	    { name: 'Zircon', price: 3.95 }
	  ];

	  app.controller('storeController', function(){
	    this.product=products;
	  });	 
// 
	var products =[ 
		{
			name: 'iphone 1s',
			price: 12000,
			description:'1深入高级将其指数顾客大大理解图书南京感到台北业，我有手机铃声事务各项尤其是质量一定买卖那么每次性格，达到著名显示交换错误手机铃声内置风情美元学科商家可以用，目的高效一眼包含基于图片农业留下其实特殊妻，社会主义实用之后不可。',
			canBuy:true,
			canNotBuy:true,
		},

		{
			name: 'iphone 2s',
			price: 22000,
			description:'2游客简体中文售价怎么办研发，哥哥毕业相比我真新人看着，作为必要没有接口吸收楼上一方面而在人民恐怕进，或许伟大最近广西天然你要一段希望委员会性质相应报告男性语，请在以前差不多预计通知实业实际阳光包装设施点这里下载，设计还不种种比例动物校长毕业痛苦快捷解放取消认，综合任务就要招聘战略语言机关这里就要主要出版社作品来到。',
			canBuy:true,
			canNotBuy:false,
		},

		{
			name: 'iphone 3s',
			price: 32000,
			description:'3细胞也不来说笑着床上需求，前后东西趋势服饰直到行动并不是超过宝宝观，其他网际快车亿元建议并且表情深圳老公发布日期竟然显，一天新增就像斑竹国际不太论，歌词访问浪漫后面媒体资产上传金融了解身材基地负责人依旧规范，许多引发没想到英文设计天津至今给我们魅力可是哪个批准当前，基本上影响公告说出家里先进性教育优点是以翻译什么博士平方米，拥有动作登录如下无门前进不明白上网第一第一来了家庭一眼本。',
			canBuy:true,
			canNotBuy:false,
		},

		{
			name: 'iphone 4s',
			price: 42000,
			description:'4眼中而来身边容量你会诚信刷新当前把握回到精品我要一生签名每个，出生一句话搜索引擎代码另一个无派一，电子邮件我来有关本人出口作业回事价值引发物品还有严重可以按钮，每个鼠标警方授权浪费手续再度相册紧张法院为。',
			canBuy:true,
			canNotBuy:false,
		},
			];


	//3 tabs 

		app.controller('PanelController', function(){
    
	       this.tab = 1;
	       this.selectTab = function(tabNumber){
	           this.tab = tabNumber;
	       };
	     
	       this.isSelected = function(tabNumber){
	           return this.tab === tabNumber;
	       };
    
  			});


		// 

	})();

	
	</script>