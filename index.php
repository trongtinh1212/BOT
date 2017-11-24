<?php
/* Developed by Vy Nghiz */
session_start();
require 'cauhinh.php';
if(isset($_SESSION['index']) && isset($_POST['web']) && isset($_POST['page']) && isset($_POST['dbhost']) && isset($_POST['dbuser']) && isset($_POST['dbpass']) && isset($_POST['dbname'])){
  echo 'ok';
  $ConfigFile = fopen("cauhinh.php", "w") or die("Không thể khởi tạo file này!");
  $ConfigContent = '<?php
/* >_ Developed by Vy Nghĩa */

//default config
define(\'TOKEN\', \''.$_POST['web'].'\');
$checktoken = TOKEN;
$token = TOKEN;
define(\'LIMIT\', \''.$_POST['page'].'\');
$limit = LIMIT;
define(\'HASHTAG_NAMESPACE\', \''.$_POST['hashtag'].'\');

//mysql info
$dbhost = \''.$_POST['dbhost'].'\';
$dbuser = \''.$_POST['dbuser'].'\';
$dbpass = \''.$_POST['dbpass'].'\';
$dbname = \''.$_POST['dbname'].'\';

//Cấu hình BOT LIKE
$camsuc = \''.$_POST['GGKey'].'\';
$comment= \''.$_POST['FBAID'].'\';
$idkhongbot = \''.$_POST['FBASecret'].'\';

//id cr
$idcr = \''.$_POST['idcr'].'\';

//connect mysql
$con = @mysql_connect($dbhost, $dbuser, $dbpass);
@mysql_select_db($dbname, $con);
';
  fwrite($ConfigFile, $ConfigContent);
  fclose($ConfigFile);
  exit;
}

if(isset($_POST['password'])){
  $Password = 'phongbesttristana'; //option password
  if($_POST['password'] == $Password){
    echo (01);
    $_SESSION['index'] = true;
    exit;
  } else {
    echo (02);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Link Protect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap3/css/bootstrap.css?v=1.2" rel="stylesheet" />
<link href="assets/css/gsdk.css?v=1.2" rel="stylesheet" />
<link href="assets/css/styles.css" rel="stylesheet" />
<link href="assets/css/bttn.min.css?v=1.2" rel="stylesheet" />
<link href="css/css.css?v=1.5" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-wysihtml5.css"></link>
<link rel="shortcut icon" href="http://congdonglmht.com/wp-content/uploads/2015/05/huong-dan-cach-len-do-cung-cach-choi-tristana-ad-di-duong-duoi-solo-dat-hieu-qua-cao-trong-lien-minh-huyen-thoai.png" />
<html>
    <head>

    </head>

    <body style="background: url(http://hdwpro.com/wp-content/uploads/2016/02/Space-Sky-1920x1080-Wallpaper.jpg)">

    </body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>
<body>
</div><div class="container">
<div class="row">
</div>
<div class="container">
<div class="logo">
<!--<img class="repo" src="images/logo_anlink.top.png" />-->
</div>
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<?php include 'menu.php' ?>
</div>
</div>
</nav>
</div>
<div class="row">
<div class="col-xs-12" style="text-align: center"><a href="" target="_blanks"><strong>Chào Bạn, <?php include 'login.php'; echo $name; ?></strong></a>
</div>
</div>
<div class="panel panel-primary">
<div class="panel-heading">Cấu hình</div>
<div class="panel-body">
<div class="row">
  <?php if ($checktoken): ?>
    <div class="alert alert-success"><strong><i class="fa fa-check" aria-hidden="true"></i> Đã Có TOKEN!</strong> Trang WEB Của Bạn Đã Kết nối tới FB ....</div>
  <?php else: ?>
    <div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Chưa Có Token!</strong> Trang Web Của Bạn Chưa Kết nối tới facebook ....</div>
  <?php endif; ?>
  <?php if(isset($_SESSION['index'])): ?>
  <form class="form-horizontal" method="POST">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th colspan="2"><center>Các điều kiện về LIMIT</center></th>
      </tr>
      <tr>
        <th>Điều kiện</th>
        <th width="180px">GET POST</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Yêu cầu tối thiểu</td>
        <td>Host nước ngoài limit (10)</td>
      </tr>
      <tr>
        <td>Yêu cầu tiêu chuẩn</td>
        <td>Host VIệt Nam limit (20) </td>
      </tr>
    </tbody>
  </table>
  <h3>Định dạng cùng hệ thống</h3>
  <div class="form-group">
  <label for="title" class="col-sm-2 control-label">TOKEN</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="web" name="web" placeholder="(EAAA....ZDZD)" value="<?php echo TOKEN ?>">
  <small>*Token của Bạn (EAAA....ZDZD) </small>
  </div>
  </div>

  <div class="form-group">
  <label for="title" class="col-sm-2 control-label">LIMIT</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="page" name="page" placeholder="15" value="<?php echo LIMIT ?>">
  <small>*số bài cần thả cảm xúc và cmt(tối thiểu là 15)</small>
  </div>
  </div>
  <div class="form-group">
  <label for="title" class="col-sm-2 control-label">Hashtag</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="hashtag" name="hashtag" placeholder="#j2team" value="<?php echo HASHTAG_NAMESPACE ?>">
  <small>*hashtag này là để tránh j2team, bạn xóa nó nếu bạn muốn bot vào vào j2team hoặc chưa tham gia group</small>
  </div>
  </div>
  <h3>Dữ liệu tương tác Bạn Bè</h3>
  <div class="form-group">
  <label for="description" class="col-sm-2 control-label">Cảm Xúc</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="GGKey" name="GGkey" placeholder="LIKE" value="<?php echo $camsuc ?>">
  <small>*Sử Dụng Cảm xúc theo ý bạn Bằng Lệnh (LIKE, LOVE, HAHA, WOW, SAD, ANGRY)</small>
  <small>*Ở Đây Mình Sài LIKE Thì Điền Vào LIKE</small>
  </div>
  </div>

  <div class="form-group">
  <label for="description" class="col-sm-2 control-label">Bình Luận</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="FBAID" name="FBAID" placeholder="CMT" value="<?php echo $comment ?>">
    <small>*Điền Bình Luận Vào</small>
  </div>
  </div>

  <div class="form-group">
  <label for="description" class="col-sm-2 control-label">Id không muốn BOT</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="FBASecret" name="FBASecret" placeholder="100003880469096" value="<?php echo $idkhongbot ?>">
    <small>*100% các bạn sẽ bỏ id đó là J2TEAM Community, Nhưng code mình đã không còn bot vào j2team nữa nên bạn yên tâm, bây giờ bạn chỉ cần bỏ id không cần thiết thôi</small>
  </div>
  </div>

  <h3>Cơ sở dữ liệu (MySQL)</h3>
  <div class="form-group">
  <label for="title" class="col-sm-2 control-label">DB Host</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="dbhost" name="dbhost" placeholder="Default localhost" value="<?php echo $dbhost ?>">
  </div>
  </div>

  <div class="form-group">
  <label for="description" class="col-sm-2 control-label">DB Username</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="dbuser" name="dbuser" placeholder="MySQL server username" value="<?php echo $dbuser ?>">
  </div>
  </div>

  <div class="form-group">
  <label for="description" class="col-sm-2 control-label">DB Password</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="dbpass" name="dbpass" placeholder="MySQL server password" value="<?php echo $dbpass ?>">
  </div>
  </div>

  <div class="form-group">
  <label for="description" class="col-sm-2 control-label">DB Name</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="dbname" name="dbname" placeholder="MySQL server databse name" value="<?php echo $dbname ?>">
  </div>
  </div>

  <div class="col-xs-12" style="text-align: center;">
  <button id="index" type="button" class="btn btn-warning btn-fill">Cập nhật cấu hình</button>
  </div>
  </form>
<?php else: ?>
  <form class="form-horizontal" method="POST">
  <div class="form-group">
  <label for="description" class="col-sm-2 control-label">Mật khẩu truy cập</label>
  <div class="col-sm-10">
  <input type="password" class="form-control" id="PasswordAccess" name="PasswordAccess" placeholder="Mật khẩu truy cập File này" value="">
  </div>
  </div>
  <div class="col-xs-12" style="text-align: center;">
  <button id="login" type="button" class="btn btn-warning btn-fill">Truy Cập</button>
  </div>
  </form>
  <div id="loginStatus"></div>
<?php endif ?>
</div>
</div>
</div>
<footer class="footer" style="font-size:12px;">
<p style="font-size:13px;">&copy; <?php echo date('Y') ?> Vy Nghia</p>
</footer>
<div id="loading">
<img src="assets/img/load2.gif" /><br />
<strong>Loading...</strong>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/js/gsdk-checkbox.js"></script>
<script src="assets/js/gsdk-radio.js"></script>
<script src="assets/js/gsdk-bootstrapswitch.js"></script>
<script src="assets/js/get-shit-done.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script src="assets/js/wysihtml5-0.3.0.js"></script>
<script src="assets/js/bootstrap-wysihtml5.js?v=1508435276"></script>
<script src="assets/js/clipboard.min.js"></script>
<script>
<?php if(isset($_SESSION['index'])): ?>
$( "#index" ).on( "click", function() {
  var web = $('#web').val()
  var page = $('#page').val()
  var hashtag = $('#hashtag').val()
  var GGKey = $('#GGKey').val()
  var FBAID = $('#FBAID').val()
  var bottt = $('#bottt').val()
  var idcr = $('#idcr').val()
  var FBASecret = $('#FBASecret').val()
  var dbhost = $('#dbhost').val()
  var dbuser = $('#dbuser').val()
  var dbpass = $('#dbpass').val()
  var dbname = $('#dbname').val()
  $.ajax({
  method: 'POST',
  url: 'index.php',
  data: { web: web, page: page, hashtag: hashtag, GGKey: GGKey, FBAID: FBAID, bottt: bottt, idcr: idcr, FBASecret: FBASecret, dbhost: dbhost, dbuser: dbuser, dbpass: dbpass, dbname: dbname },
  beforeSend: function () {
    $("#loading").show()
  },
  success: function (data) {
      $("#loading").hide()
      if(data == 'ok'){
        location.reload();
      }
    }
  });
});
<?php else: ?>
$( "#login" ).on( "click", function() {
  var password = $('#PasswordAccess').val()
  if(!password){
    $('#loginStatus').html('<br /><div class="alert alert-warning"><strong>Cân nhắc!</strong> Vui lòng không để trống mật khẩu!</div>')
  } else {
    $.ajax({
    method: 'POST',
    url: 'index.php',
    data: { password: password },
    beforeSend: function () {
      $("#loading").show()
    },
    success: function (data) {
        $("#loading").hide()
        if(data == 01){
          $('#loginStatus').html('<br /><div class="alert alert-success"><strong>Đăng nhập thành công!</strong> Đâng thực thi đăng nhập ....</div>')
          location.reload();
        } else {
          $('#loginStatus').html('<br /><div class="alert alert-danger"><strong>Đăng nhập thất bại!</strong> Có thể bạn đã nhập thông tin sai, cố gắng thử lại!</div>')
        }
      }
    });
  }
});
<?php endif; ?>
</script>
Success!
</body>
</html>
