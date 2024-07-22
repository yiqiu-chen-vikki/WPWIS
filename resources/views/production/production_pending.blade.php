@extends('layouts.master')
@section('title', 'Production')
@section('content')

      
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Production All Pending Data</h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <th>Sl</t>
                            <th>Production No</th> 
                            <th>Date </th>
                            <th>Worker</th>
                            <th>Material Used</th> 
                            <th>Used Qty</th> 
                            <th>Product Name</th> 
                            <th>Qty Produced</th> 
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach ($productions as $production)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $production->production_no }}</td>
                                        <td> {{ date('d-m-Y',strtotime($production->date))  }} </td> 
                                        <td> {{ $production['worker']['name'] }} </td> 
                                        <td> {{ $production['material']['name']}} </td> 
                                        <td> {{ $production->used_qty }} </td> 
                                        <td> {{ $production['product']['name'] }} </td> 
                                        <td> {{ $production->qty_produced}} </td> 
                                        <td>
                           @if($production->status == '0')
                             <span class="btn btn-warning">Assigned</span>
                              @elseif($production->status == '1')
                              <span class="btn btn-success">Completed</span>
                           @endif
                     </td> 

                <td> 
                 @if($production->status == '0')
                        <a href="{{route('production.approve',$production->id)}}" class="btn btn-danger sm" title="Approved" id="ApproveBtn">  <i class="fas  fa-check-circle"></i> </a>
                 @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteModal" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
    $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });

  $(function(){
    $(document).on('click','#ApproveBtn',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Approve This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Approve it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Approved!',
                        'Your file has been Approved.',
                        'success'
                      )
                    }
                  }) 


    });

  });
$(document).ready(function() {
    $.noConflict();
            $('#myTable').DataTable();

});
    </script>
@endsection