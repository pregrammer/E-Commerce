<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی وبلاگ ها</title>
    <link rel="stylesheet" href="{{ asset('css/he.css') }}">
    <link rel="stylesheet" href="{{ asset('css/foot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weblogs.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon-font/themify-icons/themify-icons.css') }}">
</head>
<body>
    
    @include('he')

    <main class="container">
        
        <i class="ti-angle-down"></i>

        <aside>
            <h5>دسته بندی ها</h5>
            <ul>
                <li><span>( {{$weblogs_count[0]}} )</span><i @if (!$isall && $weblog_gk_code == 1)style="visibility: visible;" @endif class="ti-check"></i><a @if (!$isall && $weblog_gk_code == 1)style="color: rgb(37, 201, 37);" @endif href="{{ route('weblogss', 1) }}">مایعات ، عرقیجات و روغن ها</a></li>
                <li><span>( {{$weblogs_count[1]}} )</span><i @if (!$isall && $weblog_gk_code == 2)style="visibility: visible;" @endif class="ti-check"></i><a @if (!$isall && $weblog_gk_code == 2)style="color: rgb(37, 201, 37);" @endif href="{{ route('weblogss', 2) }}">گیاهان ، ادویه ها و خشکبار</a></li>
                <li><span>( {{$weblogs_count[2]}} )</span><i @if (!$isall && $weblog_gk_code == 3)style="visibility: visible;" @endif class="ti-check"></i><a @if (!$isall && $weblog_gk_code == 3)style="color: rgb(37, 201, 37);" @endif href="{{ route('weblogss', 3) }}">دمنوش ، چای و قهوه</a></li>
                <li><span>( {{$weblogs_count[3]}} )</span><i @if (!$isall && $weblog_gk_code == 4)style="visibility: visible;" @endif class="ti-check"></i><a @if (!$isall && $weblog_gk_code == 4)style="color: rgb(37, 201, 37);" @endif href="{{ route('weblogss', 4) }}">محصولات خانگی</a></li>
                <li><span>( {{$weblogs_count[4]}} )</span><i @if (!$isall && $weblog_gk_code == 5)style="visibility: visible;" @endif class="ti-check"></i><a @if (!$isall && $weblog_gk_code == 5)style="color: rgb(37, 201, 37);" @endif href="{{ route('weblogss', 5) }}">مواد بهداشتی</a></li>
                <li><span>( {{$weblogs_count[5]}} )</span><i @if (!$isall && $weblog_gk_code == 6)style="visibility: visible;" @endif class="ti-check"></i><a @if (!$isall && $weblog_gk_code == 6)style="color: rgb(37, 201, 37);" @endif href="{{ route('weblogss', 6) }}">سایر</a></li>
            </ul>
        </aside>

        <div class="weblogs-body">
            @if ($isall)
            <h5><span style="font-family: salamat;">( تعداد : {{$weblogs->count()}} )</span>  همه ی مطالب</h5>
            @else
            <h5><span style="font-family: salamat;">( تعداد : {{$gk_weblogs->count()}} )</span>  {{$weblog_gk_name}}</h5>
            @endif

            <div class="weblog-cards">
                @if ($isall)

                @forelse ($weblogs as $weblog)
                <a href="{{ route('weblog-detail', $weblog->id) }}">
                    <div class="weblog-card">
                        <div class="weblog-card-image">
                            <img src="{{ asset('images/weblogs/' . $weblog->image) }}" alt="">
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
                    <p style="font-family: vazir; width: 100%; text-align: right;" class="alert alert-warning">در حال حاضر مطلبی وجود ندارد</p>
                @endforelse

                @else

                @forelse ($gk_weblogs as $gk_weblog)
                <a href="{{ route('weblog-detail', $gk_weblog->id) }}">
                    <div class="weblog-card">
                        <div class="weblog-card-image">
                            <img src="{{ asset('images/weblogs/' . $gk_weblog->image) }}" alt="">
                        </div>
                        <div class="weblog-card-texts">
                            <h5>{{$gk_weblog->title}}</h5>
                            <p>{{$gk_weblog->description}}</p>
                        </div>
                        <div class="weblog-card-detail">
                            <span>{{$gk_weblog->created_at}}<i class="ti-time"></i></span>
                            <span>تعداد بازدید: {{$gk_weblog->hit}}</span>
                        </div>
                    </div>
                </a>
                @empty
                    <p style="font-family: vazir; width: 100%; text-align: right;" class="alert alert-warning">در حال حاضر مطلبی در این دسته وجود ندارد</p>
                @endforelse
                @endif
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
    <script src="{{ asset('js/weblogs.js') }}"></script>
</body>
</html>