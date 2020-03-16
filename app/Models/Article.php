<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
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
}

