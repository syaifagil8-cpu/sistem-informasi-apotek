<?= $this->include('Backend/Template/header') ?>
<?= $this->include('Backend/Template/sidebar') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cari Obat</h1>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Daftar Obat Tersedia
        </div>

        <div class="panel-body">

            <form method="get" action="<?= base_url('customer/obat') ?>">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text"
                               name="keyword"
                               class="form-control"
                               placeholder="Cari nama obat..."
                               value="<?= esc($keyword ?? '') ?>">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>
                    </div>
                </div>
            </form>

            <br>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Obat</th>
                        <th>Nama Obat</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(!empty($obat)): ?>
                    <?php foreach($obat as $o): ?>

                    <tr>
                        <td><?= $o['id_obat'] ?></td>
                        <td><?= $o['nama_obat'] ?></td>
                        <td><?= $o['nama_kategori'] ?></td>
                        <td>Rp <?= number_format($o['harga_jual'],0,',','.') ?></td>
                        <td><?= $o['stok'] ?></td>
                        <td>
                            <a href="<?= base_url('customer/detail-obat/'.$o['id_obat']) ?>"
                               class="btn btn-info btn-sm">
                               Detail
                            </a>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            Tidak ada data obat
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

<?= $this->include('Backend/Template/footer') ?>