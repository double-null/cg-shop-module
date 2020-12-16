<?php

use core\App;

App::$collector->get('shop/{page:i}?', ['workspace\modules\Shop\controllers\ShopController', 'actionIndex']);

App::$collector->get('product/{id}/', ['workspace\modules\Shop\controllers\ShopController', 'actionView']);
