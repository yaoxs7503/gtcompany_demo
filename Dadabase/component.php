<?php

function component($productName,$productPrice,$productImg,$productId){
$element=<<<DELIMETER
<div class="col-md-3 col-sm-6 my-3 my-md-0">
<form action="../Dadabase/shoppingcart.php" method="post">
<div class="card shadow">
<div>
  <img src="$productImg" alt="" srcset="" class="img-fluid card-img-top">
</div>
<div class="card-body">
  <h5 class="cart-title">$productName</h5>
  <h6>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="far fa-star"></i>
  </h6>
  <p class="card-text">
    新型發佈日期，提出不必，經銷商，戀愛鈴。
  </p>
  <h5>
    <small><s>$519</s></small>
    <span class="price">$$productPrice</span>
  </h5>
  <button type="submit" name="add" class="btn btn-danger my-3">加入购物车 <i class="fas fa-shopping-cart"></i></button>
  <input type="hidden" name="product_id" value="$productId">
</div>
</div>
</form>
</div>
DELIMETER;
echo $element;
}
function cartElement($productImg,$productName,$productPrice){
$element=<<<DELIMETER
<form action="cart.php" method="get" class="cart-items">
<div class="border rounded">
<div class="row bg-white">
<div class="col-md-3">
<img src=$productImg alt="" class="img-fluid">
</div>
<div class="col-md-6">
<h5 class="pt-2">$productName</h5>
<small class="text-secondary">产品</small>
<h5 class="pt-2">$productPrice</h5>
<button type="submit" class="btn btn-warning">保存</button>
<button type="submit" class="btn btn-danger mx-2" name="remove">移除</button>
</div>
<div class="col-md-3 py-5">
<div>
<button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
<input type="text" value="1" class="form-control w-25 d-inline">
<button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
</div>
</div>
</div>
</div>
</form>
DELIMETER;
echo $element;

} 

?>