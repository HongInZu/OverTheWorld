<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./img/horse_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>馳名天下國際賽事分析網</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="/js/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="/js/DataTables/AutoFill-2.2.2/css/autoFill.bootstrap.min.css" rel="stylesheet" />
    <link href="/js/DataTables/AutoFill-2.2.2/css/autoFill.dataTables.min.css" rel="stylesheet" />
    <link href="/plugins/vegas/vegas.min.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/assets/css/demo.css" rel="stylesheet" />

    <link href="login/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="login/login-register.js" type="text/javascript"></script>
</head>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToTerms()" target="_blank">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>條款與保護</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <i class="now-ui-icons business_bank"></i>
                            <p>匯款資訊</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToGame()" target="_blank">
                            <i class="now-ui-icons business_chart-bar-32"></i>
                            <p>賽事分析</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        @if(!$isLogin)
                          <a class="nav-link btn btn-neutral" href="javascript:void(0)" onclick="openLoginModal();" target="_blank">
                              <i class="now-ui-icons arrows-1_share-66"></i>
                              <p>登入</p>
                          </a>
                        @else
                          <a class="nav-link btn btn-neutral" href="/logout">
                              <p>登出</p>
                          </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="@ody7975j" data-placement="bottom" href="https://line.me/R/ti/p/%40ody7975j" target="_blank">
                            <i class="fa fa-address-book"></i>
                            <p class="">Line</p>
                        </a>
                    </li>
<!--                     <li class="nav-item">
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
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange"> <!-- filter-color="orange" -->
            <div class="page-header-image" style="opacity:0.7;" data-parallax="true"">
            </div>
            <div class="container">
                <div class="content-center brand">
                    <img class="n-logo" src="./img/Logo.png" alt="">
<!--                     <h1 class="h1-seo">馳名天下</h1>
 --><!--                     <h3>精準分析所有賽事 獲利翻盤就趁現在</h3>
 -->                </div>
            </div>
        </div>
<!--         <div class="main">
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
            </div> -->
            <div class="section section-tabs section-game">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 ml-auto mr-auto">
                            <h4 class="title title-up">球版分析 - 讓分</h4>
                            <!-- Tabs with Background on Card -->
                            <div class="card">
                                <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                                    @foreach($legends as $key => $legend)
                                    <li class="nav-item">
                                        <a class="nav-link {{($key==0)?'active':''}} " data-toggle="tab" href="#{{$legend['id']}}" role="tab">{{$legend['name']}}</a>
                                    </li>
                                    @endforeach
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

                        <div class="col-md-12 col-lg-12 col-xl-12 ml-auto mr-auto">
                            <h4 class="title title-up">球版分析 - 大小分</h4>
                            <!-- Tabs with Background on Card -->
                            <div class="card">
                                <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                                    @foreach($legends as $key => $legend)
                                    <li class="nav-item">
                                        <a class="nav-link {{($key==0)?'active':''}} " data-toggle="tab" href="#{{$legend['id']}}bigsmall" role="tab">{{$legend['name']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @yield('content-table2')
                                    </div>
                                </div>
                            </div>
                            <!-- End Tabs on plain Card -->
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12 ml-auto mr-auto">
                            <h4 class="title title-up">球版分析 - 讓分 - 單場賽事</h4>
                            <!-- Tabs with Background on Card -->
                            <div class="card">
                                <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                                    @foreach($legends as $key => $legend)
                                    <li class="nav-item">
                                        <a class="nav-link {{($key==0)?'active':''}} " data-toggle="tab" href="#{{$legend['id']}}-vip" role="tab">{{$legend['name']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @yield('content-table-vip')
                                    </div>
                                </div>
                            </div>
                            <!-- End Tabs on plain Card -->
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12 ml-auto mr-auto">
                            <h4 class="title title-up">球版分析 - 大小分 - 單場賽事</h4>
                            <!-- Tabs with Background on Card -->
                            <div class="card">
                                <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                                    @foreach($legends as $key => $legend)
                                    <li class="nav-item">
                                        <a class="nav-link {{($key==0)?'active':''}} " data-toggle="tab" href="#{{$legend['id']}}bigsmall-vip" role="tab">{{$legend['name']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="card-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @yield('content-table2-vip')
                                    </div>
                                </div>
                            </div>
                            <!-- End Tabs on plain Card -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-javascript section-download" id="javascriptComponents">
                <div class="container">
                    <div class="row" id="modals">
                        <div class="col-md-6">
                            <h4>匯款資訊</h4>
                                    {!! $informations['transfer'] or '' !!}
                                </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-terms" id="#download-section" data-background-color="black">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 col-lg-12">
                            <h3 class="title text-center">條款與保護</h3>
                            <h5 class="description">{!! $informations['terms'] or '' !!}</h5>
                        </div>
                    </div>
                    <br>
                </div>
            </div>                 
<!--             <div class="section" id="carousel">
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
                                        <img class="d-block" src="http://pic.pimg.tw/worldcupvideo/1403762538-2079482990.jpg" width="1600" height="500" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>成功人士的推波手</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="http://media.zenfs.com/en_us/News/Reuters/2014-07-05T175309Z_304896811_TB3EA751GBX8D_RTRMADP_3_SOCCER-WORLD-M60-ARG-BEL.JPG" width="1600" height="500" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>一註入魂 勝利就在明日</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="http://media.zenfs.com/en_us/News/gettyimages.com/germany-v-argentina-2014-fifa-20140713-213037-895.jpg" width="1600" height="500" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>成為笑到最後的那一位冠軍</h5>
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
            </div> -->
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

        <div class="modal fade login" id="loginModal">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                   <div class="modal-header">
                      <h4 class="modal-title" style="margin-top: 0px;">登入</h4>
                  </div>
                  <div class="modal-body" style="padding-top: 0px">  
                      <div class="box">
                           <div class="content">
                              <div class="error"></div>
                              <div class="form loginBox">
                                  <form method="post" action="/login-account" accept-charset="UTF-8">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input id="phone" class="form-control" type="text" placeholder="電話" name="phone">
                                  <input id="password" class="form-control" type="password" placeholder="密碼" name="password">
                                  <input class="btn btn-default btn-login" type="submit" value="登入">
                                  </form>
                              </div>
                           </div>
                      </div>
                      <div class="box">
                          <div class="content registerBox" style="display:none;">
                           <div class="form">
                              <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" accept-charset="UTF-8">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input id="phone" class="form-control" type="text" placeholder="電話" name="phone" required>
                              <input id="wechat" class="form-control" type="text" placeholder="微信" name="wechat" required>
                              <input id="password" class="form-control" type="password" placeholder="密碼" name="password" required>
                              <input id="password_confirmation" class="form-control" type="password" placeholder="確認密碼" name="password_confirmation" required>
                              <input class="btn btn-default btn-register" type="submit" value="建立帳號" name="commit">
                              </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <div class="forgot login-footer">
                          <span>想要 
                               <a href="javascript: showRegisterForm();">建立帳號嗎</a>
                          ?</span>
                      </div>
                      <div class="forgot register-footer" style="display:none">
                           <span>已經有帳號了?</span>
                           <a href="javascript: showLoginForm();">登入</a>
                      </div>
                  </div>        
                </div>
            </div>
        </div>

        <!--  End Modal -->
        <footer class="footer" data-background-color="black">
            <div class="container">
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Coded by RS</a>.
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="js/DataTables/AutoFill-2.2.2/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="js/DataTables/AutoFill-2.2.2/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="js/DataTables/AutoFill-2.2.2/js/autoFill.bootstrap.min.js"></script>
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
<script src="http://zeptojs.com/zepto.min.js"></script>
<script src="/plugins/vegas/vegas.min.js" type="text/javascript"></script>

<script type="text/javascript">

    $(function() {
        $('.page-header-image').vegas({
            slides: [
                { src: './img/1.jpg' },
                { src: './img/2.jpg' },
                { src: './img/3.jpg' },
                { src: './img/4.jpg' }
            ]
        });
    });

    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        table = $('.table-striped').DataTable({
            "scrollX": true,
            "autoWidth": true,
            "columnDefs": [
                { "width": "8%", "targets": 0 },
                { "width": "15%", "targets": 1 },
                { "width": "8%", "targets": 2 },
                { "width": "15%", "targets": 3 },
                { "width": "15%", "targets": 4 },
                { "width": "13%", "targets": 5 },
                { "width": "9%", "targets": 6 },
                { "width": "8%", "targets": 7 },
            ]
        });

        $('.nav-link').click(function(){
            setTimeout(function(){
                table.columns.adjust().draw();
            }, 0.5);
        })

        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }

    function scrollToGame() {

        if ($('.section-game').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-game').offset().top
            }, 1000);
        }
    }

    function scrollToTerms() {

        if ($('.section-terms').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-terms').offset().top
            }, 1000);
        }
    }
</script>

</html>