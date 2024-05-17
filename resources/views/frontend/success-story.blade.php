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
                    <div class="p-4 rounded-5 bg-light">

                        <div
                            class="d-flex align-items-center rounded justify-content-between p-3 bg-transparent mb-4 shadow border-bottom">
                            <p class="fw-bold m-0">
                                نهنئ جميع المشتركين الذين وفقهم الله بإيجاد نصفهم الآخر
                            </p>
                            @auth()
                                <button type="button" class="main-btn" data-bs-toggle="modal"
                                        data-bs-target="#create">اضافة
                                </button>
                            @endauth
                        </div>

                        <div class="row">
                            @foreach($successStories as $successStory)
                                <div class="col-lg-6 mb-4">
                                    <div class="rounded-4 border shadow p-4">
                                        <a href="{{route('profile.index')}}"
                                           class="profile-image mx-auto d-flex align-items-center justify-content-center">
                                            @if($successStory->user->image)
                                                <img src="{{$successStory->user->image}}" alt=""
                                                     class="rounded-circle w-100 h-100 object-fit-contain">
                                            @else
                                                <i class="fa fa-user fs-4"></i>
                                            @endif
                                        </a>
                                        <p class="fw-bold text-center m-0">{{$successStory->user->name}}</p>
                                        <p class="fw-bold text-center text-muted">{{!empty($successStory->user->details->age) ? $successStory->user->details->age : ''}}

                                            @if(!empty($successStory->user->details->status))
                                                ,
                                                @if($successStory->user->details->status == 1)
                                                    آنسة
                                                @elseif($successStory->user->details->status == 2)
                                                    مطلقة
                                                @elseif($successStory->user->details->status == 3)
                                                    ارملة
                                                @elseif($successStory->user->details->status == 4)
                                                    عازب
                                                @elseif($successStory->user->details->status == 5)
                                                    مطلق
                                                @elseif($successStory->user->details->status == 6)
                                                    ارمل
                                                @elseif($successStory->user->details->status == 7)
                                                    متزوج
                                                @endif
                                                ,
                                        @endif

                                        @if(!empty($successStory->user->details->country))
                                            {{$successStory->user->details->country()->first()->name}}
                                        @endif
                                        <p class="text-black-50 fw-bold text-center"
                                           style="height: 80px;overflow-y: auto">{{$successStory->message}}</p>
                                        <hr>
                                        <p class="text-black-50 fw-bold text-center m-0">توافق
                                            بعد {{$successStory->agree}} ايام</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Success Story -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('success-story.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="message" class="form-label">الرسالة</label>
                            <textarea name="message" id="message" rows="4" class="form-control"
                                      placeholder="الرسالة" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="agree" class="form-label">مدة التوافق</label>
                            <input type="number" name="agree" id="agree" class="form-control" placeholder="مدة التوافق"
                                   required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="main-btn py-2 rounded" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-secondary">حفظ التغييرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
