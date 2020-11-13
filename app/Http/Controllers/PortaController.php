<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\JhonatanPermission\Models\Porta;
use Illuminate\Http\Request;
use App\Departamentos;
use App\Tipocliente;
use App\Origen;
use App\Estadorevisado;
use App\Velocidad;
use App\Planes_prepost;
use App\Estrato;
use App\Activacion;
use App\Tecnologia;
use App\Adicionales;
use App\Producto;
use App\Planadquiere;
use App\Corte;
use App\Revisados;
use App\User;
use stdClass;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PortaExport;



class PortaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $porta['porta']=Porta::paginate(10);
        $porta['porta']=Porta::OrderBy('revisados','asc')->get();
        return view('porta.index',$porta);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $usuarios = User::all();


        return view('porta.create',compact('depto','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    public function search( Request $request)
    {
        $porta = Porta::all();

        $search = $request->get('search');
        $porta= Porta::firstOrNew()->where('numero', 'like', '%'.$search.'%')->paginate(5);
        return view('porta.index', ['porta' => $porta]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Porta $porta)
    {

        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;

        $porta = new Porta();
        $porta->numero          = $request ->numero;
        $porta->documento       = $request ->documento;
        $porta->nombres         = $request ->nombres;
        $porta->apellidos       = $request ->apellidos;
        $porta->correo          = $request ->correo;
        $porta->departamento    = $request ->departamento;
        $porta->ciudad          = $request ->id_ciudad;
        $porta->barrio          = $request ->barrio;
        $porta->direccion       = $request ->direccion;
        $porta->nip             = $request ->nip;
        $porta->tipocliente     = $request ->tipocliente;
        $porta->planadquiere    = $request ->planadquiere;
        $porta->ncontacto       = $request ->ncontacto;
        $porta->imei            = $request ->imei;
        $porta->fvc             = $request ->fvc;
        $porta->fentrega        = $request ->fentrega;
        $porta->fexpedicion     = $request ->fexpedicion;
        $porta->fnacimiento     = $request ->fnacimiento;
        $porta->origen          = $request ->origen;
        $porta->ngrabacion      = $request ->ngrabacion;
        $porta->observaciones   = $request ->observaciones;
        $porta->agente          = $user_id.','.$user_nombre;
        $porta->revisados        = $request ->revisados;
        $porta->estadorevisados  = $request ->estadorevisados;
        $porta->obs2            = $request ->obs2;
        $porta->backoffice      = $request ->$user_id.','.$user_nombre;
        $porta->save();


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Porta $porta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $porta = Porta::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisado = Revisados::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','porta.edit');



       $porta=Porta::findOrFail($id);
        return view('porta.edit',compact('porta','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)


    {

        $porta = Porta::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisado = Revisados::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','porta.edit');



       $porta=Porta::findOrFail($id);
        return view('porta.edit',compact('porta','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $usuarios = User::all();
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;

        $datosPorta=request()->except(['_token','_method']);
        Porta::where('id','=',$id)->update($datosPorta);
        $porta=Porta::findOrFail($id);
        return view('porta.edit',compact('porta', 'usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','porta.destroy');
        Porta::destroy($id);

        return redirect()->route('porta.index')
            ->with('status_success','registro successfully removed');
    }
 /**
     * Display the specified resource.
     *
     * @param  \App\Porta $porta
     * @return \Illuminate\Http\Response
     */
        public function view ($id)

{

    $porta = Porta::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisado = Revisados::all();
        $usuarios = User::all();


        $this->authorize('haveaccess','porta.edit');



       $porta=Porta::findOrFail($id);
        return view('porta.edit',compact('porta','depto','revisado','tipoCliente','origen','planadquiere', 'usuarios'));
}

public function exportExcel()
{
return Excel::download(new PortaExport, 'porta-list.xlsx');

}



}
