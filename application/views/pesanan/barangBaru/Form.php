<!-- mulai form -->
<div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
        <form class="form-horizontal" method="post" action="barang_simpan.php">
            <legend> Form Input Barang </legend>
            <div class="form-group">
                <label for="nama_barang" class="col-md-2"> Nama Barang </label>
                <div class="col-md-7">
                    <input required type="text" class="form-control" id="nama_barang" placeholder="nama barang" name="nama_barang">
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-md-7 col-md-offset-2">

                    <input type="submit" class="btn btn-primary" name="simpan" value="simpan">
                    <a class="btn btn-danger" href="index.php" role="button">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- akhir form -->