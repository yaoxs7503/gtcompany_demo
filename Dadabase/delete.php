<?php
require_once 'config.php';
require_once 'connect.php';

$db=connect(DB_HOST, DB_NAME, DB_USER, DB_PASS);

 
$id='';
if(isset($_GET["id"])){
 $id=$_GET['id']; 
}else{
  throw new Exception('有错误的ID没有删除');
};
$val=filter_var($id,FILTER_SANITIZE_NUMBER_INT);
$isValid=filter_input($val,FILTER_VALIDATE_INT);
var_dump($isValid);
if(empty($isValid)){
  // throw new Exception('数据不合法');
  die('数据不合法');
}
var_dump($_GET["id"]);
$result=deleteRecord($db,$id);
var_dump($result);

header("Location:/index.php");