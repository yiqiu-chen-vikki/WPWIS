<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Material;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();;
        $page_title = 'All Purchases';
       
        return view('purchase.index', compact('purchases', 'page_title'));
    }
    public function create()
    {
        $suppliers = Supplier::all();
        $units =Unit::all();
        $categories = Category::all();
        $materials=Material::all();
        $page_title = 'Create Purchase';
        return view('purchase.create', compact('suppliers','units', 'categories','materials', 'page_title'));
    }
    public function store(Request $request)
    {
        if ($request->category_id == null) {

            $notification = array(
             'message' => 'Sorry you do not select any item', 
             'alert-type' => 'error'
         );
         return redirect()->back( )->with($notification);
         } else {
     
             $count_category = count($request->category_id);
             for ($i=0; $i < $count_category; $i++) { 
                 $purchase = new Purchase();
                 $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                 $purchase->purchase_no = $request->purchase_no[$i];
                 $purchase->supplier_id = $request->supplier_id[$i];
                 $purchase->category_id = $request->category_id[$i];
     
                 $purchase->material_id = $request->material_id[$i];
                 $purchase->buying_qty = $request->buying_qty[$i];
                 $purchase->unit_price = $request->unit_price[$i];
                 $purchase->buying_price = $request->buying_price[$i];
                 $purchase->description = $request->description[$i];
     
                 //$purchase->created_by = Auth::user()->id;
                 $purchase->status = '0';
                 $purchase->save();
             } // end foreach
         } // end else 
     
         $notification = array(
             'message' => 'Data Save Successfully', 
             'alert-type' => 'success'
         );
         return redirect()->route('purchase.index'); 
      
    }
    public function destroy($id){
        $purchase= Purchase::findOrFail($id);
        $notification = array(
            'message' => 'Purchase Iteam Deleted Successfully', 
            'alert-type' => 'success'
        );
        $purchase->delete();

        return redirect()->back()->with($notification); 

    }
    public function show($id)
    {
        //
    }
    public function PurchasePending(){

        $purchases = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('purchase.purchase_pending',compact('purchases'));
    }// End Method 
    public function PurchaseApprove($id){

        $purchase = Purchase::findOrFail($id);
        $material = Material::where('id',$purchase->material_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($material->quantity));
        $material->quantity = $purchase_qty;

        if($material->save()){

            Purchase::findOrFail($id)->update([
                'status' => '1',
            ]);

             $notification = array(
         'message' => 'Status Approved Successfully', 
          'alert-type' => 'success'
          );
    return redirect()->route('purchase.index')->with($notification); 

        }

    }// End Method 
}
