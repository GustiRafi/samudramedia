<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.list',[
            'services' => service::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'headline' => 'required',
            'deskripsi' => 'required'
        ]);

        $validate['slug'] = str_replace(' ', '-', $validate['name']);
        $imageName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('services', $imageName, 'public');
        $validate['image'] = $imageName;

        service::create($validate);
        return redirect()->back()->with('success','Berhasil menambahkan service baru');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.service.show',[
            'service' => service::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.service.edit',[
            'service' => service::find($id),
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
            'headline' => 'required',
            'deskripsi' => 'required'
        ]);

        $validate['slug'] = str_replace(' ', '-', $validate['name']);
        $service = service::find($id);
        if($request->file('image')){
            File::delete(public_path('/storage/services/'.$service->image));
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('services', $imageName, 'public');
            $validate['image'] = $imageName;
        }

        service::where('id',$id)->update($validate);
        return redirect()->back()->with('success','Berhasil mengubah service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = service::find($id);
        File::delete(public_path('/storage/services/'.$service->image));
        service::where('id',$id)->delete();

        return redirect()->back()->with('success','Berhasil menghapus service');
    }
}
