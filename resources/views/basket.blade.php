<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>صفحه ی سبد خرید</title>
    <link rel="stylesheet" href="css/he.css">
    <link rel="stylesheet" href="css/foot.css">
    <link rel="stylesheet" href="css/basket.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon-font/themify-icons/themify-icons.css">
</head>

<body>

    @include('he')

    <main class="container">

        <div class="alert-ha-hastand">
            @if (session('status'))
            <div style="font-family: vazir; text-align: center;" class="alert alert-info alert-dismissible fade show al-mal my_basket_alert" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

        <h5>سبد خرید</h5>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">قیمت واحد</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>

                @if (isset($shopping_cart_data))
                    @if (Cookie::get('shopping_cart'))
                        @forelse ($shopping_cart_data as $data)
                        <tr>
                            <th scope="row"><img src="{{ asset('images/products/'. $data['item_image']) }}" alt=""></th>
                            <td>{{Str::limit($data['item_name'], 50)}}</td>
                            <td>{{$data['item_price']}} تومان</td>
                            <td>
                                <div class="number">
                                    <button class="minus btn btn-success">-</button>
                                    <input type="text" disabled value="1" />
                                    <button class="plus btn btn-success">+</button>
                                </div>
                            </td>
                            <td><a href="{{ route('delete_from_basket', $data['item_id']) }}"><i class="ti-trash"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="color: rgb(230, 77, 77);">محصولی در سبد خرید شما وجود ندارد!</td>
                        </tr>
                        @endforelse
                    @endif
                @else
                <tr>
                    <td colspan="5" style="color: rgb(230, 77, 77);">محصولی در سبد خرید شما وجود ندارد!</td>
                </tr>
                @endif

            </tbody>
        </table>

        @if ( $shopping_cart_data && count($shopping_cart_data) != 0)
        @auth
        @if ($is_profile_complete)
        <div class="continue-shopping-button">
            <button type="submit" class="btn btn-success" onclick="showpaymentmodal()">ادامه ی فرآیند خرید</button>
        </div>

        <div id="paymentModal" class="payment-modal">
            <div class="payment-modal-content">
                <span class="payment-close">&times;</span>
                <form action="" method="post">
                    @csrf

                    <div style="font-family: vazir; text-align: center;" class="alert alert-danger alert-dismissible fade show al-mal d-none" role="alert">
                        <strong></strong>
                    </div>

                    <div class="payment-list-container">

                        <h5>لیست محصولات - انتخاب نحوه ی ارسال</h5>

                        @foreach ($modal_products as $modal_product)
                        <div>
                            <b>نام محصول: </b>
                            <span>{{$modal_product->name}}</span>
                        </div>

                        <div class="second-div">
                            <b>تعداد: </b>
                            <span></span>
                        </div>

                        <div class="third-div">
                            <b>قیمت نهایی برای این محصول: </b>
                            <span></span><span> تومان </span>
                        </div>

                        <hr>
                        @endforeach

                        <div class="post-section">
                            <b>انتخاب نحوه ی ارسال سفارش:</b>
                            <div class="mt-3">
                                <label for="sefareshipost">پست سفارشی<span></span></label>
                                <input type="radio" checked name="postkind" id="sefareshipost" value="0">
                            </div>

                            <div class="mt-2">
                                <label for="pishtazpost">پست پیشتاز</label>
                                <input type="radio" name="postkind" id="pishtazpost" value="1">
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="totall-prices">
                            <b>هزینه ی کل سفارش: </b>
                            <span>15000</span><span> تومان +  </span><span>6000</span><span> تومان هزینه ی ارسال </span>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-success">پرداخت نهایی</button>

                </form>
            </div>
        </div>
        @else
        <p style="font-family: vazir; font-size: 14px; color: brown; margin-top: 60px;">* جهت ادامه ی فرآیند خرید لطفا از قسمت پروفایل من ، مشخصات خود را تکمیل کنید.</p>
        @endif
        @endauth
        @guest
        <p style="font-family: vazir; font-size: 14px; color: brown; margin-top: 60px;">* جهت ادامه ی فرآیند خرید لطفا وارد حساب کاربری خود شوید.</p>
        @endguest
        @endif

    </main>

    @include('foot')

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/he.js"></script>
    <script src="js/foot.js"></script>
    <script src="js/basket.js"></script>
</body>

</html>