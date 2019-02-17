<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1" 	>
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<div data-role="page" id="home">
		<div  data-role="header" data-position="fixed" data-theme="b">
			<h1>首頁</h1>
			<!-- <a href="#home" data-role="button" data-icon="home" data-theme="a" >home</a>
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a> -->
		</div>
		
		<div role="main" class="ui-content">
			<div data-role="filecontain">
				<label for="hotelname">旅館名稱</label>
				<input type="text" name="hotelname" id="hotelname">
			</div>
			<div data-role="filecontain">
				<label for="category">旅館類別</label>
				<select name="category" id="category">
					<option value="1">農場</option>
					<option value="2">套房</option>
					<option value="3">民宿</option>
					<option value="4">背包客棧</option>
				</select>
			</div>
			<div data-role="filecontain">
				<label for="tel">電話</label>
				<input type="text" name="tel" id="tel">
			</div>
			<div data-role="filecontain">
				<label for="addr">地址</label>
				<input type="text" name="addr" id="addr">
			</div>
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<a href="#" data-role="button" data-theme="b"
					id="can">取消</a>
				</div>
				<div class="ui-block-b">
					<a href="#" data-role="button" data-theme="b"
					id="sen">送出</a>
				</div>
			</div>
			
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

