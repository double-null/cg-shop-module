<div class="container">
    <div class="row">
        {foreach $products as $product}
            <div class="col-md-4">
                <a href="/product/{$product.id}/">
                    <img class="img-fluid" src="/images/{$product.photo}" />
                </a>
                <div class="div">
                    <a href="/product/{$product.id}/">
                        {$product.id}. {$product.name}
                    </a>
                </div>
            </div>
        {/foreach}
    </div>
    <div class="row">
        <div class="col-12">
            {core\Pagination::widget()->setParams('', $totalProducts, $options['pagination'], $page)->run()}
        </div>
    </div>
</div>
