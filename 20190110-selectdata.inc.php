<?php
header("Access-Control-Allow-Origin:*");
require_once("20190110-dbtools.inc.php");
$link = creat_connection();

$sql = "SELECT book_id,image_name,description FROM product";
$result = execute_sql($link,"demoDB",$sql);

$rows = mysqli_fetch_assoc($result);
$dataArray = Array();

	if (mysqli_num_rows($result)>0) {
			do{
				$dataArray[] = $rows;
			}while ($rows = mysqli_fetch_assoc($result));
			echo json_encode($dataArray);	
		}else{
			echo "空資料";
		}	

?>