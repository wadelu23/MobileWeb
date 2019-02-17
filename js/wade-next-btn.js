

	// 設定方法(指定到對應id).bind(方式,用何種方法)
	 $(function(){
		//設定定時變換照片
		//setInterval(shownext,2000);
	 	$('#prev').bind('click',showprev);
	 	$('#next').bind('click',shownext);
	 });
	//設定定時變換照片
	// $(document).ready(function(){
	// 	setInterval(function(){
	// 		alert("Lorem ip sicing.")
	// 	},2000)
	// });
	//$(document).ready(function(){
		// setInterval(function(){
		// 	shownext();
		// },1500)
	//});

	var i=0;
	var imgsrc,imgtitle;//設定照片與標題變數
	//陣列存放照片與標題
	var imgArray = new Array("mi101.jpg","mi102.jpg","mi103.jpg","mi104.jpg","mi105.jpg");
	var imgtitleArray = new Array("MIF001","MIF002","MIF003","MIF004","MIF005");
	function showprev(){
		i--;//倒退1
		if (i<0) {i=4;}//設定倒退過0要接續4
		imgsrc="Image/"+imgArray[i];//設定圖片路徑
		imgtitle=imgtitleArray[i];//設定標題
		$("#pimg").attr("src",imgsrc);//取代圖片
		$("#titlename").text(imgtitle);//取代標題						
	}

	function shownext(){
		i++;//前進1
		if (i>4) {i=0;}//設定前進過4要接續0
		imgsrc="Image/"+imgArray[i];//設定圖片路徑
		imgtitle = imgtitleArray[i];//設定標題
		$("#pimg").attr("src",imgsrc);//取代圖片
		$("#titlename").text(imgtitle);//取代標題			
	}
	
