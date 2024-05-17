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
                            <a href="{{route('details')}}" class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-info-circle text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">بياناتي</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('point.index')}}" class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
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
                    <div class="profile-image mx-auto d-flex align-items-center justify-content-center">
                        @if(auth('web')->user()->image)
                            <img src="{{auth('web')->user()->image}}" alt=""
                                 class="rounded-circle w-100 h-100 object-fit-contain">
                        @else
                            <i class="fa fa-user fs-2"></i>
                        @endif
                    </div>
                    <div class="text-center mt-3 text-light">
                        <h4 class="fw-bold">{{auth()->user()->name}}</h4>
                        <div class="d-flex align-items-center justify-content-center gap-5 mt-3">
                            <span class="fw-bold">نقاطي 2500</span>
                            <span class="fw-bold">رقم العضوية {{auth()->user()->id}}</span>
                        </div>
                    </div>
                    <section class="footer-section">
                        <div class="taps d-flex align-items-center justify-content-center mt-4 gap-4 text-center">
                            <button id="setting" type="button"
                                    class="text-white-50 w-100 border-0 bg-transparent fw-bold">اعدادات الحساب
                            </button>
                            <button id="images" type="button"
                                    class="text-white-50 active w-100 border-0 bg-transparent fw-bold">الصور
                            </button>
                        </div>
                        <div class="body">
                            <div class="images bg-light rounded-5 mt-4 p-4">
                                <div class="row">
                                    @foreach($images as $image)
                                        <div class="col-6 col-md-3 mb-4">
                                            <div class="image border rounded">
                                                <img src="{{asset($image->path)}}" alt=""
                                                     class="w-100 h-100 object-fit-contain">
                                            </div>
                                            <a href="{{route('profile.delete-image', $image->id)}}"
                                               class="btn btn-sm btn-danger w-100">حذف</a>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="main-btn d-block mx-auto" data-bs-toggle="modal"
                                        data-bs-target="#addImage">اضف صورة
                                </button>
                            </div>
                            <div class="setting bg-light rounded-5 mt-4 p-4" style="display: none">
                                <form action="{{route('profile.update-profile')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="group mb-3">
                                        <input type="text" name="name" value="{{auth()->user()->name}}" class="w-100 border rounded-pill px-4 py-2"
                                               placeholder="الاسم">
                                        <i class="fa fa-user-edit"></i>
                                    </div>
                                    <div class="group mb-3">
                                        <input type="text" name="email" value="{{auth()->user()->email}}" class="w-100 border rounded-pill px-4 py-2"
                                               placeholder="البريد الالكتروني">
                                        <i class="fa fa-message"></i>
                                    </div>
                                    <div class="group mb-3">
                                        <input type="text" name="username" value="{{auth()->user()->username}}" class="w-100 border rounded-pill px-4 py-2"
                                               placeholder="اسم المستخدم">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="group mb-3">
                                        <input type="text" name="phone" value="{{auth()->user()->phone}}" class="w-100 border rounded-pill px-4 py-2"
                                               placeholder="الهاتف">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="group mb-3">
                                        <input type="password" name="password"
                                               class="w-100 border rounded-pill px-4 py-2"
                                               placeholder="كلمة المرور">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <div class="group mb-3">
                                        <input type="password" name="password_confirmation"
                                               class="w-100 border rounded-pill px-4 py-2"
                                               placeholder="اعادة كلمة المرور">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    <div class="group mb-3">
                                        <input type="file" accept="image/*" name="image" class="w-100 border rounded-pill px-4 py-2">
                                        <i class="fa fa-image"></i>
                                    </div>
                                    <button type="submit" class="main-btn d-block mx-auto">حفظ التغييرات</button>
                                </form>
                            </div>
                        </div>
                    </section>
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
