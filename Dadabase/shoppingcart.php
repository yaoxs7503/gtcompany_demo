<?php

session_start();
require_once('CreateDb.php');
require_once('component.php');

$database=new CreateDb("ProductDb","ProductTb");

if(isset($_POST['add'])){
  // print($_POST['product_id']);
  if(isset($_SESSION['cart'])){
  // print_r($_SESSION['cart'][0]['product_id']);
  $item_array_id=array_column($_SESSION['cart'],"product_id");
  // print_r($item_array_id);
  if(in_array($_POST['product_id'],$item_array_id)){
    // echo "<script>alert('产品可以加入')</script>";
    // echo "<script>window.location='shoppingcart.php'</script>";
  }else{
  $count=count($_SESSION['cart']);
  // print_r($count);
  $item_array=array(
    'product_id'=>$_POST['product_id']
  );
  $_SESSION['cart'][$count]=$item_array;
  print_r($_SESSION);
  }
    // unset($_SESSION['cart']);
  }else{
    $item_array=array(
      'product_id'=>$_POST['product_id']
    );
  $_SESSION['cart'][0]=$item_array;
  print_r($_SESSION['cart']);
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
 
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css'/>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/fontawesome.min.css'/>
<link rel="stylesheet" href="style.css">
<body>
<?php require "header.php" ?>
<div class="container">
<div class="row text-center py-5">
<?php
// component("电脑","599","../upload/product1.jpg");
// component("联想电脑","599","../upload/product1.jpg");
// component("戴尔电脑","1599","../upload/product1.jpg");
// component("电脑","2599","../upload/product1.jpg");
$result=$database->getData();
// var_dump($result);
while($row=mysqli_fetch_assoc($result)){
component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
}
?>
<div class="col-md-3 col-sm-6 my-3 my-md-0"></div>
<div class="col-md-3 col-sm-6 my-3 my-md-0"></div>
<div class="col-md-3 col-sm-6 my-3 my-md-0"></div>
</div>
</div>

</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/all.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.0.0-next.4/umd/index.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>
</html>