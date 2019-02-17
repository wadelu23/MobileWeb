<?php
	$servername = "localhost";
	$username = "owner";
	$password = "123456";
	$dbname = "demoDB";

	//建立連線
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES UTF8");
	//check conn
	if(!$conn){
		//關閉
		die("連線失敗".mysqli_connect_error());
	}else{
		$sql = "SELECT book_id, image_name, description FROM product";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) >0){
			while($row = mysqli_fetch_assoc($result)){
				echo '<div><img src="images/'.$row["image_name"].'" alt="" width="48%"><p>編號: '.$row["book_id"].'</p><p>介紹: '.$row["description"].'</p></div>';
				// echo "ID:".$row["book_id"]."圖片: ".$row["image_name"]."介紹: ".$row["description"]."<BR>";
			}
		}else{
			echo "無資料";
		}
	}


?>


