<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use App\Models\book;
use App\Models\category;
use App\Models\journal;

class ClientController extends Controller
{
    public function index(){
        return view('client.index',[
            'services' => service::orderBy('id','desc')->get()
        ]);
    }

    public function service(string $slug){
        return view('client.service',[
            'service' => service::firstWhere('slug',$slug),
            'services' => service::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->take(3)->get(),
        ]);
    }

    public function book(){
        return view('client.book',[
            'books' => book::orderBy('id','desc')->get(),
            'categories' => category::orderBy('id','desc')->get(),
        ]);
    }

    public function bookDetail(string $slug){
        return view('client.bookdetail',[
            'book' => book::firstWhere('slug',$slug),
        ]);
    }

    public function category(string $slug){
        $category = category::firstWhere('slug',$slug);
        return view('client.bookByCategory',[
            'category' => $category,
            'books' => book::where('category_id',$category->id)->orderBY('id','desc')->get(),
        ]);
    }

    public function journal(){
        return view('client.journal',[
            'journals' => journal::orderBy('id','desc')->get()
        ]);
    }

    public function search(Request $request){
        $output="";
        $book = book::where('title','LIKE','%'.$request->name."%")->get();
        $countBook = count($book);

        if($book)
        {
            foreach($book as $item)
            {
                $output.= '<div class="col-12 col-lg-4 col-md-4 mb-3">
                <div class="card">
                    <img src="/storage/books/'.$item->images[0]->path.'" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">'.$item->title.'</h5>
                      <h5 class="text-primary">Rp.'.number_format($item->price,0,',','.').'</h5>
                      <p class="card-text">Kategori : '.$item->category->name.'</p>
                      <p class="card-text">Penulis : '.$item->writer.'</p>
                    </div>
                    <div class="card-body">
                      <!-- <a href="#" class="card-link">Card link</a> -->
                      <a href="'.route('book', $item->slug) .'" class="card-link"><i class="fas fa-search"></i> Lihat Detail</a>
                    </div>
                  </div>
            </div>';
                        // $output.= '<a href="/detail-wisata/'.$item->slug.'">'.$item->nama.'</a>';
                }
        }
        if($countBook == 0)
            {
                $output.= '<div class="col-lg-12 text-black p-3 mx-5">
                <p class="text-center">tidak ada data yang cocok</p>
                </div>';
            }
        return response($output);
    }
}
