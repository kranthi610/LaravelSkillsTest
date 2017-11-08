
//fucntion to edit product details
function edit(value){
	var val = value;
	$("#add-product").hide();
	$("#update-product").show();

    $.ajax({
        type: 'GET',
        dataType:'JSON',
        url: 'products-info/editproducts.php',
        data: {id:val},
        success:function(data){
        	$('#product_name').val(data.product_name);
            $('#quantity_stock').val(data.stock_quantity);
            $('#item_price').val(data.item_price);
            $('#product-id').val(val); 
        }
    });
};

$(document).ready(function(){
	$("#update-product").hide();

	//Add product details to the json file
	$("#add-product").click(function(){
		var product_name = $('#product_name').val();
        var quantity_stock = $('#quantity_stock').val();
        var item_price = $('#item_price').val();
        if(product_name!='' &&quantity_stock!='' &&item_price!='' ){
        	$.ajax({
        		type: 'post',
                url: 'products-info/productsinsert.php',
                data: {product_name:product_name,quantity_stock:quantity_stock,item_price:item_price},
                success: function () {
                	$('#product_name').val('');
                    $('#quantity_stock').val('');
                    $('#item_price').val('');
                	$("#add-product").blur();
                    $('#product-data').load('products-info/display_product_data.php');
                    $('#error-message').text('');
                	$("#product-success").text("Product Data Submitted Successfully");
                    setTimeout(function(){ $("#product-success").text(""); }, 1000);
                    
                	
                }
            }); 
        }else{
        	$('#error-message').text('All fields are required');
            $("#add-product").blur();
        }
    });

  	//Update product details in the json file
    $("#update-product").click(function(){
    	var product_name = $('#product_name').val();
        var quantity_stock = $('#quantity_stock').val();
        var item_price = $('#item_price').val();
        var id = $('#product-id').val();
        if(product_name!='' &&quantity_stock!='' &&item_price!='' ){
        	$.ajax({
        		type: 'post',
                url: 'products-info/productsupdate.php',
                data: {product_name:product_name,quantity_stock:quantity_stock,item_price:item_price,id:id},
                success: function(){
                	$('#product_name').val('');
                    $('#quantity_stock').val('');
                    $('#item_price').val('');
                    $("#add-product").blur();
                    $('#product-data').load('products-info/display_product_data.php');
                    $('#error-message').text('');
                    $("#add-product").show();
	                $("#update-product").hide();
                    $("#product-success").text("Product Data Updated Successfully");
                    setTimeout(function(){ $("#product-success").text(""); }, 1000);
	            }
            }); 
        }else{
        	$('#error-message').text('All fields are required');
            $("#add-product").blur();
        }
    });
    
    //Dispaly product data on document ready
    $('#product-data').load('products-info/display_product_data.php');
});
