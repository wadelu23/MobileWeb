<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page" id="home">
		<div data-role="header" data-position="fixed" id="home" data-theme="b">
			<h1>Home</h1>
		</div>
		<div role="main" class="ui-content">
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
						echo '<a href="#'.$row["book_id"].'" data-rel="popup" data-position-to="window"><img src="images/'.$row["image_name"].'" alt="" width="49%"></a><div data-role="popup" id="'.$row["book_id"].'" data-dismissible="false"><a href="#" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right" data-rel="back">button</a><img src="images/'.$row["image_name"].'" alt=""><p>編號: '.$row["book_id"].'</p><p>描述: '.$row["description"].'</p></div>';




						// echo '<div><img src="images/'.$row["image_name"].'" alt="" width="48%"><p>編號: '.$row["book_id"].'</p><p>介紹: '.$row["description"].'</p></div>';
						// echo "ID:".$row["book_id"]."圖片: ".$row["image_name"]."介紹: ".$row["description"]."<BR>";
					}
				}else{
					echo "無資料";
				}
			}


		?>				
		</div>
		<div data-role="footer" data-position="fixed" data-theme="b">
			<h1>footer</h1>
		</div>
	</div>
</body>
</html>		



