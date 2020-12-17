<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid" src="/images/{$product.photo}" />
        </div>
        <div class="col-md-8">
            <div class="div">
                <h2>{$product.name}</h2>
                <b>Артикул: {$product.mark}</b>
                {$product.description}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div>Характеристики:</div>
            {foreach $product.parameters|json_decode as $parameter}
                <div>{$parameter->attribute}: {$parameter->value}</div>
            {/foreach}
        </div>
    </div>
</div>