<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">          
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard Apotek</h1>
        </div>
    </div><!--/.row-->
    
    <!-- Widget Statistik -->
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-plus glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">120</div>
                        <div class="text-muted">Total Obat</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-blue panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">52</div>
                        <div class="text-muted">Penjualan</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-user glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">24</div>
                        <div class="text-muted">Supplier</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-red panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <em class="glyphicon glyphicon-warning-sign glyphicon-l"></em>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large">15</div>
                        <div class="text-muted">Stok Menipis</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    
    <!-- Grafik Penjualan -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Grafik Penjualan</div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    
    <!-- Bagian Catatan & List -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default chat">
                <div class="panel-heading" id="accordion"><span class="glyphicon glyphicon-comment"></span> Chat Admin</div>
                <div class="panel-body">
                    <ul>
                        <li class="left clearfix">
                            <span class="chat-img pull-left">
                                <img src="http://placehold.it/80/28a745/fff" alt="User Avatar" class="img-circle" />
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Admin</strong> <small class="text-muted">Baru saja</small>
                                </div>
                                <p>Sistem siap digunakan. Silakan cek stok obat secara berkala.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-md" placeholder="Tulis pesan..." />
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-md" id="btn-chat">Kirim</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="panel panel-blue">
                <div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-check"></span>To-do List</div>
                <div class="panel-body">
                    <ul class="todo-list">
                        <li class="todo-list-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox1" />
                                <label for="checkbox1">Cek obat kadaluarsa</label>
                            </div>
                        </li>
                        <li class="todo-list-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox2" />
                                <label for="checkbox2">Input data supplier baru</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-md" placeholder="Tambah tugas..." />
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-md" id="btn-todo">Tambah</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div> <!--/.main-->