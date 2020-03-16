<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
//    protected $status = [
//        1 => [
//            'name' => 'Public',
//            'class'=> 'label-success'
//        ],
//        2 => [
//            'name' => 'Private',
//            'class'=> 'label-danger'
//        ]
//    ];
    public function getActive($active)
    {
        if ($active == '1') return 'Public';
        return 'Private';
    }
    public function getClassActive($active)
    {
        if ($active == '1') return 'label-success';
        return 'label-danger';
    }
    public function getHot($hot)
    {
        if ($hot == '1') return 'Nổi bật';
        return 'Không';
    }
    public function getClassHot($hot)
    {
        if ($hot == '1') return 'label-danger';
        return 'label-default';
    }
    public function category(){
        return $this->belongsTo(Category::class,'pro_category_id');
    }
}
