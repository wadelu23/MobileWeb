

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1" 	>
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/listview-grid.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page" id="home" class="my-page">
		<div  data-role="header" data-position="fixed" data-theme="b">
			<h1>MySQL資料庫</h1>
			<!-- <a href="#home" data-role="button" data-icon="home" data-theme="a" >home</a>
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a> -->
		</div>
		
		<div role="main" class="ui-content">

			<?php
	//mysqli_connect();建立連線
	//mysqli_connect_error();顯示錯誤類型
	//mysqli_query();執行SQL語法
	//mysqli_num_rows();計算result資料筆數
	//mysqli_fetch_assoc();擷取result資料
	// $servername = "localhost";
	// $username = "owner";
	// $password = "123456";
	// $dbname = "demoDB";
	// //Creat connection
	// $conn = mysqli_connect($servername,$username,$password,$dbname);
	// //Check connection
	// if (!$conn) {
	// 	die("Connection failed:".mysqli_connect_error());
	// }

	// $sql = "SELECT ID,Username,Age FROM userdata";
	// $result = mysqli_query($conn,$sql);

	// if (mysqli_num_rows($result) >0) {
	//  	//output data of each row
	//  	while ($row = mysqli_fetch_assoc($result)) {
	//  	 	echo "ID:".$row["ID"]." -姓名:".$row["Username"]." -年齡:".$row["Age"]."<br>";
	//  	 } 
	//  } else {
	//  	echo "沒有資料!";
	//  }

	//  mysqli_close($conn);

	$servername = "localhost";
	$username = "owner";
	$password = "123456";
	$dbname = "demoDB";

	//mysqli_connect();建立連線
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	mysqli_query($conn,"SET NAMES UTF8");
	if (!$conn) {
		die("連線失敗:".mysqli_connect_error());//mysqli_connect_error();顯示錯誤類型
	}

	$sql = "SELECT book_id,image_name,description FROM product";
	$result = mysqli_query($conn,$sql);//mysqli_query();執行SQL語法
	//mysqli_num_rows();計算result資料筆數
	if (mysqli_num_rows($result)>0) {
					//mysqli_fetch_assoc();擷取result資料
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<ul data-role="listview" data-inset="true">
	<li>
		<a href="#'.$row["book_id"].'" data-rel="popup"data-position-to="window">
				<img src="Image/'.$row["image_name"].'" alt=""  class="ui-li-thumb">
				<h2>'.$row["book_id"].'</h2>
				<p>內文!</p>
				<p class="ui-li-aside">'.$row["book_id"].'</p>
			</a>
			<div data-role="popup" id="'.$row["book_id"].'" data-dismissible="false">
				<a href="#" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right" data-rel="back">button</a>
				<img src="Image/'.$row["image_name"].'" alt="" >
				<p>編號:'.$row["book_id"].'</p>
				<p>說明:'.$row["description"].'</p>
			</div>
	</li>
	

</ul>';

			//echo '<a href="#'.$row["book_id"].'"data-rel="popup"data-position-to="window"><img src="Image/'.$row["image_name"].'" alt="" width="48%"></a><div data-role="popup" id="'.$row["book_id"].'" data-dismissible="false"><a href="#" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right" data-rel="back">button</a><img src="Image/'.$row["image_name"].'" alt="" ><p>編號:'.$row["book_id"].'</p><p>說明:'.$row["description"].'</p></div>';

			//echo '<div><img src="Image/'.$row["image_name"].'" alt="" width="48%"><p>名稱:'.$row["book_id"].'</p><p>內容:'.$row["description"].'</p></div>';
			//echo "ID:".$row["book_id"]." 名:".$row["image_name"]." 內容:".$row["description"]."<br>";
		}
	}else{
		echo "空資料";
	}
	mysqli_close($conn);
?>


	<!-- <a href="#'.$row["book_id"].'" data-rel="popup" data-position-to="window">
		<img src="images/'.$row["image_name"].'" alt="" width="49%">
	</a>
<div data-role="popup" id="'.$row["book_id"].'" data-dismissible="false">
	<a href="#" data-role="button" data-theme="b" data-icon="delete" data-iconpos="notext" class="ui-btn-right" data-rel="back">button</a>
	<img src="images/'.$row["image_name"].'" alt="">
	<p>編號: '.$row["book_id"].'</p>
	<p>描述: '.$row["description"].'</p>
</div> -->
		</div>
		
		<div data-role="footer" data-position="fixed" data-theme="b">
			<h1>頁尾</h1>
			<!-- <div data-role="navbar">
				<ul>
					<li><a href="#">9</a></li>
					<li><a href="#">9</a></li>
					<li><a href="#">9</a></li>
				</ul>
			</div> -->	
		</div>
		
	</div>
	
</body>
</html>


