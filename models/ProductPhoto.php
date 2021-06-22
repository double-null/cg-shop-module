<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductPhoto
 * @package workspace\modules\shop\models
 */
class ProductPhoto extends Model
{
    protected $table = "product_photos";

    public $timestamps = false;

    public $fillable = ['product_id', 'name', 'cover'];

    /**
     * @param $productId
     * @param $name
     * @param $cover
     */
    public function _save($productId, $name, $cover)
    {
        $this->product_id = $productId;
        $this->name = $name;
        $this->cover = $cover;
        $this->save();
    }

    /**
     * @param $product
     */
    public function deleteAllByProduct($product)
    {
        $imagePath = ROOT_DIR.'/images/';
        $model = $this->where('product_id', $product)->get();
        foreach ($model as $photo) {
            $image = $imagePath.$photo->name;
            if (file_exists($image)) {
                unlink($image);
            }
            $photo->delete();
        }
    }
}
