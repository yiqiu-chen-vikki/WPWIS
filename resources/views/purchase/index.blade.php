@extends('layouts.master')
@section('title', 'Purchase')
@section('content')

      
    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $page_title }}</h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <th>Sl</th>
                            <th>Purhase No</th> 
                            <th>Date </th>
                            <th>Supplier</th>
                            <th>Category</th> 
                            <th>Qty</th> 
                            <th>Material Name</th> 
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $purchase->purchase_no }}</td>
                                        <td> {{ date('d-m-Y',strtotime($purchase->date))  }} </td> 
                                        <td> {{ $purchase['supplier']['name'] }} </td> 
                                        <td> {{ $purchase['category']['name']}} </td> 
                                        <td> {{ $purchase->buying_qty }} </td> 
                                        <td> {{ $purchase['material']['name'] }} </td> 
                                        <td> 
                    @if($purchase->status == '0')
                    <span class="btn btn-warning">Pending</span>
                    @elseif($purchase->status == '1')
                    <span class="btn btn-success">Approved</span>
                    @endif
                     </td> 

                <td> 
                 @if($purchase->status == '0')
                        <a href="{{ route('purchase.destroy',$purchase->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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


$(document).ready(function() {
    $.noConflict();
            $('#myTable').DataTable();

});
    </script>
@endsection