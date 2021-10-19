<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی علاقه مندی ها</title>
    <link rel="stylesheet" href="css/he.css">
    <link rel="stylesheet" href="css/foot.css">
    <link rel="stylesheet" href="css/favorite.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon-font/themify-icons/themify-icons.css">
</head>
<body>

    @include('he')
    
    <main class="container">

        <h5>فهرست علاقه مندی محصولات</h5>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">قیمت واحد</th>
                    <th scope="col">افزودن به سبد خرید</th>
                    <th scope="col">حذف از لیست</th>
                </tr>
            </thead>

            <tbody>

                @if (isset($product_favorite_data))
                    @if (Cookie::get('favorite_product_cart'))
                        @forelse ($product_favorite_data as $data)
                        <tr>
                            <th scope="row"><img src="{{ asset('images/products/'. $data['item_image']) }}" alt=""></th>
                            <td>{{$data['item_name']}}</td>
                            <td>{{$data['item_price']}} تومان</td>
                            <td><a href="{{ route('add_product_from_favorite_to_basket', $data['item_id']) }}"><i class="ti-check"></i></a></td>
                            <td><a href="{{ route('delete_product_from_favorite_cart', $data['item_id']) }}"><i class="ti-close"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="color: rgb(230, 77, 77);">محصولی در لیست علاقه مندی شما وجود ندارد!</td>
                        </tr>
                        @endforelse
                    @endif
                @else
                <tr>
                    <td colspan="5" style="color: rgb(230, 77, 77);">محصولی در لیست علاقه مندی شما وجود ندارد!</td>
                </tr>
                @endif

            </tbody>

        </table>

    </main>

    <hr>

    <div class="main2 container">

        <h5>فهرست علاقه مندی مطالب</h5>

        <table class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان مطلب</th>
                    <th scope="col">مطالعه مطلب</th>
                    <th scope="col">حذف از لیست</th>
                </tr>
            </thead>

            <tbody>

                @if (isset($weblog_favorite_data))
                    @if (Cookie::get('favorite_weblog_cart'))
                        @forelse ($weblog_favorite_data as $data)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$data['item_title']}}</td>
                            <td><a href="{{ route('weblog-detail', $data['item_id']) }}">مطالعه</a></td>
                            <td><a href="{{ route('delete_weblog_from_favorite_cart', $data['item_id']) }}"><i class="ti-close"></i></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="color: rgb(230, 77, 77);">مطلبی در لیست علاقه مندی شما وجود ندارد!</td>
                        </tr>
                        @endforelse
                    @endif
                @else
                <tr>
                    <td colspan="5" style="color: rgb(230, 77, 77);">مطلبی در لیست علاقه مندی شما وجود ندارد!</td>
                </tr> 
                @endif

            </tbody>

        </table>

    </div>

    @include('foot')

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/he.js"></script>
    <script src="js/foot.js"></script>
    <script src="js/favorite.js"></script>
</body>
</html>