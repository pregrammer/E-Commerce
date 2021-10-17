<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ی ارتباط با ما</title>
    <link rel="stylesheet" href="css/he.css">
    <link rel="stylesheet" href="css/foot.css">
    <link rel="stylesheet" href="css/contact-us.css">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon-font/themify-icons/themify-icons.css">
</head>

<body>

    @include('he')

    <main class="container">
        <h5>فرم ارسال پیام</h5>

        <form action="{{ route('send-message') }}" method="post">
            @csrf

            <div class="form-element">
                <label for="">موضوع:</label>
                <input type="text" name="title" value="{{old('title')}}" class="@error('title', 'message') border border-danger @enderror">
                @error('title', 'message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-element">
                <label for="">نام و نام خانوادگی:</label>
                <input type="text" name="name" value="{{old('name')}}" class="@error('name', 'message') border border-danger @enderror">
                @error('name', 'message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-element">
                <label for="" class="@error('email', 'message') mt-3 @enderror">ایمیل:</label>
                <input type="email" name="email" value="{{old('email')}}" class="@error('email', 'message') border border-danger @enderror">
                @error('email', 'message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-element">
                <label for="">شماره تماس:</label>
                <input type="text" name="phoneNumber" value="{{old('phoneNumber')}}" class="@error('phoneNumber', 'message') border border-danger @enderror">
                @error('phoneNumber', 'message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-element">
                <label for="">متن پیام:</label>
                <textarea name="description" id="" cols="10" rows="10" class="@error('description', 'message') border border-danger @enderror">{{old('description')}}</textarea>
                @error('description', 'message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="send-message-element">
                <button type="submit" class="btn btn-success">ثبت و ارسال</button>
            </div>
        </form>

        <div class="contact-ways-container">
            <div class="cwheader">
                <h5>راه های ارتباطی</h5>
            </div>
            <div class="ways-container">
                <div class="contact-way">
                    <i class="ti-mobile"></i>
                    <h6>شماره تماس</h6>
                    <p>021-568-9965</p>
                </div>
                <div class="contact-way">
                    <i class="ti-location-pin"></i>
                    <h6>موقعیت مکانی</h6>
                    <p>ایران - تهران - میدان آزادی</p>
                </div>
                <div class="contact-way">
                    <i class="ti-email"></i>
                    <h6>ایمیل</h6>
                    <p>healthy-shop@info</p>
                </div>
            </div>
        </div>

        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103598.78881813058!2d51.434961873213005!3d35.76402239314581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e06bcd34a0639%3A0x28731684a55dbd96!2sTabiat+Bridge!5e0!3m2!1sen!2s!4v1515773015045"
                width="600" height="450" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
        </div>

    </main>

    @include('foot')


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/he.js"></script>
    <script src="js/foot.js"></script>
    <script src="js/contact-us.js"></script>
</body>

</html>