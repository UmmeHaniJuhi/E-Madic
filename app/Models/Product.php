<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=
    ['id','name','image','description','price','quantity','cat_id','subcat_id','br_id','type','status'];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
        
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'subcat_id');
        
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'br_id');
        
    }
    public static function catProductCount($cat_id){
        $catCount=Product::where('cat_id',$cat_id)->where('status',1)->count();
        return $catCount;
        
    }
    public static function subcatProductCount($subcat_id){
        $subcatCount=Product::where('subcat_id',$subcat_id)->where('status',1)->count();
        return $subcatCount;
        
    }
    public static function brandProductCount($br_id){
        $brandCount=Product::where('br_id',$br_id)->where('status',1)->count();
        return $brandCount;
        
    }
   
}
