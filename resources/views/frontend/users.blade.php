@extends('frontend.layouts.master')
@section('content')
    <div class="home overflow-x-hidden">
        <div class="row">
            <div class="col-md-4 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6 mb-5">
                            <a href="#" class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-thumbs-up text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">قائمة الاهتمام</p>
                            </a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href="#" class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="far fa-heart text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">من يهتم بي</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-thumbs-down text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">قائمة التجاهل</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 bg-main-color py-5">
                <div class="container">
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-lg-6 mb-4">
                                <div class="rounded-4 border shadow p-4 bg-light">
                                    <a href="{{route('profile.show', $user->id)}}" class="head text-decoration-none d-flex align-items-center justify-content-center gap-3">
                                        <img src="{{asset($user->image)}}" class="rounded-pill border"
                                             style="height: 80px;width: 80px">
                                        <div>
                                            <h4 class="fw-bold text-dark">{{$user->name}}</h4>
                                            <p class="text-blue m-0">{{$user->age}} سنة
                                                من {{\App\Models\Country::find($user->nationality)->first()->name}}</p>
                                        </div>
                                    </a>
                                    <hr>
                                    <div class="body d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa fa-map-location-dot text-main-color fs-5"></i>
                                            <p class="m-0">{{\App\Models\Country::find($user->country)->first()->name}}
                                                / {{\App\Models\City::find($user->city)->first()->name}}</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa fa-icons text-main-color fs-5"></i>
                                            <p class="m-0">
                                                @if($user->status == 1)
                                                    آنسة
                                                @elseif($user->status == 2)
                                                    مطلقة
                                                @elseif($user->status == 3)
                                                    ارملة
                                                @elseif($user->status == 4)
                                                    عازب
                                                @elseif($user->status == 5)
                                                    مطلق
                                                @elseif($user->status == 6)
                                                    ارمل
                                                @elseif($user->status == 7)
                                                    متزوج
                                                @endif
                                            </p>
                                        </div>
                                    </div>
{{--                                    <hr>--}}
{{--                                    <div class="footer d-flex align-items-center justify-content-end gap-3">--}}
{{--                                        <a href="#" class="text-decoration-none bg-blue py-1 px-3 rounded-pill">--}}
{{--                                            <i class="fa fa-comments text-light fs-5"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="text-decoration-none">--}}
{{--                                            <i class="fa fa-heart text-black-50 fs-4"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
