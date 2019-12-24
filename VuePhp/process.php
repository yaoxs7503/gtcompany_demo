<?php
$conn=new mysqli("localhost","root","guotong","users");
if($conn->connect_error){
  die("连接错误".$conn->connect_error);
}
// echo ("成功");

$result=array('error'=>false);
// var_dump($result);
$action='';
if(isset($_GET['action'])){
  $action=$_GET['action'];
}
if($action=='read'){
  $sql=$conn->query("SELECT * FROM users");
  $users=array();
  while($row=$sql->fetch_assoc()){
    array_push($users,$row);
  }
  // var_dump($users);
  $result['users']=$users;
  // var_dump($result);

}
if($action=='create'){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  // $sql=$conn->query("INSERT INTO users (name,email,phone) VALUES ('$name','$email','$phone')");
  $sql=$conn->query("INSERT INTO users (name,email,phone) VALUES ('$name','$email','$phone')");

  $users=array();
  // while($row=$sql->fetch_assoc()){
  //   array_push($users,$row);
  // }
  if($sql){
    $result['message']="数据插入成功！";
  }else{
    $result['error']=true;
    $result['message']="无法添加用户!";
  }
  // var_dump($users);
  $result['users']=$users;
  // var_dump($result);
}

if ($action=='delete') {
    $id=$_POST['id'];
    $sql=$conn->query("DELETE FROM users WHERE id='$id'");

    // $users=array();
    // while($row=$sql->fetch_assoc()){
    //   array_push($users,$row);
    // }
    if ($sql) {
        $result['message']="删除数据成功";
    } else {
        $result['error']=true;
        $result['message']="无法删除用户!";
    }
}
if($action=='update'){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $sql=$conn->query("UPDATE users SET name='$name',email='$email',phone='$phone' WHERE id='$id' ");

  // $users=array();
  // while($row=$sql->fetch_assoc()){
  //   array_push($users,$row);
  // }
  if($sql){
    $result['message']="更新数据成功";
  }else{
    $result['error']=true;
    $result['message']="无法更新用户!";
  }
  var_dump($users);
  $result['users']=$users;
  var_dump($result);
}


echo json_encode($result,JSON_UNESCAPED_UNICODE);
?>