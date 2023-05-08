<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Thesisku</title>

  <!-- Bootstrap -->
  <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <?php
  include FCPATH . "/application/Views/Produksi/Navbar.php";
  ?>
  <div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
      <form class="form-horizontal" method="post" action="produksi_simpan.php">
        <?php

        if (empty($Produksi)) {
        } else {
          foreach ($Produksi as $key => $value) {
        ?>

            <legend> Form Input Produksi </legend>
            <input type="hidden" name="id_pesanan" value="<?php echo $value['id_pesanan'] ?>">
            <div class="form-group">
              <label for="Nama Pemesan" class="col-md-3"> Nama Pemesan </label>
              <div class="col-md-7">
                <input required type="text" disabled class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?php echo $value['nama_pemesan']; ?>">
              </div>
            </div>
            <br>

            <div class="form-group">
              <label for="id_barang" class="col-md-3"> ID Barang </label>
              <div class="col-md-7">
                <input required type="text" readonly class="form-control" id="id_barang" name="id_barang" value="<?php echo $value['id_barang']; ?>">
              </div>
            </div>
            <br>

            <div class="form-group">
              <label for="Jumlah Pesanan" class="col-md-3"> Jumlah Pesanan </label>
              <div class="col-md-7">
                <input required type="text" readonly disabled class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="<?php echo $value['jumlah_pesanan']; ?>">
              </div>
            </div>
            <br>

            <div class="form-group">
              <label for="Jumlah Produksi" class="col-md-3"> Jumlah Produksi </label>
              <div class="col-md-7">
                <input required type="text" class="form-control" id="jumlah_produksi" placeholder="Jumlah Barang Yang Akan di Produksi" name="jumlah_produksi">
              </div>
            </div>
            <br>

            <div class="form-group">
              <label for="Lead Time" class="col-md-3"> Lead Time </label>
              <div class="col-md-7">
                <select class="form-control" name="lead_time" id="lead_time">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                </select>
              </div>
            </div>
            <br>

            <div class="form-group">
              <div class="col-md-7 col-md-offset-2">
                <input type="submit" class="btn btn-md btn-primary" name="simpan" value="Simpan">

                <input type="reset" class="btn btn-danger" name="batal" value="Batal">


              </div>
            </div>
        <?php
          }
        }
        ?>
      </form>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>

</html>