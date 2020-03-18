<?php
/**
 * Created by PhpStorm.
 * User: Truong Xuan
 * Date: 6/11/2019
 * Time: 10:50 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Repositories\ItemRepository;
use App\Models\Variant;
use App\Models\VariantValue;
use Illuminate\Http\Request;

class OptionController extends BaseController
{
    public function getVariant(){
        $res = Variant::select(
            "*"
        )->get();
        return response($res);
    }
    public function getVariantValue(Request $request){
        $variantId = $request->get('variant_id');
        $res = VariantValue::select(
            "*"
        )
            ->where('variant_id',$variantId)
            ->get();
        return response($res);
    }
}