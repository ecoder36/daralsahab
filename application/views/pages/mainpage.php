<!DOCTYPE html>
<html lang="ar" dir="rtl">
    
    <head>
      
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Core-Theme</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/readable/bootstrap.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    <link rel="stylesheet" href="<?=  base_url('assets/css/carousel.css') ?>" >

    </head>
    
    <body>
        
    <!-- Header -->
		<header id="header" class="alt">    
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header navbar-right">
              <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand nav-text pull-right" href="index.html">مؤسسة دار السحاب</a>
            </div>
            <!--id="wrapper"-->
            <div id="navbar" class="collapse navbar-collapse pull-left">
              <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">اضف جديد <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="app.html">Action</a></li>
              </ul>
              </li>
                <li><a href="logout.html">تسجيل الخروج</a></li>
                <li><a href="login.html">تسجيل الدخول</a></li>
                <li><a href="contact.html">اتصل بنا</a></li>
                <li><a href="index.html">الصفحة الرئيسية</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
    </div>
    </header> <!-- /.header -->
    
          <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="<?=  base_url('assets/images/mainpage/img_0003.jpg') ?>" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>عنوان النص هنا.</h1>
              <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
              <br>
              <p><a class="btn btn-lg btn-danger" href="<?php echo base_url(); ?>" role="button">اضغط هنا للدخول</a></p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-3 col-lg-offset-1">
          <img class="img-rounded" src="<?=  base_url('assets/images/mainpage/img_0004.jpg') ?>" alt="Generic placeholder image" width="140" height="140">
          <h2></h2>
          <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
          <p><a class="btn btn-default" href="#" role="button">إقرأ المزيد &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-3 col-lg-offset-1">
          <img class="img-rounded" src="<?=  base_url('assets/images/mainpage/img_0005.jpg') ?>" alt="Generic placeholder image" width="140" height="140">
          <h2></h2>
          <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق .</p>
          <p><a class="btn btn-default" href="#" role="button">إقرأ المزيد &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-3 col-lg-offset-1">
          <img class="img-rounded" src="<?=  base_url('assets/images/mainpage/img_0006.jpg') ?>" alt="Generic placeholder image" width="140" height="140">
          <h2></h2>
          <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
          <p><a class="btn btn-default" href="#" role="button">إقرأ المزيد &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"> هذا النص هو مثال لنص يمكن <span class="text-muted">أن يستبدل في نفس المساحة.</span></h2>
          <p class="lead">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="<?=  base_url('assets/images/mainpage/img_0007.jpg') ?>" data-holder-rendered="true">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading"> هذا النص هو مثال لنص يمكن <span class="text-muted">أن يستبدل في نفس المساحة.</span></h2>
          <p class="lead">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="<?=  base_url('assets/images/mainpage/img_0008.jpg') ?>" data-holder-rendered="true">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"> هذا النص هو مثال لنص يمكن <span class="text-muted">أن يستبدل في نفس المساحة.</span></h2>
          <p class="lead">إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image" src="<?=  base_url('assets/images/mainpage/img_0009.jpg') ?>" data-holder-rendered="true">
        </div>
      </div>

      <div class="featurette-divider"></div>
 </div><!-- /.container -->
 
      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3> مواقع التواصل </h3>
                    <ul class="list-inline social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>	
                </div>
                <div class="col-md-4">
                    <h3> خارطة الموقع </h3>
                    <ul>
                        <li> <a href="#"> Admission </a> </li>
                        <li> <a href="#"> Academic </a> </li>
                        <li> <a href="#"> Career </a> </li>
                        <li> <a href="#"> Administration </a> </li>
                        <li> <a href="#"> Notice </a> </li>
                        <li> <a href="#"> Tender </a> </li>
                        <li> <a href="login.php"> Teacher Login </a> </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3><a href="#"> اتصل بنا </a></h3>
                    <ul>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                        <li> <a href="#"> Lorem Ipsum </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"><a href="#">Back to top</a></p>
            <p> جميع الحقوق محفوظة مؤسسة التطوير المحدودة 2016. &copy; &middot; <a href="#">الخصوصية</a> &middot; <a href="#">سياسة الاستخدام</a></p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
    <!--big thanks to kmsharif for the footer in bootsnipp https://bootsnipp.com/snippets/jvpAj-->
    <!--https://www.w3schools.com/howto/howto_css_social_media_buttons.asp-->
      </footer>
   

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Custom JS-->
    <script src="assets/js/myscripts.js"></script>

    </body>
</html>
