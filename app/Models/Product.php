<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'image', 'category_id', 'unit_id','quantity','status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

   
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }
}
