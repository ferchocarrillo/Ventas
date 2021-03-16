<?php

namespace App\Exports;

use App\Phoenix;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhoenixExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Phoenix::all();
    }
}
