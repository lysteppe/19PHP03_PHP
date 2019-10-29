
<form action="#" method="POST">

	<p>
		Họ tên
		<input type="text" name="fullname" value="<?php echo $fullname?>">
		<span  class="error"><?php echo $errFullname;?></span>
	</p>
	<p>
		Giới tính
		<input type="radio" name="sex" value="<?php echo $sex?>">
		<span class="error"><?php echo $errSex;?></span>
	</p>
	<p>
		Que quan
		<input type="select" name="quequan" value="<?php echo $quequan?>">
		<span class="error"><?php echo $errQuequan;?></span>
	</p>
	<p>
		<input type="submit" name="sum" value="Sum">
	</p>
</form>	