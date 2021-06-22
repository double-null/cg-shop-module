<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

/**
 * Class ProductSearchRequest
 * @package workspace\modules\shop\requests
 */
class ProductSearchRequest extends RequestSearch
{
    public $id;
    public $category_id;
    public $mark;
    public $name;
    public $description;
    public $price;

    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
