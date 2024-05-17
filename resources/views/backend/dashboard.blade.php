@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row separate-row">
                <div class="col-sm-6">
                    <div class="job-icon pb-4 d-flex justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-1">
                                <h2 class="mb-0 lh-1">342</h2>
                                <span class="text-success ms-3">+0.5 %</span>
                            </div>
                            <span class="fs-14 d-block mb-2">Interview Schedules</span>
                        </div>
                        <div id="NewCustomers"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="job-icon pb-4 pt-4 pt-sm-0 d-flex justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-1">
                                <h2 class="mb-0 lh-1">984</h2>
                            </div>
                            <span class="fs-14 d-block mb-2">Application Sent</span>
                        </div>
                        <div id="NewCustomers1"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="job-icon pt-4 pb-sm-0 pb-4 pe-3 d-flex justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-1">
                                <h2 class="mb-0 lh-1">1,567k</h2>
                                <span class="text-danger ms-3">-2 % </span>
                            </div>
                            <span class="fs-14 d-block mb-2">Profile Viewed</span>
                        </div>
                        <div id="NewCustomers2"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="job-icon pt-4  d-flex justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-1">
                                <h2 class="mb-0 lh-1">437</h2>
                            </div>
                            <span class="fs-14 d-block mb-2">Unread Messages</span>
                        </div>
                        <div id="NewCustomers3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
