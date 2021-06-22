<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;
use workspace\modules\shop\requests\ParameterSearchRequest;

/**
 * Class Parameter
 * @package workspace\modules\shop\models
 */
class Parameter extends Model
{
    protected $table = "parameters";

    public $timestamps = false;

    public $fillable = ['name', 'type', 'unit'];

    /**
     *
     */
    public function _save()
    {
            $this->name = $_POST["name"];
            $this->type = $_POST["type"];
            $this->unit = $_POST["unit"];

        $this->save();
    }

    /**
     * @param ParameterSearchRequest $request
     * @return mixed
     */
    public static function search(ParameterSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        if($request->type)
            $query->where('type', 'LIKE', "%$request->type%");

        if($request->unit)
            $query->where('unit', 'LIKE', "%$request->unit%");


        return $query->get();
    }

    /**
     * @return mixed
     */
    public function productParameters()
    {
        return $this->belongsToMany('\modules\shop\models\ProductParameter');
    }
}
