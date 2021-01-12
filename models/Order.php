<?php

namespace workspace\modules\shop\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public $timestamps = false;

    public $fillable = ['name', 'surname', 'delivery_address', 'phone', 'email', 'comment', 'status'];

    public function _save()
    {
        $this->name = $_POST['name'];
        $this->surname = $_POST['surname'];
        $this->delivery_address = $_POST['delivery_address'];
        $this->phone = $_POST['phone'];
        $this->email = $_POST['email'];
        $this->comment = $_POST['comment'];
        $this->status = 0;
        $this->save();
    }
}
