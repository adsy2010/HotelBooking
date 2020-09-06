<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find($roomtype)
 * @method static findOrFail($roomtype)
 */
class RoomType extends Model
{
    //
    protected $fillable = ['name', 'description', 'hasTV', 'hasFacilities'];

    public function rooms()
    {
        return $this->hasMany('App\Room', 'roomType', 'id');
    }
}
