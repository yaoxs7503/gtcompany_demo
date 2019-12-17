<?php
$dir="picture";
$handler=opendir($dir);
$files=[];
$pictures=[];
while (($filename = readdir($handler)) !== false) 
{
    if ($filename !== "." && $filename !== "..") 
    {  
            $files[] = $filename ;  
       }  
   }  
//    var_dump($files);
closedir($handler);

// foreach ($files as $value) {  
//     echo $value;
// }    

// 数据库连接

$con=mysqli_connect("localhost","root","guotong","it_think_sql");
if(count($files)>0){
$file_number=count($files);
var_dump($file_number);

$query2="SELECT * FROM think_image_path LIMIT 1,{$file_number}";
$picture_query=mysqli_query($con,$query2);
// var_dump($picture_query);
while($row=mysqli_fetch_array($picture_query)){
    // var_dump($row);
    echo $row['product_image'];
    $pictures[]=$row['product_image'];
}
}else{
 
 echo "暂时没有文件";
}
// var_dump($pictures);
$picturesNumber=count($pictures);
if($picturesNumber>0){
    for ($i=0; $i <$picturesNumber; $i++) { 
        echo $files[$i];
        rename("picture/{$files[$i]}","images/{$pictures[$i]}.jpg");
    }

}else{
    echo "暂时没有相片可以进行存储";
}
?>