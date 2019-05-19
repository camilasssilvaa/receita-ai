<?php

namespace App\Imports;

use App\Dispencacoes;
use Maatwebsite\Excel\Concerns\ToModel;

class DispencacoesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dispencacoes([
            //
        ]);
    }
}
