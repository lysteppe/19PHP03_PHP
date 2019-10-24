<!-- <?php
	echo "Hello php";
	echo "<br>";
?> -->
<?php
	$userName = 'Nguyên';
	echo $userName;
	echo "<br>";
		$userQQ = 'Đà Nẵng';
	echo $userQQ;
	echo "<br>";
	$userPhone = '0704 52 62 72';
	echo $userPhone;

	echo "<br>";
?>

<?php 
	$i = 10;
	echo "Tháng:" ;
	echo $i;
	echo "<br>";
	if ($i <= 12) {
		echo "$i là tháng trong nam";
		if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
			echo " va tháng $i co 31 ngày";
		} else if ($i == 2) {
			echo "<br>";
			echo " và tháng $i có 28 hoặc 29 ngày";
		} else {
			echo " và tháng $i có 30 ngày";
		}
	}
	else {
		echo "$i không phải là tháng trong năm";
	}
?>