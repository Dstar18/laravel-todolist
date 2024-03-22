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
                                    <h3 class="card-title">UPDATE</h3>
                                    <div class="card-tools">
                                        <a href="/">
                                            <button type="button" class="btn btn-sm btn-block btn-primary" title="Back">
                                                <i class="fas fa-home"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" style="font-size: 14px">
                                    <form action="/produk/update" method="post">
                                        <?php foreach($produk as $rowProduk){?>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Nama Produk</label>
                                                <div class="col-sm-9">
                                                    <input type="text" style="font-size: 14px" class="form-control" name="nama" value="<?=$rowProduk->nama?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Jumlah</label>
                                                <div class="col-sm-9">
                                                    <input type="number" style="font-size: 14px" class="form-control" name="jumlah" value="<?=$rowProduk->jumlah?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Satuan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" style="font-size: 14px" class="form-control" name="satuan" value="<?=$rowProduk->satuan?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Harga</label>
                                                <div class="col-sm-9">
                                                    <input type="text" style="font-size: 14px" class="form-control" name="harga" value="<?=$rowProduk->harga?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Kategori</label>
                                                <div class="col-sm-9">
                                                    <select name="kategoriID" id="kategoriID" class="form-control selectric" style="font-size: 14px" required>
                                                        <option value="">-- Pilih --</option>
                                                        <?php if($kategori){?>
                                                            <?php foreach ($kategori as $rowKategori) {?>
                                                                <option value="<?=$rowKategori->idKategori?>"><?=$rowKategori->kategori?></option>
                                                            <?php }?>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </div>
                                        <?php }?>
                                    </form>
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
    <!-- JS -->
    
</body>
</html>