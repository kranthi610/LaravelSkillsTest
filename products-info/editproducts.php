<?php
 
$products_list = file_get_contents('products_list.json');  
$product_data = json_decode($products_list, true); 
$product_count = count($product_data);
function sorted($a, $b) {
    return $a['date'] - $b['date'];
}

usort($product_data, 'sorted');
$return_arr = array(
	                "product_name" => $product_data[$_GET['id']]['product_name'],
                    "stock_quantity" => $product_data[$_GET['id']]['quantity_stock'],
                    "item_price" => $product_data[$_GET['id']]['item_price']

                    );
    
echo json_encode($return_arr);



?>