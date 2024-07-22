@extends('layouts.master')
@section('title', ' Edit | Product')
@section('content')
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$page_title}}</h4>
                    </div>
                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="quantity" value="0">
                        <input type="hidden" name="status" value="1">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Product Image</label>
                                <input class="dropify" type="file" name="image" id="image" class="form-control" data-default-file="{{ url('/uploads/product/' . $product->image) }}">
                            </div>
                            @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                           
                
                            <div class="form-group">
                                <label>Unit</label>
                               
                                    <select class="form-control" name="unit_id" id="unit_id">
                                    <option selected="">Open this select menu</option>
                                @foreach($units as $unit)
                                <option value="{{$unit->id }}" {{$unit->id == $product->unit_id ? 'selected' : '' }}   >{{ $unit->name }}</option>
                                @endforeach
                                </select>
                            </div>
                                @error('unit_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                            <div class="form-group">
                                <label>Category</label>
                            
                            <select class="form-control" name="category_id" id="category_id">
                                <option selected="">Open this select menu</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id }}" {{$category->id == $product->category_id ? 'selected' : '' }}   >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                                @error('category_id')
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
            $.noConflict();
        $('.dropify').dropify();
    </script>
@endsection