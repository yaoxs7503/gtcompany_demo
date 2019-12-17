<?php
$dir="picture";
$handler=opendir($dir);
while (($filename = readdir($handler)) !== false) 
{
    if ($filename !== "." && $filename !== "..") 
    {  
            $files[] = $filename ;  
       }  
   }  
//    var_dump($files);
closedir($handler);
foreach ($files as $value) {  
    echo $value;
}    


// 数据库连接
$con=mysqli_connect("localhost","root","guotong","it_think_sql");
$file_number=count($files);
var_dump($file_number);

$query2="SELECT * FROM think_image_path LIMIT 1,{$file_number}";
$picture_query=mysqli_query($con,$query2);
// var_dump($picture_query);
while($row=mysqli_fetch_array($picture_query)){
    // var_dump($row);
    echo $row['product_image'];
    $picture[]=$row['product_image'];
}
var_dump($picture);
?>