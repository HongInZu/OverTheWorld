<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>馳名天下國際賽事分析網</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/assets/css/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
                    <p>馳名天下</p>
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <i class="now-ui-icons business_bank"></i>
                            <p>匯款資訊</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./documentation/tutorial-components.html" target="_blank">
                            <i class="now-ui-icons business_chart-bar-32"></i>
                            <p>賽事分析</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-neutral" href="examples/login-page.html" target="_blank">
                            <i class="now-ui-icons arrows-1_share-66"></i>
                            <p>加入我們</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/header.jpg');">
            </div>
            <div class="container">
                <div class="content-center brand">
                    <img class="n-logo" src="./assets/img/now-logo.png" alt="">
                    <h1 class="h1-seo">馳名天下</h1>
                    <h3>精準分析所有賽事 獲利翻盤就趁現在</h3>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="section section-images">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-images-container">
                                <img src="assets/img/hero-image-1.png" alt="">
                            </div>
                            <div class="hero-images-container-1">
                                <img src="assets/img/hero-image-2.png" alt="">
                            </div>
                            <div class="hero-images-container-2">
                                <img src="assets/img/hero-image-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-tabs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 ml-auto mr-auto">
                            <h4 class="title title-up">球版分析</h4>
                            <!-- Tabs with Background on Card -->
                            <div class="card">
                                <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Messages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#settings1" role="tab">Settings</a>
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @yield('content-table')
                                    </div>
                                </div>
                            </div>
                            <!-- End Tabs on plain Card -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-javascript" id="javascriptComponents">
                <div class="container">
                    <div class="row" id="modals">
                        <div class="col-md-6">
                            <h4>匯款資訊</h4>
                                <p style="font-size: 20px;">
                                    訂單編號:361 <br>
                                    購買方案:NPB 一天 <br>
                                    繳款金額:500<br>
                                    ATM虛擬帳號:銀行代號: 004 虛擬行號: 31904183623456<br>
                                    截止日期:2016/09/09<br>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="carousel">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block" src="assets/img/bg1.jpg" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Nature, United States</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="assets/img/bg3.jpg" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Somewhere Beyond, United States</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="assets/img/bg4.jpg" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Yellowstone National Park, United States</h5>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--  End Modal -->
        <!-- Mini Modal -->
        <!-- Sart Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">匯款資訊</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            訂單編號:361 <br>
                            購買方案:NPB 一天 <br>
                            繳款金額:500<br>
                            ATM虛擬帳號:銀行代號: 004 虛擬行號: 31904183623456<br>
                            截止日期:2016/09/09<br>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  End Modal -->
        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md">
                                MIT License
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by
                    <a href="http://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>

</html>