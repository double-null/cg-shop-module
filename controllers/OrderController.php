<?php

namespace workspace\modules\shop\controllers;

use core\Controller;
use workspace\modules\shop\models\{Category, Order};
use workspace\modules\shop\requests\OrderCreateRequest;

class OrderController extends Controller
{
    public function init()
    {
        $this->viewPath = '/modules/shop/views/';
        $this->layoutPath = '/modules/shop/views/';
        $categories = Category::all()->toArray();
        $this->view->tpl->assign('categories', $categories);
        $cartSize = (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0;
        $selectedProducts = $_SESSION['cart'] ?? [];
        $this->view->tpl->assign('cartSize', $cartSize);
        $this->view->tpl->assign('selectedProducts', $selectedProducts);
    }

    public function actionCreate()
    {
        $request = new OrderCreateRequest();
        if ($request->isPost() && $request->validate()) {
            (new Order)->_save();
            $this->redirect('');
        }
        return $this->render('shop/checkout.tpl', ['errors' => $request->getMessagesArray()]);
    }
}
