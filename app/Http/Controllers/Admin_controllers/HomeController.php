<?php

namespace App\Http\Controllers\Admin_controllers;

use App\Http\Controllers\Controller as BaseController;

use Illuminate\Http\Request;

use App\User;

use App\Info;

use App\Contact;

use App\Gamepropose;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function informasi()
    {
        $data = Info::all();
        return view('admin.informasi')->with('val', $data);
    }

    public function videos()
    {
        return view('admin.videos');
    }

    public function proposal()
    {
        $data = Gamepropose::all();
        return view('admin.proposal')->with('val', $data);
    }

    public function kontak()
    {
        $data = Contact::all();
        return view('admin.kontak')->with('val', $data);
    }

    public function editinfo(Request $req, $id){
        $newName = "";
        if ($id == 3){
            $file = $req->file('value');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(10000,1001238912).".".$ext;
            $file->move('uploads/file', $newName);

        }else{
            $newName = $req->input('value');
        }

        Info::find($id)->update([
            'value' => $newName
        ]);
        return redirect()->route('informasi');
    }

    public function editkontak(Request $req, $id){
        Contact::find($id)->update([
            'value' => $req->input('value'),
            'shown' => $req->input('shown')
        ]);
        return redirect()->route('kontak');
    }
}
