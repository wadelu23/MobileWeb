<?php 
	require("dbtools.inc.php");

	$book_id = $_POST["book_id"];

	$link = creat_connect();

	$sql ="SELECT * FROM product WHERE book_id < $book_id ORDER BY book_id DESC LIMIT 1";

	$result = excute_sql($link, "demoDB", $sql);

	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		echo json_encode(array("book_id" => $row["book_id"], "image_name" => $row["image_name"], "description" => $row["description"]));
	}
?>