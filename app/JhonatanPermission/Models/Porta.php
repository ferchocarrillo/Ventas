<?php

namespace App\JhonatanPermission\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use App\Http\Controllers\PortaController;



class Porta extends Model


{
    protected $fillable = [

        'numero','documento','nombres', 'apellidos','correo','departamento','ciudad','barrio','direccion', 'nip','tipocliente','planadquiere','ncontacto','imei','fvc','fentrega','fexpedicion','fnacimiento','origen','ngrabacion','observacion','agente','revisados','obs2','backoffice'];
    public function Porta()

    {


    return $this->belongsTo(Porta::class);
}
}
