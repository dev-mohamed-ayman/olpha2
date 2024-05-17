<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.rtl.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>
    <!-- Toastr js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>تسجيل الدخول</title>
</head>
<body>

<div class="auth">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('frontend/images/logo.png')}}">
            </div>
            <div class="col-md-6 p-5">
                <div class="form rounded-5 bg-light p-4">
                    <div class="taps mb-5 shadow rounded-pill">
                        <a href="{{route('register')}}" class="">انشاء حساب</a>
                        <a href="{{route('login')}}" class="active">تسجيل الدخول</a>
                    </div>
                    <form action="{{route('post-login')}}" method="post" class="mt-5 pt-4" autocomplete="off">
                        @csrf

                        <input type="text" name="username" class="border-0 shadow w-100 p-3 rounded-pill my-2"
                               placeholder="اسم المتسخدم">
                        @error('username')
                        <code>{{$message}}</code>
                        @enderror

                        <input type="password" name="password" class="border-0 shadow my-2 w-100 p-3 rounded-pill"
                               placeholder="كلمة السر" autocomplete="new-password">
                        @error('password')
                        <code>{{$message}}</code>
                        @enderror

                        <button class="main-btn py-3 px-5 mx-auto text-center mt-5 d-block rounded-pill">تسجيل الدخول
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<!-- Toastr js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if(session('success'))
    <script>
        toastr.success('{{session('success')}}');
    </script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            toastr.error('{{$error}}');
        </script>
    @endforeach
@endif
</body>
</html>
