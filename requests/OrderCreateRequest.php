<?php


namespace workspace\modules\shop\requests;

use core\Request;

class OrderCreateRequest extends Request
{
    public $name;
    public $surname;
    public $delivery_address;
    public $phone;
    public $email;
    public $comment;
    //public $status = 0;

    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'delivery_address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'comment' => '',
        ];
    }

}