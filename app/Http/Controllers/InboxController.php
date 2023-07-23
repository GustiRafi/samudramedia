<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inbox;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{

    public function index(){
        return view('admin.email.list',[
            'emails' => inbox::orderBy('id','desc')->get(),
        ]);
    }


    public function send(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'msg' => 'required',
        ]);
        
        DB::beginTransaction(); // Begin the database transaction

    try {
        $data = inbox::create($validate);
        Mail::to(env('MAIL_USERNAME'))->send(new SendMail($data));
        DB::commit(); // Both create and email sending succeeded, commit the transaction
        return redirect()->back()->with('success', 'Pesan Terkirim');
    } catch (\Throwable $th) {
        DB::rollback(); // Something went wrong, rollback the transaction
        return redirect()->back()->with('error', 'Pesan Gagal Terkirim');
    }
    }

    public function reply(Request $request, string $id){
        $replyTo = inbox::find($id);
        Mail::to($replyTo->email)->send(new SendMail($request));
        $data['status'] = 'dibalas';
        inbox::where('id',$id)->update($data);
        return redirect()->back()->with('success','Pesan berhasil dibalas');
    }

    public function destroy(string $id){
        inbox::where('id',$id)->delete();
        return redirect()->back()->with('success','Pesan berhasil dihapus');
    }
}
