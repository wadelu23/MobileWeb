
	 //設定時間變換照片
	 // $(function(){
		// setInterval(adshownext,2000);	
	 // });

	var i=0;
	var imgsrc,imgtitle,adlink;//設定照片與標題變數
	//將圖片放進陣列，頁面的圖片先設定第一張
	var imgArray = new Array("mi101.jpg","mi102.jpg","mi103.jpg","mi104.jpg","mi105.jpg");
	//將標題內容放進陣列，頁面的標題內容先設定第一個
	var imgtitleArray = new Array("MIF001","MIF002","MIF003","MIF004","MIF005");
	
	var adlinkArray = new Array("http://www.google.com","http://www.youtube.com","link3","link4","link5");

	function adshownext(){
		
		if (i>4) {i=0;}//4改成(總圖數-1)，目前設定前進超過第五張就會重新
		imgsrc="Image/"+imgArray[i];//設定完整圖片路徑，"Image/"要根據你的路徑設定指向圖片
		imgtitle = imgtitleArray[i];//設定標題
		adlink = adlinkArray[i];
		$("#imgsrc").attr("src",imgsrc);//取代圖片，圖片屬性要加 id="#imgsrc"
		$("#imgtitle").text(imgtitle);//取代標題，標題屬性要加 id="#imgtitle"
		$("#adlink").attr("href",adlink);
		i++;//下次跑下一張			
	}

