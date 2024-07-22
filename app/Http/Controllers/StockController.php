<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Material;
use App\Models\Unit;
use Illuminate\Support\Carbon;
class StockController extends Controller
{
    public function ProductReport(){

        $allData = Product::orderBy('category_id','asc')->get();
        return view('stock.product_report',compact('allData'));
    
    }
    public function MaterialReport(){

        $allData = Material::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('stock.material_report',compact('allData'));
    
    }
    //public function StockReportPdf(){

      //  $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
       // return view('pdf.stock_report_pdf',compact('allData'));

   // } // End
}
