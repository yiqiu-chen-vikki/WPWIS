<?php

namespace App\Http\Controllers;
use App\Models\worker;
use Illuminate\Http\Request;

class workerController extends Controller
{
    public function index()
    {
        $workers = worker::all();
        $page_title = 'Workers Info';
       
        return view('worker.index', compact('workers', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Worker';
        return view('worker.create',compact('page_title'));
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
            'job_title' => 'required',
            'phone' => 'required|numeric|unique:workers,phone',
           
        ]);

        $image = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = date('YmdHis'). '.' . $request->file('image')->extension();
           // Image::make($request->file('image'))->save(public_path('/uploads/supplier/').$image);
           $file->move(public_path('/uploads/worker/'),$image);
        }

       worker::create([
            'name' => $request->name,
            'image' => $image ? $image:'',
            'job_title' => $request->job_title,
            'phone' => $request->phone,
            
        ]);

       // if ($request->status == 1) {
           // return redirect()->route('supplier.index');
       // }

        return redirect()->route('worker.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker= worker::findOrFail($id);
        $page_title = 'Edit Worker';
        return view('worker.edit', compact('worker','page_title'));
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
        $worker= worker::findOrFail($id); //find data with id

        if ($request->job_title !=  $worker->job_title) {
            $request->validate([
                'job_title' => 'required',
            ]);
        }

        if ($request->phone !=  $worker->phone) {
            $request->validate([
                'phone' => 'required|numeric|unique:workers,phone',
            ]);
        }
        $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'job_title' => 'required',
            'phone' => 'required|numeric',
           
        ]);

        $image = '';
        if ($request->hasFile('image')) {
            $path = public_path('/uploads/worker/').$worker->image;
            if (file_exists($path)) {
                unlink($path);
            }

            $file = $request->file('image');
            $image = date('YmdHis'). '.' . $request->file('image')->extension();
           // Image::make($request->file('image'))->save(public_path('/uploads/supplier/').$image);
           $file->move(public_path('/uploads/worker/'),$image);
        }

        $worker->update([
            'name' => $request->name,
            'image' => $image ?:$worker->image,
            'job_title' => $request->job_title,
            'phone' => $request->phone,
           
        ]);

        
            return redirect()->route('worker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker= worker::findOrFail($id);

        $path = public_path('/uploads/worker/').$worker ->image;
        if (file_exists($path)) {
            unlink($path);
        }

        $worker->delete();

        return back();
    }
}
