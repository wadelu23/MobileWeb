//手指滑動切換照片 #new=>對應頁面，#spimg=>切換圖片的ID，#stitlename=>切換標題的ID

	// 設定方法(指定到對應id).bind(方式,用何種方法)
	 // $(function(){
		//設定定時變換照片
		//setInterval(shownext,2000);
	 	// $('#prev').bind('click',showprev);
	 	// $('#next').bind('click',shownext);
		$( document ).on( "pagecreate", "#new", function() {
			$( document ).on( "swipeleft swiperight", "#new", function( e ) {
				if ( $( ".ui-page-active" ).jqmData( "panel" ) !== "open" ) {
			        if ( e.type === "swipeleft" ) {
			            sshownext();
			        } else if ( e.type === "swiperight" ) {
			            sshowprev();
			        }
			    }
			});
		});
	 // });
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

	var si=0;
	var simgsrc,simgtitle;//設定照片與標題變數
	//陣列存放照片與標題
	var simgArray = new Array("mi101.jpg","mi102.jpg","mi103.jpg","mi104.jpg","mi105.jpg");
	var simgtitleArray = new Array("MIF001","MIF002","MIF003","MIF004","MIF005");
	function sshowprev(){
		si--;//倒退1
		if (si<0) {si=4;}//設定倒退過0要接續4
		simgsrc="Image/"+simgArray[si];//設定圖片路徑
		simgtitle=simgtitleArray[si];//設定標題
		$("#spimg").fadeOut(500);
		$("#spimg").attr("src",simgsrc).fadeIn(800);//取代圖片
		$("#stitlename").text(simgtitle);//取代標題						
	}

	function sshownext(){
		si++;//前進1
		if (si>4) {si=0;}//設定前進過4要接續0
		simgsrc="Image/"+simgArray[si];//設定圖片路徑
		simgtitle = simgtitleArray[si];//設定標題
		$("#spimg").fadeOut(500);
		$("#spimg").attr("src",simgsrc).fadeIn(800);//取代圖片
		$("#stitlename").text(simgtitle);//取代標題			
	}
	
