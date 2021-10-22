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
            <a href="{{ route('add_to_favorite_weblog', $weblog->id) }}"><button class="btn btn-outline-success">افزودن مطلب به لیست علاقه ی مندی ها</button></a>
        </aside>

        <div class="weblog-content">

            <div class="alert-ha-hastand">
                @if (session('status'))
                <div style="position: absolute; width: 100%; font-family: vazir; text-align: center;" class="alert alert-info alert-dismissible fade show al-mal my_wd_alert" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @error('email', 'comment_errors')
                <div style="position: absolute; width: 100%; font-family: vazir; text-align: center;" class="alert alert-danger alert-dismissible fade show al-mal my_wd_alert" role="alert">
                    <strong>خطا در قسمت کامنت ها</strong>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                </div>    
                @enderror
                @error('name', 'comment_errors')
                <div style="position: absolute; width: 100%; font-family: vazir; text-align: center;" class="alert alert-danger alert-dismissible fade show al-mal my_wd_alert" role="alert">
                    <strong>خطا در قسمت کامنت ها</strong>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                </div>    
                @enderror 
                @error('description', 'comment_errors')
                <div style="position: absolute; width: 100%; font-family: vazir; text-align: center;" class="alert alert-danger alert-dismissible fade show al-mal my_wd_alert" role="alert">
                    <strong>خطا در قسمت کامنت ها</strong>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                </div>    
                @enderror
            </div>

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

                @forelse ($weblog_comments as $weblog_comment)
                <div class="comment-card">
                    <h5>{{$weblog_comment->name}}</h5>
                    <p>{{$weblog_comment->created_at}}</p>
                    <p>{{$weblog_comment->description}}</p>
                    @if ($weblog_comments_answers[$loop->index] != '0')
                    <div class="reply-container">
                        <label>پاسخ:</label>
                        <h6>{{$weblog_comments_answers[$loop->index]}}</h6>
                    </div>
                    @endif
                </div>
                @empty
                    <p class="alert alert-info" style="text-align: right; font-family: vazir;">در حال حاضر نظری راجع به این مطلب نوشته نشده است.</p>
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
                <form action="{{ route('store-weblog-comment', $weblog->id) }}" method="POST">
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