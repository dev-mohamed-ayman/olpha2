
{{-- Sender --}}
<div
    class="head d-flex align-items-center gap-3 ps-3 mt-2">
    <img src="{{asset($user->image)}}" class="rounded-pill border"
         style="height: 45px;width: 45px">
    <div class="bg-primary rounded-start-0 rounded-4 p-2" style="border-top-right-radius: 1rem !important;">
        <h6 class="fw-bold text-light">{{$user->name}}</h6>
        <p class="text-light m-0">
            <small class="">{{$message}}</small>
        </p>
    </div>
</div>
