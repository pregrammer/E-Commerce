<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی محصولات</title>
    <link rel="stylesheet" href="{{ asset('css/he.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon-font/themify-icons/themify-icons.css') }}">
</head>

<body>

    @include('he')

    <main class="container">

        <div class="top-products">
            <div class="range-container">
                <label for="customRange3" class="form-label">:محدوده ی قیمت</label>
                <input type="range" class="form-range" value="0" min="0" max="5" step="1" id="customRange3">
                <div class="range-price">
                    <span></span>
                    <span>کمتر از 50</span>
                    <span>هزار تومان</span>
                    <a href="">فیلتر</a>
                </div>
            </div>
            <div class="title-container">
                @switch($gk)
                    @case(1)
                    <h5>مایعات ، عرقیجات و روغن ها</h5>
                        @break
                    @case(2)
                    <h5>گیاهان ، ادویه ها و خشکبار</h5>    
                        @break
                    @case(3)
                    <h5>دمنوش ، چای و قهوه</h5>     
                        @break
                    @case(4)
                    <h5>محصولات خانگی</h5>     
                        @break
                    @case(5)
                    <h5>مواد بهداشتی</h5>     
                        @break
                    @case(6)
                    <h5>سایر</h5>     
                        @break     
                @endswitch
                <span>( تعداد محصولات: {{$products->count()}} )</span>
            </div>
        </div>

        <div class="products-body">
            
            <div class="product-cards">
                <!--<a href="/product-detail">
                    <div class="product-card">
                        <div class="card-image">
                            <img src="images/giah.jpg" alt="">
                        </div>
                        <div class="card-description">
                            <p>10هارد اکسترنال 400 گیگابایتی مناسب برای کودکان زیر 5 سال و نوزاد ها</p>
                        </div>
                        <div class="card-price-detail">
                            <div class="discount-detail">
                                <span class="badge rounded-pill bg-danger">39%</span>
                                <del>14700000</del>
                            </div>
                            <div class="run-out-text">
                                <span>ناموجود</span>
                            </div>
                            <div class="price-detail">
                                <span>12300000</span>
                                <span>تومان</span>
                            </div>
                        </div>
                    </div>
                </a>-->

                @forelse ($products as $product)

                <a href="{{ route('product-detail', $product->id) }}">
                    <div class="product-card">
                        <div class="card-image">
                            <img src="{{ asset('images/products/'. $products_images[$loop->index]->firstImage) }}" alt="">
                        </div>
                        <div class="card-description">
                            <p>{{$product->name}}</p>
                        </div>
                        <div class="card-price-detail">
                            @if ($product->inventory == 0)
                            <div class="run-out-text">
                                <span>ناموجود</span>
                            </div>
                            @else
                                @if ($product->discountPercentage != 0)
                                <div class="discount-detail">
                                    <span class="badge rounded-pill bg-danger">{{$product->discountPercentage}}%</span>
                                    <del>{{$product->price}}</del>
                                </div>
                                <div class="price-detail">
                                    <span>{{$product->price - ($product->price * ($product->discountPercentage / 100))}}</span>
                                    <span>تومان</span>
                                </div>
                                @else
                                <div class="price-detail">
                                    <span>{{$product->price}}</span>
                                    <span>تومان</span>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </a>

                @empty
                <p style="font-family: vazir; margin-top: 6%; width: 100%; text-align: right;" class="alert alert-warning">در حال حاضر محصولی در این دسته وجود ندارد</p>
                @endforelse
            </div>

            <!--<nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>-->

        </div>

    </main>

    @include('foot')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/he.js') }}"></script>
    <script src="{{ asset('js/foot.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
</body>

</html>