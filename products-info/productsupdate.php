<?php
if($_POST){
	if(file_exists('products_list.json'))  
           {  
                $products_list = file_get_contents('products_list.json');  
                $product_data = json_decode($products_list, true);  
                function sorted($a, $b) {
                	return $a['date'] - $b['date'];
                }
                usort($product_data, 'sorted');
             
                $product_data[$_POST['id']]['product_name'] = $_POST['product_name'];
                $product_data[$_POST['id']]['quantity_stock'] = $_POST['quantity_stock'];
                $product_data[$_POST['id']]['item_price'] = $_POST['item_price'];
                $product_data[$_POST['id']]['date'] = date("Y-m-d h:i:sa");
        
           $final_product = file_put_contents('products_list.json', json_encode($product_data));
          
}
         }
?>