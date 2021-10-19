<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی پنل مدیریت</title>
    <link rel="stylesheet" href="css/manager_panel.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon-font/themify-icons/themify-icons.css">
</head>

<body>

    <div class="alert-ha-hastand">
        @if (session('status'))
            <div class="alert alert-info alert-dismissible fade show al-mal" id="my_manager_alert" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <main class="container-fluid">

        <div class="panel-header">
            <h5>پنل مدیریت</h5>
            <i class="ti-menu"></i>
        </div>

        <aside class="active-aside">
            <ul>
                <li class="active-aside-li"><a href="#">سفارشات</a></li>
                <li><a href="#">محصولات</a></li>
                <li><a href="#">مطالب</a></li>
                <li><a href="#">کامنت ها</a></li>
                <li><a href="#">کاربران</a></li>
                <li><a href="#">پیام ها</a></li>
                <li><a href="#">مشخصات</a></li>
                <li><a href="#">خروج</a></li>
            </ul>
        </aside>

        <div class="panel-content">

            <div class="all-orders-container">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">قیمت واحد</th>
                            <th scope="col">وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>تاریخ:</th>
                            <td>1398/06/18</td>
                            <th>قیمت کل:</th>
                            <td>980000 تومان</td>
                        </tr>
                        <tr>
                            <th>آدرس:</th>
                            <td colspan="4">خراسان جنوبی - شهرستان بیرجند - خیابان مدرس - خیابان جرجانی - بعد از نانوایی
                                - ساختمان دریا - درب قرمز رنگ - پلاک 19 - واحد 178</td>
                        </tr>
                        <tr>
                            <th>کد پستی:</th>
                            <td>97111156489</td>
                            <th>ایمیل:</th>
                            <td>felani@yahoo.com</td>
                        </tr>
                        <tr>
                            <th>نام:</th>
                            <td>محسن اکبری</td>
                            <th>شماره تماس:</th>
                            <td>09187452361</td>
                            <td class="badge rounded-pill bg-warning mt-2">در انتظار بررسی</td>
                        </tr>
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
                            <th scope="col">وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>تاریخ:</th>
                            <td>1398/06/18</td>
                            <th>قیمت کل:</th>
                            <td>980000 تومان</td>
                        </tr>
                        <tr>
                            <th>آدرس:</th>
                            <td colspan="4">خراسان جنوبی - شهرستان بیرجند - خیابان مدرس - خیابان جرجانی - بعد از نانوایی
                                - ساختمان دریا - درب قرمز رنگ - پلاک 19 - واحد 178</td>
                        </tr>
                        <tr>
                            <th>کد پستی:</th>
                            <td>97111156489</td>
                            <th>ایمیل:</th>
                            <td>felani@yahoo.com</td>
                        </tr>
                        <tr>
                            <th>نام:</th>
                            <td>محسن اکبری</td>
                            <th>شماره تماس:</th>
                            <td>09187452361</td>
                            <td class="badge rounded-pill bg-warning mt-2">در انتظار بررسی</td>
                        </tr>
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
                            <th scope="col">وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>تاریخ:</th>
                            <td>1398/06/18</td>
                            <th>قیمت کل:</th>
                            <td>980000 تومان</td>
                        </tr>
                        <tr>
                            <th>آدرس:</th>
                            <td colspan="4">خراسان جنوبی - شهرستان بیرجند - خیابان مدرس - خیابان جرجانی - بعد از نانوایی
                                - ساختمان دریا - درب قرمز رنگ - پلاک 19 - واحد 178</td>
                        </tr>
                        <tr>
                            <th>کد پستی:</th>
                            <td>97111156489</td>
                            <th>ایمیل:</th>
                            <td>felani@yahoo.com</td>
                        </tr>
                        <tr>
                            <th>نام:</th>
                            <td>محسن اکبری</td>
                            <th>شماره تماس:</th>
                            <td>09187452361</td>
                            <td class="badge rounded-pill bg-success mt-2">بررسی شده</td>
                        </tr>
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
                            <th scope="col">وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>زعفران</td>
                            <td>2</td>
                            <td>350000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>عرق چهل گیاه</td>
                            <td>12</td>
                            <td>450000 تومان</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>شیره ی خرما</td>
                            <td>5</td>
                            <td>250000 تومان</td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>تاریخ:</th>
                            <td>1398/06/18</td>
                            <th>قیمت کل:</th>
                            <td>980000 تومان</td>
                        </tr>
                        <tr>
                            <th>آدرس:</th>
                            <td colspan="4">خراسان جنوبی - شهرستان بیرجند - خیابان مدرس - خیابان جرجانی - بعد از نانوایی
                                - ساختمان دریا - درب قرمز رنگ - پلاک 19 - واحد 178</td>
                        </tr>
                        <tr>
                            <th>کد پستی:</th>
                            <td>97111156489</td>
                            <th>ایمیل:</th>
                            <td>felani@yahoo.com</td>
                        </tr>
                        <tr>
                            <th>نام:</th>
                            <td>محسن اکبری</td>
                            <th>شماره تماس:</th>
                            <td>09187452361</td>
                            <td class="badge rounded-pill bg-success mt-2">بررسی شده</td>
                        </tr>
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

            <div class="all-products-container">

                <div class="btn-add-pro">
                    <button id="btn-new-pro" class="btn btn-success">محصول جدید</button>
                </div>

                <div class="add-pro">

                    <div id="proModal" class="product-modal">
                        <div class="pro-modal-content">
                            <span class="pro-close">&times;</span>
                            <form action="{{ route('add-product') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <label for="">نام:</label>
                                <input type="text" name="name" required placeholder="نام محصول مورد نظر را وارد کنید...">

                                <label for="">دسته:</label>
                                <select id="groupKind" name="groupKind">
                                    <option value="1">مایعات ، عرقیجات و روغن ها</option>
                                    <option value="2">گیاهان ، ادویه ها و خشکبار</option>
                                    <option value="3">دمنوش ، چای و قهوه</option>
                                    <option value="4">محصولات خانگی</option>
                                    <option value="5">مواد بهداشتی</option>
                                    <option value="6">سایر</option>
                                </select>

                                <label for="">قیمت:</label>
                                <input type="number" name="price" required placeholder="قیمت محصول مورد نظر را به تومان وارد کنید...">

                                <label for="">درصد تخفیف: <small>(در صورتی که محصول تخفیف ندارد، صفر را وارد کنید.)</small></label>
                                <input type="number" name="discountPercentage" required>

                                <label for="">تعداد:</label>
                                <input type="number" name="inventory" required>

                                <label for="">عکس ها:</label>
                                <input type="file" required name="firstImage">
                                <input type="file" required name="secondImage">
                                <input type="file" required name="thirdImage">
                                <input type="file" required name="fourthImage">

                                <label for="">خواص:</label>
                                <input type="text" name="firstProp" required placeholder="خاصیت شماره 1">
                                <input type="text" name="secondProp" placeholder="خاصیت شماره 2">
                                <input type="text" name="thirdProp" placeholder="خاصیت شماره 3">
                                <input type="text" name="fourthProp" placeholder="خاصیت شماره 4">
                                <input type="text" name="fifthProp" placeholder="خاصیت شماره 5">

                                <label for="">شرح:</label>
                                <textarea name="description" required id="" cols="30" rows="10"
                                    placeholder="شرحی درباره ی محصول بنویسید..."></textarea>

                                <label for="">ویژگی ها:</label>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title1" required placeholder="عنوان یک">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature1" required placeholder="ویژگی یک">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title2" placeholder="عنوان دو">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature2" placeholder="ویژگی دو">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title3" placeholder="عنوان سه">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature3" placeholder="ویژگی سه">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title4" placeholder="عنوان چهار">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature4" placeholder="ویژگی چهار">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title5" placeholder="عنوان پنج">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature5" placeholder="ویژگی پنج">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title6" placeholder="عنوان شش">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature6" placeholder="ویژگی شش">
                                </div>

                                <button type="submit" class="btn btn-success">ثبت محصول جدید</button>

                            </form>
                        </div>
                    </div>

                </div>

                <div class="all-products">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام محصول</th>
                                <th scope="col">قیمت واحد</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}} تومان</td>
                                    <td>{{$product->inventory}}</td>
                                    <td><i id="proEditbtn" class="ti-pencil" onclick="showproducteditmodal({{$product->id}})"></i></td>
                                    <td><a href="{{ route('delete-product', $product->id) }}"><i class="ti-trash"></i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="color:red; padding-right: 90px;">محصولی وجود ندارد!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <div id="proEditModal" class="product-modal">
                        <div class="pro-modal-content">
                            <span class="pro-edit-close">&times;</span>
                            <form action="" method="post" enctype="multipart/form-data"><!--action is defined in js-->
                                @csrf

                                <label for="">نام:</label>
                                <input type="text" name="name" required placeholder="نام محصول مورد نظر را وارد کنید...">

                                <label for="">دسته:</label>
                                <select id="groupKind" name="groupKind">
                                    <option value="1">مایعات ، عرقیجات و روغن ها</option>
                                    <option value="2">گیاهان ، ادویه ها و خشکبار</option>
                                    <option value="3">دمنوش ، چای و قهوه</option>
                                    <option value="4">محصولات خانگی</option>
                                    <option value="5">مواد بهداشتی</option>
                                    <option value="6">سایر</option>
                                </select>

                                <label for="">قیمت:</label>
                                <input type="number" name="price" required placeholder="قیمت محصول مورد نظر را به تومان وارد کنید...">

                                <label for="">درصد تخفیف:</label>
                                <input type="number" name="discountPercentage" required>

                                <label for="">تعداد:</label>
                                <input type="number" name="inventory" required>

                                <label for="">عکس ها: <small>(در صورت انتخاب عکس جدید، عکس قبل حذف و عکس جدید جایگزین می شود)</small></label>
                                <input type="file" name="firstImage">
                                <input type="file" name="secondImage">
                                <input type="file" name="thirdImage">
                                <input type="file" name="fourthImage">

                                <label for="">خواص:</label>
                                <input type="text" name="firstProp" required placeholder="خاصیت شماره 1">
                                <input type="text" name="secondProp" placeholder="خاصیت شماره 2">
                                <input type="text" name="thirdProp" placeholder="خاصیت شماره 3">
                                <input type="text" name="fourthProp" placeholder="خاصیت شماره 4">
                                <input type="text" name="fifthProp" placeholder="خاصیت شماره 5">

                                <label for="">شرح:</label>
                                <textarea name="description" required id="" cols="30" rows="10"
                                    placeholder="شرحی درباره ی محصول بنویسید..."></textarea>

                                <label for="">ویژگی ها:</label>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title1" required placeholder="عنوان یک">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature1" required placeholder="ویژگی یک">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title2" placeholder="عنوان دو">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature2" placeholder="ویژگی دو">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title3" placeholder="عنوان سه">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature3" placeholder="ویژگی سه">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title4" placeholder="عنوان چهار">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature4" placeholder="ویژگی چهار">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title5" placeholder="عنوان پنج">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature5" placeholder="ویژگی پنج">
                                </div>
                                <div class="pro-feature-row">
                                    <label for="">عنوان:</label>
                                    <input type="text" name="title6" placeholder="عنوان شش">
                                    <label for="">ویژگی:</label>
                                    <input type="text" name="feature6" placeholder="ویژگی شش">
                                </div>

                                <button type="submit" class="btn btn-success">ویرایش محصول</button>

                            </form>
                        </div>
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

            </div>

            <div class="all-weblogs-container">

                <div class="btn-add-weblog">
                    <button id="btn-new-weblog" class="btn btn-success">مطلب جدید</button>
                </div>

                <div class="add-weblog">

                    <div id="weblogModal" class="weblog-modal">
                        <div class="weblog-modal-content">
                            <span class="weblog-close">&times;</span>
                            <form action="{{ route('add-weblog') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <label for="">عنوان:</label>
                                <input type="text" name="title" required placeholder="عنوان مطلب را وارد نمایید...">

                                <label for="">دسته:</label>
                                <select id="weblog-kind" name="groupKind">
                                    <option value="1">مایعات ، عرقیجات و روغن ها</option>
                                    <option value="2">گیاهان ، ادویه ها و خشکبار</option>
                                    <option value="3">دمنوش ، چای و قهوه</option>
                                    <option value="4">محصولات خانگی</option>
                                    <option value="5">مواد بهداشتی</option>
                                    <option value="6">سایر</option>
                                </select>

                                <label for="">عکس:</label>
                                <input type="file" required name="image">

                                <label for="">شرح:</label>
                                <textarea name="description" required cols="30" rows="10"
                                    placeholder="شرحی درباره ی محصول بنویسید..."></textarea>

                                <button type="submit" class="btn btn-success">ثبت مطلب جدید</button>

                            </form>
                        </div>
                    </div>

                </div>

                <div class="all-weblogs">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان مطلب</th>
                                <th scope="col">تاریخ</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($weblogs as $weblog)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$weblog->title}}</td>
                                <td>{{$weblog->created_at}}</td>
                                <td><i class="ti-pencil" onclick="showweblogeditmodal({{$weblog->id}})"></i></td>
                                <td><a href="{{ route('delete-weblog', $weblog->id) }}"><i class="ti-trash"></i></a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="color:red; padding-right: 125px;">مطلبی وجود ندارد!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div id="weblogEditModal" class="weblog-modal">
                        <div class="weblog-modal-content">
                            <span class="weblog-edit-close">&times;</span>
                            <form action="" method="post" enctype="multipart/form-data"><!--action is defined in js-->
                                @csrf

                                <label for="">عنوان:</label>
                                <input type="text" name="title" required placeholder="عنوان مطلب را وارد نمایید...">

                                <label for="">دسته:</label>
                                <select id="weblog-kind" name="groupKind">
                                    <option value="1">مایعات ، عرقیجات و روغن ها</option>
                                    <option value="2">گیاهان ، ادویه ها و خشکبار</option>
                                    <option value="3">دمنوش ، چای و قهوه</option>
                                    <option value="4">محصولات خانگی</option>
                                    <option value="5">مواد بهداشتی</option>
                                    <option value="6">سایر</option>
                                </select>

                                <label for="">عکس: <small>(در صورت انتخاب عکس جدید، عکس قبل حذف و عکس جدید جایگزین می شود)</small></label>
                                <input type="file" name="image">

                                <label for="">شرح:</label>
                                <textarea name="description" required cols="30" rows="10"
                                    placeholder="شرحی درباره ی محصول بنویسید..."></textarea>

                                <button type="submit" class="btn btn-success">ویرایش مطلب</button>

                            </form>
                        </div>
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

            </div>

            <div class="all-comments-container">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">تاریخ</th>
                            <th scope="col">عنوان محصول/مطلب</th>
                            <th scope="col">تغییرات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>علی علوی</td>
                            <td>felani@yahoo.com</td>
                            <td>1399/08/19</td>
                            <td>زعفران قاین</td>
                            <td><a href="#">تایید</a><span> / </span><a href="#">رد</a><span> / </span><a
                                    href="#">مشاهده</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>علی علوی</td>
                            <td>felani@yahoo.com</td>
                            <td>1399/08/19</td>
                            <td>زعفران قاین</td>
                            <td><a href="#">تایید</a><span> / </span><a href="#">رد</a><span> / </span><a
                                    href="#">مشاهده</a></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>علی علوی</td>
                            <td>felani@yahoo.com</td>
                            <td>1399/08/19</td>
                            <td>زعفران قاین</td>
                            <td><a href="#">تایید</a><span> / </span><a href="#">رد</a><span> / </span><a
                                    href="#">مشاهده</a></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>علی علوی</td>
                            <td>felani@yahoo.com</td>
                            <td>1399/08/19</td>
                            <td>زعفران قاین</td>
                            <td><a href="#">تایید</a><span> / </span><a href="#">رد</a><span> / </span><a
                                    href="#">مشاهده</a></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>علی علوی</td>
                            <td>felani@yahoo.com</td>
                            <td>1399/08/19</td>
                            <td>زعفران قاین</td>
                            <td><a href="#">تایید</a><span> / </span><a href="#">رد</a><span> / </span><a
                                    href="#">مشاهده</a></td>
                        </tr>
                    </tbody>
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

                <div id="commentModal" class="comment-modal">
                    <div class="comment-modal-content">
                        <span class="comment-close">&times;</span>
                        <form action="">

                            <label for="">متن پیام:</label>
                            <textarea name="" id="" cols="30" rows="10"></textarea>

                            <label for="">پاسخ:</label>
                            <textarea name="" id="" cols="30" rows="10"
                                placeholder="پاسخ خود را برای این نظر وارد کنید..."></textarea>

                            <button type="submit" class="btn btn-success">ثبت تغییرات</button>

                        </form>
                    </div>
                </div>

            </div>

            <div class="all-users-container">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">شماره</th>
                            <th scope="col">تاریخ عضویت</th>
                            <th scope="col">وضعیت</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$users_details[$loop->index][0]}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$users_details[$loop->index][1]}}</td>
                            <td>{{$user->created_at}}</td>
                            @if ($user->active)
                            <td><a href="{{ route('change-user-active', $user->id) }}" class="badge rounded-pill bg-success mt-2">آزاد</a></td>
                            @else
                            <td><a href="{{ route('change-user-active', $user->id) }}" class="badge rounded-pill bg-warning mt-2">معلق</a></td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="color:red; padding-right: 80px;">کاربری وجود ندارد!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

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

            <div class="all-messages-container">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">موضوع</th>
                            <th scope="col">نام</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">شماره تماس</th>
                            <th scope="col">تاریخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$message->title}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->phoneNumber}}</td>
                            <td>{{$message->created_at}}</td>
                        </tr>
                        <tr>
                            <th>متن:</th>
                            <td colspan="5">{{$message->description}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="color:red; padding-right: 90px;">پیامی وجود ندارد!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

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

            <div class="all-properties">
                <span>( در صورت عدم انتخاب عکس ، آخرین عکس در ناحیه ی انتخابی حذف خواهد شد )</span>
                
                <form action="{{ route('change-site-gallery') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6>اسلایدر:</h6>
                    <div class="rrow">
                        <label for="">عکس:</label>
                        <input type="file" name="image">
                        <label for="">لینک:</label>
                        <input type="text" name="link" placeholder="لینک مربوط به عکس را وارد کنید...">
                        <button type="submit" class="btn btn-primary">ثبت / حذف</button>
                    </div>
                </form>
                <form action="{{ route('change-site-topad') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6>تبلیغ بالا:</h6>
                    <div class="rrow">
                        <label for="">عکس:</label>
                        <input type="file" name="image">
                        <label for="">لینک:</label>
                        <input type="text" name="link" placeholder="لینک مربوط به عکس را وارد کنید...">
                        <button type="submit" class="btn btn-primary">ثبت / حذف</button>
                    </div>
                </form>
                <form action="{{ route('change-site-downad') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6>تبلیغ پایین:</h6>
                    <div class="rrow">
                        <label for="">عکس:</label>
                        <input type="file" name="image">
                        <label for="">لینک:</label>
                        <input type="text" name="link" placeholder="لینک مربوط به عکس را وارد کنید...">
                        <button type="submit" class="btn btn-primary">ثبت / حذف</button>
                    </div>
                </form>
                <form action="{{ route('change-site-fourad') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6>مربع ها:</h6>
                    <div class="rrow">
                        <label for="">عکس:</label>
                        <input type="file" name="image">
                        <label for="">لینک:</label>
                        <input type="text" name="link" placeholder="لینک مربوط به عکس را وارد کنید...">
                        <button type="submit" class="btn btn-primary">ثبت / حذف</button>
                    </div>
                </form>
                

                <form action="">
                    <h6>تغییر مشخصات مدیر:</h6>
                    <div class="manager-prop">
                        <label for="">ایمیل:</label>
                        <input type="text">
                        <label for="">رمز عبور:</label>
                        <input type="text" placeholder="رمز عبور جدید">
                        <input type="text" placeholder="تکرار رمز عبور جدید">
                    </div>
                    <button type="submit" class="btn btn-success">ثبت مشخصات</button>
                </form>
                
            </div>

        </div>

    </main>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/manager_panel.js"></script>
</body>

</html>