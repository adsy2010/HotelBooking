<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Room extends Model
{
    //
    public function roomType()
    {
        return $this->hasOne('App\RoomType', 'id', 'roomType');
    }

    public function premises()
    {
        return $this->hasOne('App\Premises', 'id', 'premise');
    }
}
