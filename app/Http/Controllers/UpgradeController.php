<?php

namespace App\Http\Controllers;

use App\Upgrade;
use App\Departamentos;
use App\TipoCliente;
use App\Origen;
use App\Revisiones;
use App\Corte;
use App\Planadquiere;
use App\Planhistorico;
use App\Planventa;
use App\Activacion;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UpgradeExport;

class UpgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upgrade['upgrade']=Upgrade::paginate(10);
        $upgrade['upgrade']=Upgrade::OrderBy('revisado','asc')->get();
        return view('upgrade.index',$upgrade);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

        {
            $departamentos = Departamentos::all();
            $tipoCliente = TipoCliente::all();
            $planadquiere = Planadquiere::all();
            $origen = Origen::all();
            $planhistorico = Planhistorico::all();
            $planventa = Planadquiere::all();
            $activacion = Activacion::all();
            $corte = Corte::all();
            $upgrade = Upgrade::all();

            $usuarios = User::all();
            return view('upgrade/create',compact('departamentos','corte','planhistorico','planadquiere','activacion','tipoCliente','origen', 'usuarios'));
        }



        public function searchupgrade( Request $request)
        {
            $upgrade = Upgrade::all();

            $searchupgrade = $request->get('searchupgrade');
            $upgrade= Upgrade::firstOrNew()->where('numero', 'like', '%'.$searchupgrade.'%')->paginate(5);
            return view('upgrade.index', ['upgrade' => $upgrade]);
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

        {
            $user_id = Auth::user()->id;
            $user_nombre = Auth::user()->name;

            $upgrade = new Upgrade();
            $upgrade->nombres             = $request ->nombres;
            $upgrade->documento           = $request ->documento;
            $upgrade->fventa              = $request ->fventa;
            $upgrade->numero              = $request ->numero;
            $upgrade->corte               = $request ->corte;
            $upgrade->planhistorico       = $request->planhistorico;
            $upgrade->planventa           = $request->planadquiere;
            $upgrade->activacion          = $request ->activacion;
            $upgrade->ngrabacion          = $request ->ngrabacion;
            $upgrade->observacion         = $request ->observacion;
            $upgrade->agente              = $user_id.','.$user_nombre;
            $upgrade->revisado            = $request ->revisado;
            $upgrade->estadorevisado      = $request ->estadorevisado;
            $upgrade->obs2                = $request ->obs2;
            $upgrade->backoffice          = $request ->$user_id.','.$user_nombre;
            $upgrade->save();
            return back() ;
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Upgrade  $upgrade
     * @return \Illuminate\Http\Response
     */
    public function show(Upgrade $upgrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upgrade  $upgrade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upgrade = Upgrade::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisiones = Revisiones::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','upgrade.edit');



       $upgrade=Upgrade::findOrFail($id);
        return view('upgrade.edit',compact('upgrade','depto','revisiones','tipoCliente','origen','planadquiere', 'usuarios'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upgrade  $upgrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $usuarios = User::all();
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;

        $datosUpgrade=request()->except(['_token','_method']);
        Upgrade::where('id','=',$id)->update($datosUpgrade);
        $upgrade=Upgrade::findOrFail($id);
        return view('upgrade.edit',compact('upgrade', 'usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upgrade  $upgrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','upgrade.destroy');
        Upgrade::destroy($id);

        return redirect()->route('upgrade.index')
            ->with('status_success','registro successfully removed');
    }
    public function exportExcel()
{
return Excel::download(new UpgradeExport, 'upgrade-list.xlsx');

}
}