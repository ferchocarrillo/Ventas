<?php

namespace App\JhonatanPermission\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use App\Http\Controllers\RegistroController;



class Registro extends Model


{
protected $fillable = ['fecha','entrada', 'usuario'];
public function Registro()

{


    return $this->belongsTo(Registro::class);
}
}
