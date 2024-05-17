@extends('frontend.layouts.master')
@section('content')
    <div class="interest profile overflow-x-hidden">
        <div class="row">
            <div class="col-md-4 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6 mb-5">
                            <a href="{{route('interest.index', 'interest')}}"
                               class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-thumbs-up text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">قائمة الاهتمام</p>
                            </a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href="#" class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="far fa-heart text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">من يهتم بي</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('interest.index', 'ignorance')}}"
                               class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-thumbs-down text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">قائمة التجاهل</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 bg-main-color py-5">
                <div class="container">
                    <div class="main_box p-4 rounded-5 bg-light">
                        @foreach($notifications as $notification)
                            <a href="{{route('profile.show', $notification->sender)}}"
                               class="border text-decoration-none shadow rounded-5 p-3 mb-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-4">
                                    <div>
                                        <p class="text-blue m-0">
                                            {{$notification->message}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
