<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    	'product_category_id',
    	'name',
    	'image',
    	'price',
    	'tag',
    	'description',
    ];

    public function product(){

    	return $this->hasMany(ProductCategory::class);
    }

    public static function productcat($id){

    	return ProductCategory::where('id',$id)->first();
    }
}
