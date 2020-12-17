{core\App::$breadcrumbs->addItem(['text' => 'Create'])}
{*<div class="h1">{$h1}</div>*}

<div class="container">
    <form class="form-horizontal" name="create_form" id="create_form" method="post" action="/admin/products/create">
        <div class="form-group">
            <label for="category_id">Category_id:</label>
            <input type="text" name="category_id" id="category_id" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="mark">Mark:</label>
            <input type="text" name="mark" id="mark" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="parameters">Parameters:</label>
            <input type="text" name="parameters" id="parameters" class="form-control"  required="required" />
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="text" name="photo" id="photo" class="form-control"   />
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control"  required="required" />
        </div>


        <div class="form-group">
            <input type="submit" name="submit" id="submit_button" class="btn btn-dark" value="Submit">
        </div>
    </form>
</div>