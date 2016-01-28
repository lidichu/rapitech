<!DOCTYPE html>
<html lang="zh-TW">
<head>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include("PageHead.php"); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <meta name="copyright" content="<?php echo $copyright; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="shortcut icon" href="images/heryi.ico" type="images/heryi.ico" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/multipage.css">
    <link rel="stylesheet" type="text/css" href="css/singlePortfolioPage.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/myindex.css">
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="toggleSwitchIndex()">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand scroll" href="index.php"><p>禾益網路資訊系統</p><small>HERYI SYSTEM WEB</small></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul id="myul" class="nav navbar-nav navbar-right">
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
    <!-- flipper section -->
    <div id="carousel-id" class="carousel slide " data-ride="carousel">
        <!-- 幻燈片小圓點區 -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-id" data-slide-to="0" class=""></li>
            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
            <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
        </ol>
        <!-- 幻燈片主圖區 -->
        <div class="carousel-inner">
            <?php include("Common/banner.php"); ?>
        </div>
        <!-- 上下頁控制區 -->
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>

    <!-- <div class="header" id="home">
      <div class="overlay"></div>
      <div class="flipper">
        <h3 class="text-right"><span id="js-rotating">以人為本、技術紮根、服務取勝、價值創新</span></h3>
      </div>



    </div> -->
    <div class="container-fuild my_container">
        <h3 class="text-center">
            迎接台灣1600萬的行動用戶商機您的網站準備好了嗎?
            <br>
            <small class="text-center smtext">Does Your Website Ready to Embrace Internet Marketing?</small>
        </h3>

    </div>
    <div class="clearfix"></div>

    <!-- portfolio section -->
    <section class="portfolio text-center  " id="portfolio">


        <!-- <ul>
            <li class="activeItem" >
                <a href="#" >服務項目</a>
            </li>
            <li class="activeItem" >
                <a href="#" >專案介紹</a>
            </li>
        </ul> -->
        <header class="defaultHeaderAbout mydefaultHeaderAbout">
            <h1 class="fadeIn" data-wow-duration="10s">我們的服務</h1>
            <h6 class="wow fadeIn" data-wow-duration="12s">WE ARE ALWAYS PLEASED TO SERVE  YOU ANYTIME. </h6>
        </header>


        <!--挖掉-->
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 wow flipInY">
                    <a href="services.php" class="thumbnail ">
                        <img src="images/portfolio/1.png">
                    </a>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 wow flipInY">
                    <a href="services.php" class="thumbnail">
                        <img src="images/portfolio/2.png">
                    </a>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 wow flipInY">
                    <a href="services.php" class="thumbnail">

                        <img src="images/portfolio/3.png">
                    </a>

                </div>


                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 wow flipInY">
                    <a href="services.php" class="thumbnail">

                        <img src="images/portfolio/4.png">
                    </a>

                </div>


                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 wow flipInY">
                    <a href="services.php" class="thumbnail">

                        <img src="images/portfolio/5.png">
                    </a>

                </div>


                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 wow flipInY">
                    <a href="services.php" class="thumbnail">

                        <img src="images/portfolio/6.png">
                    </a>

                </div>


                <a href="contact.html">
                    <button type="button" class="btn btn-danger col-lg-8 col-lg-offset-2 col-xs-8 col-xs-offset-2 wow flipInX" data-wow-duration="1s">
                        <h4>連絡我們</h4>
                    </button>
                </a>
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
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/multipage.js"></script>
    <script src="js/goTop.js"></script>
    <script src="js/iphoneShowList.js"></script>


</body>
</html>