<!DOCTYPE html>
<html>
<head>
	<title>Thông Tin Sản Phẩm</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="text/css" href="img/icon_24h.ico">
	<meta name="keywords" content="PHP, mysql, SDC">
	<meta name="depscription" content="This is register form">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
	// include 'connect.php';
	// thong tin ket noi database
	$server = 'localhost'; //$server = '127.0.0.1'
	$username = 'root'; // username default
	$password = ''; // password default
	$database = '19php03'; // ket noi den database nay
	
	// thuc hien ket noi database
	$connect = mysqli_connect($server, $username, $password, $database);

	// kiem tra ket noi database
	if ($connect === FALSE) {
		echo "Connect fail ".mysqli_connect_error();
	}

	//tao mang key value cho danh muc san pham
	$arrCategory = array('cate1' => 'category1','cate2' => 'category2');
	//-------------------------------------------------------
	//khoi tao cac bien loi
	$errNameproduct = '';
	$errDescription = '';
	$errPrice = '';
	$errAvatar = '';
	$errDatepost = '';
	$errDateover = '';
	$errCategory = '';
	//khoi tao cac gia tri ban dau
	$nameProduct = '';
	$description = '';
	$price = '';
	$avatar = '';
	$datePost = '';
	$dateOver = '';
	$category = '';
	//khoi tao bien kiem tra gia tri validate
	$checkValidate = true;
	//-----------------------------------------------------------
	if (isset($_POST['register'])) {
		// du lieu dung de chen vao bang product
		$nameProduct = $_POST['nameproduct'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$avatar = $_FILES['avatar'];
		$datePost = $_POST['datepost'];
		$dateOver = $_POST['dateover'];
		$category = $_POST['category'];

		$avatarName = $avatar['name'];
		//var_dump($avatar);

		// cau lenh insert du lieu
		$sql = "INSERT INTO product (name, description, price, avatar, datepost, dateover, category ) VALUES ('$nameProduct', '$description', '$price', '$avatarName', '$datePost', '$dateOver', '$category')";

		// thuc thi cau lenh 
		mysqli_query($connect, $sql);
		
		//validate loi de trong (co ban)
		if ($nameProduct == '') {
				$checkValidate = false;
				$errNameproduct = 'please input name of product';
			}
		if ($description == '') {
				$checkValidate = false;
				$errDescription = 'please input description';
			}
		if ($price == '') {
				$checkValidate = false;
				$errPrice = 'please input price';
			}
		//khoi tao anh mac định
		$avatarName = 'default.png';
		//xu li su kien upload avatar
		if ($avatar['error'] == 0) {
				//gan ten cho avatar upload len
				$avatarName = $avatar['name'];
				//upload file vao thu muc(tmp_name la bien tam)
				move_uploaded_file($avatar['tmp_name'], 'uploads/'.$avatarName);
			}
		// ket thuc xu li su kien up load avatar
		if ($datePost == '') {
				$checkValidate = false;
				$errDatepost = 'please input date post';
			}
		if ($dateOver == '') {
				$checkValidate = false;
				$errDateover = 'please input date over';
			}
			//danh muc (the loai) san pham
		if ($category == '') {
				$checkValidate = false;
				$errCategory = 'please input category';
			}	
		//ket thuc xu lys validate
		if ($datePost > $dateOver) {
			echo "ngày kết thúc phải lớn hơn ngày đăng";
		}
		//---------------------------------------------------------
		//in ra thong tin san pham
		if ($checkValidate) {
			echo "<h2>Thông tin sản phẩm</h2>";
			echo "Name of Product: $nameProduct <br>";
			echo "Decription: $description <br>";
			echo "Price: $price <br>";
			echo "<img src='uploads/$avatarName'> <br>";
			echo "Date Post: $datePost <br>";
			echo "Date Over: $dateOver <br>";
			echo "Category: $category <br>";
		}
		//ket thuc su kien in ra thong tin san pham
		//---------------------------------------------------------
		
	}

	?>
	<h1>Information Product</h1>
	<div class="register-form">
		<form action="#" name="registeFrorm" enctype="multipart/form-data" method="POST">
			<div class="form-control">
				<div class="label">Tên Sản Phẩm</div>
				<div class="input">
					<input type="text" name="nameproduct" id="nameproduct" value="<?php echo $nameProduct?>">
					<span class="error"><?php echo "$errNameproduct"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Mô tả</div>
				<div class="input">
					<textarea rows="5" cols="20" name="description" ><?php echo "$description"; ?></textarea>
					<span class="error"><?php echo "$errDescription"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Giá</div>
				<div class="input">
					<input type="text" name="price" id="price" value="<?php echo $price?>">
					<span class="error"><?php echo "$errPrice"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Avatar</div>
				<div class="input">
					<input type="file" name="avatar" id="avatar">
					<span class="error"><?php echo "$errAvatar"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Ngày đăng</div>
				<div class="input">
					<input type="date" name="datepost" id="datepost" value="<?php echo $datePost?>">
					<span class="error"><?php echo "$errDatepost"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Ngày hết hạn</div>
				<div class="input">
					<input type="date" name="dateover" id="dateover" value="<?php echo $dateOver?>">
					<span class="error"><?php echo "$errDateover"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Danh mục sản phẩm</div>
				<div class="input">
					<select class="category" name="category">
						<option value="">Choose category</option>
						<option value="cate1" <?php echo ($category == 'cate1')?'selected':''?>>category1</option>
						<option value="cate2" <?php echo ($category == 'cate2')?'selected':'' ;?>>category2</option>
					</select>
					<span class="error"><?php echo "$errCategory"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="input">
					<input type="submit" name="register" value="Reigster">
				</div>
			</div>
		</form>
	</div>
</body>
</html>