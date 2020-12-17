<?php

namespace workspace\modules\shop\requests;

use core\RequestSearch;

class CategorySearchRequest extends RequestSearch
{
    public $id;
    public $name;
    public $link;
    public $scanned;


    public function rules()
    {
        return [];
    }
}