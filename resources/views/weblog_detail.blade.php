<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی جزئیات مطلب</title>
    <link rel="stylesheet" href="{{ asset('css/he.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weblog_detail.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon-font/themify-icons/themify-icons.css') }}">
</head>

<body>

    @include('he')
    
    <main class="container">
        
        <aside>
            <h5>مطالب پیشنهادی:</h5>
            <ol>
                @forelse ($suggestion_weblogs as $suggestion_weblog)
                <a href="{{ route('weblog-detail', $suggestion_weblog->id) }}">
                    <li>{{$suggestion_weblog->title}}</li>
                </a>
                @empty
                <a>
                    <li>مطلب پیشنهادی برای این مطلب وجود ندارد</li>
                </a>
                @endforelse
            </ol>
            <button class="btn btn-outline-success">افزودن مطلب به لیست علاقه ی مندی ها</button>
        </aside>

        <div class="weblog-content">

            <img src="{{ asset('images/weblogs/'.$weblog->image) }}" alt="">

            <div class="weblog-title">
                <h4>{{$weblog->title}}</h4>
                <span>{{$weblog->created_at}}</span>
            </div>

            <div class="weblog-illustration">
                
                <p>{{$weblog->description}}</p>

            </div>

            <div class="weblog-share">
                <span>اشتراک گذاری:</span>
                <span>
                    <a href="#"><i class="ti-instagram"></i></a>
                    <a href="#"><i class="ti-twitter"></i></a>
                    <a href="#"><i class="ti-youtube"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </span>
            </div>

            <div class="comments-container">

                <h3>نظرات کاربران</h3>

                <div class="comment-card">
                    <h5>علی علوی</h5>
                    <p>1400/08/26</p>
                    <p>بعضیا جوری به این لپ تاپ ایراد میگیرن انگار پول لپ تاپ نسل هشت core i7 رو پرداخت کردن
                        اینو تحویل گرفتن....منصف باشین ...و توقعتون رو از چیزی که میخرین در حد متعادل نگه
                        دارین...یکی هم میاد میگه این لپ تاپ گیمینگ نیست...دوست گرامی شما برو بیست میلیون بده
                        گیمینگ بخر ...از اولشم نوشته شده این لپ تاپ مخصوص کارهای اداری و خونه و شخصی و
                        تحصیلیه و بنظرم کیفیتش عالیه ...چقدر رفتار یه سریا منزجر کننده ست
                    </p>
                    <div class="reply-container">
                        <label>پاسخ:</label>
                        <h6>
                            با سلام. بله به زودی جایگزین خواهد شد. با سلام. بله به زودی جایگزین خواهد شد. با
                            سلام. بله به زودی جایگزین خواهد شد. با سلام. بله به زودی جایگزین خواهد شد. با
                            سلام. بله به زودی جایگزین خواهد شد.
                        </h6>
                    </div>
                </div>
                <div class="comment-card">
                    <h5>علی علوی</h5>
                    <p>1400/08/26</p>
                    <p>بعضیا جوری به این لپ تاپ ایراد میگیرن انگار پول لپ تاپ نسل هشت core i7 رو پرداخت کردن
                        اینو تحویل گرفتن....منصف باشین ...و توقعتون رو از چیزی که میخرین در حد متعادل نگه
                        دارین...یکی هم میاد میگه این لپ تاپ گیمینگ نیست...دوست گرامی شما برو بیست میلیون بده
                        گیمینگ بخر ...از اولشم نوشته شده این لپ تاپ مخصوص کارهای اداری و خونه و شخصی و
                        تحصیلیه و بنظرم کیفیتش عالیه ...چقدر رفتار یه سریا منزجر کننده ست
                    </p>
                </div>
                <div class="comment-card">
                    <h5>علی علوی</h5>
                    <p>1400/08/26</p>
                    <p>بعضیا جوری به این لپ تاپ ایراد میگیرن انگار پول لپ تاپ نسل هشت core i7 رو پرداخت کردن
                        اینو تحویل گرفتن....منصف باشین ...و توقعتون رو از چیزی که میخرین در حد متعادل نگه
                        دارین...یکی هم میاد میگه این لپ تاپ گیمینگ نیست...دوست گرامی شما برو بیست میلیون بده
                        گیمینگ بخر ...از اولشم نوشته شده این لپ تاپ مخصوص کارهای اداری و خونه و شخصی و
                        تحصیلیه و بنظرم کیفیتش عالیه ...چقدر رفتار یه سریا منزجر کننده ست
                    </p>
                </div>
                <div class="comment-card">
                    <h5>علی علوی</h5>
                    <p>1400/08/26</p>
                    <p>بعضیا جوری به این لپ تاپ ایراد میگیرن انگار پول لپ تاپ نسل هشت core i7 رو پرداخت کردن
                        اینو تحویل گرفتن....منصف باشین ...و توقعتون رو از چیزی که میخرین در حد متعادل نگه
                        دارین...یکی هم میاد میگه این لپ تاپ گیمینگ نیست...دوست گرامی شما برو بیست میلیون بده
                        گیمینگ بخر ...از اولشم نوشته شده این لپ تاپ مخصوص کارهای اداری و خونه و شخصی و
                        تحصیلیه و بنظرم کیفیتش عالیه ...چقدر رفتار یه سریا منزجر کننده ست
                    </p>
                </div>

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

            <div class="add-comment-container">
                <h5>نظر خود را بنویسید</h5>
                <form action="">
                    <div class="">
                        <input type="text" placeholder="نام خود را وارد کنید">
                        <input type="email" placeholder="ایمیل خود را وارد کنید">
                    </div>
                    <textarea name="" id="" cols="40" rows="7" placeholder="نظر خود را وارد کنید"></textarea>
                    <div>
                        <button type="submit" class="btn btn-success">ارسال نظر</button>
                    </div>
                </form>
            </div>

            @include('foot')
            
        </div>

    </main>

    


    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('js/he.js') }}"></script>
    <script src="{{ asset('js/foot.js') }}"></script>
    <script src="{{ asset('js/weblog_detail.js') }}"></script>
</body>

</html>