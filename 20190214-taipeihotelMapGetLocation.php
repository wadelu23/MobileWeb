<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1" 	>
	<title>Document</title>
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSnyMTQAIeclcmF-1y1ufEj3mzZb6sPx4" type="text/javascript"></script>
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
		#maprange{
			width: 90vw;
			height: 80vh;
			margin-top: 0;
			margin-bottom: 0;
			margin-right: auto;
			margin-left: auto;
		}
		#h4ti{
			text-align: center;
			color: #C64838;
		}
		#popimg{
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
				url:"http://172.20.10.2/MobileWeb/20190128-hotel-api.php",
				dataType:"json",
				success:showdata,
				error:function(){alert("error")},
			});
		});
		var regionTitle = new Array();
		var counter = new Array();
		var regionData = new Array();
		var previnfowindow=false;
		function showdata(data){
			//console.log(data.length);
			for(var i=0,cnt=data.length;i<cnt;i++){
				var getRegion=data[i]["display_addr"].substring(0,data[i]["display_addr"].indexOf("區",0)+1);
				//console.log(getRegion);
				if (getRegion==0) {
						var getRegion = "其他地區";
					}
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
				var X = "";
				var Y = "";
				for(var j=0;j<regionData[i].length;j++){
					hotel_name+=regionData[i][j]["name"]+"|";
					hotel_addr+=regionData[i][j]["display_addr"]+"|";
					hotel_tel+=regionData[i][j]["tel"]+"|";
					X+=regionData[i][j]["X"]+"|";
					Y+=regionData[i][j]["Y"]+"|";
					//console.log(hotel_name);
					//console.log(hotel_addr);
					//console.log(hotel_tel);
				}//end for j
				strHtml = '<li data-icon="location"><a href="#hotel" regionTitle="'+regionTitle[i]+'" hotel_name="'+hotel_name+'" hotel_addr="'+hotel_addr+'" hotel_tel="'+hotel_tel+'" X="'+X+'"" Y="'+Y+'">'+regionTitle[i]+'旅館資訊<span class="ui-li-count">'+regionData[i].length+'</span></a><a href="#hotelmap" data-icon="location" regionTitle="'+regionTitle[i]+'" hotel_name="'+hotel_name+'" hotel_addr="'+hotel_addr+'" hotel_tel="'+hotel_tel+'" X="'+X+'"" Y="'+Y+'">map</a></li>';
				$("#output").append(strHtml);

			}//end for i
				$("a",("#output")).bind("click",function(){
					getItem($(this).attr("regionTitle"),$(this).attr("hotel_name"),$(this).attr("hotel_addr"),$(this).attr("hotel_tel"),$(this).attr("X"),$(this).attr("Y"))
				});
			//this 當下按到的, attr可用來取值
			$("#output").listview("refresh");
		}//end showdata
		function getItem(regionTitle,hotel_name,hotel_addr,hotel_tel,X,Y){
				console.log(regionTitle);
				console.log(hotel_name);
				console.log(hotel_addr);
				console.log(hotel_tel);
				console.log(X);
				console.log(Y);
				$("#hotel_title").html(regionTitle+"旅館");
				var hotel_nameArray = hotel_name.split("|");
				var hotel_addrArray = hotel_addr.split("|");
				var hotel_telArray = hotel_tel.split("|");
				var hotel_XArray = X.split("|");
				var hotel_YArray = Y.split("|");
				// console.log(hotel_nameArray);
				// console.log(hotel_addrArray);
				// console.log(hotel_telArray);
				//console.log(hotel_XArray);
				//劃出地圖
				var map_div=document.getElementById("maprange");
				var latlng=new google.maps.LatLng(hotel_YArray[0],hotel_XArray[0]);

				var gmap=new google.maps.Map(map_div,
						{
						zoom:14,
						center:latlng,
						mapTypeId:google.maps.MapTypeId.ROADMAP
						});
				//插入地標
				var marker =  Array();
				for(i=0;i<hotel_XArray.length;i++){
					//parray = data[i].Coordinate.split(",");
					//var lat=parray[0];
					//var lng=parray[1];
					latlng = new google.maps.LatLng(hotel_YArray[i],hotel_XArray[i]);
					marker[i]=new google.maps.Marker({
						position:latlng,
						icon:"Image/house1.png",
						map:gmap,
						title:"House"
					});
					//監聽按鈕動作
					google.maps.event.addListener(marker[i],"click",
						function(event){
							var lat=event.latLng.lat();
							var lng=event.latLng.lng();
							
							for(j=0;j<hotel_XArray.length;j++){
								//fdparray = data[j].Coordinate.split(",");
								var disp=getDistance(lat,lng,hotel_YArray[j],hotel_XArray[j]);
								if(disp<0.01){
									if(previnfowindow){
										previnfowindow.close();
									}
									var infowindow = new google.maps.InfoWindow({
								content:'<div id="popimg"></div><h4 id="h4ti">'+hotel_nameArray[j]+'</h4>'
							
							});
							infowindow.open(gmap,marker[j]);
							previnfowindow=infowindow;
								}//if(disp<0.01)
							}//for(j)
						});

				}//end for i<hotel_XArray.length
				
				function getDistance(Lat1, Long1, Lat2, Long2){
				ConvertDegreeToRadians=function(degrees){
					return (Math.PI/180)*degrees;
				}
				var Lat1r = ConvertDegreeToRadians(Lat1);
				var Lat2r = ConvertDegreeToRadians(Lat2);
				var Long1r = ConvertDegreeToRadians(Long1);
				var Long2r = ConvertDegreeToRadians(Long2);

				var R = 6371; // 地球半徑(km)
				var d = Math.acos(Math.sin(Lat1r) * Math.sin(Lat2r) +
					Math.cos(Lat1r) * Math.cos(Lat2r) * Math.cos(Long2r-Long1r)) * R;
				return d; // 兩點的距離 (KM)
				}
				$("#outputHotel").empty();
				for(i=0;i<hotel_nameArray.length-1;i++){
					var strH = '<li data-icon="star"><a href="" data-addr="'+hotel_addrArray[i]+'"><h3>'+hotel_nameArray[i]+'</h3><p>'+hotel_addrArray[i]+'</p><p>'+hotel_telArray[i]+'</p></a></li>'
					$("#outputHotel").append(strH);
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

	</div>

	<div data-role="page" id="hotelmap" >
		<div data-role="header" data-theme="b" data-position="fixed">
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right" data-iconpos="notext">back</a>	
				<h1 id="hotel_title">分區資訊</h1>
			<!-- <a href="#home" data-role="button" data-icon="home" data-theme="a" >home</a>
			<a href="#" data-theme="a" data-rel="back" data-icon="back" class="ui-btn-right">back</a> -->
		</div>
		<div role="main" class="ui-content">
			<!-- LIST VIEW -->
<!-- 			<ul data-role="listview" data-inset="true" id="outputHotel" data-filter="true" data-filter-placeholder="尋找?">
				
					<li data-icon="star">
						<a href="" data-addr="">
						<h3>飯店名稱</h3>
						<p>住址</p>
						<p>電話</p>
						</a>
					</li>
				
			</ul> -->

			<div id="maprange"></div>
			
		</div>

	</div>
	
	
</body>
</html>

