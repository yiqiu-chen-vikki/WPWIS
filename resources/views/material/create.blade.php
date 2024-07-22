@extends('layouts.master')
@section('title', 'Create | Material')
@section('content')
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$page_title}}</h4>
                    </div>
                    <form action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="quantity" value="0">
                       
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    
                            <div class="form-group">
                                <label>Supplier</label>
                                    <select class="form-control" name="supplier_id" id="supplier_id">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                    </select>
                                
                            </div>
                                @error('supplier_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                            <div class="form-group">
                                <label>Unit</label>
                               
                                    <select class="form-control" name="unit_id" id="unit_id">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                @error('unit_id')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                            <div class="form-group">
                                <label>Category</label>
                            
                                    <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                @error('category_id')
                                   <p class="text-danger">{{$message}}</p>
                                @enderror
                            
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
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