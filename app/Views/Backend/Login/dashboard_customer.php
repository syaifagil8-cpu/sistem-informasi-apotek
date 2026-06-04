<!-- 1. Memuat Header (Berisi CSS dan struktur <head>) -->
<?= $this->include('Backend/Template/header') ?>

<!-- 2. Memuat Sidebar (Menu samping) -->
<?= $this->include('Backend/Template/sidebar') ?>

<!-- 3. Konten Utama (Pastikan class wrapper ini ada agar posisi tidak hancur) -->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">          
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Dashboard Customer</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard Pelanggan</h1>
        </div>
    </div><!--/.row-->
    
    <!-- Widget Statistik Customer -->
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">5</div>
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
                        <div class="large">12</div>
                        <div class="text-muted">Riwayat Belanja</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-heart glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">8</div>
                        <div class="text-muted">Wishlist</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-red panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-envelope glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">2</div>
                        <div class="text-muted">Notifikasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    
    <!-- Promo / Pesan Penting -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Informasi Apotek</div>
                <div class="panel-body">
                    <p>Selamat datang, <b><?= session()->get('username'); ?></b>! Nikmati kemudahan belanja obat secara online. Pastikan resep dokter Anda sudah diunggah untuk pembelian obat keras.</p>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    
    <!-- Bagian Chat & Pesanan Terakhir -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default chat">
                <div class="panel-heading" id="accordion"><span class="glyphicon glyphicon-comment"></span> Bantuan Apoteker</div>
                <div class="panel-body">
                    <p>Ada pertanyaan mengenai obat? Chat apoteker kami di sini.</p>
                    <!-- Logika chat bisa ditambahkan di sini -->
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="panel panel-blue">
                <div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-list-alt"></span> Pesanan Terakhir</div>
                <div class="panel-body">
                    <ul class="todo-list">
                        <li class="todo-list-item">Paracetamol 500mg - <b>Dikemas</b></li>
                        <li class="todo-list-item">Vitamin C - <b>Selesai</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div> <!--/.main-->