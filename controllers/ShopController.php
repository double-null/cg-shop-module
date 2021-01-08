<?php

namespace workspace\modules\shop\controllers;

use core\App;
use core\Controller;
use workspace\modules\shop\models\Category;
use workspace\modules\shop\models\Product;
use workspace\modules\shop\models\ProductPhoto;

class ShopController extends Controller
{
    protected function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = '/modules/shop/views/';
        $categories = Category::all()->toArray();
        $this->view->tpl->assign('categories', $categories);
    }

    public function actionIndex($page = 1)
    {
        $category_id = (int)($_GET['category'] ?? 1);
        $category = Category::find($category_id)->first();
        $totalProducts = Product::all()->where('category_id', $category_id)
            ->count();
        $products = Product::with('photos')
            ->where('category_id', $category_id)
            ->skip(($page-1)*5)
            ->take(5)
            ->get();
        return $this->render('shop/index.tpl', [
            'products' => $products->toArray(),
            'category' => $category->toArray(),
            'totalProducts' => $totalProducts,
            'page' => $page,
        ]);
    }

    public function actionView($id)
    {
        $product = Product::with('photos')
            ->with('category')
            ->where('id', '=', $id)
            ->first();
        return $this->render('shop/view.tpl', [
            'product' => $product->toArray(),
        ]);
    }

    public function actionAddProductToCart()
    {
        $product = Product::with('photos')
            ->where('id', (int)$_POST['product'])
            ->first()
            ->toArray();

        $_SESSION['cart'][] = array_merge($product, [
            'quantity' => (int)$_POST['quantity'],
        ]);
        echo json_encode(['status' => 1]);
        die;
    }

    public function actionRemoveProductFromCart()
    {
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['id'] == $_POST['product']) {
                unset($_SESSION['cart'][$key]);
            }
        }
        echo json_encode($_SESSION['cart']);
        die;
    }

    public function actionCart()
    {
        return $this->render('shop/cart.tpl', [
            'products' => $_SESSION['cart'],
        ]);
    }

    public function actionCheckout()
    {
        return $this->render('shop/checkout.tpl');
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
        ];
    }
}
