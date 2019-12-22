<?php

class CreateDb
{
    public $serveName;
    public $userName;
    public $dbname;
    public $tableName;
    public $con;
    public $password;

    public function __construct($dbname, $tableName, $serveName="localhost", $userName="root", $password="guotong")
    {
        $this->dbname=$dbname;
        $this->tableName=$tableName;
        $this->serverName=$serveName;
        $this->username=$userName;
        $this->password=$password;
        /* connect */
        $this->con=mysqli_connect($serveName, $userName, $password);
        if (!$this->con) {
            die("连接失败:". mysqli_connect_error());
        }
        /*create */
        $sql="CREATE DATABASE IF NOT EXISTS $dbname";
        // 执行查询功能
        if (mysqli_query($this->con, $sql)) {
            $this->con=mysqli_connect($serveName, $userName, $password, $dbname);

            //sql to create new table
            $sql="CREATE TABLE IF NOT EXISTS $tableName (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
           product_name VARCHAR(25) NOT NULL,
      product_price FLOAT,
      product_image VARCHAR(100)
      );";
        }
        if (!mysqli_query($this->con, $sql)) {
            echo "无法连接" . mysqli_error($this->con);
        }
    }
    public function getData(){
      $sql="SELECT * FROM $this->tableName";
      $result=mysqli_query($this->con,$sql);
      if(mysqli_num_rows($result)>0){
        return $result;
      }
    }
}
