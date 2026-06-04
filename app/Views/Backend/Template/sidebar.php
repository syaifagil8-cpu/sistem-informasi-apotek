<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        
        <?php 
        // Mengambil segment pertama dari URL untuk menentukan role
        // Contoh: http://localhost:8080/admin/dashboard -> segment(1) adalah 'admin'
        $currentRole = service('uri')->getSegment(1); 
        ?>

        <?php if ($currentRole == 'admin'): ?>
            <!-- MENU KHUSUS ADMIN -->
            <li class="<?= (service('uri')->getSegment(2) == 'dashboard') ? 'active' : '' ?>">
                <a href="<?= base_url('admin/dashboard'); ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            
            <li class="parent">
                <a href="#"><span class="glyphicon glyphicon-folder-open"></span> Data Master <span data-toggle="collapse" href="#sub-item-master" class="icon pull-right"><em class="glyphicon glyphicon-plus"></em></span></a>
                <ul class="children collapse" id="sub-item-master">
                    <li><a href="<?= base_url('obat'); ?>"><span class="glyphicon glyphicon-share-alt"></span> Data Obat</a></li>
                    <li><a href="<?= base_url('kategori'); ?>"><span class="glyphicon glyphicon-share-alt"></span> Kategori Obat</a></li>
                    <li><a href="<?= base_url('supplier'); ?>"><span class="glyphicon glyphicon-share-alt"></span> Data Supplier</a></li>
                    <li><a href="<?= base_url('customer'); ?>"><span class="glyphicon glyphicon-share-alt"></span> Data Customer</a></li>
                </ul>
            </li>

            <li class="parent">
                <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Transaksi <span data-toggle="collapse" href="#sub-item-transaksi" class="icon pull-right"><em class="glyphicon glyphicon-plus"></em></span></a>
                <ul class="children collapse" id="sub-item-transaksi">
                    <li><a href="<?= base_url('penjualan'); ?>"><span class="glyphicon glyphicon-share-alt"></span> Penjualan</a></li>
                    <li><a href="<?= base_url('pembelian'); ?>"><span class="glyphicon glyphicon-share-alt"></span> Pembelian (Stok Masuk)</a></li>
                </ul>
            </li>

            <li><a href="<?= base_url('laporan'); ?>"><span class="glyphicon glyphicon-file"></span> Laporan Penjualan</a></li>

        <?php else: ?>
            <!-- MENU KHUSUS CUSTOMER (Default) -->
            <li class="active"><a href="<?= base_url('customer/dashboard'); ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
            <li><a href="<?= base_url('customer/obat'); ?>"><span class="glyphicon glyphicon-plus"></span> Cari Obat</a></li>
            <li><a href="<?= base_url('customer/transaksi'); ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Riwayat Transaksi</a></li>
            <li><a href="<?= base_url('customer/profil'); ?>"><span class="glyphicon glyphicon-user"></span> Profil Saya</a></li>
        <?php endif; ?>
        
        <li role="presentation" class="divider"></li>
        
        <!-- Logout -->
        <li><a href="<?= base_url('logout'); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
    <div class="attribution">Template by <a href="http://www.medialoot.com/">Medialoot</a></div>
</div><!--/.sidebar-->