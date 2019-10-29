<!DOCTYPE html>
<html>
<head>
	<title>Form example - Session 21</title>
	<style type="text/css">
		.error {
			color: red;
		}
		.register {
			border: 1px solid #7ddaff;
    		background-color: #C8EEFD;
    		margin: 20px 100px;
    		padding: 40px;
    		border-radius: 4px;
    		float: left;
		}
		.demoInputBox {
    		padding: 10px;
    		border: #bdbdbd 1px solid;
    		border-radius: 4px;
    		background-color: #FFF;
    		width: 60%;
		}
		form input {
			margin: 5px 0px;
		}
		.hoten {
			width: 85%;
			height: 25px;
		}
		.email {
			padding-top: 5px;
			width: 85%;
			height: 25px;
		}
		.gioitinh {
			padding-top: 10px;
			width: 85%;
			height: 25px;
		}
		.quequan{
			width: 85%;
			height: 25px;
		}
		.ngaysinh{
			padding-top: 5px;	
			width: 85%;
			height: 25px;
		}
		.row {
		    padding-bottom: 15px;
		}
		.error {
			padding-top: 10px;
		}
	</style>
</head>
<body>
	<?php 
		$errName = $errEmail = $errSex = $errQuequan = $errDate ='';
		if (isset($_POST['register'])) {
			if ($_POST['Name'] == "") {
				$errName = 'Please input your name ';
			} else {
				$errName = '';
			}
			if ($_POST['Email'] == "") {
				$errEmail = 'Please input your Email';
			} else {
				$errEmail = "";
			}
			if (empty($_POST['Sex']) == "") {
				$errSex = 'Please input your Sex';
			} else {
				$errSex = "";
			}
			if ($_POST['Quequan'] == "") {
				$errQuequan = 'Please input your Quequan';
			} else {
				$errQuequan = "";
			}
			if ($_POST['Date'] == "") {
				$errDate = 'Please input your Date';
			} else {
				$errDate = "";
			}
			echo $_POST['Name'];
			echo "<br>";
			echo $_POST['Email'];
			echo "<br>";
			echo $_POST['Sex'];
			echo "<br>";
			echo $_POST['Quequan'];
			echo "<br>";
			echo $_POST['Date'];
			echo "<br>";
		}
	?>
	<form class="register" action="#" name="RegisterForm" method="POST">
		<p class="hoten">Họ Tên: 
			<input  type="text" name="Name">
			<p class="error"><?php echo $errName;?></p>
		</p>
		<p class="email">Email:
			<input type="text" name="Email">
			<p class="error"><?php echo $errEmail;?></p>
		</p>
		<p class="giotinh">Giới tính:
			<input type="radio" name="Sex" value="Nam">Nam 
			<input type="radio" name="Sex" value="Nu">Nữ
			<p class="error"><?php echo $errSex;?></p>
		</p>
		<div class="frmDronpDown">
        <div class="row">
            <label>Thành phố:</label><br> <select name="country" id="country-list" class="demoInputBox" onchange="getState(this.value);">
                <option value="" disabled="" selected="">Chọn Thành Phố</option>
                <option value="1">Quảng Trị</option>
                <option value="2">Huế</option>
                <option value="3">Đà Nẵng</option>
                <option value="4">Quảng Nam</option>
                <option value="5">Quảng Ngãi</option>
            </select>
        </div>
        <div class="row">
            <label>Quận:</label><br> <select name="state" id="state-list" class="demoInputBox" onchange="getCity(this.value);">	
            	<option value="" disabled="" selected="">Chọn Quận</option>
				<option value="5">Ile-de-France</option>
				<option value="6">Midi-Pyrenees</option>
			</select>
        </div>
        <div class="row">
            <label>Phường:</label><br> <select name="city" id="city-list" class="demoInputBox">	<option value="" disabled="" selected="">Chọn Phường</option>
			<option value="1">Paris</option>
			<option value="2">Poissy</option>
		</select>
        </div>
    </div>
		<p class="quequan">Quê quán:
			<input  type="select" name="Quequan">
			<p class="error"><?php echo $errQuequan;?></p>
		</p>
		<p class="ngaysinh">Ngày sinh:
			<input  type="date" name="Date" size="300px">
			<p class="error"><?php echo $errDate;?></p>
		</p>
		<p>
			<input type="submit" name="register" value="Register">
		</p>
	</form>
</body>
</html>