<?php

namespace App\Imports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CarsImport implements ToModel, WithHeadingRow
{

    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Car([

        //     "Brand"=> $row['brand'] ,
        //     "Category"=> $row['category'] ,
        //     "ModelName"=> $row['modelname'] ,
        //     "ModelType"=> $row['modeltype'] ,
        //     "ModelYear"=> $row['modelyear'] ,
        //     "Transmission"=> $row['transmission'] ,
        //     "TransmissionCount"=> $row['transmissioncount'] ,
        //     "FourXFour"=> $row['fourxfour'] ,
        //     "PushingType"=> $row['pushingtype'] ,
        //     "CC"=> $row['cc'] ,
        //     "Cylinder"=> $row['cylinder'] ,
        //     "HorsePower"=> $row['horsepower'] ,
        //     "FuelType"=> $row['fueltype'] ,
        //     "FuelLiter"=> $row['fuelliter'] ,
        //     "Tier"=> $row['tier'] ,
        //     "Height"=> $row['height'] ,
        //     "Width"=> $row['width'] ,
        //     "Length"=> $row['length'] ,
        //     "Passengers"=> $row['passengers'] ,
        //     "PurchasePrice"=> $row['purchaseprice'],

        // ]);
    }
}
