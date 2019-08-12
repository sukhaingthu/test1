<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use SoftDeletes;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
    	'name',
    	'descriptions',
    	'created_at',
    	'updated_at',
    	'deleted_at'
    ];

    public function products(){
    	return $this->hasMany(Product::class);
    }
}
