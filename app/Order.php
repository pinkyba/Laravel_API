<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
            'codeno','orderdate', 'total', 'status', 'user_id'
        ];

    public function items(){
    	return $this->belongsToMany('App\Item','orderdetails')
    				->withPivot('qty')
    				->withTimestamps();
    }

    public function user($value='')
    {
    	return $this->belongsTo('App\User');
    }
}
