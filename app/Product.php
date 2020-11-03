<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Photo;

class Product extends Model
{
    
    protected $table = 'products';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('p_id', 'product_name', 'brand', 'product_ram', 'product_rom', 
    'product_cpu', 'front_cam', 'back_cam', 'operating_sys', 'phone_status','guaranty_months', 
    'supplier_pr', 'seller_pr', 'colors', 'manufacturing_country','gpu','media','photo');
    public function products_accessories()
    {
        return $this->hasMany('App\ProductAccessory', );
    }

    public function product_photos()
    {
        return $this->hasMany('App\ProductPhoto',);
    }
    public function likes()
    {
        return $this->hasMany('App\ProductLike', );
    }

    public function getSupplyer()
    {
        return $this->hasOne('App\Supplier', 'supplyer_id');
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

}
