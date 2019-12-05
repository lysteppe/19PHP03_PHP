<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="#">
	<meta name="keywords" content="PHP, mysql, SDC">
	<meta name="description" content="This is Products form">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
		// connect php vs mysql
		$server = "localhost";
		$username = "root";
		$password = ""; // $password = "";
		$database = "19php03";

		// ket noi
		$connect = mysqli_connect($server, $username, $password, $database);

		// Check connection
		if (mysqli_connect_errno())
	  {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	//khoi tao gia tri ban dau
		$nameProducts = '';
		$price = '';
		$images = '';
	//khoi tao cac bien loi
		$errNameProducts = '';
		$errPrice = '';
		$errImages = '';
	//khoi tao bien kiem tra gia tri validate
	$checkValidate = true;
	//-----------------------------------------------------------
		if (isset($_POST['products'])) {
			$nameProducts = $_POST['nameProducts'];
			$price = $_POST['price'];
			$images = $_FILES['images'];

			$imagesName = $images['name'];
			// cau lenh chen user vao db
			$sql = "INSERT INTO products (name, price, image) VALUES ('$nameProducts', '$price', '$imagesName')";
			
			// thuc thi cau lenh sql
			mysqli_query($connect, $sql);

			//validate loi de trong (co ban)
		if ($nameProducts == '') {
				$checkValidate = false;
				$errNameProducts = 'please input name of product';
			}
		if ($price == '') {
				$checkValidate = false;
				$errPrice = 'please input price';
			}
			//khoi tao anh mac định
		$imagesName = 'default.png';
		//xu li su kien upload avatar
		if ($images['error'] == 0) {
			$checkValidate = false;
				//gan ten cho avatar upload len
				$imagesName = $images['name'];
				//upload file vao thu muc(tmp_name la bien tam)
				move_uploaded_file($images['tmp_name'], 'uploads/'.$imagesName);
			}
		// ket thuc xu li su kien up load avatar
			//---------------------------------------------------------
		//in ra thong tin san pham
		if ($checkValidate) {
			echo "<h2>Thông tin sản phẩm</h2>";
			echo "Name of Product: $nameProducts <br>";
			echo "Price: $price <br>";
			echo "<img src='uploads/$images'> <br>";
		}
		//ket thuc su kien in ra thong tin san pham
		//---------------------------------------------------------
		}
	?>
	<h1>Add Product</h1>
	<div class="product-form">
		<form action="#" name="registeFrorm" enctype="multipart/form-data" method="POST">
			<div class="form-control">
				<div class="label">Tên Sản Phẩm</div>
				<div class="input">
					<input type="text" name="nameProducts">
					<span class="error"><?php echo "$errNameProducts"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Giá</div>
				<div class="input">
					<input type="text" name="price">
					<span class="error"><?php echo "$errPrice"; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Images Products</div>
				<div class="input">
					<input type="file" name="avatar" id="avatar">
					<span class="error"><?php echo "$errImages"; ?></span>
				</div>
			</div></br>
			<div class="form-control">
				<div class="input">
					<input type="submit" name="products" value="Add Products">
				</div>
			</div>
		</form>
	</div>
</body>
</html>