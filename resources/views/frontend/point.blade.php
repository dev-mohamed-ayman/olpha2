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
                               class="shadow active btn-card text-center rounded-5 py-4 d-block text-decoration-none">
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
                    <div class="p-4 rounded-5 bg-light">

                        <div class="row">
                            @foreach($points as $point)
                                <div class="col-lg-6 mb-4">
                                    <div class="rounded-4 border shadow p-4">
                                        <p class="fw-bold text-center m-0">باقة {{$point->count}} نقطة</p>
                                        <p class="fw-bold text-center text-muted">السعر : {{$point->price}}</p>
                                        <a id="pointBtn" href="{{route('point.payment', $point->id)}}"
                                           class="main-btn text-decoration-none text-center d-block px43">شراء</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#pointBtn').click(function (e) {
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
                        window.location.href = $('#pointBtn').attr('href')
                    }
                });

            });
        })
    </script>
@endsection
