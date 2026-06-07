<?= $this->include('Backend/Template/header') ?>
<?= $this->include('Backend/Template/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Transaksi</h1>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Informasi Transaksi</div>
        <div class="panel-body">

            <table class="table">
                <tr>
                    <th width="200">ID Transaksi</th>
                    <td><?= $transaksi['id_penjualan'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?= date('d-m-Y', strtotime($transaksi['tanggal'])) ?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>Rp <?= number_format($transaksi['total'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <?php if($transaksi['status'] == 'Lunas'): ?>
                            <span class="label label-success">Lunas</span>
                        <?php else: ?>
                            <span class="label label-warning">Belum Lunas</span>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Detail Obat yang Dibeli</div>
        <div class="panel-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detail as $d): ?>
                    <tr>
                        <td><?= $d['nama_obat'] ?></td>
                        <td>Rp <?= number_format($d['harga_jual'], 0, ',', '.') ?></td>
                        <td><?= $d['qty'] ?></td>
                        <td>Rp <?= number_format($d['subtotal'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= base_url('customer/transaksi') ?>" class="btn btn-primary">
                Kembali
            </a>

        </div>
    </div>

</div>

<?= $this->include('Backend/Template/footer') ?>