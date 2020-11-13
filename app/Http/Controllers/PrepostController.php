<?php

namespace App\Http\Controllers;

use App\JhonatanPermission\Models\Prepost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Departamentos;
use App\Tipocliente;
use App\Origen;
use App\Revisados;
use App\Velocidad;
use App\Planes_prepost;
use App\Estrato;
use App\Activacion;
use App\Tecnologia;
use App\Adicionales;
use App\Producto;
use App\Planadquiere;
use App\Revisiones;
use App\Corte;
use App\User;
use stdClass;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PrepostExport;

class PrepostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prepost['prepost']=Prepost::paginate(10);
        $prepost['prepost']=Prepost::OrderBy('revisado','asc')->get();
        return view('prepost.index',$prepost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depto = Departamentos::all();
        $corte = Corte::all();
        $estrato = Estrato::all();
        $velocidad = Velocidad::all();
        $tecnologia = Tecnologia::all();
        $producto = Producto::all();
        $adicionales = Adicionales::all();
        $activacion = Activacion::all();
        $tipocliente = Tipocliente::all();
        $plan = Planes_prepost::all();
        $usuarios = User::all();
        $user_id = Auth::user()->id;
        return view('prepost.create',compact('depto','plan','activacion','estrato','velocidad','tipocliente','tecnologia','producto', 'corte','adicionales','usuarios'));

    }

    public function searchprepost( Request $request)
    {
        $prepost = Prepost::all();

        $searchprepost = $request->get('searchprepost');
        $prepost= Prepost::firstOrNew()->where('numero', 'like', '%'.$searchprepost.'%')->paginate(5);
        return view('prepost.index', ['prepost' => $prepost]);
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
        $prepost = new Prepost();
        $prepost->numero             = $request ->numero;
        $prepost->nombres              = $request ->nombres;
        $prepost->documento            = $request ->documento;
        $prepost->fexpedicion          = $request ->fexpedicion;
        $prepost->tipocliente          = $request ->tipocliente;
        $prepost->correo               = $request ->correo;
        $prepost->departamento         = $request ->departamento;
        $prepost->ciudad               = $request ->id_ciudad;
        $prepost->barrio               = $request ->barrio;
        $prepost->direccion            = $request ->direccion;
        $prepost->corte                = $request ->corte;
        $prepost->planventa            = $request ->plan;
        $prepost->activacion           = $request ->activacion;
        $prepost->token                = $request ->token;
        $prepost->observaciones        = $request ->observaciones;
        $prepost->agente               = $request ->$user_id.','.$user_nombre;
        $prepost->revisado             = $request ->revisado;
        $prepost->estadorevisado       = $request ->estadorevisado;
        $prepost->obs2                 = $request ->obs2;
        $prepost->backoffice           = $request ->$user_id.','.$user_nombre;

        $prepost->save();
        return back() ;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prepost  $prepost
     * @return \Illuminate\Http\Response
     */
    public function show(Prepost $prepost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prepost  $prepost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)


    {

        $prepost = Prepost::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisiones = Revisiones::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','prepost.edit');



       $prepost=Prepost::findOrFail($id);
        return view('prepost.edit',compact('prepost','depto','revisiones','tipoCliente','origen','planadquiere', 'usuarios'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prepost  $prepost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $usuarios = User::all();
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;

        $datosPrepost=request()->except(['_token','_method']);
        Prepost::where('id','=',$id)->update($datosPrepost);
        $prepost=Prepost::findOrFail($id);
        return view('prepost.edit',compact('prepost', 'usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prepost  $prepost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','prepost.destroy');
        Prepost::destroy($id);

        return redirect()->route('prepost.index')
            ->with('status_success','registro successfully removed');
    }

    public function exportExcel()
{
return Excel::download(new PrepostExport, 'prepost-list.xlsx');

}
}