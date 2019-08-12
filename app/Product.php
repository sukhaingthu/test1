<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    
    protected $table = 'products';
    protected $fillable =[
    	'id',
    	'name',
    	'descriptions',
    	'price',
    	'producedon',
    	'category_id',
    	'created_at',
    	'updated_at'
    	
    ];
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
