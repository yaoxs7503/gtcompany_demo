<?php
  define('DB_HOST','localhost') ;
  define('DB_USER','root');
  define('DB_PASS','guotong');
  define('DB_NAME','it_think_sql');
$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$query="SELECT image_name FROM think_image_path ORDER BY add_time DESC LIMIT 1";
$result=mysqli_query($dbc,$query);
// var_dump($result);
while($row=mysqli_fetch_array($result)){
 ?> 
 <img src="images/<?php echo $row['image_name'] ?>" alt="" srcset="">
<?php } ?>


