<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;

class photo extends Model
{
    protected $table = 'photos';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('product_name', 'color', 'url', 'alt');
    //protected $visible = array('name', 'color');

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
