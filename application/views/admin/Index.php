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
  <link href="<?= base_url() ?>assets/admin/css/stylesheet.css" rel="stylesheet">

  <!--[endif]-->
</head>

<body>

  <?php
  include "Navbar.php";
  ?>
  <!--strat-->
  <div class="accordion horizontal">
    <ul>
      <li>
        <input type="radio" id="vert-1" name="vert-accordion" checked="checked" />
        <label for="vert-1">Bullwhip&nbsp;Effect</label>
        <div class="content">
          <div class="col-md-7">
            <img src="<?= base_url() ?>assets/admin/gambar/The-Bullwhip-Affect.jpg" />
          </div>
          <div class="col-md-5 .col-md-offset-7">
            <p align="justify">
              Untuk mencapai efesiensi supply chain dibutuhkan tiga aspek kunci dari supply chain management yaitu
              mengatur aliran fisik material, mengatur aliran informasi, dan mengatur struktur organisasi dari
              kegiatan supply chain. Hambatan yang mungkin dialami dalam supply chain management yaitu semakin
              banyaknya variasi produk, menurunnya daur hidup produk, peningkatan permintaan konsumen, fragmentation
              of supply chain ownership, era globalisasi ( Chopra dan Meindl, 2001).
            </p>
            <p align="justify"><b>BULLWHIP EFFECT</b> adalah fenomena permintaan yang sebenarnya cukup stabil
              pada tingkat konsumen akhirnya akan berubah menjadi fluktuatif di bagian hulu
              supply chain, makin ke hulu maka peningkatan itu akan semakin besar
            </p>
          </div>
        </div>
      </li>
      <li>
        <input type="radio" id="vert-2" name="vert-accordion" />
        <label for="vert-2">Demand&nbsp;</label>
        <div class="content">
          <div class="col-md-8">
            <img src="<?= base_url() ?>assets/admin/gambar/102215_1735_SupplyChain2.png" />
          </div>
          <div class="col-md-4 .col-md-offset-8">
            <p align="justify">Permintaan biasanya diupdate sesuai dengan permintaan pemesan. Dimana variabilitas permintaan yang dipesan dari pemesan lebih tinggi dibandingkan variabilitas permintaan pemesan akhir
            </p>
          </div>

        </div>
      </li>
      <li>
        <input type="radio" id="vert-3" name="vert-accordion" />
        <label for="vert-3">Order&nbsp;</label>
        <div class="content">
          <div class="col-md-6">
            <img src="<?= base_url() ?>assets/admin/gambar/bullwhip-effect1.png" />
          </div>
          <div class="col-md-6 .col-md-offset-3">
            <p align="justify">Terjadinya penumpukan beberapa pesanan dengan
              jumlah kecil yang kemudian setelah beberapa waktu
              akan diberikan pada produksi. Pola penumpukan ini akan
              mengakibatkan meningkatnya variabilitas pada produksi.
            </p>
          </div>
        </div>
      </li>
      <li>
        <input type="radio" id="vert-4" name="vert-accordion" />
        <label for="vert-4">Lead&nbsp;Time</label>
        <div class="content">
          <div class="col-md-6">
            <img src="<?= base_url() ?>assets/admin/gambar/Bullwhip-Effect-graph.jpg" />
          </div>
          <div class="col-md-6 .col-md-offset-3">
            <p>Lamanya waktu tiba pesanan yang diterima oleh pemesan.
              Dengan keadaan lead time yang lebih panjang akan meningkatkan variabilitas
              yang terjadi di suatu supply chain.
            </p>
            <p> Lead Time Berarti waktu produksi yang dijanjikan, sehingga pemesan dapat mengambil barang.
            </p>
          </div>

        </div>
      </li>
  </div>
  </li>
  </ul>
  </div>
  <!--end-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>

</html>