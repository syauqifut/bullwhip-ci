<!-- Mulai Tabel -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th> </th>
                        <th> Nama Pemesan </th>
                        <th> Nama Barang </th>
                        <th> Jumlah Pesanan </th>
                        <th> Proses </th>

                    </tr>
                    <tr>
                        <?php
                        foreach ($DaftarPesanan as $key => $data) {
                        ?>
                            <td> <?php echo $key + 1 ?> </td>
                            <td> <?php echo $data["nama_pemesan"] ?> </td>
                            <td> <?php echo $data["nama_barang"] ?> </td>
                            <td> <?php echo $data["jumlah_pesanan"] ?> </td>

                            <td>
                                <?php if ($data["proses"] == 1) { ?>
                                    <button type="button" class="btn btn-danger disabled">
                                        <span class="glyphicon glyphicon-eye-close">
                                            Sudah Diproses
                                        </span>
                                    </button>
                                <?php } else { ?>
                                    <a href="<?= base_url() ?>index.php/produksi/pesananForm/<?php echo $data['id_pesanan'] ?>">
                                        <button type="button" class="btn btn-success">
                                            <span class="glyphicon glyphicon-eye-open">
                                                Proses
                                            </span>
                                        </button>
                                    </a>
                                <?php } ?>
                            </td>

                            <!-- <td>
            <a href="<?= base_url() ?>produksi/pesananForm?id=<?php echo $data['id_pesanan'] ?>">
                            <?php
                            if ($data['sudah'] = 1) {
                                echo '<button type="button" class="btn btn-success">
                                <span class="glyphicon glyphicon-eye-close">
                                    Proses
                                </span>
                            </button>';
                            } else {
                                echo '<button type="button" class="btn btn-info href="<?= base_url() ?>produksi/pesananForm">
                                <span class="glyphicon glyphicon-eye-open">
                                    x
                                </span>
                            </button>';
                            }
                            ?>
                            -->
                            </td>

                    </tr>
                <?php
                        }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>