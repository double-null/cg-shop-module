<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

/**
 * Class ProductParameterSearchRequest
 * @package workspace\modules\shop\requests
 */
class ProductParameterSearchRequest extends RequestSearch
{
    public $id;
    public $product_id;
    public $parameter_id;
    public $value;

    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
