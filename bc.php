<?php
session_start();
$session["message"]="请输入正确的单号";
$con=mysqli_connect("localhost","root","guotong","it_think_sql");

$product_name=isset($_POST['product_name'])? $_POST["product_name"]:null; $product_name=mysqli_real_escape_string($con,$product_name); 
$query="SELECT id FROM think_product WHERE product_name={$product_name}";
if($sql=mysqli_query($con,$query))
{
  $query2="SELECT * FROM think_image_path WHERE 'product_image'='$product_name'";
  $result=mysqli_query($con,$query2);
  var_dump($result);
  $numbers=mysqli_num_rows($result);
  echo $numbers; 
  // if($numbers>0){
  // while($row=mysqli_fetch_array($result)){
  //   $db_name=$row['product_image'];
  // }
  // if($product_name==$db_name){
  //   echo $product_name."已经录入过了";
  // }
  // else{
  // $query="INSERT IGNORE INTO `think_image_path` ( `product_image`) VALUES ($product_name)";
  $_SESSION['message']="可以上架";
  echo $_SESSION['message'];
  session_unset();
  // }
  // }
}else{
  $_SESSION['message']="输入的商品信息有误";
  echo $_SESSION['message'];
  session_unset();
  }
// }
// else{
//   $_SESSION['message']="请输入正确的产品";
//   echo $_SESSION['message'];
// }

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