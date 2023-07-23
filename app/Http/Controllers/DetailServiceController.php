<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detailservice;
use App\Models\service;

class DetailServiceController extends Controller
{

    public function index(string $id){
        return view('admin.detail.list',[
            'service' => service::find($id),
            'detail' => DetailService::where('service_id',$id)->get(),
        ]);
    }
    public function create(string $id){
        return view('admin.detail.create',[
            'service_id' => $id,
        ]);
    }

    public function store(Request $request, string $id){
        $validate = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required'
        ]);

        $validate['service_id'] = $id;
        Detailservice::create($validate);
        return redirect()->back()->with('success','Berhasil menambahkan detail service baru');
    }

    public function edit(string $id){
        return view('admin.detail.edit',[
            'detail' => DetailService::find($id),
        ]);
    }

    public function update(Request $request, string $id){
        $validate = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required'
        ]);

        Detailservice::where('id',$id)->update($validate);
        return redirect()->back()->with('success','Berhasil mengubah detail service');
    }

    public function destroy(string $id){
        Detailservice::where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus detail service');
    }
}
