<?= $this->include('Backend/Template/header') ?>
<?= $this->include('Backend/Template/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Riwayat Transaksi</h1>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">Daftar Transaksi Saya</div>
        <div class="panel-body">

            <?php if(!empty($transaksi)): ?>
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
                    <?php foreach($transaksi as $t): ?>
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
                            class="btn btn-info btn-sm">
                            Detail
                            </a>
                            <?php if($t['status'] == 'Belum Lunas'): ?>
                            <a href="#" class="btn btn-success btn-sm"
                            onclick="konfirmasiBayar('<?= base_url('customer/bayar/'.$t['id_penjualan']) ?>')">
                            Bayar
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php else: ?>
                <div class="text-center">
                    <p>Belum ada transaksi.</p>
                    <a href="<?= base_url('customer/obat') ?>" class="btn btn-primary">Mulai Belanja</a>
                </div>
            <?php endif; ?>

        </div>
    </div>

</div>

<script>
function konfirmasiBayar(url) {
    Swal.fire({
        title: 'Konfirmasi Pembayaran',
        text: 'Yakin ingin melakukan pembayaran?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Bayar!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
</script>
<?= $this->include('Backend/Template/footer') ?>