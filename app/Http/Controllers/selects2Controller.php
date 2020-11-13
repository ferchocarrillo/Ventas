<?php

namespace App\Http\Controllers;
use App\Revisados;
use Illuminate\Http\Request;

class selects2Controller extends Controller
{
    public function Revisado(Request $request){

        $revisado = Revisados::where('id_rev', $request->id)->get();
        $html='';
        foreach ($revisado as $key) {
            $html.="<option value='".$key['id_estadorevisado']."'>".$key['estado']."</option>";
        }


            return response()->json($revisado) ;

    }
}
