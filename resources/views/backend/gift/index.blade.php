@extends('backend.layouts.master')
@section('title', 'Cities')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".create" class="btn btn-primary">Create
                New Gift</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gifts as $gift)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td><img src="{{asset($gift->image)}}" style="width: 60px; height: 60px;"></td>
                            <td>{{$gift->price}}</td>
                            <td class="text-center">
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target=".edit{{$gift->id}}"
                                   class="btn btn-sm btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('dashboard.gift.destroy', $gift->id)}}"
                                   class="btn btn-sm btn-danger delete-btn">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Edit-->
                        <div class="modal fade edit{{$gift->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Gift</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <form action="{{route('dashboard.gift.update', $gift->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <div
                                                            class="avatar-upload d-flex align-items-center justify-content-center">
                                                        <div class="position-relative ">
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview">
                                                                    <img src="{{asset($gift->image)}}"
                                                                         class="w-100 h-100 object-fit-contain" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="change-btn d-flex align-items-center flex-wrap">
                                                                <input type='file' name="image"
                                                                       class="form-control d-none" id="imageUpload"
                                                                       accept="image/*">
                                                                <label for="imageUpload" class="btn btn-light ms-0">Select
                                                                    Image</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6  col-md-6 mb-4">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" name="price" value="{{$gift->price}}"
                                                           class="form-control"
                                                           placeholder="Price">
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
                {{$gifts->links()}}
            </div>
        </div>
    </div>
    <!-- Modal Create-->
    <div class="modal fade create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Gift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{route('dashboard.gift.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <div class="avatar-upload d-flex align-items-center justify-content-center">
                                    <div class="position-relative ">
                                        <div class="avatar-preview">
                                            <div id="imagePreview">
                                            </div>
                                        </div>
                                        <div class="change-btn d-flex align-items-center flex-wrap">
                                            <input type='file' name="image" class="form-control d-none" id="imageUpload"
                                                   accept="image/*">
                                            <label for="imageUpload" class="btn btn-light ms-0">Select
                                                Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price">
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
@section('scripts')
    <script>
        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                        $('#imagePreview img').css('display', 'none')
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imageUpload").on('change', function () {

                readURL(this);
            });
            $('.remove-img').on('click', function () {
                var imageUrl = "images/no-img-avatar.png";
                $('.avatar-preview, #imagePreview').removeAttr('style');
                $('#imagePreview').css('background-image', 'url(' + imageUrl + ')');
            });
        })
    </script>
@endsection
