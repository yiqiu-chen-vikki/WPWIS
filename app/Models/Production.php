<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function material(){
        return $this->belongsTo(Material::class,'material_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function worker(){
        return $this->belongsTo(worker::class,'worker_id','id');
    }
}
