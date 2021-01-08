{capture name=breadcrumbs}
    <span class="mr-2"><a href="/shop/">Главная</a></span>
    <span>{$category.name}</span>
{/capture}

<section class="ftco-section bg-light">
    <div class="container-fluid">
        <div class="row">
            {foreach $products as $product}
                <div class="col-sm col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="product">
                        <a href="/product/{$product.id}/" class="img-prod">
                            {foreach $product.photos as $photo}
                                {if $photo.cover == 1}
                                    <img class="img-fluid" src="/images/{$photo.name}">
                                {/if}
                            {/foreach}
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">{$product.name}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">{$product.price}</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <p class="bottom-area d-flex">
                                <a href="#" class="add-to-cart"><span>Добавить в карзину<i class="ion-ios-add ml-1"></i></span></a>
                                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                            </p>
                        </div>
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
</section>

