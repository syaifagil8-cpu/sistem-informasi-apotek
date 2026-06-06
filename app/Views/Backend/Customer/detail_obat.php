<?= $this->include('Backend/Template/header') ?>
<?= $this->include('Backend/Template/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Obat</h1>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <h3><?= $obat['nama_obat'] ?></h3>

            <table class="table">
                <tr>
                    <th>ID Obat</th>
                    <td><?= $obat['id_obat'] ?></td>
                </tr>

                <tr>
                    <th>Kategori</th>
                    <td><?= $obat['nama_kategori'] ?></td>
                </tr>

                <tr>
                    <th>Harga Jual</th>
                    <td>
                        Rp <?= number_format($obat['harga_jual'],0,',','.') ?>
                    </td>
                </tr>

                <tr>
                    <th>Stok</th>
                    <td><?= $obat['stok'] ?></td>
                </tr>

                <tr>
                    <th>Expired Date</th>
                    <td><?= $obat['expired_date'] ?></td>
                </tr>

                <tr>
                    <th>Keterangan</th>
                    <td><?= $obat['keterangan'] ?></td>
                </tr>
            </table>

            <a href="<?= base_url('customer/obat') ?>"
               class="btn btn-primary">
               Kembali
            </a>

        </div>
    </div>

</div>

<?= $this->include('Backend/Template/footer') ?>