<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1" 	>
	<title>Document</title>
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<script src="js/jquery-2.1.0.min.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<style>
		#cardlogo{
			width: 80vw;
			margin-top: 0;
			margin-bottom: 0;
			margin-left: auto;
			margin-right: auto;
		}
		#logoimg{
			border-radius: 50px;
		}
		#saleimg{
			border-radius: 20px;
		}
		.H1{
			text-align: center;
			color: #137BFA;
		}
		#saleimgpos{
			width: 150px;
			margin-top: 0;
			margin-bottom: 0;
			margin-left: auto;
			margin-right: auto;
		}


	</style>
</head>
<body>
	<div data-role="page" id="point">
		<div  data-role="header" data-position="fixed" data-theme="b">
			<h1>COS卡</h1>
			<!-- <a href="#home" data-role="button" data-icon="home" data-theme="a" >home</a>
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a> -->
		</div>
		
		<div role="main" class="ui-content">
			<div id="cardlogo"><img src="http://fakeimg.pl/350x200/00CED1/FFF/?text=LOGO" width="100%" id="logoimg"></div>
			<h1 class="H1">目前點數</h1>
			<h1 class="H1">點數</h1>
			<!-- 優惠項目區 -->
			<h1 class="H1">目前優惠</h1>
			<div class="ui-grid-a">
				<div class="ui-block-a" >
					<div id="saleimgpos"><img src="http://fakeimg.pl/150x100/00CED1/FFF/?text=img+placeholder" width="100%" id="saleimg"></div>
					
					<h1 class="H1">100</h1>
				</div>
				<div class="ui-block-b" >
					<div id="saleimgpos"><img src="http://fakeimg.pl/150x100/00CED1/FFF/?text=img+placeholder" width="100%" id="saleimg"></div>
					
					<h1 class="H1">100</h1>
				</div>
			</div>
			<div class="ui-grid-a">
				<div class="ui-block-a" >
					<div id="saleimgpos"><img src="http://fakeimg.pl/150x100/00CED1/FFF/?text=img+placeholder" width="100%" id="saleimg"></div>
					
					<h1 class="H1">200</h1>
				</div>
				<div class="ui-block-b" >
					<div id="saleimgpos"><img src="http://fakeimg.pl/150x100/00CED1/FFF/?text=img+placeholder" width="100%" id="saleimg"></div>
					
					<h1 class="H1">200</h1>
				</div>
			</div>
			<div class="ui-grid-a">
				<div class="ui-block-a" >
					<div id="saleimgpos"><img src="http://fakeimg.pl/150x100/00CED1/FFF/?text=img+placeholder" width="100%" id="saleimg"></div>
					
					<h1 class="H1">300</h1>
				</div>
				<div class="ui-block-b" >
					<div id="saleimgpos"><img src="http://fakeimg.pl/150x100/00CED1/FFF/?text=img+placeholder" width="100%" id="saleimg"></div>
					
					<h1 class="H1">300</h1>
				</div>
			</div>

			
		</div>
		
		<div data-role="footer" data-position="fixed" data-theme="b">
			
			<div data-role="navbar">
				<ul>
					<li><a href="#home" data-icon="home">主頁</a></li>
					<li><a href="#point" data-icon="star">點數</a></li>
					<li><a href="#record" data-icon="info">紀錄</a></li>
				</ul>
			</div>	
		</div>
		
	</div>
	<!-- 紀錄頁面 -->
	<div data-role="page" id="record">
		<div data-role="header" data-theme="b" data-position="fixed">
			<h1>點數紀錄</h1>
			<!-- <a href="#home" data-role="button" data-icon="home" data-theme="a" >home</a>
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a> -->
		</div>
		<div role="main" class="ui-content">
			<div class="ui-grid-a">
				<div class="ui-block-a">
					<div data-role="filecontain">
						<label for="startdate">開始日期</label>
						<input type="date" name="startdate" id="startdate">
					</div>
				</div>
				<div class="ui-block-b">
					<div data-role="filecontain">
						<label for="enddate">結束日期</label>
						<input type="date" name="enddate" id="enddate">
					</div>
				</div>
			</div>
			<a href="#" data-role="button" data-theme="b"
			id="">查詢</a>

			<div data-role="collapsible-set">
				<div data-role="collapsible">
					<h3>20190101  -200</h3>
					<p>品項 -100</p>
					<p>品項 -100</p>
				</div>
				<div data-role="collapsible">
					<h3>20190115 -300</h3>
					<p>品項 -100</p>
					<p>品項 -100</p>
					<p>品項 -100</p>
				</div>
				<div data-role="collapsible">
					<h3>20190131  -400</h3>
					<p>品項 -100</p>
					<p>品項 -100</p>
					<p>品項 -100</p>
					<p>品項 -100</p>
				</div>
			</div>
			


		</div>
		<div data-role="footer" data-theme="b" data-position="fixed">
			<div data-role="navbar">
					<ul>
						<li><a href="#home" data-icon="home">主頁</a></li>
						<li><a href="#point" data-icon="star">點數</a></li>
						<li><a href="#record" data-icon="info">紀錄</a></li>
					</ul>
				</div>
			</div>
	</div>
	
	
	
</body>
</html>

