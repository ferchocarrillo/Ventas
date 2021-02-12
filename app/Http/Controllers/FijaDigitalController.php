<?php

namespace App\Http\Controllers;

use App\fijaDigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;
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
use App\Revisados;
use App\Exports\FijaDigitalExport;

class FijaDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $fijas = fijaDigital::orderBy('revisados', 'asc')->paginate(10);
            return view('fijadigital.index',compact('fijas'));
    
    
        
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
        $fijas = fijaDigital::all();
        return view('fijadigital.create',compact('fijas','depto','estrato','velocidad','tecnologia','producto', 'adicionales','usuarios'));
    }

    public function searchdigitalfija( Request $request)
    {
        $fijas = fijaDigital::all();

        $searchfija = $request->get('searchdigitalfija');
        $fijas = fijaDigital::firstOrNew()->where('documento', 'like', '%'.$searchfija.'%')->paginate(5);
        return view('fijadigital.index', ['fijas' => $fijas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, fijaDigital $fijas)
    {
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;

        $fijas = new fijaDigital();
        $fijas->nombres         = $request ->nombres;
        $fijas->documento       = $request ->documento;
        $fijas->fexpedicion     = $request ->fexpedicion;
        $fijas->correo          = $request ->correo;
        $fijas->departamento    = $request ->departamento;
        $fijas->ciudad          = $request ->id_ciudad;
        $fijas->direccion       = $request ->direccion;
        $fijas->barrio          = $request ->barrio;
        $fijas->estrato         = $request ->estrato;
        $fijas->ngrabacion      = $request ->ngrabacion;
        $fijas->ncontacto       = $request ->ncontacto;
        $fijas->producto        = $request ->producto;
        $fijas->FOX             = $request ->FOX;
        $fijas->HBO             = $request ->HBO;
        $fijas->cds_movil       = $request ->cds_movil;
        $fijas->cds_fija        = $request ->cds_fija;
        $fijas->Paquete_Adultos = $request ->Paquete_Adultos;
        $fijas->Decodificador   = $request ->Decodificador;
        $fijas->Svas_lineas     = $request ->Svas_lineas;
        $fijas->velocidad       = $request ->velocidad;
        $fijas->tecnologia      = $request ->tecnologia;
        $fijas->observacion     = $request ->observacion;
        $fijas->agente          = $user_id.','.$user_nombre;
        $fijas->revisados        = $request ->revisados;
        $fijas->estadorevisado  = $request ->estadorevisado;
        $fijas->obs2            = $request ->obs2;
        $fijas->backoffice      = $user_nombre;
        $fijas->save();
        return back();




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fijaDigital  $fijaDigital
     * @return \Illuminate\Http\Response
     */
    public function show(fijaDigital $fijaDigital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fijaDigital  $fijaDigital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)


    {

        $fijas = fijaDigital::all();
        $depto = Departamentos::all();
        $tipoCliente = TipoCliente::all();
        $planadquiere = Planadquiere::all();
        $origen = Origen::all();
        $revisadoses = Revisados::all();
        $usuarios = User::all();

        $this->authorize('haveaccess','fijadigital.edit');
        $fijas=fijaDigital::findOrFail($id);
        return view('fijadigital.edit',compact('fijas','depto','revisadoses','tipoCliente','origen','planadquiere', 'usuarios'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fijaDigital  $fijaDigital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $usuarios = User::all();
        $user_id = Auth::user()->id;
        $user_nombre = Auth::user()->name;
        $revisadoses = Revisados::all();
        $datosFija=request()->except(['_token','_method']);
        fijaDigital::where('id','=',$id)->update($datosFija);
        $fijas=fijaDigital::findOrFail($id);
        return view('fija.edit',compact('fijas', 'usuarios','revisadoses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fijaDigital  $fijaDigital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('haveaccess','fijadigital.destroy');
        fijaDigital::destroy($id);

        return redirect()->route('fijadigital.index')
            ->with('status_success','registro successfully removed');
    }
    public function exportExcel()
    {

        return Excel::download(new fijaDigitalExport, 'fijadigital-list.xlsx');
    }
}
