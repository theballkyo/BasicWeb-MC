<html>
<head>
<title>Error ?!</title>
</head>
<body>
<?php
/*
require('protected/libs/class_db.inc.php');
$dbcon = Class_DB::connect(DB_HOST,DB_USER,DB_PW,DB_NAME);
$strFileName = "accounts.txt";
$objFopen = fopen($strFileName, 'r');
if ($objFopen) {
    while (!feof($objFopen)) {
        $file = fgets($objFopen, 4096);
		$file = explode(' ',$file);
		//print $file['0']."<br>";
		$file['1'] = explode('balance:',$file['1']);
		$file['1']['1'] = sprintf("%01.2f", $file['1']['1']);
		//print $file['1']['1'];
        echo "<br>";
		$user = "select * from iconomy where username='".$file['0']."'";
		$obj = mysql_query($user);
		if(mysql_num_rows($obj) < 1)
		{
		$strSQL = "INSERT INTO iconomy ";
		$strSQL .="(id,username,balance,status) ";
		$strSQL .="VALUES ";
		$strSQL .="(NULL,'".$file['0']."','".$file['1']['1']."','0')";
		$objQuery = mysql_query($strSQL);
		if($objQuery){
		echo $file['0']." ok!";
		}else{
		echo $file['0']." fail !";
		}
		}
		
		$strSQL = "UPDATE iconomy SET ";
		$strSQL .="balance = '".$file['1']['1']."' ";
		$strSQL .="WHERE username = '".$file['0']."' ";
		$objQuery = mysql_query($strSQL);
		if($objQuery){
		echo $file['0']." ok!";
		}else{
		echo $file['0']." fail !";
		}
    }
    fclose($objFopen);
}
*/
?>
</body>
</html>
