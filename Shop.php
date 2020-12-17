<?php

namespace workspace\modules\shop;

use core\App;

class Shop
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Магазин',
                'url' => '#',
                'icon' => '<i class="nav-icon fa fa-shopping-cart"></i>',
                'sub' => [
                    [
                        'title' => 'Категории',
                        'url' => '/admin/categories'
                    ],
                    [
                        'title' => 'Товары',
                        'url' => '/admin/products',
                    ],
                    [
                        'title' => 'Список характеристик',
                        'url' => '/admin/parameters',
                    ],
                    [
                        'title' => 'Характеристики товаров',
                        'url' => '/admin/product_parameters',
                    ],
                ],
            ],
        ];
        App::mergeConfig($config);
    }
}
