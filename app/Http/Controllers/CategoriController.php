<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.list',[
            'data' => category::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $validate['slug'] = str_replace(' ', '-', $validate['name']);
        
        category::create($validate);
        return redirect()->back()->with('success','Berhasil manambahkan kategori baru');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $validate['slug'] = str_replace(' ', '-', $validate['name']);

        category::where('id',$id)->update($validate);

        return redirect()->back()->with('success','Berhasil manambahkan kategori baru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        category::where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus kategori');
    }
}
