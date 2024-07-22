@extends('layouts.master')
@section('title', ' Edit | Customer')
@section('content')
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$page_title}}</h4>
                    </div>
                    <form action="{{ route('customer.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="1">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$customer->name}}">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Customer Image</label>
                                <input class="dropify" type="file" name="image" id="image" class="form-control" data-default-file="{{ url('/uploads/customer/' . $customer->image) }}" >
                            </div>
                            @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="email" id="email" class="form-control phone-number" value="{{$customer->email}}">
                                </div>
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="phone" id="phone" class="form-control phone-number" value="{{$customer->phone}}">
                                </div>
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-home"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="address" id="address" class="form-control phone-number" value="{{$customer->address}}">
                                </div>
                                @error('address')
                                   <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $.noConflict();
        $('.dropify').dropify();
    </script>
@endsection