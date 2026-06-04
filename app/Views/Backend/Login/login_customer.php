<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Customer - Sistem Informasi Apotek</title>

    <link href="<?= base_url('Assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/css/styles.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin-top: 50px;">
            
            <div class="text-center mb-4">
                <img src="<?= base_url('Assets/logo.png') ?>" alt="Logo Apotek" style="width: 100px; margin-bottom: 3px;">
                <h2 style="font-weight: 800; color: #28a745; margin: 0;">SI APOTEK</h2>
                <p class="text-muted">Login Khusus Customer</p>
            </div>

            <div class="login-panel panel panel-default card shadow" style="border-radius: 10px; overflow: hidden;">
                <div class="panel-heading card-header bg-success text-white text-center">
                    <h3 class="panel-title" style="margin: 10px 0;"><strong>Log In Customer</strong></h3>
                </div>
                
                <div class="panel-body card-body">
                    <!-- Menampilkan pesan error jika login gagal -->
                    <?php if(session()->getFlashdata('msg')):?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif;?>

                    <!-- Form diarahkan ke controller Customer -->
                    <form role="form" action="<?= base_url('customer/auth_process') ?>" method="post">
                        <fieldset>
                            <div class="form-group mb-3">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required>
                            </div>

                            <div class="form-group mb-3">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>

                            <button type="submit" class="btn btn-success btn-block shadow-sm" style="font-weight: bold;">
                                Masuk Sebagai Customer
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

    <script src="<?= base_url('Assets/js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>