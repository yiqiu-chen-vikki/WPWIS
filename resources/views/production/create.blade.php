@extends('layouts.master')
@section('title', 'Create | Production')
@section('content')
    <div class="section-body">

        <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4>{{ $page_title }}</h4>
            </div>
        
        
        <div class="card-body">
         <div class="row">
         <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Date</label>
                 <input class="form-control example-date-input" name="date" type="date"  id="date">
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Production No</label>
                 <input class="form-control t" name="production_no" type="text"  id="production_no">
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Material Name </label>
                <select name="material_id" id="material_id" class="form-control select2" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach ($materials as $material)
                                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Product Name </label>
                <select name="product_id" id="product_id" class="form-control select2" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-3">
           
                <label for="example-text-input" class="form-label">Worker Name </label>
                <select id="worker_id" name="worker_id" class="form-control select2"  aria-label="Default select example">
                <option selected="">Open this select menu</option>
                @foreach ($workers as $worker)
                                        <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
                </select>
          
        </div>
</div>


    




        <div class="col-md-4">
    <div class="md-3">
        <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>


        <i class="btn btn-primary fas fa-plus-circle addeventmore"> Add More</i>
    </div>
</div>





    </div> <!-- // end row  -->
 </div> <!-- End card-body -->
 <div class="card-body">
 <form action="{{ route('production.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
            <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                <thead>
                    <tr>
                       
                        <th>Material Name </th>
                        <th>Used Qty</th>
                        <th>Product Name </th>
                        <th>Worker</th>
                        <th>Produced Qty</th>
                        <th>Description</th>
                        <th>Action</th> 

                    </tr>
                </thead>

                <tbody id="addRow" class="addRow">

                </tbody>

                <!-- <tbody>
                    <tr>
                        <td colspan="5"></td>
                        <td>
                            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;" >
                        </td>
                        <td></td>
                    </tr>

                </tbody>   -->            
            </table><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="storeButton"> Production Submit</button>

            </div>

        </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script id="document-template" type="text/x-handlebars-template">

<tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="production_no[]" value="@{{production_no}}">
        <td>
        <input type="hidden" name="material_id[]" value="@{{material_id}}">
        @{{ material_name }}
    </td>
    <td>
        <input type="number" min="1" class="form-control used_qty text-right" name="used_qty[]" value=""> 
    </td>
        <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>
        <td> <input type="hidden" name="worker_id[]" value="@{{worker_id}}">
        @{{ worker_name }}
</td> 
    
    


    

     <td>
        <input type="number" min="1" class="form-control qty_produced text-right" name="qty_produced[]" value=""> 
    </td>


 <td>
        <input type="text" class="form-control" name="description[]"> 
    </td>


     <td>
        <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
    </td>

    </tr>

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".addeventmore", function(){
            var date = $('#date').val();
            var production_no = $('#production_no').val();
            var material_id  = $('#material_id').val();
            var material_name = $('#material_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            var worker_id = $('#worker_id').val();
            var worker_name = $('#worker_id').find('option:selected').text();
            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(production_no == ''){
                $.notify("Production No is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(worker_id == ''){
                $.notify("worker is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(material_id == ''){
                $.notify("materail is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(product_id == ''){
                $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                 var source = $("#document-template").html();
                 var tamplate = Handlebars.compile(source);
                 var data = {
                    date:date,
                    production_no:production_no,
                    material_id:material_id,
                    material_name:material_name,
                    product_id:product_id,
                    product_name:product_name,
                    worker_id:worker_id,
                    worker_name:worker_name,
                 };
                 var html = tamplate(data);
                 $("#addRow").append(html); 
        });
        $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_add_more_item").remove();
        });
       
       
    });
</script>
<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('get-worker') }}",
                type: "GET",
                data:{product_id:product_id},
                success:function(data){
                    var html = '<option value="">Select Worker</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.worker_id+' "> '+v.worker.name+'</option>';
                    });
                    $('#worker_id').html(html);
                }
            })
        });
    });
</script>

@endsection