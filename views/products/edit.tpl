{assign var="url" value="{'products/'}{$model->id}"}
{core\App::$breadcrumbs->addItem(['text' => $model->id, 'url' => {$url}])}
{core\App::$breadcrumbs->addItem(['text' => 'Edit'])}
<div class="h1">{$h1} {$model->id}</div>

<div class="container">
    <form class="form-horizontal" name="edit_form" id="edit_form" method="post" action="/admin/products/update/{$model->id}">
        <div class="form-group">
            <label for="category_id">Category_id:</label>
            <input type="text" name="category_id" id="category_id" class="form-control" value="{$model->category_id}" required="required" />
        </div>

        <div class="form-group">
            <label for="mark">Mark:</label>
            <input type="text" name="mark" id="mark" class="form-control" value="{$model->mark}" required="required" />
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{$model->name}" required="required" />
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" name="description" id="description" class="form-control" required="required" rows="12">{$model->description|htmlspecialchars}</textarea>
        </div>

        <div class="form-group">
            <label for="parameters">Parameters:</label>
            <input type="text" name="parameters" id="parameters" class="form-control" value="{$model->parameters|htmlspecialchars}" required="required" />
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="text" name="photo" id="photo" class="form-control" value="{$model->photo}"  />
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{$model->price}" required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>