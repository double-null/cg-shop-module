<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;
use workspace\modules\shop\requests\ProductParameterSearchRequest;

/**
 * Class ProductParameter
 * @package workspace\modules\shop\models
 */
class ProductParameter extends Model
{
    protected $table = "product_parameters";

    public $timestamps = false;

    public $fillable = ['product_id', 'parameter_id', 'value'];

    /**
     *
     */
    public function _save()
    {
        $this->product_id = $_POST["product_id"];
        $this->parameter_id = $_POST["parameter_id"];
        $this->value = $_POST["value"];
        $this->save();
    }

    /**
     * @param ProductParameterSearchRequest $request
     * @return mixed
     */
    public static function search(ProductParameterSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->product_id)
            $query->where('product_id', 'LIKE', "%$request->product_id%");

        if($request->parameter_id)
            $query->where('parametr_id', 'LIKE', "%$request->parameter_id%");

        if($request->value)
            $query->where('value', 'LIKE', "%$request->value%");

        return $query->get();
    }

    /**
     * @return mixed
     */
    public function parameter()
    {
        return $this->belongsTo(Parameter::class, 'parameter_id', 'id');
    }

}
