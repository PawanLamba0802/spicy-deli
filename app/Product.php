<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'SKU','price'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    

}
