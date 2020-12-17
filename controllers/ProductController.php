<?php


namespace workspace\modules\shop\controllers;


use core\App;
use core\Controller;
use workspace\modules\shop\models\Product;
use workspace\modules\shop\requests\ProductSearchRequest;

class ProductController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = App::$config['adminLayoutPath'];
        App::$breadcrumbs->addItem(['text' => 'AdminPanel', 'url' => 'adminlte']);
        App::$breadcrumbs->addItem(['text' => 'Product', 'url' => 'admin/products']);
    }

    public function actionIndex()
    {
        $request = new ProductSearchRequest();
        $model = Product::search($request);

        return $this->render('products/index.tpl', ['h1' => 'Product', 'options' => $this->setOptions($model)]);
    }

    public function actionView($id)
    {
        $model = Product::where('id', $id)->first();

        $options = $this->setOptions($model);

        return $this->render('products/view.tpl', ['model' => $model, 'options' => $options]);
    }

    public function actionStore()
    {
        if($this->validation()) {
            $model = new Product();
            $model->_save();

            $this->redirect('admin/products');
        } else
            return $this->render('products/store.tpl', ['h1' => 'Добавить']);
    }

    public function actionEdit($id)
    {
        $model = Product::where('id', $id)->first();

        if($this->validation()) {
            $model->_save();

            $this->redirect('admin/products');
        } else
            return $this->render('products/edit.tpl', ['h1' => 'Редактировать: ', 'model' => $model]);
    }

    public function actionDelete()
    {
        Product::where('id', $_POST['id'])->delete();
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'id' => 'Id',
                'category_id' => 'Category_id',
                'mark' => 'Mark',
                'name' => 'Name',
                'description' => 'Description',
                'parameters' => 'Parameters',
                'photo' => 'Photo',
                'price' => 'Price',
            ],
            'baseUri' => 'products'
        ];
   }

   public function validation()
   {
       return (isset($_POST["category_id"]) && isset($_POST["mark"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["parameters"]) && isset($_POST["photo"]) && isset($_POST["price"])) ? true : false;
   }
}