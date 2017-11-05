<!doctype html>
<html lang="zh-Hant">
    <head>
        @include('./layout/head')
    </head>



    <body>
        @include('./component/header')

        <main class="ih-page-index ih-page">
            <section class="ih-section-banner">
                <div class="ih-relative owl-carousel owl-theme" id="carousel-banner">
                    @for ($i = 1; $i <= 5; $i++)
                        <figure class="ih-img">
                            <img src="http://fakeimg.pl/1440x580/555/?text=Banner{{ $i }}" class="ih-img-full" alt="">
                        </figure>
                    @endfor
                </div>
            </section>

            <section class="ih-section-search">
                <div class="ih-tab-container ih-theme-box-shadow-dark">
                    <ul class="ih-tab ih-ul">
                        <!-- 狀態加上 .ih-active -->
                        <li class="ih-active ih-pointer ih-inline-block ih-relative text-center" onclick="tab(this, '#tab-search .ih-tab-search')">
                            <i class="ih-block fa fa-building" aria-hidden="true"></i>
                            住宿
                        </li>
                        <li class="ih-pointer ih-inline-block ih-relative text-center" onclick="tab(this, '#tab-search .ih-tab-search')">
                            <i class="ih-block fa fa-cutlery" aria-hidden="true"></i>
                            美食
                        </li>
                        <li class="ih-pointer ih-inline-block ih-relative text-center" onclick="tab(this, '#tab-search .ih-tab-search')">
                            <i class="ih-block fa fa-subway" aria-hidden="true"></i>
                            通行
                        </li>
                        <li class="ih-pointer ih-inline-block ih-relative text-center" onclick="tab(this, '#tab-search .ih-tab-search')">
                            <i class="ih-block fa fa-gamepad" aria-hidden="true"></i>
                            育樂
                        </li>
                    </ul>

                    <div class="ih-tab-content" id="tab-search">
                        <form class="ih-tab-search">
                            <div class="col-xs-12 col-md-6">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <input type="text" class="form-control" placeholder="關鍵字">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <input type="text" class="ih-datepicker form-control" placeholder="入住日期">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <input type="text" class="ih-datepicker form-control" placeholder="退房日期">
                                    <i class="fa fa-calendar-times-o" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <input type="number" class="form-control" min="1" placeholder="房間數">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <select class="ih-select form-control">
                                        <option>地區</option>
                                    </select>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <input type="number" class="form-control" min="1" placeholder="大人">
                                    <i class="fa fa-male" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <input type="number" class="form-control" min="0" placeholder="小孩">
                                    <i class="fa fa-child" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-2">
                                <div class="ih-form-group-icon ih-relative form-group">
                                    <button type="submit" class="ih-theme-button-search ih-button ih-relative">
                                        搜尋
                                    </button>
                                </div>
                            </div>
                        </form>

                        <form class="ih-hide ih-tab-search">
                            <p style="color:#fff">
                                美食搜尋條件
                            </p>
                        </form>

                        <form class="ih-hide ih-tab-search">
                            <p style="color:#fff">
                                通行搜尋條件
                            </p>
                        </form>

                        <form class="ih-hide ih-tab-search">
                            <p style="color:#fff">
                                育樂搜尋條件
                            </p>
                        </form>
                    </div>
                </div>
            </section>

            <section class="ih-section-collection">
                <div class="container">
                    <div class="ih-heading ih-relative text-center center-block">
                        <h2 class="ih-ch">
                            品味精選
                        </h2>

                        <hr class="center-block">

                        <h2 class="ih-en">
                            <span>C</span>OLLECTION
                        </h2>

                        <i class="fa fa-pagelines" aria-hidden="true"></i>
                    </div>

                    <ul class="ih-tab ih-theme-tab ih-ul text-center">
                        <!-- 狀態加上 .ih-active -->
                        <li class="ih-active ih-pointer pull-left" onclick="tab(this, '#tab-collection .ih-tab-collection')">
                            住宿
                        </li>
                        <li class="ih-pointer pull-left" onclick="tab(this, '#tab-collection .ih-tab-collection')">
                            美食
                        </li>
                        <li class="ih-pointer pull-left" onclick="tab(this, '#tab-collection .ih-tab-collection')">
                            通行
                        </li>
                        <li class="ih-pointer pull-left" onclick="tab(this, '#tab-collection .ih-tab-collection')">
                            育樂
                        </li>
                    </ul>

                    <div class="ih-tab-content" id="tab-collection">
                        <div class="ih-tab-collection-stay ih-tab-collection">
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="ih-item col-xs-12 col-sm-6 col-md-3">
                                    <div class="ih-card ih-theme-box-shadow-light">
                                        <figure class="ih-img ih-theme-hover-img ih-relative">
                                            <img src="http://fakeimg.pl/280x235/aaa/?text=image" class="ih-img-full" alt="">
                                            <figcaption>住宿{{ $i }}</figcaption>
                                        </figure>

                                        <div class="ih-information ih-relative">
                                            <p class="ih-point text-center">
                                                點數只要 <span>ＯＯＸＸ</span> 起
                                            </p>

                                            <p class="ih-origin">
                                                每晚原價 ＯＯＸＸ
                                            </p>

                                            <a title="" class="ih-book ih-theme-book text-center" href="#">
                                                立即預訂
                                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="ih-hide ih-tab-collection-food ih-tab-collection">
                            美食精選
                        </div>

                        <div class="ih-hide ih-tab-collection-traffic ih-tab-collection">
                            通行精選
                        </div>

                        <div class="ih-hide ih-tab-collection-entertainment ih-tab-collection">
                            育樂精選
                        </div>
                    </div>
                </div>
            </section>
        </main>

        @include('./component/footer')

        @include('./layout/foot')
    </body>
</html>
