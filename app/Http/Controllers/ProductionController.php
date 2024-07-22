<?php

namespace App\Http\Controllers;
use App\Models\Production;
use App\Models\Product;
use App\Models\Material;
use App\Models\worker;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::orderBy('date','desc')->orderBy('id','desc')->get();;
        $page_title = 'All Productions';
       
        return view('production.index', compact('productions', 'page_title'));
    }
    public function create()
    {   
        $workers =worker::all();
        $materials=Material::all();
        $products = Product::all(); 
        $page_title = 'Create Production';
        return view('production.create', compact('workers', 'products','materials', 'page_title'));
    }
    public function store(Request $request)
    {
        if ($request->product_id == null) {

            $notification = array(
             'message' => 'Sorry you do not select any item', 
             'alert-type' => 'error'
         );
         return redirect()->back( )->with($notification);
         } else {
     
             $count_product= count($request->product_id);
             for ($i=0; $i < $count_product; $i++) { 
                 $production = new Production();
                 $production->date = date('Y-m-d', strtotime($request->date[$i]));
                 $production->production_no = $request->production_no[$i];
                 $production->worker_id = $request->worker_id[$i];
    
                 $production->material_id = $request->material_id[$i];
                 $production->used_qty = $request->used_qty[$i];
                 $production->product_id= $request->product_id[$i];
                 $production->qty_produced= $request->qty_produced[$i];
                 $production->description = $request->description[$i];
     
                 //$production->created_by = Auth::user()->id;
                 $production->status = '0';
                 $production->save();
             } // end foreach
         } // end else 
     
         $notification = array(
             'message' => 'Data Save Successfully', 
             'alert-type' => 'success'
         );
         return redirect()->route('production.index'); 
      
    }
    public function destroy($id){
        $production= Production::findOrFail($id);
        $notification = array(
            'message' => 'Production Iteam Deleted Successfully', 
            'alert-type' => 'success'
        );
        $production->delete();

        return redirect()->back()->with($notification); 

    }
    public function show($id)
    {
        //
    }
    public function ProductionPending(){

        $productions = Production::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('production.production_pending',compact('productions'));
    }// End Method 
    public function ProductionApprove($id){

        $production = Production::findOrFail($id);
        $material = Material::where('id',$production->material_id)->first();
        $production_qty = ((float)($material->quantity))-((float)($production->used_qty));
        $material->quantity = $production_qty;
        $product = Product::where('id',$production->product_id)->first();
        $prod_qty =((float)($product->quantity))+ ((float)($production->qty_produced));
        $product->quantity = $prod_qty;
        if($material->save() && $product->save()){

            Production::findOrFail($id)->update([
                'status' => '1',
            ]);

             $notification = array(
         'message' => 'Status Approved Successfully', 
          'alert-type' => 'success'
          );
    return redirect()->route('production.index')->with($notification); 

        }

    }// End Method 
}
