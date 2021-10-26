<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProduct implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //Xuất(Export) file Excel
        //Hàm này trả về Category tất cả các trường
        return Product::all();
    }
}
