<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paketService;
use App\Models\service;

class PaketController extends Controller
{

    public function index(string $id){
        return view('admin.paket.list',[
            'service' => service::find($id),
            'paket' => paketService::where('service_id',$id)->get(),
        ]);
    }

    public function create(string $id){
        return view('admin.paket.create',[
            'service_id' => $id,
        ]);
    }

    public function store(Request $request, string $id){
        $validate = $request->validate([
            'name' => 'required',
            'feature' => 'required',
            'price' => 'required'
        ]);

        if($request->spesifikasi){
            $validate['spesifikasi'] = $request->spesifikasi;
        }
        $validate['service_id'] = $id;
        paketService::create($validate);
        return redirect()->back()->with('success','Berhasil menambahkan paket baru');
    }

    public function edit(string $id){
        return view('admin.paket.edit',[
            'paket' => paketService::find($id),
        ]);
    }

    public function update(Request $request, string $id){
        $validate = $request->validate([
            'name' => 'required',
            'feature' => 'required',
            'price' => 'required'
        ]);

        if($request->spesifikasi){
            $validate['spesifikasi'] = $request->spesifikasi;
        }

        paketService::where('id',$id)->update($validate);
        return redirect()->back()->with('success','Berhasil mengubah paket');
    }

    public function destroy(string $id){
        paketService::where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus paket');
    }
}
