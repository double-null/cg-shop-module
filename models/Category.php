<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;
use workspace\modules\shop\requests\CategorySearchRequest;

/**
 * Class Category
 * @package workspace\modules\shop\models
 */
class Category extends Model
{
    protected $table = "categories";

    public $timestamps = false;

    public $fillable = ['name'];

    /**
     *
     */
    public function _save()
    {
        $this->name = $_POST["name"];
        $this->save();
    }

    /**
     * @param CategorySearchRequest $request
     * @return mixed
     */
    public static function search(CategorySearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        return $query->get();
    }
}