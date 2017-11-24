<?php include 'cauhinh.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Link Protect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?php echo WEBURL ?>" />
<meta name="description" content="Ẩn link chống ninja, bảo vệ link share trên group, fanpage facebook, tăng tương tác cho bài viết">
<meta property="og:title" content="Link Protect" />
<meta property="og:image" content="logo.png" />
<meta property="og:site_name" content="Link Protect" />
<meta property="og:description" content="Ẩn link chống ninja, bảo vệ link share trên group, fanpage facebook, tăng tương tác cho bài viết" />
<meta property="og:url" content="<?php echo WEBURL ?>" />
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
<div class="col-xs-12" style="text-align: center">
Chào, <a href="<?php echo WEBURL ?>/" target="_blanks"><strong><?php echo WEBSITE ?></strong></a>
</div>
</div>
<div class="container">
<div class="panel panel-primary">
<div class="panel-heading">Khóa nội dung</div>
<div class="panel-body">
<div class="row">

<div class="col-xs-12" style="text-align: center">
<div id="status">Video hướng dẫn</div>
<iframe width="854" height="480" src="https://www.youtube.com/embed/cF3GnD0ssbA" frameborder="0" gesture="media" allowfullscreen></iframe>
<div id="status">ib mình để dược hỗ trợ tốt nhất</div>
</div>
</div>
</div>
</div>
<!-- Ads
<div class="panel panel-default">
<div class="panel-body">
<iframe data-aa='533838' src='//ad.a-ads.com/533838?size=990x90' scrolling='no' style='width:990px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe>
<div id="qc" style="font-weight: bold; font-size: 17px;text-align: center;"></div>
</div>
</div> -->
<footer class="footer" style="font-size:12px;">
<p style="font-size:13px;">&copy; 2017 Vy Nghia</p>
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
<script src="assets/js/bootstrap-wysihtml5.js?v=1507225806"></script>
<script src="assets/js/clipboard.min.js"></script>
<script>
    	var spush;
    	var clipboard = new Clipboard('.btn');
    	clipboard.on('success', function(e) {
        	call(e.trigger,'Đã copy!');
	    });

	    clipboard.on('error', function(e) {
	        call(e.trigger,'Lỗi rùi!');
	    });

		}, 100);
		$('.btn-tooltip').tooltip();
		$( "#btn-submit" ).on( "click", function() {
			  check_dup();
		});
		$('.textarea').wysihtml5();
		$( "#type1, #type2" ).change(function () {
			  if ($("#type2").is(":checked"))
			  {
			  		$("#box_content").show("slow");
			  		$("#box_url").hide("slow");
			  		//$("#type_url").val('');

			  }
			  if ($("#type1").is(":checked"))
			  {
			  		$("#box_url").show("slow");
			  		$("#box_content").hide("slow");
			  		//$("#type_content").val('');
			  }
		});

		$( "#btn-push" ).on( "click", function() {
			var frm = $(document.formpush);
			var data = frm.serializeArray();

			$.ajax({
	            method      : 'POST',
				cache		: false,
	            url 		: 'ajax/pre_push.php',
		    	data		: data,
	            beforeSend: function () {
             		$("#loading").show()
        		},
		        success: function (repo) {
					$('#ketqua').html(repo);
					$("#loading").hide()
				}
		    });
		});



		function push()
		{
			var spush = setInterval(function(){ send_push(spush) }, 2000);
			$("div#ketqua div#div-btn-push").html('');
		}

		function send_push(spush)
		{
			$.ajax({
	            method      : 'GET',
	            cache       : false,
	            dataType    : "json",
	            url         : 'ajax/send_push.php',
	            beforeSend: function () {
             		$("#loading").show()
        		},
		        success: function (repo) {

					if(repo.status != "done")
	            	{
	            		$("div#ketqua div#push_status").html(repo.msg);
	            	}
	            	else
	            	{
	            		$("div#ketqua div#push_status").html('Hoàn thành!');
						$("#loading").hide()
						clearInterval(spush);
	            	}
				}

	             });
		}


		function call(elem, text)
		{
			elem.innerHTML = text;
		}
	    function submit()
		{
			var frm = $(document.formsubmit);
			var data = frm.serializeArray();

			$.ajax({
	            method        : 'POST',
				cache		: false,
	            url 		: 'ajax/encode.php',
		    	data		: data,
	            beforeSend: function () {
             		$("#loading").show()
        		},
		        success: function (repo) {
					$('#ketqua').html(repo);
					$("#loading").hide()
				}
		    });

		}


		function check_dup()
		{
			var frm = $(document.formsubmit);
			var data = frm.serializeArray();
			$.ajax({
	            method        : 'POST',
				cache		: false,
	            url 		: 'ajax/dup.php',
	            dataType	:"json",
	            data		: data,
	            beforeSend: function () {
             		$("#loading").show()
        		},
		        success: function (repo) {
					$("#loading").hide()
					if(repo.status == 0)
					{
						submit();
					}
					else
					{
						$("#ketqua").html(repo.html);
					}
				}
		    });

		}
		function danhgia(hash)
		{
			$.ajax({
	            method        : 'GET',
	            cache       : false,
	            dataType    : "json",
	            url         : 'ajax/action.php?hash='+ hash,
	            beforeSend: function () {
             		$("#loading").show()
        		},
		        success: function (repo) {
					$("#loading").hide()
					if(repo.error == 0)
	            	{
	            		$('#danhgia').modal('hide')
	            		$("#msgdanhgia_ok").html(repo.msg);
	            	}
	            	else
	            	{
	            		$("#msgdanhgia").html(repo.msg);
	            	}
				}

	             });
		}

		function add(hash)
		{
			$.ajax({
	            method        : 'GET',
	            cache       : false,
	            dataType    : "json",
	            url         : 'ajax/action.php?hash='+ hash,
	            beforeSend: function () {
             		$("#loading").show()
        		},
		        success: function (repo) {
					$("#loading").hide()
					if(repo.error == 0)
	            	{
	            		$("#msgdanhgia_ok").html(repo.msg);
	            	}
	            	else
	            	{
	            		$("#msgdanhgia_ok").html(repo.msg);
	            	}
				}

	             });
		}
		function remove(hash)
		{
			var xacnhan = confirm("Bạn có muốn xóa link này không?\n* Lưu ý: Thao tác không thể phục hồi");
			if (xacnhan == true) {
			    $.ajax({
	            method      : 'GET',
	            cache       : false,
	            dataType    : "json",
	            url         : 'ajax/action.php?hash='+ hash,
	            beforeSend: function () {
             		$("#loading").show()
        		},
		        success: function (repo) {
					$("#loading").hide()
					if(repo.error == 0)
	            	{
	            		alert(repo.msg);
	            		location.reload();
	            	}
	            	else
	            	{
	            		alert(repo.msg);
	            	}
				}

	             });
			}
			else
			{
				alert("Không xóa thì bấm vào đây làm gì vậy....! kekekek (^.^!)");
			}

		}


		    </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71090934-5', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
