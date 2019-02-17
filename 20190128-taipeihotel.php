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
		#homelogo{
			width: 150px;
			margin-top: 0;
			margin-bottom: 0;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
	<script>
		$(function(){
			$.ajax({
				type:"GET",
				url:"http://192.168.60.103/MobileWeb/20190128-hotel-api.php",
				dataType:"json",
				success:showdata,
				error:function(){alert("error")},
			});
		});
		var regionTitle = new Array();
		var counter = new Array();
		var regionData = new Array();
		function showdata(data){
			//console.log(data.length);
			for(var i=0,cnt=data.length;i<cnt;i++){
				var getRegion=data[i]["display_addr"].substring(0,data[i]["display_addr"].indexOf("區",0)+1);
				//console.log(getRegion);
				if(counter[getRegion]==undefined){
					counter[getRegion]=regionData.length;
					regionData.push(new Array());
					regionTitle[counter[getRegion]]=getRegion;
				}
				regionData[counter[getRegion]].push(data[i]);
			}// END for regionTitle,regionData,regionTitle
			//console.log(regionTitle.length);
			//console.log(counter.length);
			//console.log(regionData.length);
			$("#output").empty();
			for(var i=0;i<regionTitle.length;i++){
				
				var hotel_name="";
				var hotel_addr="";
				var hotel_tel="";
				for(var j=0;j<regionData[i].length;j++){
					hotel_name+=regionData[i][j]["name"]+"|";
					hotel_addr+=regionData[i][j]["display_addr"]+"|";
					hotel_tel+=regionData[i][j]["tel"]+"|";
					//console.log(hotel_name);
					//console.log(hotel_addr);
					//console.log(hotel_tel);
				}//end for j
				strHtml = '<li data-icon="action"><a href="#hotel" regionTitle="'+regionTitle[i]+'" hotel_name="'+hotel_name+'" hotel_addr="'+hotel_addr+'" hotel_tel="'+hotel_tel+'">'+regionTitle[i]+'旅館資訊<span class="ui-li-count">'+regionData[i].length+'</span></a></li>';
				$("#output").append(strHtml);

			}//end for i
				$("a",("#output")).bind("click",function(){
					getItem($(this).attr("regionTitle"),$(this).attr("hotel_name"),$(this).attr("hotel_addr"),$(this).attr("hotel_tel"))
				});
			//this 當下按到的, attr可用來取值
			$("#output").listview("refresh");
		}//end showdata
		function getItem(regionTitle,hotel_name,hotel_addr,hotel_tel){
				console.log(regionTitle);
				console.log(hotel_name);
				console.log(hotel_addr);
				console.log(hotel_tel);
				$("#hotel_title").html(regionTitle+"旅館");
				var hotel_nameArray = hotel_name.split("|");
				var hotel_addrArray = hotel_addr.split("|");
				var hotel_telArray = hotel_tel.split("|");
				// console.log(hotel_nameArray);
				// console.log(hotel_addrArray);
				// console.log(hotel_telArray);
				$("#outputHotel").empty();
				for(i=0;i<hotel_nameArray.length-1;i++){
					var strHtml = '<li data-icon="star"><a href="" data-addr="'+hotel_addrArray[i]+'"><h3>'+hotel_nameArray[i]+'</h3><p>'+hotel_addrArray[i]+'</p><p>'+hotel_telArray[i]+'</p></a></li>'
					$("#outputHotel").append(strHtml);
				}//end for i
				
				$("a",$("#outputHotel")).bind("click",function(){
					searchFor($(this).attr("data-addr"));
				});
				$("#outputHotel").listview("refresh");
				function searchFor(addr){
					window.open("http://maps.google.com/maps?hl=zh-TW&q="+addr);
				}
		}//end getItem
	</script>
</head>
<body>
	<div data-role="page" id="home">
		<div  data-role="header" data-position="fixed" data-theme="b">
			<h1>去台北旅館DATA</h1>
			<!-- <a href="#home" data-role="button" data-icon="home" data-theme="a" >home</a>
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a> -->
		</div>
		
		<div role="main" class="ui-content">
			<div id="homelogo"><img src="Image/MIF.jpg" alt="" width="100%"></div>
			
			<!-- LIST VIEW -->
			<ul data-role="listview" data-inset="true" id="output" data-filter="true" data-filter-placeholder="尋找?">
				
					<li data-icon="star"><a href="#">MAIN<span class="ui-li-count">20</span></a></li>
					
			</ul>
			
		</div>
		

		
	</div>

	<div data-role="page" id="hotel" >
		<div data-role="header" data-theme="b" data-position="fixed">
		<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right" data-iconpos="notext">back</a>	
			<h1 id="hotel_title">分區資訊</h1>
			<!-- <a href="#home" data-role="button" data-icon="home" data-theme="a" >home</a>
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a> -->
		</div>
		<div role="main" class="ui-content">
			
			<div id="homelogo"><img src="Image/MIF.jpg" alt="" width="100%"></div>
			
			<!-- LIST VIEW -->
			<ul data-role="listview" data-inset="true" id="outputHotel" data-filter="true" data-filter-placeholder="尋找?">
				
					<li data-icon="star">
						<a href="" data-addr="">
						<h3>飯店名稱</h3>
						<p>住址</p>
						<p>電話</p>
						</a>
					</li>
				
			</ul>
			
		</div>
		<div data-role="footer" data-theme="b" data-position="fixed">
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

