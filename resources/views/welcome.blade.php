<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- glyphicon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <title>e-Merit FTSM UKM</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li>
                        <a href="#about"></a>
                    </li>
                    <li>
                        <a href="#services">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="#contact">Hubungi Kami</a>
                    </li>
                    <li>
                    @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a class="navbar-brand topnav" href="{{ url('/home') }}"><span class="glyphicon glyphicon-home">Laman Utama</span></a>
                    @else
                        <a class="navbar-brand topnav" href="{{ url('/login') }}">Log Masuk</a>
                        <a class="navbar-brand topnav"></a>
                        <a class="navbar-brand topnav" href="{{ url('/register') }}"></a>
                    @endif
                </div>
                </li>
            @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>e-Merit FTSM</h1>
                        <hr class="intro-divider">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">KARNIVAL INOVASI DIGITAL 2017<br>Fakulti Teknologi & Sains Maklumat</h2>
                    <p>Sejajar dengan keperluan KRA 1 (Graduan Beraspirasi Kebangsaan, Berkompeten, Berdaya Saing dan Inovatif), Karnival Inovasi Digital (KID) 2017 bertujuan untuk memberi ruang dan peluang kepada pelajar tahun akhir memperlihat kemampuan mereka dalam menghasil dan membentang projek yang berinovasi. Projek dibentang bukan sahaja kepada penyelia dan penilai yang terdiri dari kalangan pensyarah dan rakan sebaya, tetapi juga kepada rakan industri dan rakan komuniti setempat.
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <br><br><br>
                    <img class="" src="img/kid2017.jpg" width="500" height="300">
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h3 class="section-heading">SPECIAL INTEREST GROUP(SIG)</h3>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/sig5.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">CABARAN DIGITAL FTSM </h2><h4>Fakulti Teknologi & Sains Maklumat</h4>
                    
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/cdftsm.jpg" width="50%">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-offset-0">
                    <h3>Hubungi Kami:</h3><iframe width="100%" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/d/embed?mid=z8QR_jCyvvqY.kq99_TNSbYXw"></iframe>

                </div>
                <div class="col-lg-6 col-md-offset-7">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/FTSMukmalaysia" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/FTSM-UKM-152825994842671/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/computing.ftsmukm/" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i> <span class="network-name">Instagram</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div id="column2">
      <div class="subnav2">
        <h2>Maklumat</h2>
        <p>Untuk sebarang pertanyaan atau cadangan mengenai perkara yang berikut:</p>
        
        <ul>
        <li><a href="#">Email</a></li>
        <p>Webmaster : webmaster@ftsm.ukm.my<br>
        ICT Support : ictsupport@ftsm.ukm.my</p>
        <li><a href="#">Dean's Offices</a></li>
         <p>Tel.:+6 03 - 8921 6141<br>
         Fax.:+6 03 - 8925 6732</p>
        <li><a href="#">Undergraduate Management Unit</a></li>
         <p>Tel.:+6 03 - 8921 6183 / 6789 <br>
         Fax.:+6 03 - 8921 6184</p>
         <li><a href="#">ICT Helpdesk</a></li>
         <p>Tel.:+6 03 - 8921 6666</p>
         </ul>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>

                    <p class="copyright text-muted small">2017 &copy; e-Merit FTSM UKM. Hak Cipta Terpelihara</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
