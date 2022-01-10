$(document).ready(function () {


    $('.increment-btn').click(function (e) {
        e.preventDefault();
        
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;            
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_quantity = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "/add_to_cart",
            data: {
                 'product_id' : product_id,
                 'product_quantity' : product_quantity,
            },
            success: function (response) {
                swal(response.status);
            }
        });
    });


    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "/update_cart",
            data: {
                 'product_id' : product_id,
                 'product_qty' : qty,
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });


    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        
        $.ajax({
            method: "POST",
            url: "/delete_cart_item",
            data: {
                 'product_id' : product_id,                 
            },
            success: function (response) {
                window.location.reload();                
            }
        });
    });

 });   