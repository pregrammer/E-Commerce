<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی پروفایل کاربری</title>
    <link rel="stylesheet" href="css/he.css">
    <link rel="stylesheet" href="css/foot.css">
    <link rel="stylesheet" href="css/user_profile.css">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon-font/themify-icons/themify-icons.css">
</head>

<body>

    @include('he')

    <main class="container">

        <div class="profile-header">
            <h5>پروفایل کاربری</h5>
        </div>

        <aside>
            <ul>
                <li class="active-aside-li"><a href="#">مشخصات من</a></li>
                <li><a href="#">سفارشات من</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">خروج</button>
                    </form>
                </li>
            </ul>
        </aside>

        <div class="profile-content">

            <div class="my-features">
                <form action="{{ route('edit-user-details') }}" method="post">
                    @csrf
                    
                    <label for="">ایمیل:</label>
                    <input type="email" name="email" value="{{auth()->user()->email}}" class="@error('email', 'detail') border border-danger @enderror">
                    @error('email', 'detail') <small class="text-danger mb-3">{{ $message }}</small> @enderror

                    <label for="">نام ونام خانوادگی:</label>
                    <input type="text" name="fullname" value="@if (!$errors->has('fullname')){{$userdetail->fullname}}@endif" class="@error('fullname', 'detail') border border-danger @enderror">
                    @error('fullname', 'detail') <small class="text-danger mb-3">{{ $message }}</small> @enderror

                    <label for="">کد ملی:</label>
                    <input type="text" name="melliCode" value="@if (!$errors->has('melliCode')){{$userdetail->melliCode}}@endif" class="@error('melliCode', 'detail') border border-danger @enderror">
                    @error('melliCode', 'detail') <small class="text-danger mb-3">{{ $message }}</small> @enderror

                    <label for="">شماره تماس:</label>
                    <input type="text" name="phoneNumber" value="@if (!$errors->has('phoneNumber')){{$userdetail->phoneNumber}}@endif" class="@error('phoneNumber', 'detail') border border-danger @enderror">
                    @error('phoneNumber', 'detail') <small class="text-danger mb-3">{{ $message }}</small> @enderror

                    <label for="">کد پستی:</label>
                    <input type="text" name="postalCode" value="@if (!$errors->has('postalCode')){{$userdetail->postalCode}}@endif" class="@error('postalCode', 'detail') border border-danger @enderror">
                    @error('postalCode', 'detail') <small class="text-danger mb-3">{{ $message }}</small> @enderror

                    <label for="">نشانی:</label>
                    <textarea name="address" cols="30" rows="10" class="@error('address', 'detail') border border-danger @enderror">@if (!$errors->has('address')){{$userdetail->address}}@endif</textarea>
                    @error('address', 'detail') <small class="text-danger mb-3">{{ $message }}</small> @enderror

                    <button type="submit" class="btn btn-success">ویرایش مشخصات</button>
                </form>

                <div class="reset-pass">
                    <form action="{{ route('edit-user-pass') }}" method="post">
                        @csrf

                        <label for="">رمز عبور جدید:</label>
                        <input type="password" name="password" class="@error('password', 'respass') border border-danger @enderror">
                        @error('password', 'respass') <small class="text-danger mb-3">{{ $message }}</small> @enderror

                        <label for="">تکرار رمز عبور جدید:</label>
                        <input type="password" name="password_confirmation">

                        <button type="submit" class="btn btn-danger">ویرایش رمز عبور</button>
                    </form>
                </div>

            </div>

            <div class="my-orders">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت واحد</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td>تاریخ:</td>
                        <td>1398/06/18</td>
                        <td>قیمت کل:</td>
                        <td>980000 تومان</td>
                    </tfoot>
                </table>

                <hr>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت واحد</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td>تاریخ:</td>
                        <td>1398/06/18</td>
                        <td>قیمت کل:</td>
                        <td>980000 تومان</td>
                    </tfoot>
                </table>

                <hr>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت واحد</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td>تاریخ:</td>
                        <td>1398/06/18</td>
                        <td>قیمت کل:</td>
                        <td>980000 تومان</td>
                    </tfoot>
                </table>

                <hr>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت واحد</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td>تاریخ:</td>
                        <td>1398/06/18</td>
                        <td>قیمت کل:</td>
                        <td>980000 تومان</td>
                    </tfoot>
                </table>

                <nav aria-label="Page navigation example">
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
                </nav>

            </div>

        </div>

    </main>

    @include('foot')


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/he.js"></script>
    <script src="js/foot.js"></script>
    <script src="js/user_profile.js"></script>
</body>

</html>