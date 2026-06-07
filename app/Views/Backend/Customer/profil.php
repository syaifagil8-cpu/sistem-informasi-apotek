<?= $this->include('Backend/Template/header') ?>
<?= $this->include('Backend/Template/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil Saya</h1>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">Edit Profil</div>
        <div class="panel-body">

            <form method="post" action="<?= base_url('customer/update_profil') ?>">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_customer" class="form-control"
                           value="<?= $customer['nama_customer'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control"
                           value="<?= $customer['alamat'] ?>" required>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="telepon" class="form-control"
                           value="<?= $customer['telepon'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= $customer['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Password Baru <small class="text-muted">(kosongkan jika tidak ingin ganti)</small></label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Isi jika ingin ganti password">
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
                </button>
                <a href="<?= base_url('customer/dashboard') ?>" class="btn btn-default">
                    Batal
                </a>
            </form>

        </div>
    </div>

</div>

<?= $this->include('Backend/Template/footer') ?>