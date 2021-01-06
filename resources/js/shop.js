$('.add-to-cart').click(function(e){
    e.preventDefault();
    var product = $(this).data('product');
    var quantity = $('#quantity').val();
    $.post('/shop/add_to_cart', {'product':product, 'quantity':quantity}, function (){
        var count_products = $('#products-in-cart').text();
        $('#products-in-cart').text(++count_products);
    }, 'json');
});

$('.remove-from-cart').click(function(e){
    e.preventDefault();
    var product = $(this).data('product');
});