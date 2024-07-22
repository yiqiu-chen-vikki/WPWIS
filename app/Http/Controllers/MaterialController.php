<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Material;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        $page_title = 'Material';

        return view('material.index', compact('materials', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $units =Unit::all();
        $categories = Category::all();
        $page_title = 'Create Material';
        return view('material.create', compact('suppliers','units', 'categories', 'page_title'));
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
    
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required'
            
            
        ]);

    

        Material::create([
            'name' => $request->name,
    
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'supplier_id' => $request->supplier_id,
            
            'quantity' => $request->quantity,
            
        ]);

       
            return redirect()->route('material.index');
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
        $material = Material::findOrFail($id);
        $suppliers = Supplier::all();
        $categories = Category::all();
        $units =Unit::all();
        $page_title = 'Edit Material';
        return view('material.edit', compact('material', 'suppliers', 'units','categories', 'page_title'));
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
        $material = Material::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
         
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required'
            
        ]);

       

        $material->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
        
           
          
        ]);

        return redirect()->route('material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
   
        $material->delete();

        return back();
    }
}
