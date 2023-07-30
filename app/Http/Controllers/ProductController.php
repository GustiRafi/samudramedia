<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.produk.list',[
            'produks' => product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
        ]);

        $validate['slug'] = str_replace(' ', '-', $validate['name']);
        $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('products', $fileName, 'public');
        $validate['image'] = $fileName;

        product::create($validate);
        return redirect()->back()->with('success','Berhasil menambahkan produk baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.produk.edit',[
            'produk' => product::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
        ]);

        $validate['slug'] = str_replace(' ', '-', $validate['name']);

        $product = product::find($id);

        if($request->file('image')){
            File::delete(public_path('/storage/products/'.$product->image));
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('products', $fileName, 'public');
            $validate['image'] = $fileName;
        }

        product::where('id',$id)->update($validate);
        return redirect()->back()->with('success','Berhasil mengubah produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::find($id);
        File::delete(public_path('/storage/products/'.$product->image));
        product::where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus product');
    }
}
