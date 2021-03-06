<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Created by PhpStorm.
 * User: alifjafar
 * Date: 12/12/19
 * Time: 6:15
 */


trait Uuid
{
    public static function bootUuid()
    {
        static::creating(static function (Model $model) {
            $uuid = (string)Str::orderedUuid();
            $model[$model->getKeyName()] = $uuid;
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return "string";
    }
}
