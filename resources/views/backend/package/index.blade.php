@extends('backend.layouts.master')
@section('title', 'Cities')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".create" class="btn btn-primary">Create
                New Package</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Months</th>
                        <th>Price</th>
                        <th>Country</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($packages as $package)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{$package->title}}</td>
                            <td>{{$package->months}}</td>
                            <td>{{$package->price}}</td>
                            <td>{{$package->country->name}}</td>
                            <td class="text-center">
                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                   data-bs-target=".edit{{$package->id}}"
                                   class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('dashboard.package.destroy', $package->id)}}"
                                   class="btn btn-sm btn-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Edit-->
                        <div class="modal fade edit{{$package->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <form action="{{route('dashboard.package.update', $package->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label font-w600">Package Name<span
                                                                class="text-danger scale5 ms-2">*</span></label>
                                                    <input type="text" name="title" value="{{$package->title}}"
                                                           class="form-control solid" placeholder="Package Name">
                                                </div>
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label font-w600">Months<span
                                                                class="text-danger scale5 ms-2">*</span></label>
                                                    <input type="number" name="months" value="{{$package->months}}"
                                                           class="form-control solid" placeholder="Months">
                                                </div>
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label font-w600">Price<span
                                                                class="text-danger scale5 ms-2">*</span></label>
                                                    <input type="number" name="price" value="{{$package->price}}"
                                                           class="form-control solid" placeholder="Price">
                                                </div>
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label font-w600">Country<span
                                                                class="text-danger scale5 ms-2">*</span></label>
                                                    <select name="country"
                                                            class="nice-select default-select wide form-control solid">
                                                        <option>Select...</option>
                                                        @foreach($countries as $country)
                                                            <option
                                                                    value="{{$country->id}}" {{$country->id == $package->country_id ? 'selected' : ''}}>{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
                {{$packages->links()}}
            </div>
        </div>
    </div>
    <!-- Modal Create-->
    <div class="modal fade create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New City</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('dashboard.package.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Package Name<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="title" class="form-control solid" placeholder="Package Name">
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Months<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                <input type="number" name="months" class="form-control solid" placeholder="Months">
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Price<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                <input type="number" name="price" class="form-control solid" placeholder="Price">
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Country<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                <select name="country"
                                        class="nice-select default-select wide form-control solid">
                                    <option>Select...</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
