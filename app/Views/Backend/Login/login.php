<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Informasi Apotek Berbasis Web</title>

<link href="Assets/css/bootstrap.min.css" rel="stylesheet">
<link href="Assets/css/datepicker3.css" rel="stylesheet">
<link href="Assets/css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin-top: 5px;">
        
        <div class="text-center mb-4">
            <img src="<?= base_url('Assets/logo.png') ?>" alt="Logo Apotek" style="width: 100px; margin-bottom: 3px;">
            
            <h2 style="font-weight: 800; color: #28a745; margin: 0; letter-spaccing: -1px ">
                <i class="fas fa-plus-square"></i> SI APOTEK
            </h2>
            <p class="text-muted">Manajemen Data Obat & Transaksi</p>
        </div>

        <div class="login-panel panel panel-default card shadow" style="border-radius: 10px; overflow: hidden;">
            <div class="panel-heading card-header bg-success text-white text-center">
                <h3 class="panel-title" style="margin: 10px 0;"><strong>Log In Sistem</strong></h3>
            </div>
            
            <div class="panel-body card-body">
                <form role="form" action="<?= base_url('auth/cek_login') ?>" method="post">
                    <fieldset>
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: #e9ecef; padding: 10px; border: 1px solid #ced4da; border-right: none;"><i class="fas fa-user-md"></i></span>
                                <input class="form-control" placeholder="Username / ID Pegawai" name="username" type="text" autofocus="" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: #e9ecef; padding: 10px; border: 1px solid #ced4da; border-right: none;"><i class="fas fa-lock"></i></span>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                            </div>
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success btn-block shadow-sm" style="font-weight: bold;">
                            <i class="fas fa-sign-in-alt"></i> Masuk Ke Sistem
                        </button>
                    </fieldset>
                </form>
            </div>
            <div class="panel-footer card-footer text-center text-muted">
                <small>&copy; 2026 SI Apotek Berbasis Web</small>
            </div>
        </div>
    </div>
</div>
		

	<script src="Assets/js/jquery-1.11.1.min.js"></script>
	<script src="Assets/js/bootstrap.min.js"></script>
	<script src="Assets/js/chart.min.js"></script>
	<script src="Assets/js/chart-data.js"></script>
	<script src="Assets/js/easypiechart.js"></script>
	<script src="Assets/js/easypiechart-data.js"></script>
	<script src="Assets/js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
