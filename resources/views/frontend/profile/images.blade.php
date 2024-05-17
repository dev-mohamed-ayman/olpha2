@extends('frontend.layouts.master')
@section('content')
    <div class="profile overflow-x-hidden">
        <div class="row">
            <div class="col-md-4 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6 mb-5">
                            <a href="#" class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-star text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">مميزاتي</p>
                            </a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href="{{route('details')}}"
                               class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-info-circle text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">بياناتي</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('point.index')}}"
                               class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-bag-shopping text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">شراء نقاط</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('logout')}}"
                               class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
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
                        @foreach($images as $image)
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{asset($image->path)}}" class="card-img-top">
                                    <div class="card-body">
                                        <h3 class="card-title fw-bold text-center">{{$image->user->name}}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Add Image -->
    <div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('profile.add-image')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" accept="image/*" name="image" class="form-control">
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
