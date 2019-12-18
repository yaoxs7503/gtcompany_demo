<?php
$dir = "picture";
$handler = opendir($dir);
$files = [];
$pictures = [];
$files_temp = [];
while (($filename = readdir($handler)) !== false) {
    if ($filename !== "." && $filename !== "..") {
        $files[] = $filename;
    }
}
closedir($handler);

$con = mysqli_connect("localhost", "root", "guotong", "it_think_sql");
// if (count($files) > 0) {
    $file_number = count($files);
    $query2 = "SELECT * FROM think_image_path   ORDER BY add_time ASC LIMIT 0,{$file_number} ";
    $picture_query = mysqli_query($con, $query2);
    while ($row = mysqli_fetch_array($picture_query)) {
        $pictures[] = $row['product_image'];
    }
    $picturesNumber = count($pictures);
    for ($i = 0; $i < $picturesNumber; $i++) {
            rename("picture/{$files[$i]}", "images/{$pictures[$i]}.jpg");
            array_push($files_temp, $pictures[$i]);
        var_dump($pictures);
        var_dump($files_temp);
        
    }
// } else {
//     echo "暂时没有文件";
// }
