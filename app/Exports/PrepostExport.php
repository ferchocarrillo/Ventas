<?php

namespace App\Exports;

use App\Prepost;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrepostExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prepost::all();
    }
}
