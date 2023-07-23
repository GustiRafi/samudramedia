<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\journal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.journal.list',[
            'journals' => journal::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.journal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
            'feature' => 'required',
            'link' => 'required',
        ]);
        
        $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('journals', $fileName, 'public');
        $validate['image'] = $fileName;
        journal::create($validate);
        return redirect()->back()->with('success','Berhasil menambah journal');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('admin.journal.show',[
        //     'journal' => journal::find($id),
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.journal.edit',[
            'journal' => journal::find($id),
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
            'feature' => 'required',
            'link' => 'required',
        ]);

        $journal = journal::find($id);

        if($request->file('image')){
            File::delete(public_path('/storage/journals/'.$journal->image));
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('journals', $fileName, 'public');
            $validate['image'] = $fileName;
        }
         
        journal::where('id',$id)->update($validate);
        return redirect()->back()->with('success','Berhasil mengubah journal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $journal = journal::find($id);
        File::delete(public_path('/storage/journals/'.$journal->image));
        journal::where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus journal');
    }
}
