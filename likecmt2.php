<?php
include 'cauhinh2.php';
set_time_limit(0);
error_reporting(0);
$post = json_decode(request('https://graph.facebook.com/v2.10/' .$idcr. '/feed?fields=id,message,created_time,from&limit=' . $limit . '&access_token=' . $token), true); /* Get Data Post*/
$timelocpost = date('Y-m-d');
$logpost     = file_get_contents("log2.txt");
for ($i = 0; $i < 100; $i++) {
    $idpost      = $post['data'][$i]['id'];
	#nếu bạn không thích bot vào ai đó, bỏ id người ta vào, tìm id ở https://findmyfbid.com/ có id rồi bỏ vào 
	$id          = $post['data'][$i]['id'];
	$id          = $idkhongbot;
    $messagepost = $post['data'][$i]['message'];
    $time        = $post['data'][$i]['created_time'];
    $getinfo_user = json_decode(request('https://graph.facebook.com/' . $idpost . '?access_token=' . $token), true);
    $name = $getinfo_user["from"]["name"];
    $getid = $getinfo_user["from"]["id"];
	/* Check time Post */
    if (strpos($time, $timelocpost) !== false) {
        		/* Check hashtag */
        if (strpos(strtolower($messagepost), HASHTAG_NAMESPACE) === FALSE) {
			/* Check trùng  */
            if (strpos($logpost, $idpost) === FALSE) {
				request('https://graph.fb.me/' . urlencode($idpost) . '/reactions?type=' . $camsuc . '&method=post&access_token=' . $token);
				request('https://graph.facebook.com/' . urlencode($idpost) . '/comments?method=post&message=' . urlencode($comment) . '&access_token=' . $token);
                $luulog = fopen("log2.txt", "a");
                fwrite($luulog, $idpost . "\n");
                fclose($luulog);
            } else {
                echo 'CMT Thành Công';
            }
        }
        
    }
}
exec("php likecmt2.php"); /* Chạy lại file  */
function request($url)
{
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return FALSE;
    }
    
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HEADER => FALSE,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_ENCODING => '',
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.87 Safari/537.36',
        CURLOPT_AUTOREFERER => TRUE,
        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => 0
    );
    
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response  = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    unset($options);
    return $http_code === 200 ? $response : FALSE;
}
?>