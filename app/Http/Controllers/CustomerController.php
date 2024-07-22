<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $page_title = 'Customers Info';
       
        return view('customer.index', compact('customers', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Customer';
        return view('customer.create',compact('page_title'));
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
            'email' => 'required|unique:customers,email',
            'phone' => 'required|numeric|unique:customers,phone',
            'address' => 'required',
        ]);

        $image = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = date('YmdHis'). '.' . $request->file('image')->extension();
           // Image::make($request->file('image'))->save(public_path('/uploads/supplier/').$image);
           $file->move(public_path('/uploads/customer/'),$image);
        }

       Customer::create([
            'name' => $request->name,
            'image' => $image ? $image:'',
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status
        ]);

       // if ($request->status == 1) {
           // return redirect()->route('supplier.index');
       // }

        return redirect()->route('customer.index');
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
        $customer = Customer::findOrFail($id);
        $page_title = 'Edit Customer';
        return view('customer.edit', compact('customer','page_title'));
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
        $customer = Customer::findOrFail($id); //find data with id

        if ($request->email != $customer->email) {
            $request->validate([
                'email' => 'required|unique:customers,email'
            ]);
        }

        if ($request->phone != $customer->phone) {
            $request->validate([
                'phone' => 'required|numeric|unique:customers,phone',
            ]);
        }
        $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $image = '';
        if ($request->hasFile('image')) {
            $path = public_path('/uploads/customer/').$customer->image;
            if (file_exists($path)) {
                unlink($path);
            }

            $file = $request->file('image');
            $image = date('YmdHis'). '.' . $request->file('image')->extension();
           // Image::make($request->file('image'))->save(public_path('/uploads/supplier/').$image);
           $file->move(public_path('/uploads/customer/'),$image);
        }

        $customer->update([
            'name' => $request->name,
            'image' => $image ?:$customer->image,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
           // 'status' => $request->status,
        ]);

        //if ($request->status == 1) {
            return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        $path = public_path('/uploads/customer/').$customer ->image;
        if (file_exists($path)) {
            unlink($path);
        }

        $customer->delete();

        return back();
    }
}
