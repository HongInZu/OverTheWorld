@include('./component/loading')

<header class="ih-component-header">
    <section class="ih-section-mobile hidden-md hidden-lg">
        <div class="container">
            <a title="" class="ih-logo pull-left" href="/">
                <img src="http://fakeimg.pl/360x80/aaa/?text=logo" alt="">
            </a>
            <button type="button" class="ih-button pull-right" onclick="mobileMenuToggle()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>
    </section>

    <section class="ih-section-menu" id="menu">
        <section class="ih-section-top">
            <div class="ih-container-custom container">
                <ul class="ih-ul">
                    <li>
                        <a title="" class="ih-theme-hover-blue ih-block" href="#">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            聯絡我們
                        </a>
                    </li>
                    <li>
                        <a title="" class="ih-theme-hover-blue ih-block" href="#">
                            <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                            點數儲值
                        </a>
                    </li>
                    <li>
                        <a title="" class="ih-theme-hover-blue ih-block" href="#">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            登入/註冊
                        </a>
                    </li>
                    <li>
                        <a title="" class="ih-theme-hover-blue ih-block" href="#">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            繁體中文
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="ih-section-main">
            <div class="container">
                <a title="" class="ih-logo pull-left hidden-xs hidden-sm" href="/">
                    <img src="http://fakeimg.pl/360x80/aaa/?text=logo" alt="">
                </a>

                <ul class="ih-ul">
                    <li>
                        <!-- 狀態加上 .ih-active -->
                        <a title="" class="ih-active ih-block ih-relative" href="#">
                            住宿
                        </a>
                    </li>
                    <li>
                        <a title="" class="ih-block ih-relative" href="#">
                            美食
                        </a>
                    </li>
                    <li>
                        <a title="" class="ih-block ih-relative" href="#">
                            通行
                        </a>
                    </li>
                    <li>
                        <a title="" class="ih-block ih-relative" href="#">
                            育樂
                        </a>
                    </li>
                    <li>
                        <a title="" class="ih-block ih-relative" href="#">
                            熱門優惠
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </section>
</header>
