<?php
/* >_ Developed by Vy Nghĩa */

//default config
define('TOKEN', '');
$checktoken = TOKEN;
$token = TOKEN;
define('LIMIT', '20');
$limit = LIMIT;
define('HASHTAG_NAMESPACE', '#j2team');

//mysql info
$dbhost = '';
$dbuser = '';
$dbpass = '';
$dbname = '';

//Cấu hình BOT LIKE
$camsuc = 'LIKE';
$comment= '';
$idkhongbot = '';

//id cr
$idcr = '';

//connect mysql
$con = @mysql_connect($dbhost, $dbuser, $dbpass);
@mysql_select_db($dbname, $con);
