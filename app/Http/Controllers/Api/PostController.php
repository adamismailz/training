<?php

namespace App\Http\Controllers\Api;

use App\Models\Maklumat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function getAllPost(){
        $maklumats = Maklumat::all();

        return response()->json([
            'message' => 'All Maklumat is here',
            'data' => $maklumats
        ]);
    }

    public function created(){

    try{

        request()->validate([
            'nama'=> 'required',
            'desc'=> 'required',
        ]);
    
        Maklumat::create(request()->all());

        return response()->json([
            'message' => 'Data dah create',
        ]);
    }

    catch(\Exception $err) {

        return response()->json([
            'message' => 'Error tu bangg! ',
            'errors' => $err->getMessage()
        ]);
    }
}

    public function delete($id){
         Maklumat::destroy($id);

        return response()->json([
            'message' => 'Data id => '.$id.' deleted',
        ]);
    }
    

    public function update($id){
        $maklumat = Maklumat::find($id);

        Maklumat::create(request()->all());

       return response()->json([
           'message' => 'Data id => '.$id.' updated',
       ]);
   }
}
