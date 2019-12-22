<?php
/**
 * Undocumented function
 *
 * @param [主机名] $dbHost
 * @param [数据库名字] $dbName
 * @param [用记名] $dbUsername
 * @param [密码] $dbPassword
 * @return $db 
 */
 function connect($dbHost,$dbName,$dbUsername,$dbPassword){
   $db=new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
  if($db->connect_error){
    die('不可以连接到数据库:' . $db->connect_error. $db->connect_errno);
  }
  return $db;
 }
/**
 * Fetch all records
 * @param mysqli $db
 * @return $data; 
 */
 function fetchAll(mysqli $db){
   $data=[];
   $sql='SELECT * FROM `person`';
   $results=$db->query($sql);

   if($results->num_rows>0){
    while($row=$results->fetch_assoc()){
      $data[]=$row;
    }
    // var_dump($data);
    return $data;
   }
   return $data;
 }
/**
 * 插入数据的相关函数
 *
 * @param mysqli $db
 * @param array $recode
 * @throws Exception
 * @return mysqli
 */
 function insertRecord(mysqli $db,array $record){
  $sql="INSERT INTO `person`";
  $sql.="(";
  $sql.="`first_name`,`last_name`,`description`,`age`";
  $sql.=") VALUES ";
  $sql.="(";
  $sql.="'".$record['first_name']."',";
  $sql.="'".$record['last_name']."',";
  $sql.="'".$record['description']."',";
  $sql.="'".$record['age']."'";
  $sql.=")";
  $result=$db->query($sql);
  if(!$result){
    throw new Exception('输入数据有错误');
  }

  $record['id']=$db->insert_id;
  return $db; 
  var_dump($db);
 }
/**
 * Delete function
 *
 * @param mysqli $db
 * @param [int] $id
 * @throws Exception
 * @return $result 
 */
function deleteRecord(mysqli $db,int $id){
  $sql="DELETE FROM `person` WHERE id='".$id."'";
  // $sql="DELETE FROM `person` WHERE id=2";
  $result=$db->query($sql);
  if(!$result){
    throw new Exception('无法删除');
  }
  return $result;
}
?>