<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maklumat;


class MaklumatController extends Controller
{
    public function store()
    {
        //cara nak save
        //
        


        //validation
         request()->validate([

            'nama'=> 'required',
            'desc'=> 'required',
        ]);
        
        $maklumat = new Maklumat;
        $maklumat->fill(request()->all());
        $maklumat->user_id = auth()->user()->id;
        $maklumat->save(); 

        //  Maklumat::create(request()->all());

         return redirect ('maklumat/pegawai');
    }

    public function showPelanggan()
    {
        return view ('maklumat.pelanggan');
    }

    public function showPegawai()
    {
        $maklumats = Maklumat::orderBy('created_at' , 'desc')->get(); 
        return view ('maklumat.pegawai' , ['maklumats'=> $maklumats]);
    }
    
    public function padamPelanggan($id)
    {
      Maklumat::destroy($id);
        return redirect ()->route('maklumat.pegawai');
    }

    public function editPelanggan($id)
    {
      $maklumat = Maklumat::find($id);

        return view ('maklumat.pelangganUpdate' , compact ('maklumat'));
    }

    public function updatePelanggan($id)
    {
        request()->validate([

            'nama'=> 'required',
            'desc'=> 'required',
        ]);
      $maklumat = Maklumat::find($id);

      Maklumat::create(request()->all());

      return redirect ()->route('maklumat.pegawai');
    }

}
