<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

/**
 * Class ParameterSearchRequest
 * @package workspace\modules\shop\requests
 */
class ParameterSearchRequest extends RequestSearch
{
    public $id;
    public $name;
    public $type;
    public $unit;

    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }
}