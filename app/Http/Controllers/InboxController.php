<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inbox;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Config;

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
        
        try {
        // Mail::send('mail.clientSend', array(
        //     'msg' => $validate['msg'],
        // ), function($message) use ($request){
        //     $message->from($request->email,$request->name);
        //     $message->to(config('app.admin_email'), 'Samudra Media Nusantara')->subject($request->subject);
        // });
        $data = inbox::create($validate);
        // dd($data);
        Mail::to('gustirafi49@gmail.com')->send(new SendMail($data));
        return redirect()->back()->with('success','Pesan Terkirim');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Pesan gagal Terkirim');
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
