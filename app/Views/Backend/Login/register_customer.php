<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Customer - Sistem Informasi Apotek</title>

    <link href="<?= base_url('Assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/css/styles.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin-top: 50px;">

            <div class="text-center mb-4">
                <h2 style="font-weight: 800; color: #28a745; margin: 0;">SI APOTEK</h2>
                <p class="text-muted">Daftar Akun Customer Baru</p>
            </div>

            <div class="login-panel panel panel-default" style="border-radius: 10px; overflow: hidden;">
                <div class="panel-heading bg-success text-white text-center">
                    <h3 class="panel-title" style="margin: 10px 0;"><strong>Registrasi Customer</strong></h3>
                </div>

                <div class="panel-body">
                    <?php if(session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>

                    <form role="form" action="<?= base_url('customer/register_process') ?>" method="post">
                        <div class="form-group">
                            <input class="form-control" placeholder="Nama Lengkap" name="nama_customer" type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Alamat" name="alamat" type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="No. Telepon" name="telepon" type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" required>
                        </div>

                        <button type="submit" class="btn btn-success btn-block" style="font-weight: bold;">
                            Daftar Sekarang
                        </button>
                    </form>
                </div>

                <div class="panel-footer text-center text-muted">
                    Sudah punya akun? <a href="<?= base_url('customer/login') ?>">Login di sini</a>
                </div>
            </div>

        </div>
    </div>

    <script src="<?= base_url('Assets/js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>