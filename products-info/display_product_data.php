<?php
$products_list = file_get_contents('products_list.json');  
$array_data = json_decode($products_list, true); 
$product_count = count($array_data);

function sorted($a, $b) {
    return $a['date'] - $b['date'];
}
if($product_count>0){
  usort($array_data, 'sorted');
  
  echo "<br><h2 class='text-center'>Products List</h2><br>";
  echo '<table class="table">
       <thead>
        <tr>
         <th>Product Name</th>
         <th>Quantity in Stock</th>
         <th>Price per Item</th>
         <th>Date Submitted</th>
         <th>Total Value Number</th>
        </tr>
       </thead>
     <tbody>';

  $total = 0;
  for ($x = 0; $x <$product_count; $x++) {
    $product_name = $array_data[$x]['product_name'];
    $stock_quantity = $array_data[$x]['quantity_stock'];
    $item_price = $array_data[$x]['item_price'];
    $date = $array_data[$x]['date'];
    $total_price = $stock_quantity*$item_price;
    $total = $total + $total_price;
    echo " <tr>
         <td>$product_name</td>
         <td>$stock_quantity</td>
         <td>$item_price</td>
         <td>$date</td>
         <td>$total_price</td>
         <td><button class='btn-success' value='$x' onclick='edit(this.value);'>Edit</button></td>
       </tr>"; 
  } 

  echo "<tr>
        <td><h3>Total Value numbers</h3></td>
        <td></td>
        <td></td>
        <td></td>
        <td><h3>$total</h3></td></tr>
        </tbody>
       </table>";
}else{
  echo "<h3 class='text-center'>No Products Available</h3>";

}
?>