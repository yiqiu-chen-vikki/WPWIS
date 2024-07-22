<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\worker;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $page_title = 'Product';

        return view('product.index', compact('products', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $units =Unit::all();
        $categories = Category::all();
        $page_title = 'Create Product';
        return view('product.create', compact('units', 'categories', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
           
            'unit_id' => 'required',
            'category_id' => 'required'
            
            
        ]);

        $image = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = date('YmdHis'). '.' . $request->file('image')->extension();
           // Image::make($request->file('image'))->save(public_path('/uploads/worker/').$image);
           $file->move(public_path('/uploads/product/'),$image);
        }

        Product::create([
            'name' => $request->name,
            'image' => $image,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
         
            
            'quantity' => $request->quantity,
            'status' => $request->status
        ]);

       
            return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
    
        $categories = Category::all();
        $units =Unit::all();
        $page_title = 'Edit Product';
        return view('product.edit', compact('product',  'units','categories', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png',
            'worker_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required'
            
        ]);

        $image = '';
        if ($request->hasFile('image')) {
            $path = public_path('/uploads/product/').$product->image;
            if (file_exists($path)) {
                unlink($path);
            }

            $file = $request->file('image');
            $image = date('YmdHis'). '.' . $request->file('image')->extension();
    
           $file->move(public_path('/uploads/product/'),$image);
        }

        $product->update([
            'name' => $request->name,
            'image' => $image ?:$product->image,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'status' => $request->status,
           
          
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $path = public_path('/uploads/product/').$product->image;

        if (file_exists($path)) {
            unlink($path);
        }

        $product->delete();

        return back();
    }
}
