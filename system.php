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
    <link rel="shortcut icon" href="images/heryi.ico" type="images/heryi.ico" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/multipage.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/mysystem.css">
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="toggleSwitch('50px')">
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
                    <li><a href="contact.php">聯絡我們</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="clearfix"></div>
    <!-- about us section -->
    <div id="carousel-id" class="contair-fluid">
        <div class="row">
            <div class="col-sm-12  col-md-12 col-lg-12">
                <img src="images/system/system.png" class="img-responsive">
            </div>
        </div>
    </div>

    <section class="about" id="about">
        <header id="headerServices" class="defaultHeaderAbout">
            <h1 id="headerH1" class="wow fadeIn" data-wow-duration="5s">系統開發</h1>
            <h6 id="headerH6" class="wow fadeIn" data-wow-duration="5s">SYSTEM DEVELOPMENT</h6>
        </header>

        <div class="container">
            <br>
            <hr class="featurette-divider">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="featurette-image img-circle img-responsive pull-left wow flipInX" src="images/system/sys1.png">
                    <!-- <img src="img/p1.png"> -->
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2 class="mytext text-center mytext-color"> 系統規劃</h2>
                    <p class="text-center myTextcolor">禾益網路資訊系統根據您現行的作業方式與流程，提出系統需求及架構建議，規劃出適合且方便之動線與流程，<br>協助貴公司整合軟體系統及現行作業，促使作業人員與電腦系統做合適的搭配。<br>並在開發過程中我們將與您密切連繫每一個環節以減少溝通誤差，確保流程無誤。</p>
                </div>
            </div>
            <hr class="featurette-divider">


            <div class="row">
                <div class="col-md-4 col-sm-4 col-md-push-8 col-xs-12">
                    <!--  <img src="img/p2.png"> -->
                    <img class="featurette-image img-circle img-responsive pull-left wow flipInX" src="images/system/sys3.png">
                </div>
                <div class="col-md-8 col-sm-8 col-md-pull-4 col-xs-12">
                    <h2 class="mytext text-center mytext-color">程式設計＆系統開發</h2>
                    <p class="text-center myTextcolor">提供客制化的程式製作，舉凡商品上下架管理、購物車系統、會員制度建置、電子商務系統、企業資源管理系統、企業內部網站、客戶關係資料庫建立系統等...<br>，也可依客戶需求結合金流系統進行線上交易。</p>
                    <p class="text-center myTextcolor">提供客制化的人事管理系統、行政管理系統、會計管理系統、會計管理系統…，符合貴公司完整需求開發專屬您的管理系統，並能依照貴公司日後成長需求進而增加程式系統內容。</p>
                </div>

            </div>


            <hr class="featurette-divider">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <img class="featurette-image img-circle img-responsive pull-left wow flipInX" src="images/system/sys4.png">
                    <!-- <img src="img/p1.png"> -->
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2 class="mytext text-center mytext-color">後端管理</h2>
                    <p class="text-center myTextcolor">配合網站前台的內容，提供給管理者一個既簡單又方便操作的「後端管理系統」，避免複雜的管理流程，<br>
只要幾個簡單的動作，讓使用者只要會打字，會使用例如word的幾個簡單功能，便能輕鬆地操作後端系統，<br>
即使您不懂網頁語法，或程式語言，您也可以輕易地自行管理您的網站，<br>
管理者可即時針對網站進行更新或維護的動作，達到使用者與管理者互動交流作用的平台。
</p>
                   
                </div>

            </div>
            <hr class="featurette-divider">


            <div class="row">
                <div class="col-md-4 col-sm-4 col-md-push-8 col-xs-12">
                    <!--  <img src="img/p2.png"> -->
                    <img class="featurette-image img-circle img-responsive pull-left wow flipInX" src="images/system/sys5.png">
                </div>
                <div class="col-md-8 col-sm-8 col-md-pull-4 col-xs-12">
                    <h2 class="mytext text-center mytext-color">資料安全維護</h2>
                    <p class="text-center myTextcolor">為確保資料的安全性，提供網站最高的管理者能夠自行新增、修改、刪除<br>其他管理人員之帳號，並設定其使用權限，免於有心人士的破壞。</p>
                </div>

            </div>

            <hr class="featurette-divider">

            

        </div>

        </div>

    </section>


    <div class="clearfix"></div>

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
    <script src="js/goTop.js"></script>
    <script src="js/iphoneShowList.js"></script>
</body>
</html>