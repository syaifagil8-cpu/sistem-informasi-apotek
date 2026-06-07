<?= $this->include('Backend/Template/header') ?>
<?= $this->include('Backend/Template/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Dashboard Customer</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard Pelanggan</h1>
        </div>
    </div>

    <!-- Widget Statistik Real -->
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?= $pesananAktif ?></div>
                        <div class="text-muted">Pesanan Aktif</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-time glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?= $totalTransaksi ?></div>
                        <div class="text-muted">Riwayat Belanja</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-medicine glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?= $totalItem ?></div>
                        <div class="text-muted">Total Item Dibeli</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-red panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-ok-circle glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?= $totalTransaksi - $pesananAktif ?></div>
                        <div class="text-muted">Transaksi Lunas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Selamat Datang -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Informasi Apotek</div>
                <div class="panel-body">
                    <p>Selamat datang, <b><?= session()->get('username') ?></b>! Nikmati kemudahan belanja obat secara online.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Terbaru -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list-alt"></span> Transaksi Terbaru
                </div>
                <div class="panel-body">
                    <?php if(!empty($transaksiTerbaru)): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($transaksiTerbaru as $t): ?>
                            <tr>
                                <td><?= $t['id_penjualan'] ?></td>
                                <td><?= date('d-m-Y', strtotime($t['tanggal'])) ?></td>
                                <td>Rp <?= number_format($t['total'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if($t['status'] == 'Lunas'): ?>
                                        <span class="label label-success">Lunas</span>
                                    <?php else: ?>
                                        <span class="label label-warning">Belum Lunas</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('customer/detail-transaksi/'.$t['id_penjualan']) ?>"
                                       class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url('customer/transaksi') ?>" class="btn btn-default btn-sm">
                        Lihat Semua Transaksi
                    </a>
                    <?php else: ?>
                    <p class="text-center">Belum ada transaksi. <a href="<?= base_url('customer/obat') ?>">Mulai belanja sekarang!</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->include('Backend/Template/footer') ?>