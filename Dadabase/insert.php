<?php
require_once 'config.php';
require_once 'connect.php';

$db=connect(DB_HOST, DB_NAME, DB_USER, DB_PASS);

$records=[
  'id'          => '4',
  'first_name'  => '姚 ',
  'last_name'   => '晓昇',
  'description' => '我是阿升',
  'age'         => '32',
];
// var_dump($records['first_name']);
$newRecord=insertRecord($db,$records);
var_dump($newRecord);
