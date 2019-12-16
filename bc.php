<?php
session_start();
// var_dump($_SESSION);
$con=mysqli_connect("localhost","root","guotong","it_think_sql");
if($con){
  // echo "连接成功";
}
else{
  echo "连接失败". die(mysqli_connect_error());
}
$product_name=isset($_POST['product_name'])? $_POST["product_name"]:null; $product_name=mysqli_real_escape_string($con,$product_name); 
$query="SELECT id FROM think_product WHERE product_name={$product_name}";
if($sql=mysqli_query($con,$query))
{
  $productMath=mysqli_num_rows($sql);
  if($productMath){
  $query2 = "SELECT * FROM think_image_path WHERE product_image ='$product_name'";
  $result = mysqli_query($con, $query2);
  $numbers = mysqli_num_rows($result);
  if ($numbers > 0) {
    echo $product_name . "已经录入过了";
  } else {
    $query_add = "INSERT IGNORE INTO think_image_path (product_image) VALUES ('$product_name')";
    mysqli_query($con, $query_add);

    $_SESSION['message'] = "可以上架";
    echo $_SESSION['message'];
    session_unset();
  }
}else{
  $_SESSION['message']="输入的商品信息有误";
  echo $_SESSION['message'];
  session_unset();
  }
} else {
  $_SESSION['message'] = "请在输入框输入您的单号";
  echo $_SESSION['message'];
  session_unset();
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <form method="post" action="bc.php">
    <label for="product_name">产品名称</label>
    <input type="text" name="product_name">
    <button type="submit">提交</button>
  </form>
</body>

</html>