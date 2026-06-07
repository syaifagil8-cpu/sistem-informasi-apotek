<?= $this->include('Backend/Template/header') ?>
<?= $this->include('Backend/Template/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Keranjang Belanja</h1>
        </div>
    </div>

    <?php if(session()->getFlashdata('msg')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">Daftar Obat di Keranjang</div>
        <div class="panel-body">

            <?php if(!empty($cart)): ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach($cart as $item): ?>
                    <?php $total += $item['subtotal']; ?>
                    <tr>
                        <td><?= $item['nama_obat'] ?></td>
                        <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url('customer/hapus-keranjang/'.$item['id_obat']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus item ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td colspan="2"><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
                    </tr>
                </tbody>
            </table>

            <div class="text-right">
                <a href="<?= base_url('customer/obat') ?>" class="btn btn-default">
                    Lanjut Belanja
                </a>
                <a href="<?= base_url('customer/checkout') ?>" 
                   class="btn btn-success"
                   onclick="return confirm('Yakin ingin checkout?')">
                    Checkout Sekarang
                </a>
            </div>

            <?php else: ?>
                <div class="text-center">
                    <p>Keranjang kamu masih kosong.</p>
                    <a href="<?= base_url('customer/obat') ?>" class="btn btn-primary">Cari Obat</a>
                </div>
            <?php endif; ?>

        </div>
    </div>

</div>

<?= $this->include('Backend/Template/footer') ?>