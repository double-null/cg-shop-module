<?php


namespace workspace\modules\shop\requests;

use core\Request;

/**
 * Class OrderCreateRequest
 * @package workspace\modules\shop\requests
 */
class OrderCreateRequest extends Request
{
    public $name;
    public $surname;
    public $delivery_address;
    public $phone;
    public $email;
    public $comment;
    //public $status = 0;

    /**
     * @return string[]
     */
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

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name' => 'Поле Имя обязательно для заполнения',
            'surname' => 'Поле Фамилия обязательно для заполнения',
            'delivery_address' => 'Не указан адрес доставки',
            'phone' => 'Телефон не указан',
            'email' => 'Email введен не корректно',
        ];
    }
}