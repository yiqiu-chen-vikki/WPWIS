<?php

namespace App\Http\Controllers;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Production;
use App\Models\Material;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $allProduct = Product::all();
        $allMaterial= Material::all();
        $allPurchase= Purchase::all();
        $allProduct = Product::all();
        $allInvoices= Payment::all();
        $productCount = Product::all()->count();
        $purchaseCount = Purchase::wheredate('created_at', Carbon::today())->sum('buying_price');
        $purchasePending = Purchase::where('status',0)->wheredate('created_at', Carbon::today())->count();
        $purchaseApprovaled = Purchase::where('status',1)->wheredate('created_at', Carbon::today())->count();
        $purchaseTotal = Purchase::wheredate('created_at', Carbon::today())->count();
        $productionPending = Production::where('status',0)->count();
        $productionApprovaled = Production::where('status',1)->count();
        $productionCount = Production::all()->count();
        $invoiceCount = InvoiceDetail::wheredate('created_at', Carbon::today())->sum('selling_price');
        return view('home', compact(  'allPurchase','allMaterial','allProduct','allInvoices','productCount','purchaseCount', 'invoiceCount','purchasePending','purchaseApprovaled','purchaseTotal','productionPending','productionApprovaled','productionCount'));
      
    }

  

   
}
