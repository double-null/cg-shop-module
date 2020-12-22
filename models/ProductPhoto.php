<?php


namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $table = "product_photos";

    public $timestamps = false;

    public $fillable = ['product_id', 'name', 'cover'];

    public function _save($productId, $name, $cover)
    {
        $this->product_id = $productId;
        $this->name = $name;
        $this->cover = $cover;
        $this->save();
    }
}
