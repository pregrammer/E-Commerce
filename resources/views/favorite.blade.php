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

                <tr>
                    <th scope="row"><img src="images/giah.jpg" alt=""></th>
                    <td>خرما</td>
                    <td>49000 تومان</td>
                    <td><i class="ti-check"></i></td>
                    <td><i class="ti-close"></i></td>
                </tr>

                <tr>
                    <th scope="row"><img src="images/giah.jpg" alt=""></th>
                    <td>خرما</td>
                    <td>49000 تومان</td>
                    <td><i class="ti-check"></i></td>
                    <td><i class="ti-close"></i></td>
                </tr>

                <tr>
                    <th scope="row"><img src="images/giah.jpg" alt=""></th>
                    <td>خرما</td>
                    <td>49000 تومان</td>
                    <td><i class="ti-check"></i></td>
                    <td><i class="ti-close"></i></td>
                </tr>

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

                <tr>
                    <th scope="row">1</th>
                    <td>خاصیت های عرق بیدمشک</td>
                    <td><a href="#">مطالعه</a></td>
                    <td><i class="ti-close"></i></td>
                </tr>

                <tr>
                    <th scope="row">2</th>
                    <td>خاصیت های عرق بیدمشک</td>
                    <td><a href="#">مطالعه</a></td>
                    <td><i class="ti-close"></i></td>
                </tr>

                <tr>
                    <th scope="row">3</th>
                    <td>خاصیت های عرق بیدمشک</td>
                    <td><a href="#">مطالعه</a></td>
                    <td><i class="ti-close"></i></td>
                </tr>

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