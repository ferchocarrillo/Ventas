<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\JhonatanPermission\Models\Fija;
use App\Departamentos;
use App\TipoCliente;
use App\Origen;
use App\Revisiones;
use App\Velocidad;
use App\Estrato;
use App\Tecnologia;
use App\Adicionales;
use App\Producto;
use App\Planadquiere;
use App\User;
use stdClass;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FijaExport;



class FijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fija['fija']=Fija::orderBY('revisado','asc')->with('fija')->get();
        return view('fija.index',$fija);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depto = Departamentos::all();
        $estrato = Estrato::all();
        $velocidad = Velocidad::all();
        $tecnologia = Tecnologia::all();
        $producto = Producto::all();
        $adicionales = Adicionales::all();
        $usuarios = User::all();
        $user_id = Auth::user()->id;
        return view('fija.create',compact('depto','estrato','velocidad','tecnologia','producto', 'adicionales','usuarios'));

    }

    public function searchfija( Request $request)
    {
        $fija = Fija::all();

        $searchfija = $request->get('searchfija');
        $fija= Fija::firstOrNew()->where('ncontacto', 'like', '%'.$searchfija.'%')->paginate(5);
        return view('fija.index', ['fija' => $fija]);
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

        $fija = new Fija();
        $fija->nombres         = $request ->nombres;
        $fija->documento       = $request ->documento;
        $fija->fexpedicion     = $request ->fexpedicion;
        $fija->departamento    = $request ->departamento;
        $fija->ciudad          = $request ->id_ciudad;
        $fija->direccion       = $request ->direccion;
        $fija->barrio          = $request ->barrio;
        $fija->estrato         = $request ->estrato;
        $fija->ngrabacion      = $request ->ngrabacion;
        $fija->ncontacto       = $request ->ncontacto;
        $fija->producto        = $request ->producto;
        $fija->FOX             = $request ->FOX;
        $fija->HBO             = $request ->HBO;
        $fija->cds_movil        = $request ->cds_movil;
        $fija->cds_fija         = $request ->cds_fija;
        $fija->Paquete_Adultos = $request ->Paquete_Adultos;
        $fija->Decodificador   = $request ->Decodificador;
        $fija->Svas_lineas     = $request ->Svas_lineas;
        $fija->velocidad       = $request ->velocidad;
        $fija->tecnologia      = $request ->tecnologia;
        $fija->observacion     = $request ->observacion;
        $fija->agente          = $user_id.','.$user_nombre;
        $fija->revisado        = $request ->revisado;
        $fija->estadorevisado  = $request ->estadorevisado;
        $fija->obs2            = $request ->obs2;
        $fija->backoffice      = $request ->$user_id.','.$user_nombre;
        $fija->save();
        return back();




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fija  $fija
     * @return \Illuminate\Http\Response
     */
    public function show(Fija $fija)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fija  $fija
     * @return \Illuminate\Http\Response
     */
    public function edit($id)


    {

        $fija = Fija::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisiones = Revisiones::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','fija.edit');



       $fija=Fija::findOrFail($id);
        return view('fija.edit',compact('fija','depto','revisiones','tipoCliente','origen','planadquiere', 'usuarios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fija  $fija
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $usuarios = User::all();
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;

        $datosFija=request()->except(['_token','_method']);
        Fija::where('id','=',$id)->update($datosFija);
        $fija=Fija::findOrFail($id);
        return view('fija.edit',compact('fija', 'usuarios'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fija  $fija
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','fija.destroy');
        Fija::destroy($id);

        return redirect()->route('fija.index')
            ->with('status_success','registro successfully removed');
    }
    public function exportExcel()
    {

        return Excel::download(new fijaExport, 'fija-list.xlsx');
    }


}
