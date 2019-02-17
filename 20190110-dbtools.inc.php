<?php

	function creat_connection(){
		$link = mysqli_connect("localhost","owner","123456")
			or die("連線失敗:".mysqli_connect_error());
		mysqli_query($link,"SET NAMES UTF8");
		return $link;
	}
	function execute_sql($link,$database,$sql){
		mysqli_select_db($link,$database)
			or die("連接資料庫失敗".mysqli_connect_error());
		$result = mysqli_query($link,$sql);
		return $result;
	}

?>