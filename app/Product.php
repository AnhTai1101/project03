<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public function ProductQuantity()
    {
        return $this->hasMany('App\Product_Quantity', 'product_id', 'id');
    }
    public function color()
    {
        return $this->belongsTo('App\color', 'color_id', 'id');
    }
    public function size()
    {
        return $this->belongsTo('App\size', 'size_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo('App\Type_Product', 'typeProduct_id', 'id');
    }
    public function info()
    {
        return $this->belongsTo('App\Type_Info', 'typeInfo_id', 'id');
    }
    public function BillDetail()
    {
        return $this->hasMany('App\Bill_detail', 'product_id', 'id');
    }
}
