<?php

namespace App\Traits;

use Storage;

trait StorageImageTrait
{
    // tạo phương thức storageTraitUpload
    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            //  $request trỏ đến file và truyền file name =feature_image_path,
            // phương thức store truyền vào cái path chính tên của thư mục product
            //thư mục product nằm ở vị trí config/filesystems.php
            // phương thức storeAs nhận vào 2 tham số 1 là thư mục upload public/product
            // 2 là $fileName

            $filePath = $request->file($fieldName)->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }

    public function storageTraitUploadMutiple($file, $foderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
}
