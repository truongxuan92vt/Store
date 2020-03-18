<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends BaseController {

    protected $repos,$categoryRepo;

    public function __construct(
        Request $_request,
        ItemRepository $_repos,
        CategoryRepository $_categoryRepo
    ){
        parent::__construct($_request);
        $this->repos = $_repos;
        $this->categoryRepo = $_categoryRepo;
    }
    public function detail(){
        $id = $this->request->get('id');
        $category = $this->categoryRepo->find(1);
        $item = $this->repos->find($id);
//        dd(json_encode($item));
//        $detail = $this->repos->getItemDetail();
        return view('webs.items.detail',['category'=>$category,'item'=>$item]);

    }
}