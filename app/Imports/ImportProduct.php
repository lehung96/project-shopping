<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          return new Product([
           'meta_keywords' => $row[0],
           'product_name' => $row[1],
           'product_quantity' => $row[2],
           'price' => $row[3],
           'promontion_price' => $row[4],
           'image' => $row[5],
           'desc' => $row[6],
           'content' => $row[7],
           'category_id' => $row[8],
           'status' => $row[9],
           'new' => $row[10],
           'views_count' => $row[11],
        ]);
    }
}
