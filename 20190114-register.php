<?php
header("Access-Control-Allow-Origin:*");
//$servename = "localhost";
//$username = "owner";
//$password = "123456";
//$dbname = "demoDB";

//$conn = mysqli_connect($servename,$username,$password,$dbname)or die("建立連線失敗".mysqli_connect_error());


$name = $_POST["name"];
$pass = $_POST["pass"];
$email = $_POST["email"];
require_once("20190110-dbtools.inc.php");
$link = creat_connection();
mysqli_query($link,"SET NAMES UTF8");
$sql = "INSERT INTO registerUserData(ID,Username,Password,Email)VALUES ('','$name','$pass','$email')";
$result = execute_sql($link,"demoDB",$sql);

if ($result==1) {
	echo "連線新增成功";
}else{
	echo "Error".$sql."<br>".mysqli_error($conn);
}
//if (mysqli_query($conn,$sql)) {
//	echo "連線新增成功";
//}else{
//	echo "Error".$sql."<br>".mysqli_error($conn);
//}

?>