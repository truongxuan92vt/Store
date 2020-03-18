<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController {
    protected $categoryRepo,$itemRepo;
    public function __construct(
        Request $_request,
        CategoryRepository $_categoryRepo,
        ItemRepository $_item
    ){
        parent::__construct($_request);
        $this->categoryRepo = $_categoryRepo;
        $this->itemRepo = $_item;

    }
    public function home(){
        $category = $this->categoryRepo->find(1);
//        $item = $this->itemRepo->getProductForHome();
        return view('webs.home',['category'=>$category]);
    }
    public function getCategory(){
        $categoryId = $this->request->get('category_id');
        if(empty($categoryId)) $categoryId = 1;
        $category = $this->categoryRepo->find($categoryId);
        $item = $this->itemRepo->getItemByCategory($categoryId);
        return view('webs.categories.index',['category'=>$category,'items'=>$item]);
    }
}