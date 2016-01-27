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
    <link rel="shortcut icon" href="image/heryi.ico" type="image/heryi.ico" />  
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/multipage.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/mycontact.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500italic,500,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <script>
    var o;
    var b = true;
    function toggleSwitch() {
        if (b) {
            o = $('#carousel-id').css('visibility');
            $('#carousel-id').css('visibility', 'hidden');
            b = false;
        }
        else {
            $('#carousel-id').css('visibility', o);
            b = true;
        }
    }
    </script>

    <!-- navigation bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->


            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="toggleSwitch()">
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

    <!-- 插入滿版 -->

    <div id="carousel-id" class="contair-fluid">
        <div class="row">
            <div class="col-sm-12  col-md-12 col-lg-12">
                <img src="images/about/contact.png" class="img-responsive">
            </div>
        </div>
    </div>

    <!-- 插入滿版 -->

    <div class="clearfix"></div>
    <!-- contact us section -->
    <section class="contact" id="contact">
        <header class="defaultHeaderContact">
            <h1 class="wow fadeIn" data-wow-duration="5s">線上報價</h1>
            <h6 class="wow fadeIn" data-wow-duration="5s">WE ARE HAPPY TO HELP YOU ANY TIME 24/7</h6>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0">
                    <form>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>公司名稱:</h4></label>
                            <input type="text" class="form-control myform-control1 wow fadeIn" placeholder="keyin your company name..." data-wow-duration="1s">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>聯絡人姓名:</h4></label>
                            <input type="text" class="form-control wow fadeIn" placeholder="keyin your name..." data-wow-duration="1s">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>您的電話</h4></label>
                            <input type="text" class="form-control wow fadeIn" placeholder="keyin your tel number..." data-wow-duration="1s">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>您的手機</h4></label>
                            <input type="text" class="form-control wow fadeIn" placeholder="keyin your moblie number..." data-wow-duration="1s">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>您的傳真</h4></label>
                            <input type="text" class="form-control wow fadeIn" placeholder="keyin your fax number.." data-wow-duration="1s">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>您的信箱</h4></label>
                            <input type="email" class="form-control wow fadeIn" placeholder="keyin your E-mail address..." data-wow-duration="1s">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>您的地址</h4></label>
                            <input type="text" class="form-control wow fadeIn" placeholder="keyin your address ..." data-wow-duration="1s">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-xs-12"><h4>您的網站</h4></label>
                            <input type="text" class="form-control wow fadeIn" placeholder="keyin your website docmain name..." data-wow-duration="1s">
                        </div>


                  <!--   </form> -->


                </div>
                <div class="form-group">
                    <label class="col-lg-3 col-xs-12"><h4>詢問項目</h4></label>
                    <select class="form-control myform-control" id="sel1">
                        <option></option>
                        <option>網站製作詢價</option>
                        <option>程式規劃需求</option>
                        <option>合作配合事項</option>
                    </select>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0">
                    <div class="form-group">
                        <label class="col-lg-3 col-xs-12"><h4>詢問內容:</h4></label>
                        <textarea class="form-control wow fadeIn" rows="10" placeholder="contact us..." data-wow-duration="1s"></textarea>
                    </div>

                    <!-- this is mine -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0">
                        <label class="col-lg-12 col-xs-12"><h4>您搜尋的關鍵字:</h4></label>
                        <select class="form-control wow fadeIn" id="sel1">
                            <option>台北網頁</option>
                            <option>台北網頁設計</option>
                            <option>桃園網頁</option>
                            <option>桃園網頁設計</option>
                            <option>台南網頁</option>
                            <option>台南網頁設計</option>
                            <option>高雄網頁</option>
                            <option>高雄網頁設計</option>
                            <option>網頁設計</option>
                            <option>網頁製作</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-xs-12 padding0">
                        <label class="col-lg-12 col-xs-12"><h4>驗證碼:</h4></label>
                        <input type="text" class="mytxt form-control wow fadeIn" placeholder="請輸入驗證碼" data-wow-duration="1s">
                    </div>
                    <div class="divCenter col-lg-12 col-xs-12">
                        <button class="send wow fadeIn" data-wow-duration="1s">送出表單</button>
                        <button class="send wow fadeIn" data-wow-duration="1s">清除</button>
                    </div>


                    </form>
                </div>

            </div>
        </div>
    </section>

    <!--Google maps-->
    <!--   <div id="map"> -->

    <div class="clearfix"></div>
    <div class="Flexible-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.792271059523!2d121.44352531541774!3d25.041122744158887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a877d50ce165%3A0xd17f235053ab266d!2zMjQy5paw5YyX5biC5paw6I6K5Y2A5paw5rOw6LevMzA26Jmf!5e0!3m2!1szh-TW!2stw!4v1450331286809" frameborder="0" style=" border:0" allowfullscreen></iframe>
    </div>
    <div class="clearfix"></div>
 <?php include ("Common/footer.php"); ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.mixitup.js"></script>
    <script src="js/morphext.js"></script>
    <script src="js/backstretch.min.js"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="js/googleMaps.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/multipage.js"></script>
    <script src="js/goTop.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
</html>