<?php
header("Access-Control-Allow-Origin:*");

$name = $_POST['name'];
$height = $_POST['cm'];
$weight = $_POST['kg'];
$height = $height/100;
$bmi = round($weight/($height*$height),1);
echo $name."的BMI(tcnr03):".$bmi."<br>";
if ($bmi>30) {
	echo "過重";
}else if ($bmi<20) {
	echo "過輕";
}else if ($bmi<30&&$bmi>20) {
	echo "正常";
}
?>