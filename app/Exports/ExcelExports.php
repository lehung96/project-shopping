<?php

namespace App\Exports;

use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //Xuất(Export) file Excel
        //Hàm này trả về Category tất cả các trường
        return Category::all();
    }
}
