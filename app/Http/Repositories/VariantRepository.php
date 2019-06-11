<?php
namespace App\Http\Repositories;

use App\Models\Variant;
use Illuminate\Support\Facades\DB;

class VariantRepository extends BaseRepository
{
    /**
     * get model
     * @return string
     */
    public function model()
    {
        return Variant::class;
    }
    /*public static function option($data = []){
        $res = OptionValue::select([
                'sizes.id',
                'sizes.code',
                DB::raw('IF(size_standards.id is not null,CONCAT(size_standards.name,"-",size_standards.gender,"-",sizes.name),sizes.name) as text'),
                'sizes.priority',
                'sizes.desc',
                'sizes.size_standard_id',
                'size_standards.name as size_standard_name',
                'size_standards.gender',
            ])
            ->leftJoin('size_standards','size_standards.id','sizes.size_standard_id')
            ->where('sizes.status',ENABLE);
        if(!empty($data)){
            $res->whereIn('sizes.id',$data);
        }
        $res = $res->get();
        return $res;
    }
    public static function optionById($data = []){
        $res = OptionValue::select([
            'sizes.id',
            'sizes.code',
            DB::raw('IF(size_standards.id is not null,CONCAT(size_standards.name,"-",size_standards.gender,"-",sizes.name),sizes.name) as text'),
            'sizes.priority',
            'sizes.desc',
            'sizes.size_standard_id',
            'size_standards.name as size_standard_name',
            'size_standards.gender',
        ])
            ->leftJoin('size_standards','size_standards.id','sizes.size_standard_id')
            ->where('sizes.status',ENABLE)
            ->whereIn('sizes.id',$data);
        $res = $res->get();
        return $res;
    }*/
}