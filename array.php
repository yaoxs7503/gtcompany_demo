<?php
$pictures = [1,2,3,4,5,6,7];
$files_temp = [];
if($pictures===$files_temp){
      echo "数值 相等";
    }else{
  for ($i = 0; $i < count($pictures); $i++) {
            array_push($files_temp, $pictures[$i]);
      var_dump($files_temp);
    }
  }
echo count($files_temp);
?>