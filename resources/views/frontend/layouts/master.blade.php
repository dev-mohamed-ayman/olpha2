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
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>
<body>

@include('frontend.layouts.header')

@yield('content')

<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
@yield('scripts')
<script src="{{asset('frontend/js/main.js')}}"></script>
<!-- Toastr js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{--sweetalert2--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $("#message").emojioneArea({
            search: false,
            useInternalCDN: true,
            inline: true,
            attributes: {
                dir: "ltr",
            }
        });
    })
</script>

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
