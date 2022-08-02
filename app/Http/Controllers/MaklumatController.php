<?php

namespace App\Http\Controllers;

use App\Models\Maklumat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailCreated;

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
        $currencyResponse = $this->getfromAPI();
        $maklumats = Maklumat::with('user')->orderBy('created_at' , 'desc')->paginate(5); 
        return view ('maklumat.pegawai' , ['maklumats'=> $maklumats,'currencyResponse'=> $currencyResponse->data]);
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

      Mail::to('test@mail.com')->send(new MailCreated);

      return redirect ()->route('maklumat.pegawai');
    }

    public function getHttpHeaders(){
        $headers = [
            'headers' =>[
                'Content-Type' => 'application/json',
                'Accept' => 'application/vnd.BNM.API.v1+json'
            ],
            'http-errors' => false,
        ];
        return $headers;
    }

    public function getfromAPI(){

        $client = new \GuzzleHttp\Client(self::getHttpHeaders());

        $res = $client->request('GET', 'https://api.bnm.gov.my/public/exchange-rate');

        $currencyResponse = $res->getBody()->getContents();

        return json_decode($currencyResponse);
    }

}
