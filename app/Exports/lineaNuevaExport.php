<?php

namespace App\Exports;


use App\lineaNueva;
use Maatwebsite\Excel\Concerns\FromCollection;

class LineaNuevaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return lineaNueva::all();
    }
}