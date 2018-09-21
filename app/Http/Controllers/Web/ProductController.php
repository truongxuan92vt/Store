<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController {

    protected $repos,$categoryRepo;

    public function __construct(
        Request $_request,
        ProductRepository $_repos,
        CategoryRepository $_categoryRepo
    ){
        parent::__construct($_request);
        $this->repos = $_repos;
        $this->categoryRepo = $_categoryRepo;
    }
    public function detail(){
        $id = $this->request->get('id');
        $category = $this->categoryRepo->find(1);
//        $detail = $this->repos->getProductDetail();
        return view('webs.products.detail',['category'=>$category]);

    }
}