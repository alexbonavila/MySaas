<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shotout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'message'
    ];
    protected $with = array('user');
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}