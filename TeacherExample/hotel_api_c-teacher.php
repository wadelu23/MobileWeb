<?php
	$hotelname = $_POST["hotelname"];
	$category = $_POST["category"];
	$tel = $_POST["tel"];
	$addr = $_POST["addr"];

	require_once("dbtools.inc.php");
	$link = creat_connect();

	$sql = "INSERT INTO hoteldata (name, certification_category, tel, display_addr, poi_addr, traffic_info, X, Y)VALUES('$hotelname', '$category', '$tel', '$addr', '', '', '', '')";

	if(excute_sql($link, "demoDB", $sql)){
		echo "新增資料成功";
	}else {
		echo "新增資料失敗";
	}
?>