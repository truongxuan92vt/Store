<?php

namespace App\Models;


use Illuminate\Support\Facades\URL;

class OptionValue extends BaseModel
{
    protected $table = 'option_values';
    public function standard(){
        $this->belongsTo(OptionStandard::class,"option_standard_id");
    }
    protected $guarded = [];
}