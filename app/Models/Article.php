<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "news";

    const arrStatus = [
        'PUBLIC' => '1',
        'NEW' => '2',
    ];

    public $timestamps = true;


    public static function getColorStatusLabel()
    {
        return [
            self::arrStatus['PUBLIC'] => 'badge badge-primary',
            self::arrStatus['NEW']   => 'badge badge-success',
        ];
    }

    public static function getStatusLabel()
    {
        return [
            self::arrStatus['PUBLIC']  => 'PUBLIC',
            self::arrStatus['NEW']   => 'NEW',
        ];
    }

}
