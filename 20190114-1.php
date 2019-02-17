<?php
$servename = "localhost";
$username = "owner";
$password = "123456";
$dbname = "demoDB";

$conn = mysqli_connect($servename,$username,$password,$dbname) or die("建立連線失敗".mysqli_connect_error());
mysqli_query($conn,"SET NAMES UTF8");

$img = $_POST["img"];
$des = $_POST["des"];



$sql = "INSERT INTO product (book_id,image_name,description)
VALUES ('','$img','$des')";

if (mysqli_query($conn,$sql)) {
	echo "連線成功與新增成功";
}else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>