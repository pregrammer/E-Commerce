
<div class="modi"></div>

<header>
    <div class="container-fluid inside-header">

        <div class="row">
            <div class="header-top">
                <div class="account-detail">

                    @auth
                        <a href="{{ route('user-profile') }}"><span>پروفایل من</span></a>
                    @endauth

                    @guest
                        <a href="{{ route('user-account') }}"><span>حساب کاربری</span></a>
                    @endguest

                    <a href="/basket"><i class="ti-shopping-cart"></i>
                        <div class="tooltip-basket">سبد خرید</div>
                    </a>
                    <a href="/favorite"><i class="ti-heart"></i>
                        <div class="tooltip-likes">لیست علاقه مندی ها</div>
                    </a>
                </div>
                <div class="top-logo">
                    <a href="#"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                </div>
                <div class="top-search-container">
                    <input type="search" placeholder="جستجو در فروشگاه سلامتی ...">
                    <i class="ti-search"></i>
                </div>
                <div class="search-content">

                </div>
                <i class="ti-menu"></i>
                <i class="ti-help-alt"></i>
            </div>
        </div>
        
        <div class="row">
            <nav>
                <ul class="menu">
                    <li><a href="#"><i class="ti-shopping-cart-full"></i>فروشگاه</a>
                        <ul class="sub-menu">
                            <li>
                                <img id="default-img-sub" src="{{ asset('images/picture of laptop/download.jpg') }}" alt="">
                            </li>
                            <li>
                                <a href="{{ route('products', 1) }}" id="y">مایعات ، عرقیجات و روغن ها</a>
                                <img src="{{ asset('images/giah.jpg') }}" id="p" alt="giah 1">
                            </li>
                            <li>
                                <a href="{{ route('products', 2) }}" id="yy">گیاهان ، ادویه ها و خشکبار</a>
                                <img src="{{ asset('images/article.jpg') }}" id="pp" alt="giah 1">
                            </li>
                            <li>
                                <a href="{{ route('products', 3) }}" id="yyy">دمنوش ، چای و قهوه</a>
                                <img src="{{ asset('images/doki.jpg') }}" id="ppp" alt="giah 1">
                            </li>
                            <li>
                                <a href="{{ route('products', 4) }}" id="yyyy">محصولات خانگی</a>
                                <img src="{{ asset('images/article.jpg') }}" id="pppp" alt="giah 1">
                            </li>
                            <li>
                                <a href="{{ route('products', 5) }}" id="yyyyy">مواد بهداشتی</a>
                                <img src="{{ asset('images/giah2.jpg') }}" id="ppppp" alt="giah 1">
                            </li>
                            <li>
                                <a href="{{ route('products', 6) }}" id="yyyyyy">سایر</a>
                                <img src="{{ asset('images/dorGiah.jpg') }}" id="pppppp" alt="giah 1">
                            </li>
                        </ul>
                    </li>
                    <li><a href="/weblogs"><i class="ti-book"></i>وبلاگ</a></li>
                    <li><a href="/contact-us"><i class="ti-mobile"></i>تماس با ما</a></li>
                    <li><a href="/about-us"><i class="ti-id-badge"></i>درباره ی ما</a></li>
                </ul>
            </nav>
            <div class="mobile-nav">
                <div class="mobile-search-container">
                    <input type="search" placeholder="جستجو در فروشگاه سلامتی ...">
                    <i class="ti-search"></i>
                </div>
                
            </div>
        </div>

        <div class="mobile-menu">
            <div class="mobile-menu-icon"><img src="images/logo.png" alt=""></div>
            <ul>
                <li></i><a href="#" id="mobile-shpp-li"><i class="ti-angle-down"></i><i class="ti-shopping-cart-full"></i>فروشگاه</a>
                    <ul class="sub-mobile-menu">
                        <li><a href="{{ route('products', 1) }}">مایعات ، عرقیجات و روغن ها</a></li>
                        <li><a href="{{ route('products', 2) }}">گیاهان ، ادویه ها و خشکبار</a></li>
                        <li><a href="{{ route('products', 3) }}">دمنوش ، چای و قهوه</a></li>
                        <li><a href="{{ route('products', 4) }}">محصولات خانگی</a></li>
                        <li><a href="{{ route('products', 5) }}">مواد بهداشتی</a></li>
                        <li><a href="{{ route('products', 6) }}">سایر</a></li>
                    </ul>
                </li>
                <li id="sec-mobile-li"><a href="/weblogs"><i class="ti-book"></i>وبلاگ</a></li>
                <li><a href="/contact-us"><i class="ti-mobile"></i>تماس با ما</a></li>
                <li><a href="/about-us"><i class="ti-id-badge"></i>درباره ی ما</a></li>
            </ul>
        </div>

    </div>
</header>