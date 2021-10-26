<?php

namespace App\Components;

use App\Menu;

class MenuRecusive {
    // construct chạy khi mình new một cái MenuRecusive vậy là mình gán được $this->html = ''; = rỗng
    private $html;
    // khởi tạo hàm construct hàm tạo để khi mình Instant (hành động tức thì) đối tượng này

    public function __construct()
    {
        // mình sẽ gán một cái biến html = '' rỗng
        // sử dụng $this->html = ''; để nối các lựa chọn option lại với nhau
        $this->html = '';
    }
    // đệ quy add- trong cái hàm menuRecusiveAdd mình sẽ truyền vào $parentId mặc định
    // tìm cấp lớn nhất đầu tiên sẽ truyền vào = 0 ($parentId = 0) để tìm ra menu1 , menu2, menu3.
    //và mình gán thêm một cái $subMark = rỗng
    public function menuRecusiveAdd($parentId = 0, $subMark = '')
    {
        // đầu tiên mình có data = app Menu model điều kiện là where parent_id
        $data = Menu::where('parent_id', $parentId)->get();
        // câu lệnh này  $data = Menu::where('parent_id', $parentId)->get(); mình sẽ lấy được menu1., menu2 , menu3
        // sau khi lấy được menu thì sẽ foreach
        foreach ($data as $dataItem) {
            //sau khi foreach thì mình sẽ nối
            $this->html .= '<option value="' . $dataItem->id .'">' . $subMark . $dataItem->name . '</option>';
            $this->menuRecusiveAdd($dataItem->id, $subMark . '--');
        }

        return $this->html;

    }

    public function menuRecusiveEdit($parentIdMenuEdit, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if($parentIdMenuEdit == $dataItem->id) {
                $this->html .= '<option selected value="' . $dataItem->id .'">' . $subMark . $dataItem->name . '</option>';
            } else {
                $this->html .= '<option value="' . $dataItem->id .'">' . $subMark . $dataItem->name . '</option>';
            }

            $this->menuRecusiveEdit($parentIdMenuEdit, $dataItem->id, $subMark . '--');
        }

        return $this->html;

    }


}
