<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;
use workspace\modules\shop\requests\ProductSearchRequest;

/**
 * Class Product
 * @package workspace\modules\shop\models
 */
class Product extends Model
{
    protected $table = "products";

    public $timestamps = false;

    public $fillable = ['category_id', 'mark', 'name', 'description', 'price'];

    /**
     *
     */
    public function _save()
    {
        $this->category_id = $_POST["category_id"];
        $this->mark = $_POST["mark"];
        $this->name = $_POST["name"];
        $this->description = $_POST["description"];
        $this->price = $_POST["price"];
        $this->save();
    }

    /**
     * @param ProductSearchRequest $request
     * @return mixed
     */
    public static function search(ProductSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->mark)
            $query->where('mark', 'LIKE', "%$request->mark%");

        if($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        if($request->description)
            $query->where('description', 'LIKE', "%$request->description%");

        if($request->price)
            $query->where('price', 'LIKE', "%$request->price%");

        return $query->get();
    }

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return mixed
     */
    public function parameters()
    {
        return $this->hasMany(ProductParameter::class);
    }

    /**
     * @return mixed
     */
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
