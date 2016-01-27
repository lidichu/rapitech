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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/multipage.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/myteam.css">
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

    <!-- 插入滿版圖 -->
    <div id="carousel-id" class="container-fluid">
        <div class="row">
            <div class="col-sm-12  col-md-12 col-lg-12">
                <img src="images/about/project.png" class="img-responsive">
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- our team section -->
    <section class="team" id="team">
        <header id="headerServices" class="defaultHeaderTeam">
            <h1 id="headerH1" class="wow fadeIn" data-wow-duration="5s">專案介紹</h1>
            <h6 id="headerH6" class="wow fadeIn" data-wow-duration="5s">WE ARE OFFERING WIDE RANGE OF WEB SERVICES FOR YOU</h6>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6  col-xs-12 itemTeam wow flipInX" data-wow-duration="1s">
                    <div class="bgImage"></div>
                    <h3>XXXXX</h3>
                    <h4>XXXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInY" data-wow-duration="1s">
                    <div class="bgImage1"></div>
                    <h3>XXXXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInX" data-wow-duration="1s">
                    <div class="bgImage2"></div>
                    <h3>XXXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInY" data-wow-duration="1s">
                    <div class="bgImage3"></div>
                    <h3>XXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6  col-xs-12 itemTeam wow flipInX" data-wow-duration="1s">
                    <div class="bgImage"></div>
                    <h3>XXXXX</h3>
                    <h4>XXXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInY" data-wow-duration="1s">
                    <div class="bgImage1"></div>
                    <h3>XXXXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInX" data-wow-duration="1s">
                    <div class="bgImage2"></div>
                    <h3>XXXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInY" data-wow-duration="1s">
                    <div class="bgImage3"></div>
                    <h3>XXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6  col-xs-12 itemTeam wow flipInX" data-wow-duration="1s">
                    <div class="bgImage"></div>
                    <h3>XXXXX</h3>
                    <h4>XXXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInY" data-wow-duration="1s">
                    <div class="bgImage1"></div>
                    <h3>XXXXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInX" data-wow-duration="1s">
                    <div class="bgImage2"></div>
                    <h3>XXXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 itemTeam wow flipInY" data-wow-duration="1s">
                    <div class="bgImage3"></div>
                    <h3>XXXX</h3>
                    <h4>XXXXXX</h4>
                </div>
            </div>
        </div>

    </section>
    <!--      <div class="clearfix"></div>
        <div class="clearfix"></div> -->
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