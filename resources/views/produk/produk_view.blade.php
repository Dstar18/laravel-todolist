<!DOCTYPE html>
<html lang="en">
<head>
    @include('_partials.head')
    <title>Laravel | Todolist</title>
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        @include('_partials.navbar')
        <!-- Navbar -->
        
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6"></div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DATA PRODUK</h3>
                                    <div class="card-tools">
                                        <a href="/produk/insert">
                                            <button type="button" class="btn btn-sm btn-block btn-primary" title="Tambah Produk">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 14px">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Harga</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($produk as $row){?>
                                                <tr>
                                                    <td><?=$row->idProduk?></td>
                                                    <td><?=$row->nama ?></td>
                                                    <td><?=$row->jumlah ?></td>
                                                    <td><?=$row->satuan ?></td>
                                                    <td><?=$row->harga ?></td>
                                                    <td><?=$row->kategori ?></td>
                                                    <td class="project-state text-center">
                                                        <a href="/produk/update/<?=$row->idProduk?>" class="btn btn-sm btn-info" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="/produk/delete/<?=$row->idProduk?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus data <?=$row->nama?> ?')" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    @include('_partials.js')
    <script>
        // Message
        $(function(){
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });
            <?php if(isset($message['result'])){ ?>
                toastr.success('<?php echo $message['result']; ?>')
            <?php }else if(isset($message['error'])){ ?>
                toastr.error('<?php echo $message['error']; ?>')
            <?php } ?>
        });
        // Message
    </script>
    <!-- JS -->
    
</body>
</html>