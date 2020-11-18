<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    protected $table = "category_article";

    const arrStatus = [
        'ACTIVE' => 1,
        'DISABLE' => 2
    ];
}
