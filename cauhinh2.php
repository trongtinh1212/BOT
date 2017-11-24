<?php
/* >_ Developed by Vy Nghĩa */

//default config
define('TOKEN', '');
$checktoken = TOKEN;
$token = TOKEN;
define('LIMIT', '5');
$limit = LIMIT;
define('HASHTAG_NAMESPACE', '#j2team');

//mysql info
$dbhost = '';
$dbuser = '';
$dbpass = '';
$dbname = '';

//id cr
$idcr = '';

//Cấu hình BOT LIKE
$camsuc = 'LOVE';
$comment= '';
$idkhongbot = '';

//connect mysql
$con = @mysql_connect($dbhost, $dbuser, $dbpass);
@mysql_select_db($dbname, $con);
