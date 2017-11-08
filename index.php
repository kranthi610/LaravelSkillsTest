<!DOCTYPE html>
<html>
<head>
<title>Products</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="products-info/product.js"></script>

</head>
<body>


<div class="container">
  <h1 class="text-center"> Add Product</h1>
  <div id="product-form">
      <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" id="product_name" pattern="[a-zA-Z]*" name="product_name">
      </div>
      <div class="form-group">
        <label for="quantity_stock">Quantity in Stock</label>
        <input type="number" class="form-control" id="quantity_stock" name="quantity_stock">
      </div>
      <div class="form-group">
        <label for="item_price">Price per Item</label>
        <input type="number" class="form-control" id="item_price" step="0.01" name="item_price">
      </div>  
      <input type="hidden" id="product-id">
      <input type="submit" id="add-product" value="Add Product" class="btn btn-primary btn-success">
      <input type="submit" id="update-product" value="Update Product" class="btn btn-primary btn-success">
      <p id="product-success"></p>
  </div>
  <p id="error-message" class="text-danger"></p>
</div>
<div id="product-data" class="container">
</div>


</body>

</html>


