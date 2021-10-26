<?php
namespace App\Components;



class Recusive {
    private $data;
    // biến  private $htmlSlelect = '';  mình sẽ gán gán bằng rỗng lúc đầu sau đó mình nối biến
    private $htmlSlelect = '';
   // hàm construct đầu tiền chạy sẽ nhận biến $data bên hàm  public function create()
    public function __construct($data)
    {
        // sau đó mình gán biến data = biến $data nhận được bên hàm  public function create()
        $this->data = $data;

    }


    // // mình tạo một cái hàm function category đệ quy (Recusive )
    // trong hàm này truyền vào $parentId, $id = 0
    public  function categoryRecusive($parentId, $id = 0, $text = '')
    {
        // cách lấy dữ liệu dùng vòng lặp foreach lop
        //đầu tiên mình sẽ khởi tạo biến  $data

        // sẽ lặp giá trị foreach
        foreach ($this->data as $value) {
            // sẽ kiểm tra nếu category_id chính là paren_td cái nào có == $value['category_id'] sẽ được selected
            if ($value['parent_id'] == $id) {
                if ( !empty($parentId) && $parentId == $value['category_id']) {
                    $this->htmlSlelect .= "<option selected value='" . $value['category_id'] . "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->htmlSlelect .= "<option value='" . $value['category_id'] . "'>" . $text . $value['name'] . "</option>";
                }

                $this->categoryRecusive($parentId, $value['category_id'], $text. '--');
            }
        }
        return $this->htmlSlelect;

    }



}
