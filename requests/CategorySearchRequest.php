<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

/**
 * Class CategorySearchRequest
 * @package workspace\modules\shop\requests
 */
class CategorySearchRequest extends RequestSearch
{
    public $id;
    public $name;

    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }
}