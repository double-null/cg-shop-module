<?php

namespace workspace\modules\Shop;


use core\App;

class Shop
{
    public static function run()
    {
        $config['adminLeftMenu'] = [
            [
                'title' => 'Shop',
                'url' => '/admin/shop',
                'icon' => '<i class="nav-icon fa fa-file"></i>',
            ],
        ];

        App::mergeConfig($config);
    }
}