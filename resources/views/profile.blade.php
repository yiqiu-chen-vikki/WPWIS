@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Profile</h4>
                    </div>
                  
                
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <p>{{$name}}</p>
                            </div>
                          
                            <div class="form-group">
                                <label>Email</label>
                               <p>{{$email}}</p>
                            </div>
                          
                           
                        </div>
                  
                </div>
            </div>
        </div>
    </div>

    

@endsection
