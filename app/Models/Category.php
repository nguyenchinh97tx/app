<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getStatus($active){
        if($active=='1') return 'Public';
        return "Private";
    }
    public function getClassStatus($active)
    {
        if ($active == '1') return 'label-success';
        return 'label-danger';
    }

}
