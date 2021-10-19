<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه اینترنتی سلامتی</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="css/he.css">
    <link rel="stylesheet" href="css/foot.css">
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon-font/themify-icons/themify-icons.css">
</head>

<body class="index-body">

    @include('he')
    
    <main>

        <div class="alert-ha-hastand">
            @if (session('status'))
            <div class="alert alert-info alert-dismissible fade show al-mal" id="my_index_alert" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        
        <div class="container clipboard-container">

            <div class="clipboard-left">

                <div class="clipboard-left-top">
                    @if ($ads->topOne)
                    <a href="{{$ads->topOneLink}}" target="_blank"><img src="{{ asset("my_ad_images/" . Str::remove('siteee/', $ads->topOne)) }}" alt=""></a>
                    @else
                    <a href="#"><img src="{{ asset('images/camera2.jpg') }}" alt=""></a>
                    @endif
                </div>

                <div class="clipboard-left-bottom">
                    @if ($ads->downOne)
                    <a href="{{$ads->downOneLink}}" target="_blank"><img src="{{ asset("my_ad_images/" . Str::remove('siteee/', $ads->downOne)) }}" alt=""></a>
                    @else
                    <a href="#"><img src="{{ asset('images/lake.jpg') }}" alt=""></a>
                    @endif
                </div>

            </div>

            <div class="slider-container">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-indicators">

                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>

                        @if ($sliderImages->count() != 0)
                        @foreach ($sliderImages as $sliderImage)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->index + 1}}"
                                aria-label="Slide {{$loop->index + 2}}"></button>
                        @endforeach
                        @endif

                    </div>

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <a href="#"><img src="images/mountain.jpg" alt="..."></a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="font-family: vazir">فروشگاه سلامتی</h5>
                                <p style="font-family: vazir">بهترین کیفیت ، بهترین قیمت و با بیست سال سابقه</p>
                            </div>
                        </div>

                        @if ($sliderImages->count() != 0)
                        @foreach ($sliderImages as $sliderImage)
                        <div class="carousel-item">
                            <a href="{{$sliderImage->link}}" target="_blank"><img src="{{ asset("my_ad_images/" . Str::remove('siteee/', $sliderImage->image)) }}" alt=""></a>
                        </div>
                        @endforeach
                        @endif

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>

        </div>

        <div class="container-fluid wow-product-container">
            <div class="wow-product">
                <div class="wow-title">
                    <h5>پیشنهادات شگفت انکیز</h5>
                </div>
                <div class="wow-cards">
                    <button disabled><i class="ti-angle-left"></i></button>

                    @forelse ($wow_products as $wow_product)

                    <a href="{{ route('product-detail', $wow_product->id) }}">
                        <div class="wow-card-background">
                            <div class="wow-card">
                                <div class="wow-card-image">
                                    <img src="images/products/{{$wow_products_images[$loop->index]->firstImage}}" alt="">
                                </div>
                                <div class="wow-card-description">
                                    <p>{{$wow_product->name}}</p>
                                </div>
                                <div class="wow-card-price-detail">
                                    @if ($wow_product->inventory == 0)
                                        <span style="font-family: vazir; color: gray; margin-left: 35%;">ناموجود</span>
                                    @else
                                        @if ($wow_product->discountPercentage != 0)
                                        <div class="discount-detail">
                                            <span class="badge rounded-pill bg-danger">{{$wow_product->discountPercentage}}%</span>
                                            <del>{{$wow_product->price}}</del>
                                        </div>
                                        <div class="price-detail">
                                            <span>{{$wow_product->price - ($wow_product->price * ($wow_product->discountPercentage / 100))}}</span>
                                            <span>تومان</span>
                                        </div>
                                        @else
                                        <div class="price-detail">
                                            <span>{{$wow_product->price}}</span>
                                            <span>تومان</span>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="wow-card-discount-time">
                                    <i class="ti-timer"></i>
                                    <span>12:56:36</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    @empty
                        <p style="font-family: vazir; margin-top: 12%;">در حال حاضر محصول شگفت انگیزی وجود ندارد</p>
                    @endforelse
                    
                    <button><i class="ti-angle-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container four-ad-box">

            @if ($ads->firstSquare)
            <a href="{{$ads->firstSquareLink}}" target="_blank"><img src="{{ asset("my_ad_images/" . Str::remove('siteee/', $ads->firstSquare)) }}" alt=""></a>
            @else
            <a href="#"><img src="{{ asset('images/giah2.jpg') }}" alt=""></a>
            @endif

            @if ($ads->secondSquare)
            <a href="{{$ads->secondSquareLink}}" target="_blank"><img src="{{ asset("my_ad_images/" . Str::remove('siteee/', $ads->secondSquare)) }}" alt=""></a>
            @else
            <a href="#"><img src="{{ asset('images/giah2.jpg') }}" alt=""></a>
            @endif

            @if ($ads->thirdSquare)
            <a href="{{$ads->thirdSquareLink}}" target="_blank"><img src="{{ asset("my_ad_images/" . Str::remove('siteee/', $ads->thirdSquare)) }}" alt=""></a>
            @else
            <a href="#"><img src="{{ asset('images/giah2.jpg') }}" alt=""></a>
            @endif

            @if ($ads->fourthSquare)
            <a href="{{$ads->fourthSquareLink}}" target="_blank"><img src="{{ asset("my_ad_images/" . Str::remove('siteee/', $ads->fourthSquare)) }}" alt=""></a>
            @else
            <a href="#"><img src="{{ asset('images/giah2.jpg') }}" alt=""></a>
            @endif

        </div>

        <div class="container new-product-container">
            <div class="new-product-title">
                <h5>جدید ترین ها</h5>
            </div>
            <div class="new-product-cards">
                <button disabled><i class="ti-angle-left"></i></button>
                
                @forelse ($new_products as $new_product)

                <a href="{{ route('product-detail', $new_product->id) }}">
                    <div class="new-product-card">
                        <div class="new-product-card-image">
                            <img src="images/products/{{$new_products_images[$loop->index]->firstImage}}" alt="">
                        </div>
                        <div class="new-product-card-description">
                            <p>{{$new_product->name}}</p>
                        </div>
                        <div class="new-product-card-price-detail">
                            @if ($new_product->inventory == 0)
                            <div class="run-out-text">
                                <span>ناموجود</span>
                            </div>
                            @else
                                @if ($new_product->discountPercentage != 0)
                                <div class="discount-detail">
                                    <span class="badge rounded-pill bg-danger">{{$new_product->discountPercentage}}%</span>
                                    <del>{{$new_product->price}}</del>
                                </div>
                                <div class="price-detail">
                                    <span>{{$new_product->price - ($new_product->price * ($new_product->discountPercentage / 100))}}</span>
                                    <span>تومان</span>
                                </div>
                                @else
                                <div class="price-detail">
                                    <span>{{$new_product->price}}</span>
                                    <span>تومان</span>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </a>

                @empty
                <p style="font-family: vazir; margin-top: 12%;">در حال حاضر محصولی وجود ندارد</p>
                @endforelse

                <button><i class="ti-angle-right"></i></button>
            </div>
        </div>

        <div class="container most-sale-product-container">
            <div class="most-sale-product-title">
                <h5>محصولات پرفروش</h5>
            </div>
            <div class="most-sale-product-cards">
                <button disabled><i class="ti-angle-left"></i></button>
                @forelse ($most_sale_products as $most_sale_product)

                <a href="{{ route('product-detail', $most_sale_product->id) }}">
                    <div class="most-sale-product-card">
                        <div class="most-sale-card-image">
                            <img src="images/products/{{$most_sale_products_images[$loop->index]->firstImage}}" alt="">
                        </div>
                        <div class="most-sale-card-description">
                            <p>{{$most_sale_product->name}}</p>
                        </div>
                        <div class="most-sale-card-price-detail">
                            @if ($most_sale_product->inventory == 0)
                            <div class="run-out-text">
                                <span>ناموجود</span>
                            </div>
                            @else
                                @if ($most_sale_product->discountPercentage != 0)
                                <div class="discount-detail">
                                    <span class="badge rounded-pill bg-danger">{{$most_sale_product->discountPercentage}}%</span>
                                    <del>{{$most_sale_product->price}}</del>
                                </div>
                                <div class="price-detail">
                                    <span>{{$most_sale_product->price - ($most_sale_product->price * ($most_sale_product->discountPercentage / 100))}}</span>
                                    <span>تومان</span>
                                </div>
                                @else
                                <div class="price-detail">
                                    <span>{{$most_sale_product->price}}</span>
                                    <span>تومان</span>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </a>

                @empty
                <p style="font-family: vazir; margin-top: 12%;">در حال حاضر محصولی وجود ندارد</p>
                @endforelse
                
                
                <button><i class="ti-angle-right"></i></button>
            </div>
        </div>

        <div class="container-fluid system-features-container">
            <div class="system-features">
                <span><i class="ti-timer"></i>
                    <div class="system-feature">پشتیبانی آنلاین 24/7</div>
                </span>
                <span><i class="ti-check"></i>
                    <div class="system-feature">محصولات 100% ارگانیک</div>
                </span>
                <span><i class="ti-truck"></i>
                    <div class="system-feature">تحویل درب منزل</div>
                </span>
            </div>
        </div>

        <div class="container last-weblogs-container">

            <div class="last-weblogs-title">
                <h5>مطلب های جدید</h5>
            </div>

            <div class="last-weblogs">
                @forelse ($last_three_weblogs as $weblog)

                <a href="{{ route('weblog-detail', $weblog->id) }}">
                    <div class="weblog-card">
                        <div class="weblog-card-image">
                            <img src="images/weblogs/{{$weblog->image}}" alt="">
                        </div>
                        <div class="weblog-card-texts">
                            <h5>{{$weblog->title}}</h5>
                            <p>{{Str::limit($weblog->description, 230)}}</p>
                        </div>
                        <div class="weblog-card-detail">
                            <span>{{$weblog->created_at}}<i class="ti-time"></i></span>
                            <span>تعداد بازدید: {{$weblog->hit}}</span>
                        </div>
                    </div>
                </a>

                @empty
                <p style="font-family: vazir;">در حال حاضر مطلبی وجود ندارد</p>
                @endforelse
            </div>

            <div class="more-weblogs">
                <a href="/weblogs">مشاهده ی همه</a>
            </div>
            
        </div>

    </main>

    @include('foot')

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/he.js"></script>
    <script src="js/foot.js"></script>
    <script src="js/index.js"></script>
</body>

</html>