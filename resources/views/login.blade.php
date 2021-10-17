<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به حساب کاربری</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon-font/themify-icons/themify-icons.css">
</head>
<body>
    
    <div class="container-fluid authentication-container">

        <main class="col-lg-3  @error ('email', 'register') d-none @enderror @error ('password', 'register') d-none @enderror @error ('email', 'respass') d-none @enderror">
            <div class="content">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-danger mb-3 text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <label for="">ایمیل</label>
                    <input type="email" name="email" value="@error('email', 'login') {{old('email')}} @enderror @error('password', 'login') {{old('email')}} @enderror" class="@error('email', 'login') border border-danger @enderror">
                    @error('email', 'login') <small class="text-danger mb-2">{{ $message }}</small> @enderror

                    <label for="">رمز عبور</label>
                    <input type="password" name="password" class="@error('password', 'login') border border-danger @enderror">
                    @error('password', 'login') <small class="text-danger mb-2">{{ $message }}</small> @enderror

                    <input type="submit" class="btn btn-success" value="ورود">

                    <label for="remember-me">
                        <input type="checkbox" name="remember" id="remember-me">مرا به خاطر بسپار
                    </label>

                </form>
                <div class="buttom-of-form">
                    <a href="#" id="reg">ثبت نام</a>
                    <a href="#" id="forget">فراموشی رمز عبور</a>
                </div>
            </div>
        </main>
        
        <main class="col-lg-3 register-container @error ('email', 'register') d-block @enderror @error ('password', 'register') d-block @enderror">
            <div class="content">
                <div class="logo">
                    <i class="ti-arrow-left"></i>
                    <img src="images/logo.png" alt="">
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    <label for="">ایمیل</label>
                    <input type="email" name="email" value="@error('email', 'register') {{old('email')}} @enderror @error('password', 'register') {{old('email')}} @enderror" class="@error('email', 'register') border border-danger @enderror">
                    @error('email', 'register') <small class="text-danger mb-2">{{ $message }}</small> @enderror

                    <label for="">رمز عبور</label>
                    <input type="password" name="password" class="@error('password', 'register') border border-danger @enderror">
                    @error('password', 'register') <small class="text-danger mb-2">{{ $message }}</small> @enderror

                    <label for="">تکرار رمز عبور</label>
                    <input type="password" name="password_confirmation" class="@error('password_confirmation', 'register') border border-danger @enderror">
                    @error('password_confirmation', 'register') <small class="text-danger mb-2">{{ $message }}</small> @enderror

                    <input type="submit" class="btn btn-success" value="ثبت نام">

                </form>
            </div>
        </main>

        <main class="col-lg-3 reset-pass-container @error ('email', 'respass') d-block @enderror">
            <div class="content">
                <div class="logo">
                    <i class="ti-arrow-left"></i>
                    <img src="images/logo.png" alt="">
                </div>
                <form action="{{ route('reset-pass') }}" method="post">
                    @csrf

                    <label for="">ایمیل</label>
                    <input type="email" name="email"  placeholder="آدرس ایمیل خود را وارد کنید" value="@error('email', 'respass') {{old('email')}} @enderror" class="@error('email', 'respass') border border-danger @enderror">
                    @error('email', 'respass') <small class="text-danger mb-2">{{ $message }}</small> @enderror

                    <input type="submit" class="btn btn-success" value="ارسال ایمیل بازیابی رمز عبور">

                </form>
            </div>
        </main>

    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>