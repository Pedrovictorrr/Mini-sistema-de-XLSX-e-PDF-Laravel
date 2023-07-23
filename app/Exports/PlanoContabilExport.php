<?php

namespace App\Exports;

use App\Models\PlanoContabil;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class PlanoContabilExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $registros;

     public function __construct($registros)
    {
        $this->registros = $registros;
    }

    public function collection()
    {
        return $this->registros;
    }
}
