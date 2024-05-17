@extends('frontend.layouts.master')
@section('content')
    <div class="home overflow-x-hidden">
        <div class="row">
            <div class="col-md-4 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6 mb-5">
                            <a href="{{route('interest.index', 'interest')}}"
                               class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-thumbs-up text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">قائمة الاهتمام</p>
                            </a>
                        </div>
                        <div class="col-6 mb-5">
                            <a href=""
                               class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="far fa-heart text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">من يهتم بي</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('interest.index', 'ignorance')}}" class="shadow text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-thumbs-down text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">قائمة التجاهل</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 bg-main-color py-5">
                <div class="container">
                    <form action="{{route('search')}}" method="get">
                        @csrf
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="fw-bold text-blue">ابدأ البحث</h3>
                            <div class="d-flex align-items-center rounded-pill shadow bg-light">
                                <span id="female" class="gender text-blue fw-bold rounded-pill fs-5  py-2 px-5 active">البحث عن زوجة</span>
                                <span id="male" class="gender text-blue fw-bold rounded-pill fs-5  py-2 px-5">البحث عن زوج</span>
                            </div>
                            <input type="hidden" name="gender" id="gender" value="female">
                        </div>
                        <div class="row mt-4">
                            <div class="form-group col-lg-6 mb-4">
                                <label for="nationality" class="form-label">الجنسية</label>
                                <select name="nationality" id="nationality" class="form-select">
                                    <option selected disabled>اختر...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 mb-4">
                                <label for="country" class="form-label">مكان الاقامة</label>
                                <select name="country" id="country" class="form-select">
                                    <option selected disabled>اختر...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 mb-4">
                                <label for="status" class="form-label">الحالة العائلية</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="0">كل الحالات</option>
                                    <option value="1">آنسة</option>
                                    <option value="2">مطلقة</option>
                                    <option value="3">ارملة</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 mb-4">
                                <label class="form-label">العمر</label>
                                <div id="RangeSlider" class="range-slider">
                                    <div>
                                        <div class="range-slider-val-left"></div>
                                        <div class="range-slider-val-right"></div>
                                        <div class="range-slider-val-range"></div>

                                        <span class="range-slider-handle range-slider-handle-left"></span>
                                        <span class="range-slider-handle range-slider-handle-right"></span>

                                        <div class="range-slider-tooltip range-slider-tooltip-left">
                                            <span class="range-slider-tooltip-text"></span>
                                        </div>

                                        <div class="range-slider-tooltip range-slider-tooltip-right">
                                            <span class="range-slider-tooltip-text"></span>
                                        </div>
                                    </div>

                                    <input type="range" name="age_min" class="range-slider-input-left" tabindex="0"
                                           max="100" min="0"
                                           step="1">
                                    <input type="range" name="age_max" class="range-slider-input-right" tabindex="0"
                                           max="100" min="0"
                                           step="1">
                                </div>
                            </div>
                            <button type="submit" class="d-block mx-auto bg-blues rounded-2 mt-3 px-5 border-0 py-2 bg-blue text-light">بحث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
