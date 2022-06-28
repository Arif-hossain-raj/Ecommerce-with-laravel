$(document).ready(function() {

    loadcart();
    loadwishlist();

    function loadcart(){
        $.ajax({
            method:"GET",
            url: "/load-cart-data",
            success: function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }
    function loadwishlist(){
        $.ajax({
            method:"GET",
            url: "/load-wishlist-data",
            success: function(response){
                $('.cwishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    $('.addToWishlist').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        
    $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
    
        $.ajax({
            method:"POST",
            url: "/add-to-wishlist",
            data: {
                'product_id' : product_id,
            },
            success: function(response){
                swal(response.status);
                loadwishlist();
            }
        });

    }); 



    $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty_input').val();
        

    $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
    
        $.ajax({
            method:"POST",
            url: "/add-to-cart",
            data: {
                'product_id' : product_id,
                'product_qty': product_qty,
            },
            success: function(response){
                swal(response.status);
                loadcart();
            }
        });

    });    

    $('.increment-btn').click(function(e){
        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find('.qty_input').val();
       
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value<10){
            value++;
            $(this).closest('.product_data').find('.qty_input').val(value);

        }
    });
    $('.decrement-btn').click(function(e){
        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find('.qty_input').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value) ? 0 : value;

        if(value<=10){
            value--;
            $(this).closest('.product_data').find('.qty_input').val(value);

        }
    });

    $('.delete-cart-item').click(function(e){
        e.preventDefault();
        
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        
       

        $.ajax({
            method:"POST",
            url:"delete-cart-item",
            data: {
                'product_id' : product_id,
                
            },
            success: function(response){
                window.location.reload();
                swal(response.status);
                
            }
        });

    });

    $('.remove-wishlist-item').click(function(e){
        e.preventDefault();
        
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        
       

        $.ajax({
            method:"POST",
            url:"delete-wishlist-item",
            data: {
                'product_id' : product_id,
                
            },
            success: function(response){
                window.location.reload();
                swal(response.status);
            }
        });

    });



    $('.changeQuantity').click(function(e){
        e.preventDefault();
        
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty_input').val();
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        
       

        $.ajax({
            method:"POST",
            url:"update-cart",
            data: {
                'prod_id' : product_id,
                'prod_qty' : qty,
                
            },
            success: function(response){
                window.location.reload();
            }
        });

    });

});