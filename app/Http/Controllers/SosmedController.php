<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sosmed;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sosmed.list',[
            'sosmeds' => sosmed::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sosmed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        sosmed::create($validate);
        return redirect()->back()->with('success','Berhasil menambahkan media sosial');
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
        return view('admin.sosmed.edit',[
            'sosmed'  => sosmed::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        sosmed::where('id',$id)->update($validate);
        return redirect()->back()->with('success','Berhasil mengubah media sosial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        sosmed::where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil mengahapus media sosial');
    }
}
