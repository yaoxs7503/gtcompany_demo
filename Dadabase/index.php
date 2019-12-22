  <?php
/*
 * @Author: Philip
 * @Date: 2019-12-21 14:12:12 
 * @Last Modified by: mikey.zhaopeng
 * @Last Modified time: 2019-12-21 17:31:44
 */
require_once 'config.php';
require_once 'connect.php';

$db=connect(DB_HOST, DB_NAME, DB_USER, DB_PASS);

if ($db instanceof mysqli) {
    // echo "客户信息" . $db->client_info . "\n";
    // echo "客户版本" . $db->client_version . "\n";
    $records=fetchAll($db);
    // var_dump($records);
}
// $records=[];
?>
<html>
<head>
<title></title>
<body>

<h1>表格</h1>
<table>
<thead>
<tr>
<th>ID</th>
<th>图片名字</th>
<th>图片加入的时间</th>
<th>描述</th>
</tr></thead>
<tbody>
<?php
if (count($records)>0):
foreach ($records as $record) : ?>
 <tr>
   <td><?php echo $record['id'] ?></td>
   <td><?php echo $record['first_name'] ?></td>
   <td><?php echo $record['last_name'] ?></td>
   <td><?php echo $record['age'] ?></td>
   <td><a href="delete.php?id=<?php echo $record['id']?>">删除相关信息</a></td>
 </tr>
<?php endforeach; ?>
<?php else:?>
  <tr>
  <td colspan="5">没有找到任何记录</td>
  </tr>
<?php
endif
?>
</tbody>
</table>
</body>

</head>
