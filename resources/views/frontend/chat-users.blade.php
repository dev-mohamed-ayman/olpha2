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
                    <div class="main_box p-4 rounded-5 bg-light">
                        @foreach($users as $user)
                            <a href="{{route('profile.show', $user->id)}}"
                               class="border shadow rounded-5 p-3 mb-4 text-decoration-none d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="image rounded-circle border">
                                        <div class="dot bg-success rounded-circle"></div>
                                        <img src="{{asset($user->image)}}"
                                             class="rounded-circle w-100 h-100">
                                    </div>
                                    <div>
                                        <h5 class="fw-bold text-dark">{{$user->name}}</h5>
                                        @if(!empty($user->details) )
                                            <p class="text-blue m-0">

                                                @if(count($user->senderMessages) > 0 && count($user->receiverMessages) > 0)

                                                    @if($user->senderMessages[0]->created_at < $user->receiverMessages[0]->created_at)
                                                        {{$user->senderMessages[0]->message}}
                                                    @else
                                                        {{$user->receciverMessages[0]->message}}
                                                    @endif

                                                @else

                                                    @if(count($user->senderMessages) > 0)
                                                        {{$user->senderMessages[0]->message}}
                                                    @endif
                                                    @if(count($user->receiverMessages) > 0)
                                                        {{$user->receiverMessages[0]->message}}
                                                    @endif

                                                @endif

                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">

                                    @if (Cache::has('user-is-online-' . $user->id))
                                        <p class="fw-bold text-success m-0">
                                            متصل
                                        </p>
                                    @else
                                        <p class="fw-bold text-secondary m-0">
                                            {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                        </p>
                                    @endif
                                    @if(!empty($user->details) )                                        @if($user->details->status == 1)
                                        <small class="text-black-50 m-0">
                                            آنسة
                                            @elseif($user->details->status == 2)
                                                مطلقة
                                            @elseif($user->details->status == 3)
                                                ارملة
                                            @elseif($user->details->status == 4)
                                                عازب
                                            @elseif($user->details->status == 5)
                                                مطلق
                                            @elseif($user->details->status == 6)
                                                ارمل
                                            @elseif($user->details->status == 7)
                                                متزوج
                                            @endif
                                        </small>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
