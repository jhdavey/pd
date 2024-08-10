<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Build;

class BuildExport implements FromCollection
{
    public function collection()
    {
        //format data here
        return Build::all();
    }
}
