<?php
$this->pagename = "สมัครสมาชิก";
$data_return = "0";
if(isset($_POST['register']))
{
	//Load Libs
	require('protected/libs/class_db.inc.php');
	require('protected/libs/class_data.inc.php');
	//Connect MySQL
	$dbcon = Class_DB::connect(DB_HOST,DB_USER,DB_PW,DB_NAME);
	if(!$dbcon)
	{
		$data_return = 'ไม่สามารถเชื่อมต่อฐานข้อมูลได้ ?';
	}else{
	$Cdata = new data_check;
	$Cdata->setencrypt('sha1');
	$data_return = $Cdata->register_user();
	}
}

?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>
	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>สมัครสมาชิก || ,:: <?php echo $this->server_name; ?> ::.</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo $this->geturlroot(); ?>css/base.css?ver=101">
	<link rel="stylesheet" href="<?php echo $this->geturlroot(); ?>css/skeleton.css?ver=101">
	<link rel="stylesheet" href="<?php echo $this->geturlroot(); ?>css/layout.css?ver=101">
	
</head>
<body>
	<!-- Primary Page Layout -->

	<div class="container">
		<div class="form-bg">
		<?php
		//Load breadcrumbs
		echo $this->breadcrumbs();
		?>
		<p></p>
		<?php
		if(OP_REG == true && !isset($_POST['register'])):
		?>
			<form name="register" id="register" method="post" action="">
				<h2>สมัครเล่นเกม Xtra-craft</h2>
				<p><input type="text" name="username" id="username" placeholder="ชื่อในเกม 3-15 ตัว"></p>
				<p><input type="password" name="password" id="password" placeholder="รหัสผ่าน"></p>
				<p><input type="password" name="password2" id="password2" placeholder="ยืนยันรหัสผ่าน"></p>
				<p><input type="text" name="email" id="email" placeholder="Email"></p>
				<button name="register" id="register" type="submit"></button>
			</form>
		<?php
			elseif(isset($_POST['register'])):
				if($data_return !== true):
				print $data_return;
			?>
					<p><a href="" onClick="history.go(-1);return true;">กลับไปแก้ไข</a>
					<?php
					else:
					?>
					<p>การสมัครเสร็จสมบูรณ์แล้ว !</p>
				<?php
				endif;
				?>
		<?php
		else:
		?>
		ปิดรับสมัครชั่วคราว !?
		<?php
		endif;
		?>
		<p style="color: rgb(138, 138, 138);">Script by Theballkyo</p>
		</div>


	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>