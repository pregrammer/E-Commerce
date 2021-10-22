<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی جزئیات محصول</title>
    <link rel="stylesheet" href="{{ asset('css/he.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_detail.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon-font/themify-icons/themify-icons.css') }}">
</head>

<body>

    @include('he')

    <div class="container totall">

        <div class="alert-ha-hastand">
            @if (session('status'))
            <div style="position: absolute; width: 55%; font-family: vazir; text-align: center;" class="alert alert-info alert-dismissible fade show al-mal my_pd_alert" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @error('email', 'comment_errors')
            <div style="position: absolute; width: 55%; font-family: vazir; text-align: center;" class="alert alert-danger alert-dismissible fade show al-mal my_pd_alert" role="alert">
                <strong>خطا در قسمت کامنت ها</strong>
                <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
            </div>    
            @enderror
            @error('name', 'comment_errors')
            <div style="position: absolute; width: 55%; font-family: vazir; text-align: center;" class="alert alert-danger alert-dismissible fade show al-mal my_pd_alert" role="alert">
                <strong>خطا در قسمت کامنت ها</strong>
                <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
            </div>    
            @enderror 
            @error('description', 'comment_errors')
            <div style="position: absolute; width: 55%; font-family: vazir; text-align: center;" class="alert alert-danger alert-dismissible fade show al-mal my_pd_alert" role="alert">
                <strong>خطا در قسمت کامنت ها</strong>
                <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
            </div>    
            @enderror 
        </div>

        <div class="about-product-container">
            <h3>{{$product->name}}</h3>
            <div class="product-price">

                @if ($product->inventory == 0)
                <span>تعداد : ناموجود</span>
                @else
                    @if ($product->discountPercentage != 0)
                    <span>قیمت: {{$product->price - ($product->price * ($product->discountPercentage / 100))}} تومان</span>
                    <span><del>{{$product->price}} تومان</del></span>
                    @else
                    <span>قیمت: {{$product->price}} تومان</span>
                    @endif
                @endif
                
            </div>
            <div class="product-features">
                <h5>خواص</h5>
                <ul>
                    <li>{{$product_properties->firstProp}}</li>
                    <li>{{$product_properties->secondProp}}</li>
                    <li>{{$product_properties->thirdProp}}</li>
                    <li>{{$product_properties->fourthProp}}</li>
                    <li>{{$product_properties->fifthProp}}</li>
                </ul>
            </div>
            <div class="add-product-buttons">
                <a href="{{ route('add_to_basket', $product->id) }}"><button class="btn btn-success">افزودن به سبد خرید</button></a>
                <a href="{{ route('add_to_favorite_product', $product->id) }}"><button class="btn btn-success">افزودن به لیست علاقه مندی</button></a>
                <span>اشتراک گذاری:</span>
                <span>
                    <a href="#"><i class="ti-instagram"></i></a>
                    <a href="#"><i class="ti-twitter"></i></a>
                    <a href="#"><i class="ti-youtube"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </span>
            </div>
        </div>

        <div class="product-gallery-container">
            <div class="gallery">
                <section class="slider">
                    <div class="items">
                        <div class="item active-image">
                            <img src="{{ asset('images/products/' . $product_images->firstImage) }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/products/' . $product_images->secondImage) }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/products/' . $product_images->thirdImage) }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/products/' . $product_images->fourthImage) }}" alt="">
                        </div>
                    </div>
                </section>
                <section class="images">
                    <div class="item">
                        <img src="{{ asset('images/products/' . $product_images->firstImage) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/products/' . $product_images->secondImage) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/products/' . $product_images->thirdImage) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/products/' . $product_images->fourthImage) }}" alt="">
                    </div>
                </section>
            </div>
        </div>

        <div class="related-products">
            <div class="related-product-title">
                <h5>محصولات مرتبط</h5>
            </div>
            <div class="related-product-cards">
                <button disabled><i class="ti-angle-left"></i></button>

                @forelse ($related_products as $related_product)
                <a href="{{ route('product-detail', $related_product->id) }}">
                    <div class="related-product-card">
                        <div class="related-product-card-image">
                            <img src="{{ asset('images/products/'.$related_products_images[$loop->index]->firstImage) }}" alt="">
                        </div>
                        <div class="related-product-card-description">
                            <p>{{Str::limit($related_product->name, 60)}}</p>
                        </div>
                        <div class="related-product-card-price-detail">
                            @if ($related_product->inventory == 0)
                            <div class="run-out-text">
                                <span style="font-family: vazir; color: gray; margin-left: 35%;">ناموجود</span>
                            </div>
                            @else
                                @if ($related_product->discountPercentage != 0)
                                <div class="discount-detail">
                                    <span class="badge rounded-pill bg-danger">{{$related_product->discountPercentage}}%</span>
                                    <del>{{$related_product->price}}</del>
                                </div>
                                <div class="price-detail">
                                    <span>{{$related_product->price - ($related_product->price * ($related_product->discountPercentage / 100))}}</span>
                                    <span>تومان</span>
                                </div>
                                @else
                                <div class="price-detail">
                                    <span>{{$related_product->price}}</span>
                                    <span>تومان</span>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </a>
                @empty
                <p style="font-family: vazir; margin-top: 12%;">در حال حاضر محصول مرتبطی وجود ندارد</p>
                @endforelse
                

                <button><i class="ti-angle-right"></i></button>
            </div>
        </div>

        <div class="product-description-container">
            <div class="tab">

                <div class="tab-heading">
                    <span class="active-tab">شرح</span>
                    <span>ویژگی های محصول</span>
                    <span>نظرات</span>
                </div>

                <div class="tab-content">

                    <div>
                        <div class="illustration">

                            <p>{{$product->description}}</p>
                            
                        </div>
                    </div>

                    <div>
                        <ul class="product-trait">

                            @foreach ($product_features as $product_feature)
                            <li>
                                <h6>@if ($product_feature->title) {{$product_feature->title}} : @endif</h6>
                                <p>@if ($product_feature->feature) {{$product_feature->feature}} @endif</p>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <div>

                        <div class="comments-container">

                            @forelse ($product_comments as $product_comment)
                            <div class="comment-card">
                                <h5>{{$product_comment->name}}</h5>
                                <p>{{$product_comment->created_at}}</p>
                                <p>{{$product_comment->description}}</p>
                                @if ($product_comments_answers[$loop->index] != '0')
                                <div class="reply-container">
                                    <label>پاسخ:</label>
                                    <h6>{{$product_comments_answers[$loop->index]}}</h6>
                                </div>
                                @endif
                            </div> 
                            @empty
                                <p class="alert alert-info" style="text-align: right;">.در حال حاضر نظری راجع به این محصول نوشته نشده است</p>
                            @endforelse

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

                        <div class="add-comment-container">
                            <h5>نظر خود را بنویسید</h5>
                            <form action="{{ route('store-product-comment', $product->id) }}" method="POST">
                                @csrf
                                <div class="d-flex">
                                    <div>
                                        <input type="text" name="name" value="{{old('name')}}" placeholder="نام خود را وارد کنید" class="@error('name', 'comment_errors') border border-danger @enderror">
                                        @error('name', 'comment_errors') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                    </div>
                                    <div>
                                        <input type="email" name="email" value="{{old('email')}}" placeholder="ایمیل خود را وارد کنید" class="@error('email', 'comment_errors') border border-danger @enderror">
                                        @error('email', 'comment_errors') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <textarea name="description" cols="40" rows="7" class="@error('description', 'comment_errors') border border-danger @enderror"
                                    placeholder="نظر خود را وارد کنید">{{old('description')}}</textarea>
                                    @error('description', 'comment_errors') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                <div>
                                    <button type="submit" class="btn btn-success">ارسال نظر</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    @include('foot')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/he.js') }}"></script>
    <script src="{{ asset('js/foot.js') }}"></script>
    <script src="{{ asset('js/product_detail.js') }}"></script>
</body>

</html>