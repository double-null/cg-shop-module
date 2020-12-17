<?php


namespace workspace\modules\shop\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\shop\requests\ProductSearchRequest;

class Product extends Model
{
    protected $table = "products";

    public $timestamps = false;

    public $fillable = ['mark', 'name', 'description', 'parameters', 'photo', 'price'];

    public function _save()
    {
            $this->mark = $_POST["mark"];
            $this->name = $_POST["name"];
            $this->description = $_POST["description"];
            $this->parameters = $_POST["parameters"];
            $this->photo = $_POST["photo"];
            $this->price = $_POST["price"];

        $this->save();
    }

    /**
     * @param ProductSearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(ProductSearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->mark)
            $query->where('mark', 'LIKE', "%$request->mark%");

        if($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        if($request->description)
            $query->where('description', 'LIKE', "%$request->description%");

        if($request->parameters)
            $query->where('parameters', 'LIKE', "%$request->parameters%");

        if($request->photo)
            $query->where('photo', 'LIKE', "%$request->photo%");

        if($request->price)
            $query->where('price', 'LIKE', "%$request->price%");


        return $query->get();
    }
}