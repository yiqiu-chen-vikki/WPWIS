@extends('layouts.master')
@section('title', ' Edit | Category')
@section('content')
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$page_title}}</h4>
                    </div>
                    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="1">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                          
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
        $('.dropify').dropify();
    </script>
@endsection