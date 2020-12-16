<?php


namespace workspace\modules\Shop\models;


use Illuminate\Database\Eloquent\Model;
use workspace\modules\Categories\requests\CategorySearchRequest;

class Category extends Model
{
    protected $table = "categories";

    public $fillable = ['name', 'link', 'scanned'];

    public function _save()
    {
            $this->name = $_POST["name"];
            $this->link = $_POST["link"];
            $this->scanned = $_POST["scanned"];

        $this->save();
    }

    /**
     * @param CategorySearchRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function search(CategorySearchRequest $request)
    {
        $query = self::query();

        if($request->id)
            $query->where('id', 'LIKE', "%$request->id%");

        if($request->name)
            $query->where('name', 'LIKE', "%$request->name%");

        if($request->link)
            $query->where('link', 'LIKE', "%$request->link%");

        if($request->scanned)
            $query->where('scanned', 'LIKE', "%$request->scanned%");


        return $query->get();
    }
}