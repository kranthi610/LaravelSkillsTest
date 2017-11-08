<?php
if($_POST){
	if(file_exists('products_list.json'))  
           {  
                $products_list = file_get_contents('products_list.json');  
                $product_data = json_decode($products_list, true);  
                $extra = array(  
                     'product_name' =>     $_POST['product_name'],  
                     'quantity_stock' =>     $_POST["quantity_stock"],  
                     'item_price' =>     $_POST["item_price"],
                     'date' => date("Y-m-d h:i:sa")
                );  
                $product_data[] = $extra;  
                $final_product = json_encode($product_data);  
                $file = file_put_contents('products_list.json', $final_product);
                 
           }  
           else  
           {  
                $error = 'Products File does not exits';  
           }
}
?>