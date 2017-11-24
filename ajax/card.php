<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_ERROR);

include 'Vippay_API.php';

// lay thong tin tu vippay - muc tich hop website trong quan ly tai khoan
$merchant_id = 0; // interger
$api_user = ""; // string
$api_password = ""; // string

// truyen du lieu the
$pin = $_POST['pin']; // string
$seri = $_POST['seri']; // string
$card_type = $_POST['card_type_id']; // interger
$ma_bao_mat = $_POST['ma_bao_mat'];
$user = $_POST['txtUser'];

/**
 * Card_type = 1 => Viettel
 * Card_type = 2 => Mobiphone
 * Card_type = 3 => Vinaphone
 * Card_type = 4 => Gate
 * Card_type = 5 => VTC
 * Card_type = 10 => Vietnammobi
 * Card_type = 11 => Zing
 * Card_type = 14 => OnCash
 * Card_type = 16 => BitCard
 * Card_type = 17 => Megacard
 * 
**/

$card = "";
if($card_type == 1){
    $card = "Viettel";
}
else if($card_type == 2){
    $card = "Mobiphone";
}
else if($card_type == 3){
    $card = "Vinaphone";
}
else if($card_type == 4){
    $card = "Gate";
}
else if($card_type == 5){
    $card = "VTC-Vcoin";
}
else if($card_type == 10){
    $card = "Vietnammobile";
}
else if($card_type == 11){
    $card = "Zing";
}
else if($card_type == 14){
    $card = "OnCash";
}
else if($card_type == 16){
    $card = "BitCard";
}
else if($card_type == 17){
    $card = "Megacard";
}

if($user == null || $user == ""){
    echo json_encode(array('code' => 1, 'msg' => "Tài khoản game không thể trống."));
    exit();
}

if($pin == null || $pin == "" || $seri == null || $seri == ""){
    echo json_encode(array('code' => 1, 'msg' => "Mã thẻ hoặc số seri không thể trống."));
    exit();
}
if(strlen($pin) < 8 || strlen($seri) < 8 || strlen($pin) > 20 || strlen($seri) > 20){
    echo json_encode(array('code' => 1, 'msg' => "Độ dài mã thẻ hoặc số seri không hợp lệ."));
    exit();
}
// checm ma bao mat
if($ma_bao_mat != $_SESSION['code_security']) {
     echo json_encode(array('code' => 1, 'msg' => "Sai mã bảo mật. Vui lòng nhập lại"));
     exit();
}

$vippay_api = new Vippay_API();
$vippay_api->setMerchantId($merchant_id);
$vippay_api->setApiUser($api_user);
$vippay_api->setApiPassword($api_password);
$vippay_api->setPin($pin);
$vippay_api->setSeri($seri);
$vippay_api->setCardType(intval($card_type));
$vippay_api->setNote($_SERVER['HTTP_HOST'].' - '.$user);  // Ghi chu cua ban
$vippay_api->cardCharging();
$code = intval($vippay_api->getCode());
$info_card = intval($vippay_api->getInfoCard());
$error = $vippay_api->getMsg();


// nap the thanh cong
if($code === 0 && $info_card >= 10000) {

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "xxxxx";
    $dbname = "web";
    $db = mysql_connect($dbhost, $dbuser, $dbpass) or die("cant connect db");
    mysql_select_db($dbname, $db) or die("cant select db");

    $sql = "Update MEMB_INFO set gcoin=gcoin+".$gcoinadd.",gcoin_km=gcoin_km+".$gcoin_km." Where memb___id='$user'";

    mysql_query($sql);

    echo json_encode(array('code' => 0, 'msg' => "Nạp thẻ ".$card." thành công với mệnh giá " . $info_card. " vnđ."));
}
else {
    // get thong bao loi
    echo json_encode(array('code' => 1, 'msg' =>"Nạp thẻ ".$card." không thành công."));
}