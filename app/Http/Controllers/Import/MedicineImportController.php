<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\MedicineImport;
use App\Models\Medicine;
use App\Models\Generic;
use App\Models\Manufacture;
use App\Models\Category;
use App\Models\Unit;
use App\Models\MedicinePrice;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MedicineImportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        set_time_limit(8000000);
        $medicines = Excel::toArray(new MedicineImport, $request->file('import_file'));
        $ext = $request->file('import_file')->getClientOriginalExtension();

        if ($ext == "xlsx" || $ext == "csv") {
            $unit = [];
            foreach ($medicines[0] as $key => $value) {
                $data = [];
                if ($value[1] != 'generic_id') {
                    if ($value[2]) {
                        $generic = Generic::firstOrCreate([
                            'name' => $value[2],
                            'status' => 1,
                        ]);
                    }
                    if ($value[3]) {
                        $category = Category::firstOrCreate([
                            'name' => $value[3],
                            'status' => 1,
                        ]);
                    }
                    if ($value[4]) {
                        $manufacture = Manufacture::firstOrCreate([
                            'manufacture_name' => $value[4],
                            'status' => 1,
                        ]);
                    }

                    $data = [
                        'medicine_name'     => $value[1],
                        'generic_id'        => $generic->id,
                        'category_id'       => $category->id,
                        'manufacture_id'   => $manufacture->id,
                        'dosage'            => $value[5],
                        'quantity'          => (int)1,
                        'convertion_factor' => $value[9],
                        'details'           => '',
                        'image'             => '',
                        'status'            => 0,
                    ];
                    $medicine = Medicine::create($data);

                    if( $value[6] ) {
                        $unit = [
                            "medicine_id" => $medicine->id,
                            "unit_id" => 11,
                            "type" => "primary",
                            "price" => (float)$value[7] ? $value[7] : 0,  
                        ];
                    }

                    if( $value[6] ) {
                        MedicinePrice::create([
                            'medicine_id'  => $medicine->id,
                            'unit_id'      => 11,
                            'type'         => 'primary',
                            'price'        => (float)$value[7] ? $value[7] : 0,
                        ]);
                    }

                    if($value[8]) {
                        MedicinePrice::create([
                            'medicine_id'  => $medicine->id,
                            'unit_id'      => 12,
                            'type'         => 'secondary',
                            'price'        => ($value[6] != "NULL" && $value[8] ? $value[7] / $medicine->convertion_factor : 0),
                        ]);
                    }
                    
                    // MedicinePrice::insert($unit);   
                }
            }
        }
        // notify()->success("Medicine import successfully", "");
        return back();
    }
}
