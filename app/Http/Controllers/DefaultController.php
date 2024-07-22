<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Material;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\worker;
use App\Models\Category;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function GetCategory(Request $request){

        $supplier_id = $request->supplier_id;
        // dd($supplier_id);
        $allCategory = Material::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        return response()->json($allCategory);
    } // End Mehtod 
    public function GetWorker(Request $request){

        $product_id = $request->product_id; 
        $allWorker = Product::where('product_id',$product_id)->select('worker_id')->get();
        return response()->json($allWorker);
    } // End Mehtod 
    public function GetProduct(Request $request){

        $category_id = $request->category_id; 
        $allProduct = Product::where('category_id',$category_id)->get();
        return response()->json($allProduct);
    } // End Mehtod 
    public function GetMaterial(Request $request){

        $category_id = $request->category_id; 
        $allMaterial = Material::where('category_id',$category_id)->get();
        return response()->json($allMaterial);
    } // End Mehtod 
    public function GetStock(Request $request){
        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        return response()->json($stock);

    } // End Mehtod 
}
