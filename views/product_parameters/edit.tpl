{assign var="url" value="{'product_parameters/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->id}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/product_parameters/update/{$model->id}">
        <div class="form-group">
            <label for="product_id">Product_id:</label>
            <input type="text" name="product_id" id="product_id" class="form-control" value="{$model->product_id}" required="required" />
        </div>

        <div class="form-group">
            <label for="parametr_id">Parametr_id:</label>
            <input type="text" name="parametr_id" id="parametr_id" class="form-control" value="{$model->parametr_id}" required="required" />
        </div>

        <div class="form-group">
            <label for="value">Value:</label>
            <input type="text" name="value" id="value" class="form-control" value="{$model->value}" required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>