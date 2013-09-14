<?php
$this->pagename = "เติมเงิน";
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
	<title>เติมเงิน || ,:: <?php echo $this->server_name; ?> ::.</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Scrips -->
	<script type="text/javascript" src='https://www.tmtopup.com/topup/3rdTopup.php?uid=18242'></script>

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
		if(OP_DONATE === true):
		?>
		<form id="form1" name="form1" method="post" action="">
		  <h2>Donate to Xtra-craft</h2>

		  <p><input name="tmn_password" type="text" id="tmn_password" maxlength="14" / value="รหัสบัตร 14 หลัก"></p>
		  <p><input type="text" name="ref1" id="ref1" value="ชื่อตัวละคร" /></p>
		  <p><input type="text" name="ref2" id="ref2" value="ของที่ต้องการ" /></p>
		  <p><input type="text" name="ref3" id="ref3" value="ราคาบัตร"/></p>
		  <p><button name="button" id="button" type="submit" value="Submit" onclick="submit_tmnc()"></button>
		</form>
		<?php
		else:
		?>
		ปิดรับ Donate ชั่วคราว
		<?php
		endif;
		?>
		<p style="color: rgb(138, 138, 138);">
		Script by Theballkyo
		</p>
		</div>


	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>