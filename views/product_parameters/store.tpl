{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/product_parameters/create">
        <div class="form-group">
            <label for="product_id">Product_id:</label>
            <input type="text" name="product_id" id="product_id" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="parametr_id">Parametr_id:</label>
            <input type="text" name="parametr_id" id="parametr_id" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="value">Value:</label>
            <input type="text" name="value" id="value" class="form-control"  required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>