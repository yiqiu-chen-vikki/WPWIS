@extends('layouts.master')

@section('content')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                   



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                

    
                    <h4 class="card-title">Material Stock Report </h4>


                    <table id="myTable" class="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Supplier</th>
                            <th>Unit</th>
                            <th>Category</th> 
                            <th>Material Name</th>  
                            <th>Stock </th>

                        </thead>


                        <tbody>

                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td> 
                            <td> {{ $item['supplier']['name'] }} </td> 
                            <td> {{ $item['unit']['name'] }} </td> 
                            <td> {{ $item['category']['name'] }} </td> 
                            <td> {{ $item->name }} </td> 
                            <td> {{ $item->quantity }} </td> 


                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>
@endsection
@section('scripts')
    <script type="text/javascript">
   


$(document).ready(function() {
            $.noConflict();
            $('#myTable').DataTable();

});
    </script>
@endsection