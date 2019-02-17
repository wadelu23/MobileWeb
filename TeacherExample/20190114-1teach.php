<?php
	$servername = "localhost";
	$username = "owner";
	$password = "123456";
	$dbname = "demoDB";

	$conn = mysqli_connect($servername, $username, $password,$dbname) or die("建立連線失敗".mysqli_connect_error());

	mysqli_query($conn, "SET NAMES UTF8");



	$img = $_POST["img"]; // 存儲接收的圖片名稱
	$des = $_POST["des"]; // 存儲接收的圖片描述


	$sql = "INSERT INTO product (book_id, image_name, 	description) VALUES ('', '$img', '$des')";

	if(mysqli_query($conn, $sql)){
		echo "新增成功";
	}else{
		echo "新增不成功";
	}

?>
