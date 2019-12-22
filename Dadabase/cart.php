<?php
session_start();

require_once("CreateDb.php");
require_once("component.php");

$db=new CreateDb("ProductDb","ProductTb");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cart</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css'/>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css'/>
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
 <?php
require('header.php'); 
 ?>
<div class="container-fluid">
<div class="row px-5">
<div class="col-md-7">
<div class="shopping-cart">
<h5>我的购物车</h5>
<hr>
<?php
$product_id=array_column($_SESSION['cart'],'product_id');
$result=$db->getData();
while($row=mysqli_fetch_assoc($result)){
  foreach ($product_id as $id) {
    if($row['id']==$id){
      cartElement($row['product_image'],$row['product_name'],$row['product_price']);
    }
  }
}
?>
</div>
</div>
</div>
<div class="col-md-5"></div>
</div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/esm/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
</html>