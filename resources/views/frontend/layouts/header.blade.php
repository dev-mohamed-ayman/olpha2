<header>
    <nav class="navbar navbar-expand-lg py-0 py-lg-2">
        <div class="container">
            <button style="outline: none" class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target=".navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand d-block text-center mb-3 mb-lg-0" href="#">
                <img src="{{asset('frontend/images/logo.png')}}" class="logo" alt=""/>
            </a>
            <div class="collapse navbar-collapse navbarSupportedContent" id="navbarSupportedContent">
                <form class="d-flex mx-auto form-search px-3 mb-3 mb-lg-0" role="search">
                    <div class="div-search border rounded-pill">
                        <input class="input-search rounded-end-pill rounded-start-pill border-0 ps-3 py-2 w-100"
                               type="search" placeholder="ما الذي تبحث عنه ...... ؟" aria-label="Search"/>
                        <button
                                class="btn-search h-100 px-4 rounded-end-pill border-0 bg-transparent border-start rounded-start"
                                type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="navbar-nav d-flex align-items-center justify-content-center gap-3">
                    @auth()
                        <a href="{{route('profile.index')}}"
                           class="profile-image d-flex align-items-center justify-content-center">
                            @if(auth('web')->user()->image)
                                <img src="{{asset(auth('web')->user()->image)}}" alt=""
                                     class="rounded-circle w-100 h-100 object-fit-contain">
                            @else
                                <i class="fa fa-user fs-4"></i>
                            @endif
                        </a>
                        @php
                            $points = \App\Models\UserPoint::query()->where('user_id', auth()->user()->id);
                            $total = $points->sum('amount') - $points->sum('expense')
                        @endphp
                        <a href="{{route('point.index')}}"
                           class="register-btn text-decoration-none">نقاطي {{$total}}</a>
                        <a href="{{route('notifications')}}" id="login-btn" class="main-btn text-decoration-none">الاشعارات</a>
                    @else
                        <a href="#">
                            <img src="">
                        </a>
                        <a href="{{route('login')}}" type="button" id="login-btn" class="main-btn text-decoration-none">تسجيل
                            الدخول</a>
                        <a href="{{route('register')}}" type="button" id="register-btn"
                           class="register-btn text-decoration-none">أنشاء حساب</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <nav class="nav-bottom py-3 shadow navbarSupportedContent collapse d-lg-block">
        <div class="container">
            <ul class="flex-column flex-lg-row p-0">
                <li class="{{setSidebarActive(['home'])}}">
                    <a href="{{route('home')}}">الرئيسية</a>
                </li>
                <li class="{{setSidebarActive(['success-story.*'])}}">
                    <a href="{{route('success-story.index')}}">قصص النجاح</a>
                </li>
                <li class="{{setSidebarActive(['package.*'])}}">
                    <a href="{{route('package.index')}}">التميز</a>
                </li>
                <li class="{{setSidebarActive(['profile.images'])}}">
                    <a href="{{route('images')}}">صور الاعضاء</a>
                </li>
                <li class="{{setSidebarActive(['chat.users'])}}">
                    <a href="{{route('chat.users')}}">الرسائل</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
