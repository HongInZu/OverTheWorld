<!doctype html>
<html lang="zh-Hant">
    <head>
        @include('./layout/head')
    </head>



    <body>
        @include('./component/header')

        <main class="ih-page-search ih-page">
            @include('./component/search')

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <section class="ih-section-sidebar">
                            <form class="ih-form" id="form-condition">
                                <div class="ih-action ih-theme-box-shadow-light hidden-md hidden-lg">
                                    <button type="button" class="ih-button-close ih-button" onclick="mobileConditionToggle(false)">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        關閉條件篩選
                                    </button>

                                    <button type="reset" class="ih-button-reset ih-button pull-right">
                                        重新篩選
                                    </button>
                                </div>

                                <div class="form-group">
                                    <h3 class="ih-heading">
                                        每晚價格
                                    </h3>
                                    <p class="ih-price">
                                        TWD 1000 - TWD 3000
                                    </p>

                                    <div class="ih-price-range-bar">
                                        <input type="text" class="span2" id="price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="ih-heading">
                                        飯店星級
                                    </h3>

                                    <div class="ih-star">
                                        @for ($s = 1; $s <= 5; $s++)
                                            <label class="ih-pointer ih-relative text-center pull-left">
                                                <input type="radio" name="star" {{ $s == 3 ? "checked" : "" }}>

                                                <div>
                                                    {{ $s }}
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="ih-heading" onclick="collapse(this)">
                                        住宿類型

                                        <button type="button" class="ih-button pull-right">
                                            <i class="fa fa-angle-up" aria-hidden="true"></i>
                                        </button>
                                    </h3>

                                    <div class="ih-checkbox ih-content">
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                星級飯店
                                            </div>
                                        </label>
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                民宿
                                            </div>
                                        </label>
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                商務旅館
                                            </div>
                                        </label>
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                度假村
                                            </div>
                                        </label>
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                小木屋
                                            </div>
                                        </label>
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                露營農場
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="ih-heading" onclick="collapse(this)">
                                        服務設施

                                        <button type="button" class="ih-button pull-right">
                                            <i class="fa fa-angle-up" aria-hidden="true"></i>
                                        </button>
                                    </h3>

                                    <div class="ih-checkbox ih-content">
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                大廳Wi-Fi（免費）
                                            </div>
                                        </label>
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                停車場（免費）
                                            </div>
                                        </label>
                                        <label class="ih-pointer ih-relative ih-block">
                                            <input type="checkbox" name="type">

                                            <div>
                                                <i class="ih-margin-right-5 fa fa-square-o" aria-hidden="true"></i>
                                                室內游泳池
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="ih-reset form-group hidden-xs hidden-sm">
                                    <button type="reset" class="ih-theme-hover-blue ih-button">
                                        重新篩選
                                    </button>
                                </div>

                                <button type="submit" class="ih-button-submit-mobile ih-button hidden-md hidden-lg">
                                    完成
                                </button>
                            </form>

                            <div class="ih-history hidden-xs hidden-sm">
                                <h3 class="ih-heading">
                                    瀏覽紀錄
                                </h3>

                                <table class="ih-table">
                                    @for ($i = 1; $i <= 3; $i++)
                                        <tr>
                                            <td>
                                                <img src="http://fakeimg.pl/300x300/333/?text=image" class="ih-img-full" alt="">
                                            </td>
                                            <td>
                                                <h4 class="ih-name">
                                                    台北晶華酒店
                                                </h4>

                                                <div class="ih-star">
                                                    @include('./component/_star', ['star' => $i])
                                                </div>

                                                <p class="ih-point text-right">
                                                    點數只要
                                                    <span>
                                                        ＯＯＸＸ
                                                    </span>
                                                    起
                                                </p>
                                            </td>
                                        </tr>
                                    @endfor
                                </table>
                            </div>
                        </section>
                    </div>

                    <div class="col-xs-12 col-md-9">
                        <section class="ih-section-result">
                            <div class="ih-condition-toggle hidden-md hidden-lg">
                                <button type="button" class="ih-button" onclick="mobileConditionToggle(true)">
                                    <i class="fa fa-sliders" aria-hidden="true"></i>
                                    展開條件篩選
                                </button>
                            </div>

                            <p class="ih-total">
                                全部
                                <span>
                                    （122）
                                </span>
                            </p>

                            <div class="ih-condition">
                                現在有3個篩選條件：

                                <span class="ih-inline-block">
                                    3星
                                    <i class="ih-theme-hover-scale ih-pointer ih-margin-left-5 fa fa-times" aria-hidden="true"></i>
                                </span>
                                <span class="ih-inline-block">
                                    星級飯店
                                    <i class="ih-theme-hover-scale ih-pointer ih-margin-left-5 fa fa-times" aria-hidden="true"></i>
                                </span>
                                <span class="ih-inline-block">
                                    大廳Wi-Fi
                                    <i class="ih-theme-hover-scale ih-pointer ih-margin-left-5 fa fa-times" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="ih-sort">
                                排序方式：

                                <button type="button" class="ih-theme-hover-blue ih-button" onclick="sort(this)">
                                    依價格
                                    <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="ih-theme-hover-blue ih-button" onclick="sort(this)">
                                    依評分
                                    <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="ih-list">
                                @for ($i = 1; $i <= 6; $i++)
                                    <table class="ih-table ih-theme-box-shadow-light">
                                        <tr>
                                            <td class="ih-picture" style="background-image:url(http://fakeimg.pl/280x190/aaa/?text=image)">

                                            </td>
                                            <td class="ih-information ih-relative">
                                                <h3 class="ih-name">
                                                    台北君品酒店
                                                </h3>
                                                <div class="ih-star">
                                                    @include('./component/_star', ['star' => 4])
                                                </div>
                                                <p class="ih-address">
                                                    台北市大同區承德路一段3號
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </p>
                                                <div class="ih-trip-advisor">
                                                    <img src="/img/trip-advisor.png" alt="">

                                                    <button type="button" class="ih-theme-hover-scale ih-button">
                                                        ？？？則憑論
                                                    </button>
                                                </div>

                                                @if ($i === 1)
                                                    <div class="ih-black ih-tag text-center">
                                                        最新上架
                                                    </div>
                                                @elseif ($i === 2)
                                                    <div class="ih-blue-dark ih-tag text-center">
                                                        促銷
                                                    </div>
                                                @else
                                                    <div class="ih-red ih-tag text-center">
                                                        熱銷
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="ih-last text-right hidden-xs">
                                                <div class="ih-favorite">
                                                    @include('./component/_favorite', ['status' => false])
                                                </div>

                                                <div class="ih-origin">
                                                    每晚原價
                                                    <span class="ih-del">
                                                        ＯＯＸＸ
                                                    </span>
                                                </div>
                                                <div class="ih-point">
                                                    點數只要
                                                    <span>
                                                        ＯＯＸＸ
                                                    </span>
                                                    起
                                                </div>

                                                <a title="" class="ih-theme-book ih-block text-center" href="#">
                                                    立即預訂
                                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="hidden-sm hidden-md hidden-lg">
                                            <td colspan="2" class="ih-last">
                                                <div class="ih-favorite pull-left">
                                                    @include('./component/_favorite', ['status' => false])
                                                </div>

                                                <div class="text-right pull-right">
                                                    <div class="ih-origin">
                                                        每晚原價
                                                        <span class="ih-del">
                                                            ＯＯＸＸ
                                                        </span>
                                                    </div>
                                                    <div class="ih-point">
                                                        點數只要
                                                        <span>
                                                            ＯＯＸＸ
                                                        </span>
                                                        起
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>

                                                <a title="" class="ih-theme-book ih-block text-center" href="#">
                                                    立即預訂
                                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                @endfor
                            </div>

                            <div class="ih-pagination">
                                <ul class="ih-ul text-center center-block">
                                    <li class="ih-nav pull-left">
                                        <a title="" href="#" class="ih-block">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <!-- 狀態（當前頁面）加上 .ih-active -->
                                    <li class="ih-active ih-number pull-left">
                                        <a title="" href="#" class="ih-block">
                                            1
                                        </a>

                                    </li>
                                    <li class="ih-number pull-left">
                                        <a title="" href="#" class="ih-block">
                                            2
                                        </a>

                                    </li>
                                    <li class="ih-number pull-left">
                                        <a title="" href="#" class="ih-block">
                                            3
                                        </a>

                                    </li>
                                    <li class="ih-number pull-left">
                                        <a title="" href="#" class="ih-block">
                                            4
                                        </a>

                                    </li>
                                    <li class="ih-last ih-number pull-left">
                                        <a title="" href="#" class="ih-block">
                                            5
                                        </a>

                                    </li>
                                    <li class="ih-nav pull-left">
                                        <a title="" href="#" class="ih-block">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>

        @include('./component/footer')

        @include('./layout/foot')
    </body>
</html>
