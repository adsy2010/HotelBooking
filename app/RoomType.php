<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class RoomType extends Model
{
    //
    public function rooms()
    {
        return $this->hasMany('App\Room', 'roomType', 'id');
    }
}
