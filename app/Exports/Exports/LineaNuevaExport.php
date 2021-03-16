<?php

namespace App\Exports;


use App\lineanueva;
use Maatwebsite\Excel\Concerns\FromCollection;

class LineaNuevaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return LineaNueva::all();
    }
}
