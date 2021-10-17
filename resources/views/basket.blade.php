<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <h5>سبد خرید</h5>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام محصول</th>
                    <th scope="col">قیمت واحد</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">مجموع</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row"><img src="images/giah.jpg" alt=""></th>
                    <td>خرما</td>
                    <td>49000 تومان</td>
                    <td>
                        <div class="number">
                            <button class="minus btn btn-success">-</button>
                            <input type="text" disabled value="1" />
                            <button class="plus btn btn-success">+</button>
                        </div>
                    </td>
                    <td>125000 تومان</td>
                    <td><i class="ti-trash"></i></td>
                </tr>

                <tr>
                    <th scope="row"><img src="images/giah.jpg" alt=""></th>
                    <td>خرما</td>
                    <td>49000 تومان</td>
                    <td>
                        <div class="number">
                            <button class="minus btn btn-success">-</button>
                            <input type="text" disabled value="1" />
                            <button class="plus btn btn-success">+</button>
                        </div>
                    </td>
                    <td>125000 تومان</td>
                    <td><i class="ti-trash"></i></td>
                </tr>

                <tr>
                    <th scope="row"><img src="images/giah.jpg" alt=""></th>
                    <td>خرما</td>
                    <td>49000 تومان</td>
                    <td>
                        <div class="number">
                            <button class="minus btn btn-success">-</button>
                            <input type="text" disabled value="1" />
                            <button class="plus btn btn-success">+</button>
                        </div>
                    </td>
                    <td>125000 تومان</td>
                    <td><i class="ti-trash"></i></td>
                </tr>

            </tbody>
        </table>

        <div class="continue-shopping-button">
            <button type="submit" class="btn btn-success">ادامه ی فرآیند خرید</button>
        </div>

    </main>

    @include('foot')

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/he.js"></script>
    <script src="js/foot.js"></script>
    <script src="js/basket.js"></script>
</body>

</html>