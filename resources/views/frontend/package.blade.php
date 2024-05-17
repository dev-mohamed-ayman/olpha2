@extends('frontend.layouts.master')
@section('content')
    <div class="interest profile overflow-x-hidden">
        <div class="row">
            <div class="col-md-4 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6 mb-5">
                            <a href="#" class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-star text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">مميزاتي</p>
                            </a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href="{{route('details')}}"
                               class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-info-circle text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">بياناتي</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('point.index')}}"
                               class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-bag-shopping text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">شراء نقاط</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('logout')}}"
                               class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-sign-out text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">تسجيل الخروج</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 bg-main-color py-5">
                <div class="container">

                    <div class="row">
                        @foreach($packages as $package)
                            <div class="col-lg-6 mb-4">
                                <div class="rounded-5 shadow p-4" style="background-color: #FFA2C1">
                                    <h3 class="fw-bold text-white text-center">{{$package->title}}</h3>
                                    <h5 class="fw-bold mb-4 text-center text-white">

                                        {{$package->price}} {{$package->country->currency}}

                                        -

                                        @if($package->months == 1)
                                            لمدة شهر
                                        @elseif($package->months == 2)
                                            لمدة شهرين
                                        @else
                                            لمدة {{$package->months}} شهور
                                        @endif


                                    </h5>
                                    <div class="d-flex align-items-center gap-2 mb-4 text-white">
                                        <i class="fa fa-check-circle text-main-color fs-4"></i>
                                        <p class="m-0 fw-bold">إرسال رسائل إلي أي عضو</p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-4 text-white">
                                        <i class="fa fa-check-circle text-main-color fs-4"></i>
                                        <p class="m-0 fw-bold">التحكم في من يمكنهم ارسال رسائل لك</p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-4 text-white">
                                        <i class="fa fa-check-circle text-main-color fs-4"></i>
                                        <p class="m-0 fw-bold">تعديل اسم المستخدم الخاص بك</p>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-4 text-white">
                                        <i class="fa fa-check-circle text-main-color fs-4"></i>
                                        <p class="m-0 fw-bold">اخفاء الظهور</p>
                                    </div>
                                    <a href="{{route('package.payment', $package->id)}}" id="packageBtn"
                                       class="main-btn d-block fw-bold text-decoration-none text-center rounded-5 py-3 fs-3">اشترك
                                        الان</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#packageBtn').click(function (e) {
                e.preventDefault();

                Swal.fire({
                    title: "هل تريد الاستمرار؟",
                    icon: "question",
                    iconHtml: "؟",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    showCancelButton: true,
                    showCloseButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = $('#packageBtn').attr('href')
                    }
                });

            });
        })
    </script>
@endsection
