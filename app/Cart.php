<?php

namespace App;


// tọa ra đối tượng giỏ hàng
class Cart
{
    // giỏ hàng có

    public $items = null;// danh sách sản phẩm
    public $totalPrice = 0;// tổng tiền
    public $totalQuanty = 0;// tổng số lượng

// khi gọi đến cart này phải cần hàm dựng __construct
    public function __construct($oldCart)
    { // nếu giỏ hàng tồn tại đang có
        if ($oldCart) {
            // thì sẽ gán đối tượng this , trỏ đến danh sách sản phầm = giỏ hàng hiện tại $oldCart trỏ đến danh sách sản phẩm
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuanty = $oldCart->totalQuanty;
        }
    }
    //tạo một phương thức thêm vào giỏ hàng
    // truyền thông số vào gồm có sản phẩm là ($item) và chỉ số ($product_id) có nghĩa
    // là thêm vào sản phẩm thứ bao nhiêu
    public function add($item, $product_id,$quantity)
    {
// đầu tiên mặc định sp thêm vào là mới = 1 mảng key , value
// trong mảng truyền vào đầu tiên là sl mặc định là 1
//thông số thứ 2 truyền vào là thông tin về sản phẩm là productinfo
// sẽ = chính sản phẩm mình truyền vào là $product
        $newProduct = ['quanty' => 0, 'price' => $item->price, 'item' => $item];
//tạo một phần tử mới trong giỏ hàng
// Trường hợp 1 kiểm tra xem  nếu đã truyền vào 1 sp $product trong giỏ hàng rồi
// thì chỉ việc tăng số lương lên
// nếu sản phẩm tồn tại thì mình lấy sản phẩm tồn tại gán = newproduct
///////////////////////
// đầu tiên nếu cái list products có

        if ($this->items) {
// sử dụng hàm này(array_key_exists() có 2 đối số truyền vào
// là $id và list  $products   public ở trên mình đã khởi tạo  $products = null;
            if (array_key_exists($product_id, $this->items)) {
                $newProduct = $this->items[$product_id];

            }

        }
        $newProduct['quanty'] = $quantity;
        // thêm một sản phẩm cho một đối tượng giỏ hàng rồi
        // đối tượng giỏ hàng mới ($newProduct) thì khi chúng ta thay đổi số lượng lại cộng số lượng lên
//        $newProduct['quanty']++;//thay đổi số lượng lại cộng số lượng lên
        //giá được ở giỏ hàng mới = số giá bán  nhân với số lượng
        $newProduct['price'] = $item->price * $newProduct['quanty'];
        // sau khi tính toán số lượng cho sản phẩm
        // tiếp theo thêm list (items) sản phầm và thuộc id
        $this->items[$product_id]= $newProduct;
        // cập nhật lại tổng tiền và tổng số lượng
        // và tổng lúc này tăng thêm 1 ++
        $this->totalQuanty++;
        // tổng tiền tính bằng cách += giá sản phẩm thêm vào
        // tổng tiền được tính: thêm vào một sản phẩm chúng ta cộng tổng (totalPrice) với giá của một sản phẩm được thêm vào

        $this->totalPrice+= $newProduct['price'];
    }

    // tạo hàm DeleteIteamCart
    // xóa mình phải truyền vào cái id để mình biết xóa cho sản phẩm  nào
    public function DeleteIteamCart($product_id){
//        dd($product_id);
        // đầu tiên mình trước tiên xóa sản phẩm đi mình cập nhật lại totalPrice và totalQuanty
        // chúng ta xóa đi bao nhiêu sản phẩm thì phải cập nhật lại giá và số lượng
        //------------//
        // cập nhật totalQuanty sẽ = chính nó - số lượng bị xóa bỏ
        // trừ đi đối tượng $this trỏ đến đối tượng items lấy trên public $items = null; và cái đối tượng lày là một danh sách mảng[]
       /// và là item thứ bao nhiêu chính là $product_id truền vào trừ trực tiếp trong mảng [] chứa 'quanty'
        $this->totalQuanty -=  $this->items[$product_id]['quanty'];

        // tiếp theo chúng ta làm về price
        // giá  = giá hiện tại - đi cái giá
        $this->totalPrice -=  $this->items[$product_id]['price'];
        // sau khi cập nhật thông tin tổng tiề với tổng số lượng chúng ta tiến hành xóa bỏ nó
        // sủ dụng hàm unset() và đối số truyền vào chính sản phầm mà mình muốn xóa
        unset($this->items[$product_id]);
        // sau đó sang controller xử lý chỉ cần gọi phương thức DeleteIteamCart là sẽ xóa cho chúng ta
    }


    // tạo hàm updateIteamCart hàm nay sẽ cập nhât lại giỏ hàng
    // đối số truyền vào gồm có 2 cái là id và số lượng
    public function UpdateIteamCart($product_id, $quanty){
        //-----------/////
        // Bước 1: phải trừ toàn bộ tiền và số lượng của sản phẩm muốn cập nhật
        //Cái tổng số lượng totalQuanty -= nó sẽ bằng cái đối tượng mình muốn lấy là $this->items[$product_id]
        // và một mảng chứ số lượng là ['quanty']
        $this->totalQuanty -=  $this->items[$product_id]['quanty'];
        // tương tự tổng tiền
        $this->totalPrice -=  $this->items[$product_id]['price'];

        //bước 2 cập nhật lại tổng số lượng totalQuanty  và tổng tiền  totalPrice
        // cái thứ nhất số lượng quanty $this->items[$product_id]['quanty'] = chính số lượng $quanty chúng ta truyền vào ở trong UpdateIteamCart($product_id, $quanty)
        // giả sử ['quanty'] ở đang bằng 8 hoặc 9 thì ta thay bằng số lượng truyền vào là $quanty
        $this->items[$product_id]['quanty'] = $quanty;
        // cái thứ 2 là giá tiền price  $this->items[$product_id]['price'] sẽ = cũng với cái số lượng $quanty  này nhân với
        // thông tin giá của nó là  $this->items[$product_id]['item'] , cái item này là thông tin item sản phẩm
        // và trỏ đến cái giá
        $this->items[$product_id]['price'] = $quanty * $this->items[$product_id]['item']->price;


        // sau khi cập nhật cho cái sản phẩm,
        // tiếp theo  phải cập nhật lại được cho giỏ hàng

        //------------------------//
        // giờ mới tính lại cho giỏ hàng tình tổng tiền và tính tổng số lượng

       // Tổng số lượng: thì bằng cái tổng số lượng hiện tại  $this->totalQuanty + với số lượng của
        // sản phẩm đã cập nhật là  $this->items[$product_id]['quanty'] ở bước 2
        $this->totalQuanty += $this->items[$product_id]['quanty'];

        // tương tự tổng tiền
        $this->totalPrice += $this->items[$product_id]['price'];

    }

    //tạo một phương thức thêm vào giỏ hàng
    // truyền thông số vào gồm có sản phẩm là ($item) và chỉ số ($product_id) có nghĩa
    // là thêm vào sản phẩm thứ bao nhiêu
//    public function addCart($item, $product_id)
//    {
//// đầu tiên mặc định sp thêm vào là mới = 1 mảng key , value
//// trong mảng truyền vào đầu tiên là sl mặc định là 1
////thông số thứ 2 truyền vào là thông tin về sản phẩm là productinfo
//// sẽ = chính sản phẩm mình truyền vào là $product
//        $newProduct = ['quanty' => 0, 'price' => $item->price, 'item' => $item];
////tạo một phần tử mới trong giỏ hàng
//// Trường hợp 1 kiểm tra xem  nếu đã truyền vào 1 sp $product trong giỏ hàng rồi
//// thì chỉ việc tăng số lương lên
//// nếu sản phẩm tồn tại thì mình lấy sản phẩm tồn tại gán = newproduct
/////////////////////////
//// đầu tiên nếu cái list products có
//
//        if ($this->items) {
//// sử dụng hàm này(array_key_exists() có 2 đối số truyền vào
//// là $id và list  $products   public ở trên mình đã khởi tạo  $products = null;
//            if (array_key_exists($product_id, $this->items)) {
//                $newProduct = $this->items[$product_id];
//            }
//
//        }
//        // thêm một sản phẩm cho một đối tượng giỏ hàng rồi
//        $newProduct['quanty']++;
//        $newProduct['price'] = $item->price * $newProduct['quanty'];
//        $this->items[$product_id]= $newProduct;
//
//        // cập nhật lại tổng tiền và tổng số lượng
//        $this->totalQuanty++;
//        $this->totalPrice+= $item->price;
//    }







}
