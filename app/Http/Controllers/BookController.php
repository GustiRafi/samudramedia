<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.book.list',[
            'books' => book::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:3',
            'cover' => 'required|mimes:jpg,jpeg,png',
            'subject' => 'required',
            'writer' => 'required',
            'synopsis' => 'required|min:20'
        ]);
        
        $validate['slug'] = str_replace(' ', '-', $validate['title']);
        $fileName = time().'_'.$request->file('cover')->getClientOriginalName();
        $request->file('cover')->storeAs('book', $fileName, 'public');
        $validate['cover'] = $fileName;
        // $validate['cover'] = $request->file('cover')->store('book');

        book::create($validate);
        return redirect()->back()->with('success','Berhasil menambahkan buku baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.book.show',[
            'book' => book::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.book.edit',[
            'book' => book::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required|min:3',
            'cover' => 'mimes:jpg,jpeg,png',
            'subject' => 'required',
            'writer' => 'required',
            'synopsis' => 'required|min:20'
        ]);

        $book = book::find($id);
        $validate['slug'] = str_replace(' ', '-', $validate['title']);

        if($request->file('cover')){
            File::delete(public_path('/storage/book/'.$book->cover));
            $fileName = time().'_'.$request->file('cover')->getClientOriginalName();
            $request->file('cover')->storeAs('book', $fileName, 'public');
            $validate['cover'] = $fileName;
        }

        book::where('id',$id)->update($validate);

        return redirect()->back()->with('success','Berhasil mengubah buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = book::find($id);
        File::delete(public_path('/storage/book/'.$book->cover));
        
        book::where('id',$id)->delete();

        return redirect()->back()->with('succcess','Berhasil menghapus buku');
    }
}
