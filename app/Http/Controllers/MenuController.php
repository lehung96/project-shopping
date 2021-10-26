<?php

namespace App\Http\Controllers;


use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{
    //cách hoạt động tức là trong cái class menuRecusive khi new đến cái MenuController trỏ đến phương thức hoặc create
    // thì đã chứa biến $this->menuRecusive = $menuRecusive; và bằng class MenuRecusive
    private $menuRecusive;
    private $menu;
    // khi truền vào biến  $menuRecusive sử dụng được bên cái class MenuRecusive
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        // biến  $this->menuRecusive nó sẽ truy cập được all method in classes
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    public function index()
    {
        $menus = Menu::paginate(10);

        return view('admin.menus.index',compact('menus'));

    }

    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
//        dd($$optionSelect);
        // trong hàm này mình sẽ show ra cái form create để return
        return view('admin.menus.add',compact('optionSelect'));
    }
    //store nhận vào Request
    public function store(Request $request)
    {
        // biến this trỏ đến menu-> trỏ đến create() tức là phương thức tạo

        $this->menu->create([
            //truyền vào trong method create và truyền vào tham số là một array
            // mảng lưu vào trong database dưới dạng key value
            //insert vào trong csdl
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug,
        ]);
        return redirect()->route('menus.index');


    }
    public function edit($id, Request $request)
    {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit->parent_id);
        //compact('optionSelect', 'menuFollowIdEdit')); trong đó có biến truyền vào menuFollowIdEdit thì sẽ truyền sang view
        return view('admin.menus.edit', compact('optionSelect', 'menuFollowIdEdit'));

    }
    public function update($id, Request $request)
    {
        //trước khi update mình cần phải find($id)tìm đến cái id cần update
        $this->menu->find($id)->update([
            // trong mảng update mình cần truyền vào những cái gì cần update , name,
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->name
        ]);
        return redirect()->route('menus.index');
    }

    // hàm xoá mềm softdelete
    public function delete($id)
    {
        $menu_del = Menu::find($id);
            Menu::find($id)->delete();
//        $this->category->find($id)->delete();
        return redirect()->route('menus.index',compact('menu_del'));
    }
    // hàm list ra cái menus đa xóa mền
    public function trash()
    {
        $menu_trash = Menu::onlyTrashed()->paginate(5);
        return view('admin.menus.trash',compact('menu_trash'));
    }
    // hàm khôi phục xóa mềm
    public function untrash($id)
    {
        $untrash = Menu::withTrashed()->find($id);
        //withTrashed() này mình muốn restore() chỉ cần cái biến untrash trỏ đến restore()
        $untrash->restore();

//        $this->category->find($id)->delete();
        return redirect()->route('menus.index');
    }
    // hàm xóa vĩnh viễn dữ liệu đã xóa mềm softdelete
    public function fordel($id){
        $untrash = Menu::withTrashed()->find($id);
        //withTrashed() này mình muốn restore() chỉ cần cái biến untrash trỏ đến restore()
        $untrash->forceDelete();

//        $this->category->find($id)->delete();
        return redirect()->route('menus.index');
    }



}
