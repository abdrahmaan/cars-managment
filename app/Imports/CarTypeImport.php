<?php

namespace App\Imports;

use App\Models\CarType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;  
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CarTypeImport implements ToModel, WithHeadingRow
{
    use Importable;
   
    public function model(array $row)
    {


            // CarType::create([
            //     'tyype' => $row['type'],
            //     'number' => $row['number'],
            // ]);
        
    }
}
