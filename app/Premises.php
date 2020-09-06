<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static find($premise)
 * @method static findOrFail($premise)
 */
class Premises extends Model
{
    //
    protected $fillable = ['address', 'city', 'postcode', 'tel', 'email', 'description'];
    public function rooms()
    {
        return $this->hasMany('App\Room', 'premise', 'id');
    }

    public function roomTypes()
    {
        return $this->hasManyThrough(
            'App\RoomTypes',
            'App\Room',
            'premise',  //fk on room table
            'id',  // fk on roomtypes table
            'id',  //local key on premises table
            'roomType' //localkey on rooms table
        );
    }
}
