<?php


namespace workspace\modules\Shop\controllers;


use core\App;
use core\Controller;
use workspace\modules\Shop\models\Category;
use workspace\modules\Shop\models\Product;

class ShopController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/Shop/views/';
        $this->layoutPath = '/modules/Shop/views/';
        $categories = Category::all()->toArray();
        $this->view->tpl->assign('categories', $categories);
    }

    public function actionIndex($page = 1)
    {
        $category = (int)($_GET['category'] ?? 1);
        $totalProducts = Product::all()->where('category_id', $category)
            ->count();
        $products = Product::all()->where('category_id', $category)
            ->skip(($page-1)*15)
            ->take(15);

        return $this->render('Shop/index.tpl', [
            'products' => $products->toArray(),
            'options' => $this->setOptions($products),
            'totalProducts' => $totalProducts,
            'page' => $page,
        ]);
    }

    public function actionView($id)
    {
        $product = Product::where('id', $id)->first();
        return $this->render('Shop/view.tpl', ['product' => $product]);
    }

    public function setOptions($data)
    {
        return [
            'data' => $data,
            'serial' => '#',
            'fields' => [
                'mark' => 'Артикул',
                'name' => 'Название',
                'description' => 'Описание',
                'parameters' => 'Характеристики',
                'photo' => 'Фото',
                'price' => 'Цена',
            ],
            'baseUri' => '/shop',
            'pagination'  => [
                'per_page' => 10,
                'class' => '',
                'class-active' => '',
                'class-control' => '',
            ]
        ];
    }}