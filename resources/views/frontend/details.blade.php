@extends('frontend.layouts.master')
@section('content')
    <div class="profile overflow-x-hidden">
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
                               class="shadow btn-card active text-center rounded-5 py-4 d-block text-decoration-none">
                                <i class="fa fa-info-circle text-secondary fs-2 mb-4"></i>
                                <p class="m-0 fw-bold text-black-50">بياناتي</p>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('point.index')}}" class="shadow btn-card text-center rounded-5 py-4 d-block text-decoration-none">
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
                    <div class="bg-light rounded-5 p-5">
                        <div class="rounded-pill mx-auto shadow border p-3 mb-5">
                            <h2 class="fw-bold text-center m-0 text-main-color">تعديل بيانتك</h2>
                        </div>
                        <form action="{{route('details-user-update')}}" method="post">
                            @csrf
                            <div class="rounded-5 mx-auto shadow border p-3 pt-0 mb-5">
                                <div class="px-5">
                                    <div class="bg-main-color text-center py-3 rounded-5 rounded-top-0">
                                        <h2 class="fw-bold text-center m-0 text-light">الجنسية والاقامة</h2>
                                    </div>
                                </div>
                                <div class="px-3 my-5">
                                    <select name="nationality"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>نوع الجنسية</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" @if($userDetails)
                                                {{$country->id == $userDetails->nationality ? 'selected' : ''}}
                                                @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <select name="origin"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>الاصل</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" @if($userDetails)
                                                {{$country->id == $userDetails->origin ? 'selected' : ''}}
                                                @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <select id="country" name="country"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>الدولة</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" @if($userDetails)
                                                {{$country->id == $userDetails->country ? 'selected' : ''}}
                                                @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <select id="city" name="city"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        @if($userDetails)
                                            <option value="{{$userDetails->city}}">{{$userDetails->cities->name}}</option>
                                        @else
                                            <option disabled selected>المدينة</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="rounded-5 mx-auto shadow border p-3 pt-0 mb-5">
                                <div class="px-5">
                                    <div class="bg-main-color text-center py-3 rounded-5 rounded-top-0">
                                        <h2 class="fw-bold text-center m-0 text-light">الحالة الاجتماعية</h2>
                                    </div>
                                </div>
                                <div class="px-3 my-5">
                                    <select name="status"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>حالة الحساب</option>
                                        @if(auth()->user()->gender == 'female')
                                            <option value="1" @if($userDetails)
                                                {{$userDetails->status == '1' ? 'selected' : ''}}
                                                @endif>انسة
                                            </option>
                                            <option value="2" @if($userDetails)
                                                {{$userDetails->status == '2' ? 'selected' : ''}}
                                                @endif>مطلقة
                                            </option>
                                            <option value="3" @if($userDetails)
                                                {{$userDetails->status == '3' ? 'selected' : ''}}
                                                @endif>ارملة
                                            </option>
                                        @else
                                            <option value="4" @if($userDetails)
                                                {{$userDetails->status == '4' ? 'selected' : ''}}
                                                @endif>عازب
                                            </option>
                                            <option value="5" @if($userDetails)
                                                {{$userDetails->status == '5' ? 'selected' : ''}}
                                                @endif>مطلق
                                            </option>
                                            <option value="6" @if($userDetails)
                                                {{$userDetails->status == '6' ? 'selected' : ''}}
                                                @endif>ارمل
                                            </option>
                                            <option value="7" @if($userDetails)
                                                {{$userDetails->status == '7' ? 'selected' : ''}}
                                                @endif>متزوج
                                            </option>
                                        @endif
                                    </select>
                                    <select name="searching_for"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>البحث عن</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->searching_for == '1' ? 'selected' : ''}}
                                            @endif>زوجة اولي
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->searching_for == '2' ? 'selected' : ''}}
                                            @endif>زوجة ثانية
                                        </option>
                                    </select>
                                    <select name="age"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>العمر</option>
                                        <option value="18" @if($userDetails)
                                            {{$userDetails->age == '18' ? 'selected' : ''}}
                                            @endif>18
                                        </option>
                                        <option value="19" @if($userDetails)
                                            {{$userDetails->age == '19' ? 'selected' : ''}}
                                            @endif>19
                                        </option>
                                        <option value="20" @if($userDetails)
                                            {{$userDetails->age == '20' ? 'selected' : ''}}
                                            @endif>20
                                        </option>
                                        <option value="21" @if($userDetails)
                                            {{$userDetails->age == '21' ? 'selected' : ''}}
                                            @endif>21
                                        </option>
                                        <option value="22" @if($userDetails)
                                            {{$userDetails->age == '22' ? 'selected' : ''}}
                                            @endif>22
                                        </option>
                                        <option value="23" @if($userDetails)
                                            {{$userDetails->age == '23' ? 'selected' : ''}}
                                            @endif>23
                                        </option>
                                        <option value="24" @if($userDetails)
                                            {{$userDetails->age == '24' ? 'selected' : ''}}
                                            @endif>24
                                        </option>
                                        <option value="25" @if($userDetails)
                                            {{$userDetails->age == '25' ? 'selected' : ''}}
                                            @endif>25
                                        </option>
                                        <option value="26" @if($userDetails)
                                            {{$userDetails->age == '26' ? 'selected' : ''}}
                                            @endif>26
                                        </option>
                                        <option value="27" @if($userDetails)
                                            {{$userDetails->age == '27' ? 'selected' : ''}}
                                            @endif>27
                                        </option>
                                        <option value="28" @if($userDetails)
                                            {{$userDetails->age == '28' ? 'selected' : ''}}
                                            @endif>28
                                        </option>
                                        <option value="29" @if($userDetails)
                                            {{$userDetails->age == '29' ? 'selected' : ''}}
                                            @endif>29
                                        </option>
                                        <option value="30" @if($userDetails)
                                            {{$userDetails->age == '30' ? 'selected' : ''}}
                                            @endif>30
                                        </option>
                                        <option value="31" @if($userDetails)
                                            {{$userDetails->age == '31' ? 'selected' : ''}}
                                            @endif>31
                                        </option>
                                        <option value="32" @if($userDetails)
                                            {{$userDetails->age == '32' ? 'selected' : ''}}
                                            @endif>32
                                        </option>
                                        <option value="32" @if($userDetails)
                                            {{$userDetails->age == '32' ? 'selected' : ''}}
                                            @endif>32
                                        </option>
                                        <option value="33" @if($userDetails)
                                            {{$userDetails->age == '33' ? 'selected' : ''}}
                                            @endif>33
                                        </option>
                                        <option value="34" @if($userDetails)
                                            {{$userDetails->age == '34' ? 'selected' : ''}}
                                            @endif>34
                                        </option>
                                        <option value="35" @if($userDetails)
                                            {{$userDetails->age == '35' ? 'selected' : ''}}
                                            @endif>35
                                        </option>
                                        <option value="36" @if($userDetails)
                                            {{$userDetails->age == '36' ? 'selected' : ''}}
                                            @endif>36
                                        </option>
                                        <option value="37" @if($userDetails)
                                            {{$userDetails->age == '37' ? 'selected' : ''}}
                                            @endif>37
                                        </option>
                                        <option value="38" @if($userDetails)
                                            {{$userDetails->age == '38' ? 'selected' : ''}}
                                            @endif>38
                                        </option>
                                        <option value="39" @if($userDetails)
                                            {{$userDetails->age == '39' ? 'selected' : ''}}
                                            @endif>39
                                        </option>
                                        <option value="40" @if($userDetails)
                                            {{$userDetails->age == '40' ? 'selected' : ''}}
                                            @endif>40
                                        </option>
                                        <option value="41" @if($userDetails)
                                            {{$userDetails->age == '41' ? 'selected' : ''}}
                                            @endif>41
                                        </option>
                                        <option value="42" @if($userDetails)
                                            {{$userDetails->age == '42' ? 'selected' : ''}}
                                            @endif>42
                                        </option>
                                        <option value="43" @if($userDetails)
                                            {{$userDetails->age == '43' ? 'selected' : ''}}
                                            @endif>43
                                        </option>
                                        <option value="44" @if($userDetails)
                                            {{$userDetails->age == '44' ? 'selected' : ''}}
                                            @endif>44
                                        </option>
                                        <option value="45" @if($userDetails)
                                            {{$userDetails->age == '45' ? 'selected' : ''}}
                                            @endif>45
                                        </option>
                                        <option value="46" @if($userDetails)
                                            {{$userDetails->age == '46' ? 'selected' : ''}}
                                            @endif>46
                                        </option>
                                        <option value="47" @if($userDetails)
                                            {{$userDetails->age == '47' ? 'selected' : ''}}
                                            @endif>47
                                        </option>
                                        <option value="48" @if($userDetails)
                                            {{$userDetails->age == '48' ? 'selected' : ''}}
                                            @endif>48
                                        </option>
                                        <option value="49" @if($userDetails)
                                            {{$userDetails->age == '49' ? 'selected' : ''}}
                                            @endif>49
                                        </option>
                                        <option value="50" @if($userDetails)
                                            {{$userDetails->age == '50' ? 'selected' : ''}}
                                            @endif>50
                                        </option>
                                        <option value="51" @if($userDetails)
                                            {{$userDetails->age == '51' ? 'selected' : ''}}
                                            @endif>51
                                        </option>
                                        <option value="52" @if($userDetails)
                                            {{$userDetails->age == '52' ? 'selected' : ''}}
                                            @endif>52
                                        </option>
                                        <option value="53" @if($userDetails)
                                            {{$userDetails->age == '53' ? 'selected' : ''}}
                                            @endif>53
                                        </option>
                                        <option value="54" @if($userDetails)
                                            {{$userDetails->age == '54' ? 'selected' : ''}}
                                            @endif>54
                                        </option>
                                        <option value="55" @if($userDetails)
                                            {{$userDetails->age == '55' ? 'selected' : ''}}
                                            @endif>55
                                        </option>
                                        <option value="56" @if($userDetails)
                                            {{$userDetails->age == '56' ? 'selected' : ''}}
                                            @endif>56
                                        </option>
                                        <option value="57" @if($userDetails)
                                            {{$userDetails->age == '57' ? 'selected' : ''}}
                                            @endif>57
                                        </option>
                                        <option value="58" @if($userDetails)
                                            {{$userDetails->age == '58' ? 'selected' : ''}}
                                            @endif>58
                                        </option>
                                        <option value="59" @if($userDetails)
                                            {{$userDetails->age == '59' ? 'selected' : ''}}
                                            @endif>59
                                        </option>
                                        <option value="60" @if($userDetails)
                                            {{$userDetails->age == '60' ? 'selected' : ''}}
                                            @endif>60
                                        </option>
                                        <option value="61" @if($userDetails)
                                            {{$userDetails->age == '61' ? 'selected' : ''}}
                                            @endif>61
                                        </option>
                                        <option value="62" @if($userDetails)
                                            {{$userDetails->age == '62' ? 'selected' : ''}}
                                            @endif>62
                                        </option>
                                        <option value="63" @if($userDetails)
                                            {{$userDetails->age == '63' ? 'selected' : ''}}
                                            @endif>63
                                        </option>
                                        <option value="64" @if($userDetails)
                                            {{$userDetails->age == '64' ? 'selected' : ''}}
                                            @endif>64
                                        </option>
                                        <option value="65" @if($userDetails)
                                            {{$userDetails->age == '65' ? 'selected' : ''}}
                                            @endif>65
                                        </option>
                                        <option value="66" @if($userDetails)
                                            {{$userDetails->age == '66' ? 'selected' : ''}}
                                            @endif>66
                                        </option>
                                        <option value="67" @if($userDetails)
                                            {{$userDetails->age == '67' ? 'selected' : ''}}
                                            @endif>67
                                        </option>
                                        <option value="68" @if($userDetails)
                                            {{$userDetails->age == '68' ? 'selected' : ''}}
                                            @endif>68
                                        </option>
                                        <option value="69" @if($userDetails)
                                            {{$userDetails->age == '69' ? 'selected' : ''}}
                                            @endif>69
                                        </option>
                                        <option value="70" @if($userDetails)
                                            {{$userDetails->age == '70' ? 'selected' : ''}}
                                            @endif>70
                                        </option>
                                        <option value="71" @if($userDetails)
                                            {{$userDetails->age == '71' ? 'selected' : ''}}
                                            @endif>71
                                        </option>
                                        <option value="72" @if($userDetails)
                                            {{$userDetails->age == '72' ? 'selected' : ''}}
                                            @endif>72
                                        </option>
                                        <option value="73" @if($userDetails)
                                            {{$userDetails->age == '73' ? 'selected' : ''}}
                                            @endif>73
                                        </option>
                                        <option value="74" @if($userDetails)
                                            {{$userDetails->age == '74' ? 'selected' : ''}}
                                            @endif>74
                                        </option>
                                        <option value="75" @if($userDetails)
                                            {{$userDetails->age == '75' ? 'selected' : ''}}
                                            @endif>75
                                        </option>
                                        <option value="76" @if($userDetails)
                                            {{$userDetails->age == '76' ? 'selected' : ''}}
                                            @endif>76
                                        </option>
                                        <option value="77" @if($userDetails)
                                            {{$userDetails->age == '77' ? 'selected' : ''}}
                                            @endif>77
                                        </option>
                                        <option value="78" @if($userDetails)
                                            {{$userDetails->age == '78' ? 'selected' : ''}}
                                            @endif>78
                                        </option>
                                        <option value="79" @if($userDetails)
                                            {{$userDetails->age == '79' ? 'selected' : ''}}
                                            @endif>79
                                        </option>
                                        <option value="80" @if($userDetails)
                                            {{$userDetails->age == '80' ? 'selected' : ''}}
                                            @endif>80
                                        </option>
                                        <option value="81" @if($userDetails)
                                            {{$userDetails->age == '81' ? 'selected' : ''}}
                                            @endif>81
                                        </option>
                                        <option value="82" @if($userDetails)
                                            {{$userDetails->age == '82' ? 'selected' : ''}}
                                            @endif>82
                                        </option>
                                        <option value="83" @if($userDetails)
                                            {{$userDetails->age == '83' ? 'selected' : ''}}
                                            @endif>83
                                        </option>
                                        <option value="84" @if($userDetails)
                                            {{$userDetails->age == '84' ? 'selected' : ''}}
                                            @endif>84
                                        </option>
                                        <option value="85" @if($userDetails)
                                            {{$userDetails->age == '85' ? 'selected' : ''}}
                                            @endif>85
                                        </option>
                                        <option value="86" @if($userDetails)
                                            {{$userDetails->age == '86' ? 'selected' : ''}}
                                            @endif>86
                                        </option>
                                        <option value="87" @if($userDetails)
                                            {{$userDetails->age == '87' ? 'selected' : ''}}
                                            @endif>87
                                        </option>
                                        <option value="88" @if($userDetails)
                                            {{$userDetails->age == '88' ? 'selected' : ''}}
                                            @endif>88
                                        </option>
                                        <option value="89" @if($userDetails)
                                            {{$userDetails->age == '89' ? 'selected' : ''}}
                                            @endif>89
                                        </option>
                                        <option value="90" @if($userDetails)
                                            {{$userDetails->age == '90' ? 'selected' : ''}}
                                            @endif>90
                                        </option>
                                        <option value="91" @if($userDetails)
                                            {{$userDetails->age == '91' ? 'selected' : ''}}
                                            @endif>91
                                        </option>
                                        <option value="92" @if($userDetails)
                                            {{$userDetails->age == '92' ? 'selected' : ''}}
                                            @endif>92
                                        </option>
                                        <option value="93" @if($userDetails)
                                            {{$userDetails->age == '93' ? 'selected' : ''}}
                                            @endif>93
                                        </option>
                                        <option value="94" @if($userDetails)
                                            {{$userDetails->age == '94' ? 'selected' : ''}}
                                            @endif>94
                                        </option>
                                        <option value="95" @if($userDetails)
                                            {{$userDetails->age == '95' ? 'selected' : ''}}
                                            @endif>95
                                        </option>
                                        <option value="96" @if($userDetails)
                                            {{$userDetails->age == '96' ? 'selected' : ''}}
                                            @endif>96
                                        </option>
                                        <option value="97" @if($userDetails)
                                            {{$userDetails->age == '97' ? 'selected' : ''}}
                                            @endif>97
                                        </option>
                                        <option value="98" @if($userDetails)
                                            {{$userDetails->age == '98' ? 'selected' : ''}}
                                            @endif>98
                                        </option>
                                        <option value="99" @if($userDetails)
                                            {{$userDetails->age == '99' ? 'selected' : '' }}
                                            @endif>99
                                        </option>
                                        <option value="100" @if($userDetails)
                                            {{$userDetails->age == '100' ? 'selected' : ''}}
                                            @endif>100
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="rounded-5 mx-auto shadow border p-3 pt-0 mb-5">
                                <div class="px-5">
                                    <div class="bg-main-color text-center py-3 rounded-5 rounded-top-0">
                                        <h2 class="fw-bold text-center m-0 text-light">مظهرك</h2>
                                    </div>
                                </div>
                                <div class="px-3 my-5">
                                    <input type="number" name="weight"
                                           value="{{$userDetails ? $userDetails->weight : ''}}"
                                           class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold"
                                           placeholder="الوزن (كغ)">
                                    <input type="number" name="height"
                                           value="{{$userDetails ? $userDetails->height : ''}}"
                                           class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold"
                                           placeholder="الطول (سم) ">
                                    <select name="skin_colour"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>لون البشرة</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->skin_colour == '1' ? 'selected' : ''}}
                                            @endif>أبيض
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->skin_colour == '2' ? 'selected' : ''}}
                                            @endif>حنطي مائل للبياض
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->skin_colour == '3' ? 'selected' : ''}}
                                            @endif>حنطي مائل للسمار
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->skin_colour == '4' ? 'selected' : ''}}
                                            @endif>اسمر فاتح
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->skin_colour == '5' ? 'selected' : ''}}
                                            @endif>اسمر غامق
                                        </option>
                                        <option value="6" @if($userDetails)
                                            {{$userDetails->skin_colour == '6' ? 'selected' : ''}}
                                            @endif>اسود
                                        </option>
                                    </select>
                                    <select name="physique"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>بنية الجسم</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->physique == '1' ? 'selected' : ''}}
                                            @endif>نحيف/رفيع
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->physique == '2' ? 'selected' : ''}}
                                            @endif>متوسط البنية
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->physique == '3' ? 'selected' : ''}}
                                            @endif>قوام رياضي
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->physique == '4' ? 'selected' : ''}}
                                            @endif>سمين
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->physique == '5' ? 'selected' : ''}}
                                            @endif>ضخم
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="rounded-5 mx-auto shadow border p-3 pt-0 mb-5">
                                <div class="px-5">
                                    <div class="bg-main-color text-center py-3 rounded-5 rounded-top-0">
                                        <h2 class="fw-bold text-center m-0 text-light">الدين</h2>
                                    </div>
                                </div>
                                <div class="px-3 my-5">
                                    <select name="religion"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>ماهو دينك</option>
                                        <option value="1" {{$userDetails ? 'selected' : ''}}>الاسلام</option>
                                    </select>
                                    <select name="religion_commitment"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>الالتزام الديني</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->religion_commitment == '1' ? 'selected' : ''}}
                                            @endif>غير متدين
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->religion_commitment == '2' ? 'selected' : ''}}
                                            @endif>متدين قليلا
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->religion_commitment == '3' ? 'selected' : ''}}
                                            @endif>متدين
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->religion_commitment == '4' ? 'selected' : ''}}
                                            @endif>متدين كثيرا
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->religion_commitment == '5' ? 'selected' : ''}}
                                            @endif>أفضل أن لا أقول
                                        </option>
                                    </select>
                                    <select name="prayer"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>الصلاة</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->prayer == '1' ? 'selected' : ''}}
                                            @endif>أصلي دائما
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->prayer == '2' ? 'selected' : ''}}
                                            @endif>أصلي اغلب الأوقات
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->prayer == '3' ? 'selected' : ''}}
                                            @endif>أصلي بعض الاحيان
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->prayer == '4' ? 'selected' : ''}}
                                            @endif>لا أصلي
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->prayer == '5' ? 'selected' : ''}}
                                            @endif>أفضل أن لا أقول
                                        </option>
                                    </select>
                                    <select name="smoking"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>التدخين</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->smoking == '1' ? 'selected' : ''}}
                                            @endif>نعم
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->smoking == '2' ? 'selected' : ''}}
                                            @endif>لا
                                        </option>
                                    </select>
                                    <select name="beard"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>اللحية</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->beard == '1' ? 'selected' : ''}}
                                            @endif>نعم
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->beard ==  '2' ? 'selected' : ''}}
                                            @endif>لا
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="rounded-5 mx-auto shadow border p-3 pt-0 mb-5">
                                <div class="px-5">
                                    <div class="bg-main-color text-center py-3 rounded-5 rounded-top-0">
                                        <h2 class="fw-bold text-center m-0 text-light">الدراسة والعمل</h2>
                                    </div>
                                </div>
                                <div class="px-3 my-5">
                                    <select name="educational_qualification"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>المؤهل التعليمي</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->educational_qualification ==  '1' ? 'selected' : ''}}
                                            @endif>دراسة اعدادية
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->educational_qualification ==  '2' ? 'selected' : ''}}
                                            @endif>دراسة ثانوية
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->educational_qualification ==  '3' ? 'selected' : ''}}
                                            @endif>دراسة جامعية
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->educational_qualification ==  '4' ? 'selected' : ''}}
                                            @endif>دكتوراه
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->educational_qualification ==  '5' ? 'selected' : ''}}
                                            @endif>دراسة ذاتية
                                        </option>
                                    </select>
                                    <select name="financial_status"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>الوضع المادي</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->financial_status ==  '1' ? 'selected' : ''}}
                                            @endif>فقير
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->financial_status ==  '2' ? 'selected' : ''}}
                                            @endif>قريب من المتوسط
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->financial_status ==  '3' ? 'selected' : ''}}
                                            @endif>متوسط
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->financial_status ==  '4' ? 'selected' : ''}}
                                            @endif>اكثر من المتوسط
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->financial_status ==  '5' ? 'selected' : ''}}
                                            @endif>جيد
                                        </option>
                                        <option value="6" @if($userDetails)
                                            {{$userDetails->financial_status ==  '6' ? 'selected' : ''}}
                                            @endif>ميسور
                                        </option>
                                        <option value="7" @if($userDetails)
                                            {{$userDetails->financial_status ==  '7' ? 'selected' : ''}}
                                            @endif>ثري
                                        </option>
                                    </select>
                                    <select name="employment"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>مجال العمل</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->employment ==  '1' ? 'selected' : ''}}
                                            @endif>بدون عمل حاليا
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->employment ==  '2' ? 'selected' : ''}}
                                            @endif>لا زلت أدرس
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->employment ==  '3' ? 'selected' : ''}}
                                            @endif>سكرتارية
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->employment ==  '4' ? 'selected' : ''}}
                                            @endif>مجال الفن / الأدب
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->employment ==  '5' ? 'selected' : ''}}
                                            @endif>الإدارة
                                        </option>
                                        <option value="6" @if($userDetails)
                                            {{$userDetails->employment ==  '6' ? 'selected' : ''}}
                                            @endif>مجال التجارة
                                        </option>
                                        <option value="7" @if($userDetails)
                                            {{$userDetails->employment ==  '7' ? 'selected' : ''}}
                                            @endif>مجال الأغذية
                                        </option>
                                        <option value="8" @if($userDetails)
                                            {{$userDetails->employment ==  '8' ? 'selected' : ''}}
                                            @endif>مجال الإنشاءات والبناء
                                        </option>
                                        <option value="9" @if($userDetails)
                                            {{$userDetails->employment ==  '9' ? 'selected' : ''}}
                                            @endif>مجال القانون
                                        </option>
                                        <option value="10" @if($userDetails)
                                            {{$userDetails->employment ==  '10' ? 'selected' : ''}}
                                            @endif>مجال الطب
                                        </option>
                                        <option value="11" @if($userDetails)
                                            {{$userDetails->employment ==  '11' ? 'selected' : ''}}
                                            @endif>السياسة / الحكومة
                                        </option>
                                        <option value="12" @if($userDetails)
                                            {{$userDetails->employment ==  '12' ? 'selected' : ''}}
                                            @endif>متقاعد
                                        </option>
                                        <option value="13" @if($userDetails)
                                            {{$userDetails->employment ==  '13' ? 'selected' : ''}}
                                            @endif>التسويق والمبيعات
                                        </option>
                                        <option value="14" @if($userDetails)
                                            {{$userDetails->employment ==  '14' ? 'selected' : ''}}
                                            @endif>صاحب عمل خاص
                                        </option>
                                        <option value="15" @if($userDetails)
                                            {{$userDetails->employment ==  '15' ? 'selected' : ''}}
                                            @endif>مجال التدريس
                                        </option>
                                        <option value="16" @if($userDetails)
                                            {{$userDetails->employment ==  '16' ? 'selected' : ''}}
                                            @endif>مجال الهندسة / العلوم
                                        </option>
                                        <option value="17" @if($userDetails)
                                            {{$userDetails->employment ==  '17' ? 'selected' : ''}}
                                            @endif>مجال النقل
                                        </option>
                                        <option value="18" @if($userDetails)
                                            {{$userDetails->employment ==  '18' ? 'selected' : ''}}
                                            @endif>مجال الكمبيوتر أو المعلومات
                                        </option>
                                        <option value="19" @if($userDetails)
                                            {{$userDetails->employment ==  '19' ? 'selected' : ''}}
                                            @endif>شيء آخر
                                        </option>
                                    </select>
                                    <input type="text" name="job" value="{{$userDetails ? $userDetails->job : ''}}"
                                           class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold"
                                           placeholder="الوظيفة">
                                    <input type="text" name="monthly_income" value="{{$userDetails ? $userDetails->monthly_income : ''}}"
                                           class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold"
                                           placeholder="الدخل الشهري">
                                    <select name="health_status"
                                            class="w-100 p-3 border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">
                                        <option disabled selected>مجال العمل</option>
                                        <option value="1" @if($userDetails)
                                            {{$userDetails->health_status ==  '1' ? 'selected' : ''}}
                                            @endif>بصحة جيدة و الحمد لله
                                        </option>
                                        <option value="2" @if($userDetails)
                                            {{$userDetails->health_status ==  '2' ? 'selected' : ''}}
                                            @endif>اعاقة حركية
                                        </option>
                                        <option value="3" @if($userDetails)
                                            {{$userDetails->health_status ==  '3' ? 'selected' : ''}}
                                            @endif>اعاقة فكرية
                                        </option>
                                        <option value="4" @if($userDetails)
                                            {{$userDetails->health_status ==  '4' ? 'selected' : ''}}
                                            @endif>اكتئاب
                                        </option>
                                        <option value="5" @if($userDetails)
                                            {{$userDetails->health_status ==  '5' ? 'selected' : ''}}
                                            @endif>انحناء وتقـوس
                                        </option>
                                        <option value="6" @if($userDetails)
                                            {{$userDetails->health_status ==  '6' ? 'selected' : ''}}
                                            @endif>انفصام شخصية
                                        </option>
                                        <option value="7" @if($userDetails)
                                            {{$userDetails->health_status ==  '7' ? 'selected' : ''}}
                                            @endif>باطنية
                                        </option>
                                        <option value="8" @if($userDetails)
                                            {{$userDetails->health_status ==  '8' ? 'selected' : ''}}
                                            @endif>برص
                                        </option>
                                        <option value="9" @if($userDetails)
                                            {{$userDetails->health_status ==  '9' ? 'selected' : ''}}
                                            @endif>بصريــة
                                        </option>
                                        <option value="10" @if($userDetails)
                                            {{$userDetails->health_status ==  '10' ? 'selected' : ''}}
                                            @endif>بهاق
                                        </option>
                                        <option value="11" @if($userDetails)
                                            {{$userDetails->health_status ==  '11' ? 'selected' : ''}}
                                            @endif>جلدية
                                        </option>
                                        <option value="12" @if($userDetails)
                                            {{$userDetails->health_status ==  '12' ? 'selected' : ''}}
                                            @endif>حروق مشوهة
                                        </option>
                                        <option value="13" @if($userDetails)
                                            {{$userDetails->health_status ==  '13' ? 'selected' : ''}}
                                            @endif>سكري
                                        </option>
                                        <option value="14" @if($userDetails)
                                            {{$userDetails->health_status ==  '14' ? 'selected' : ''}}
                                            @endif>سمعية
                                        </option>
                                        <option value="15" @if($userDetails)
                                            {{$userDetails->health_status ==  '15' ? 'selected' : ''}}
                                            @endif>الكلام - النطق
                                        </option>
                                        <option value="16" @if($userDetails)
                                            {{$userDetails->health_status ==  '16' ? 'selected' : ''}}
                                            @endif>سمنة مفرطة
                                        </option>
                                        <option value="17" @if($userDetails)
                                            {{$userDetails->health_status ==  '17' ? 'selected' : ''}}
                                            @endif>شلل أطفال
                                        </option>
                                        <option value="18" @if($userDetails)
                                            {{$userDetails->health_status ==  '18' ? 'selected' : ''}}
                                            @endif>شلل رباعي
                                        </option>
                                        <option value="19" @if($userDetails)
                                            {{$userDetails->health_status ==  '19' ? 'selected' : ''}}
                                            @endif>شلل نصفي
                                        </option>
                                        <option value="20" @if($userDetails)
                                            {{$userDetails->health_status ==  '20' ? 'selected' : ''}}
                                            @endif>صدفية
                                        </option>
                                        <option value="21" @if($userDetails)
                                            {{$userDetails->health_status ==  '21' ? 'selected' : ''}}
                                            @endif>صرع
                                        </option>
                                        <option value="22" @if($userDetails)
                                            {{$userDetails->health_status ==  '22' ? 'selected' : ''}}
                                            @endif>عجز جنـسي
                                        </option>
                                        <option value="23" @if($userDetails)
                                            {{$userDetails->health_status ==  '23' ? 'selected' : ''}}
                                            @endif>عقم
                                        </option>
                                        <option value="24" @if($userDetails)
                                            {{$userDetails->health_status ==  '24' ? 'selected' : ''}}
                                            @endif>فقدان طرف أو عضو
                                        </option>
                                        <option value="25" @if($userDetails)
                                            {{$userDetails->health_status ==  '25' ? 'selected' : ''}}
                                            @endif>قزم
                                        </option>
                                        <option value="26" @if($userDetails)
                                            {{$userDetails->health_status ==  '26' ? 'selected' : ''}}
                                            @endif>متلازمة داون
                                        </option>
                                        <option value="27" @if($userDetails)
                                            {{$userDetails->health_status ==  '27' ? 'selected' : ''}}
                                            @endif>نفسية
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="rounded-5 mx-auto shadow border p-3 pt-0 mb-5">
                                <div class="px-5">
                                    <div class="bg-main-color text-center py-3 rounded-5 rounded-top-0">
                                        <h2 class="fw-bold text-center m-0 text-light">مواصفات شريكة حياتك </h2>
                                    </div>
                                </div>
                                <div class="px-3 my-5">
                                    <textarea name="specifications_of_your_life_partner" rows="8"
                                              placeholder="اكتب هنا .........."
                                              class="w-100 p-3 shadow border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">{{$userDetails ? $userDetails->specifications_of_your_life_partner : ''}}</textarea>
                                </div>
                            </div>
                            <div class="rounded-5 mx-auto shadow border p-3 pt-0 mb-5">
                                <div class="px-5">
                                    <div class="bg-main-color text-center py-3 rounded-5 rounded-top-0">
                                        <h2 class="fw-bold text-center m-0 text-light">تحدث عن نفسك</h2>
                                    </div>
                                </div>
                                <div class="px-3 my-5">
                                    <textarea name="talk_about_your_self" rows="8" placeholder="اكتب هنا .........."
                                              class="w-100 p-3 shadow border-bottom border-3 border-0 bg-transparent text-black-50 fw-bold">{{$userDetails ? $userDetails->talk_about_your_self : ''}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="main-btn d-block mx-auto fs-3 fw-bold px-4">
                                @if(auth()->user()->gender == 'male')
                                    البحث عن زوجة الان
                                @else
                                    البحث عن زوج الان
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#country').change(function () {
                $.ajax({
                    url: "{{url('get-cities/')}}" + '/' + $('#country').val(),
                    type: "GET",
                    success: function (res) {
                        $('#city').html('');
                        $('#city').append(`
                                        <option disabled selected>المدينة</option>
                                        `);

                        $.each(res, function (key, val) {
                            $('#city').append(`

                                        <option value="${val.id}">${val.name}</option>

                                        `)
                        })
                    }
                })
            })
        });
    </script>
@endsection
