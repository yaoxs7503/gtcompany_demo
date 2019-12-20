<?php
$dir = "picture";
$handler = opendir($dir);
$files = [];
$pictures = [];
// $files_temp = [];
while (($filename = readdir($handler)) !== false) {
    if ($filename !== "." && $filename !== "..") {
        $files[] = $filename;
    }
}
closedir($handler);

$con = mysqli_connect("localhost", "root", "guotong", "it_think_sql");

if (count($files) > 0) {
    $file_number = count($files);
    $query2 = "SELECT * FROM think_image_path WHERE flag=0 ORDER BY add_time ASC LIMIT 0,{$file_number} ";
    $picture_query = mysqli_query($con, $query2);
    $picture_numbers = mysqli_num_rows($picture_query);
    if ($picture_numbers>0){
    while ($row = mysqli_fetch_array($picture_query)) {
        $pictures[] = $row['product_image'];
    }
    sleep(6);
    $picturesNumber = count($pictures);
    for ($i = 0; $i < $picturesNumber; $i++) {
            rename("picture/{$files[$i]}", "images/{$pictures[$i]}.jpg");
    $query3="UPDATE think_image_path SET flag=1, image_name='{$pictures[$i]}.jpg' where product_image={$pictures[$i]}";
    $picture_update=mysqli_query($con,$query3);
    }
}else{
    echo "已经扫描过相关文件";
}
} else {
    echo "暂时没有文件";
}
