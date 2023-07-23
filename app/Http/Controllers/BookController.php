<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\category;
use App\Models\bookImage;
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
        return view('admin.book.create',[
            'categori' => category::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:3',
            'category_id' => 'required',
            'price' => 'required',
            'tahun_terbit' => 'required',
            'ukuran' => 'required',
            'tebal' => 'required',
            'kertas' => 'required',
            'writer' => 'required',
            'deskripsi' => 'required|min:20',
            'images.*' => 'mimes:png,jpg,jpeg',
        ]);
        
        $validate['slug'] = str_replace(' ', '-', $validate['title']);
        unset($validate['images']);
        $book = book::create($validate);

        if ($request->file('images')) {
            $bookImage = [];
            foreach ($request->file('images') as $image) {
                $fileName = time().'_'.$image->getClientOriginalName();
                $image->storeAs('books', $fileName, 'public');
                $bookImage[] = [
                    'book_id' => $book->id,
                    'path' => $fileName
                ];
            }
            bookImage::insert($bookImage);
        }

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
            'categori' => category::orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required|min:3',
            'category_id' => 'required',
            'price' => 'required',
            'tahun_terbit' => 'required',
            'ukuran' => 'required',
            'tebal' => 'required',
            'kertas' => 'required',
            'writer' => 'required',
            'deskripsi' => 'required|min:20',
            'images.*' => 'mimes:png,jpg,jpeg',
        ]);
        
        $validate['slug'] = str_replace(' ', '-', $validate['title']);
        unset($validate['images']);
        
        book::where('id',$id)->update($validate);

        if ($request->file('images')) {
            $bookImage = [];
            foreach ($request->file('images') as $image) {
                $fileName = time().'_'.$image->getClientOriginalName();
                $image->storeAs('books', $fileName, 'public');
                $bookImage[] = [
                    'book_id' => $book->id,
                    'path' => $fileName
                ];
            }
            bookImage::insert($bookImage);
        }


        return redirect()->back()->with('success','Berhasil mengubah buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {

        $images = $book->images;
        $images->each(function($image, $key){
            File::delete(public_path('/storage/books/'.$image->path));
            $image->delete();
        });
        $book->delete();
        return redirect()->back()->with('success','Berhasil menghapus buku');
    }
}
