<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include("PageHead.php"); ?>
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <meta name="copyright" content="<?php echo $copyright; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="shortcut icon" href="image/heryi.ico" type="image/heryi.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/multipage.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/myservice.css">
    <link href="css/goTop.css" type="text/css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500italic,500,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="toggleSwitch('100px')">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand scroll" href="index.html"><p>禾益網路資訊系統</p><small>HERYI SYSTEM WEB</small></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">首頁</a></li>
                    <li><a href="about.php">關於我們</a></li>
                    <li><a href="services.php">服務項目</a></li>
                    <!--<li><a href="team.html">專案介紹</a></li>-->
                    <li><a href="webDesign.php">網頁設計</a></li>
                    <li><a href="system.php">系統開發</a></li>
                    <li><a href="howwork.php">製作流程</a></li>
                    <li><a href="contact.aspx">聯絡我們</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="clearfix"></div>

    <!-- 插入滿版圖 -->
    <div id="carousel-id" class="container-fluid">
        <div class="row">
            <div class="col-sm-12  col-md-12 col-lg-12">
                <img src="images/about/service.png" class="img-responsive">
            </div>
        </div>
    </div>

    <!-- 插入滿版圖 -->
    <!-- services section -->
    <header id="headerServices" class="defaultHeaderServices">
        <h1 id="headerH1" class="wow fadeIn" data-wow-duration="5s">服務項目</h1>
        <h6 id="headerH6" class="wow fadeIn" data-wow-duration="5s">WE ARE OFFERING WIDE RANGE OF WEB SERVICES FOR YOU</h6>
    </header>

    <!-- sub services section -->
    <section id="mySection" class="subServicesSection">
        <div class="container">
            <div class="row">
                <div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12 itemSubServices wow flipInY" data-wow-duration="1s">
                    <i class="fa fa-magic fa-3x itemIconSubServices"></i>
                    <div class="floated col-xs-12">
                        <h3 class="myh3">線上金流系統整合—</h3>
                        <p>A.協助客戶申請網路金流機制服務 (黑貓宅急便合作)</p>
                        <p>B.整合金流串接服務：線上刷卡、超商付款、虛擬帳號</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 itemSubServices wow flipInY" data-wow-duration="1s">
                    <i class="fa fa-newspaper-o fa-3x itemIconSubServices"></i>
                    <div class="floated">
                        <h3 class="myh3">客製化企業網站規劃建置-響應式網頁</h3>
                        <p>A.為企業量身設計符合企業的產業形態以及文化的專屬形象網站</p>
                        <p>B.商業形態的購物網站規劃與設計</p>
                        <p>C.舊網站改版及重新建置網站</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 itemSubServices wow flipInY" data-wow-duration="1s">
                    <i class="fa fa-wifi fa-3x itemIconSubServices"></i>
                    <div class="floated col-xs-12">
                        <h3 class="myh3">資料庫系統程式開發</h3>
                        <p>A.網站後台資料庫系統規劃製作<br />B.業內部管理系統規劃製作<br />C.內、外部系統整合<br />D.資料庫的整體規劃、應用程式開發及資料庫運作管理</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 itemSubServices wow flipInY" data-wow-duration="1s">
                    <i class="fa fa-pencil-square-o fa-3x itemIconSubServices"></i>
                    <div class="floated col-xs-12">
                        <h3 class="myh3">行動裝置APP開發</h3>
                        <p>A.行動裝置APP軟體設計</p>
                        <p>B.Android/iOS平台 APP程式開發</p>
                        <p>C.APP上架行銷推廣</p>
                        <p>D.APP更新維護管理</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 itemSubServices wow flipInY" data-wow-duration="1s">
                    <i class="fa fa-paw fa-3x itemIconSubServices"></i>
                    <div class="floated col-xs-12">
                        <h3 class="myh3">網路優化、網路行銷</h3>
                        <p>A.短期網路活動規劃與設計、活動網站設計</p>
                        <p>B.付費關鍵字廣告服務</p>
                        <p>C.網站搜索引擎優化服務</p>
                        <p>D.網站交換連結平台服務</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 itemSubServices wow flipInY" data-wow-duration="1s">
                    <i class="fa fa-ticket fa-3x itemIconSubServices"></i>
                    <div class="floated col-xs-12" id="targetFunFactsAnimationNumbers">
                        <h3 class="myh3">網站代管及維護</h3>
                        <p>A.年度維修與更新</p>
                        <p>B.網站管理與維護</p>
                        <p>C.網站空間租用服務</p>
                    </div>
                </div>
                <a href="contact.html">
                    <button type="button" class="btn btn-danger col-lg-8 col-lg-offset-2 col-xs-8 col-xs-offset-2 wow flipInX" data-wow-duration="1s">
                        <h4>連絡我們</h4>
                    </button>
                </a>
            </div>
        </div>
    </section>

 <?php include ("Common/footer.php"); ?>
    <a id="back-to-top" href="#" class="btn btn-warning btn-lg back-to-top"
       role="button" title="Back to Top" data-toggle="tooltip" data-placement="top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.mixitup.js"></script>
    <script src="js/morphext.js"></script>
    <script src="js/backstretch.min.js"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/multipage.js"></script>
    <script src="js/iphoneShowList.js"></script>
    <script src="js/goTop.js"></script>
</body>
</html>