{assign var="url" value="{'product_parameters/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => $url])}
<div class="h1">{$model->id}</div>

{core\DetailView::widget()->setParams($model, $options)->run()}