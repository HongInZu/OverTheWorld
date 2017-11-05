<!doctype html>
<html lang="zh-Hant">
    <head>
        @include('./layout/head')
    </head>



    <body>
        @include('./component/header')

        <main class="ih-page-hotel ih-page">
            @include('./component/search')

            <section class="ih-section-introduce">
                <div class="container">
                    <h2 class="ih-name">
                        ＯＯＸＸ酒店

                        <div class="ih-star">
                            @include('./component/_star', ['star' => 4])
                        </div>
                    </h2>

                    <p class="ih-address hidden-xs hidden-sm">
                        地址地址地址地址地址地址地址地址地址地址 -
                        <button type="button" class="ih-theme-hover-scale ih-underline ih-button">
                            查看地圖
                        </button>
                    </p>
                </div>

                <div class="ih-container-custom container">
                    <div class="col-xs-12 col-md-9 col-lg-8">
                        <div class="ih-picture ih-relative">
                            <div class="ih-flex row">
                                <div class="ih-cover ih-padding-0 col-xs-12 col-md-9">
                                    <!-- 預設第一張 -->
                                    <figure class="ih-img" id="album" style="background-image:url(http://fakeimg.pl/1800x1000/aaa/?text=image1)"></figure>
                                </div>

                                <div class="ih-album ih-relative col-xs-12 col-md-3">
                                    <div id="carousel-album">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <div class="ih-item">
                                                <figure class="ih-img ih-theme-hover-img ih-pointer" onclick="album(this)">
                                                    <img src="http://fakeimg.pl/1800x1000/aaa/?text=image{{ $i }}" class="ih-img-full" alt="">
                                                </figure>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-3 col-lg-4">
                        <div class="ih-information">
                            <div class="ih-favorite text-right">
                                @include('./component/_favorite', ['status' => true])
                            </div>

                            <h4 class="ih-title">
                                TripAdvisor 旅客評分
                            </h4>

                            <div class="ih-trip-advisor">
                                <img src="/img/trip-advisor.png" alt="">

                                <button type="button" class="ih-theme-hover-scale ih-underline ih-button">
                                    根據？？？則憑論
                                </button>
                            </div>

                            <div class="ih-map" id="map"></div>

                            <a title="" class="ih-link ih-theme-hover-scale pull-right hidden-xs hidden-sm" href="#">
                                在地圖查看全部 <i class="fa fa-map-o" aria-hidden="true"></i>
                            </a>

                            <p class="ih-address hidden-md hidden-lg">
                                地址地址地址地址地址地址地址地址地址地址 -

                                <button type="button" class="ih-theme-hover-scale ih-underline ih-button">
                                    查看地圖
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ih-section-room">
                <div class="container">
                    <h3 class="ih-heading">
                        選擇客房
                    </h3>
                    <table class="ih-room-pc ih-theme-box-shadow-light ih-table hidden-xs">
                        <thead>
                            <tr>
                                <th>
                                    房型
                                </th>
                                <th>
                                    選項
                                </th>
                                <th>
                                    人數限制
                                </th>
                                <th>
                                    每晚價格/每房
                                </th>
                                <th>
                                    房數
                                </th>
                                <th class="hidden-sm">

                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @for ($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td>
                                        <p class="ih-margin-bottom-5">
                                            房間介紹＆規則
                                        </p>

                                        <img src="http://fakeimg.pl/180x120/aaa/?text=image" class="ih-margin-bottom-10 ih-img-full ih-block" alt="">

                                        <button type="button" class="ih-font-blue ih-theme-hover-scale ih-button">
                                            房間照片與設備
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <ul class="ih-ul">
                                            <li class="ih-font-blue">
                                                <i class="fa fa-coffee" aria-hidden="true"></i> 免費早餐
                                            </li>
                                            <li class="ih-font-blue">
                                                <i class="fa fa-wifi" aria-hidden="true"></i> 免費WIFI
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        <ul class="ih-ul">
                                            <li>
                                                <i class="fa fa-male" aria-hidden="true"></i> x2
                                            </li>
                                            <li>
                                                <i class="fa fa-child" aria-hidden="true"></i> x0
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-right">
                                        <div class="ih-origin ih-margin-bottom-15">
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
                                    </td>
                                    <td class="text-center">
                                        1間

                                        <a title="" class="ih-book ih-theme-hover-scale ih-block text-center hidden-md hidden-lg" href="#">
                                            預定
                                        </a>
                                    </td>
                                    <td class="ih-last hidden-sm">
                                        <a title="" class="ih-book ih-theme-hover-scale ih-block text-center" href="#">
                                            預定
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                    <table class="ih-room-mobile ih-theme-box-shadow-light ih-table hidden-sm hidden-md hidden-lg">
                        <tbody>
                            @for ($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td class="ih-detail" colspan="3">
                                        房間介紹＆規則
                                    </td>
                                </tr>
                                <tr class="ih-top">
                                    <td>
                                        <img src="http://fakeimg.pl/360x240/aaa/?text=image" class="ih-margin-bottom-10 ih-img-full ih-block" alt="">

                                        <button type="button" class="ih-font-blue ih-theme-hover-scale ih-button">
                                            房間照片與設備
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <ul class="ih-ul">
                                            <li class="ih-font-blue">
                                                <i class="fa fa-coffee" aria-hidden="true"></i> 免費早餐
                                            </li>
                                            <li class="ih-font-blue">
                                                <i class="fa fa-wifi" aria-hidden="true"></i> 免費WIFI
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-right">
                                        <ul class="ih-ul">
                                            <li>
                                                <i class="fa fa-male" aria-hidden="true"></i> x2
                                            </li>
                                            <li>
                                                <i class="fa fa-child" aria-hidden="true"></i> x0
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="ih-bottom">
                                    <td class="text-right">
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
                                    </td>
                                    <td>
                                        1間
                                    </td>
                                    <td class="ih-relative">
                                        <a title="" class="ih-book ih-theme-hover-scale ih-block text-center" href="#">
                                            預定
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="ih-section-information">
                <div class="container">
                    <ul class="ih-tab ih-theme-tab ih-ul text-center">
                        <!-- 狀態加上 .ih-active -->
                        <li class="ih-active ih-pointer pull-left" onclick="tab(this, '#tab-information .ih-tab-information')">
                            飯店介紹
                        </li>
                        <li class="ih-pointer pull-left" onclick="tab(this, '#tab-information .ih-tab-information')">
                            旅人介紹
                        </li>
                    </ul>

                    <div class="ih-tab-content" id="tab-information">
                        <div class="ih-tab-information-introduce ih-tab-information">
                            <div class="ih-row">
                                <div class="ih-title ih-col" onclick="mobileInformationToggle(this);">
                                    <h3>
                                        簡介
                                        <button type="button" class="ih-button pull-right hidden-md hidden-lg">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </button>
                                    </h3>
                                </div>
                                <div class="ih-content ih-col">
                                    <p>
                                        啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦
                                        啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦
                                    </p>
                                </div>
                            </div>

                            <div class="ih-row">
                                <div class="ih-title ih-col" onclick="mobileInformationToggle(this)">
                                    <h3>
                                        入住資訊
                                        <button type="button" class="ih-button pull-right hidden-md hidden-lg">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </button>
                                    </h3>
                                </div>
                                <div class="ih-content ih-col" onclick="mobileInformationToggle(this)">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <h4>
                                                <i class="fa fa-key" aria-hidden="true"></i> 入住
                                            </h4>
                                            <p>
                                                入住登記開始時間： 15:00
                                            </p>

                                            <h4>
                                                <i class="fa fa-key" aria-hidden="true"></i> 退房
                                            </h4>
                                            <p>
                                                退房時間： 中午
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <h4>
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> 前台服務時間
                                            </h4>
                                            <p>
                                                請事先聯絡以方便安排。
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ih-row">
                                <div class="ih-title ih-col" onclick="mobileInformationToggle(this)">
                                    <h3>
                                        服務設施
                                        <button type="button" class="ih-button pull-right hidden-md hidden-lg">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </button>
                                    </h3>
                                </div>
                                <div class="ih-content ih-col">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <h4>
                                                <i class="fa fa-wifi" aria-hidden="true"></i> 網路服務
                                            </h4>
                                            <ul>
                                                <li class="pull-left">
                                                    公共區域 Wi-Fi
                                                </li>
                                                <li class="pull-left">
                                                    所有房型皆附免費 Wi-Fi
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ih-row">
                                <div class="ih-title ih-col" onclick="mobileInformationToggle(this)">
                                    <h3>
                                        預定與入住須知
                                        <button type="button" class="ih-button pull-right hidden-md hidden-lg">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </button>
                                    </h3>
                                </div>
                                <div class="ih-content ih-col">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <h4>
                                                <i class="fa fa-bed" aria-hidden="true"></i> 兒童和加床
                                            </h4>
                                            <ul>
                                                <li class="pull-left">
                                                    歡迎兒童入住
                                                </li>
                                                <li class="pull-left">
                                                    兒童免費入住！1位6歲以下兒童在不加床的情況下可免費入住。
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <h4>
                                                <i class="fa fa-paw" aria-hidden="true"></i> 寵物
                                            </h4>
                                            <p>
                                                禁止攜帶寵物入住，導盲犬除外
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ih-hide ih-tab-information-trip-advisor ih-tab-information">
                            旅人介紹（串 TripAdvisor 嗎？）
                        </div>
                    </div>
                </div>
            </section>
        </main>

        @include('./component/footer')

        @include('./layout/foot')
    </body>
</html>
