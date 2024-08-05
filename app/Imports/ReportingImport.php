<?php

namespace App\Imports;


use App\Models\Reporting;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReportingImport implements ToModel,WithHeadingRow
{
    private $rows = 0;

    // public function model(array $row)
    // {
    //     if(!empty($row['name'])){
    //         if (!Reporting::where('name', '=', $row['name'])->exists()) {
    //             // user not found
    //             ++$this->rows;
    //             return new Reporting([
    //                 'name' => $row['name'],
    //             ]);
    //         }      
    //     }
    // }

    public function model(array $row)
    {
        if (!empty($row['name']) && !empty($row['email']) && !empty($row['age'])) {
            if (!Reporting::where('name', '=', $row['name'])->exists()) {
                ++$this->rows;
                return new Reporting([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'age' => $row['age'],
                ]);
            }      
        }
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}


