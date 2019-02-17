<?php
$servename="localhost";
$username="owner";
$pass="123456";
$dbname="demoDB";
//require_once("dbtools.inc.php");
//$conn = creat_connection();
$conn = mysqli_connect($servename,$username,$pass,$dbname) or die ("建立連線失敗".mysqli_connect_error());
mysqli_query($conn,"SET NAMES UTF8");

$sql = "SELECT * FROM hoteldata";

mysqli_select_db($conn,$dbname) or die ("連接資料庫失敗".mysqli_connect_error());
$result = mysqli_query($conn,$sql);
//$result = execute_sql($link,"demoDB",$sql);
$rows = mysqli_fetch_assoc($result);
$dataArray = Array();

if(mysqli_num_rows($result)>0){
		do{
			$dataArray[]=$rows;
		}while ($rows=mysqli_fetch_assoc($result));
		echo json_encode($dataArray);
	}else{
		echo "空資料";
	}
?>