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
var_dump($files);
closedir($handler);
foreach ($files as $value) {  
    echo $value, PHP_EOL;  
}    

?>