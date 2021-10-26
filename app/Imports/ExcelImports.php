<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   //Import trả về new Category dạng mảng chứa các trường trong Model Category
        return new Category([
            'meta_keywords' => $row[0],
            'name' => $row[1],
            'slug' => $row[2],
            'desc' => $row[3],
            'parent_id' => $row[4],
            'status' => $row[5],


        ]);
    }
}
