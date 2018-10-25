<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\ProductCategoryRepository;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController {
    protected $categoryRepo,$itemRepo;
    public function __construct(
        Request $_request,
        ProductCategoryRepository $_categoryRepo,
        ProductRepository $_item
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
        $categoryId = $this->request->get('product_category_id');
        if(empty($categoryId)) $categoryId = 1;
        $category = $this->categoryRepo->find($categoryId);
        $product = $this->itemRepo->getProductByCategory($categoryId);
        return view('webs.categories.index',['category'=>$category,'products'=>$product]);
    }
}