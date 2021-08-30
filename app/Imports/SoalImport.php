<?php

namespace App\Imports;

use App\Models\Soal;
use Maatwebsite\Excel\Concerns\ToModel;

class SoalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Soal([
            'category' => $row[1],
            'soal' => $row[2],
            'key' => $row[3],
            'a' => $row[4],
            'b' => $row[5],
            'c' => $row[6],
            'd' => $row[7],
        ]);
    }
}
