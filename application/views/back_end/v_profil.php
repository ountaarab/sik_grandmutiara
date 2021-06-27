<?php echo $this->session->flashdata('msg'); ?>
<div class="row" id="second-content">
</div>
<div class="row" id="primary-content">
    <?php

    // DATA PEMILIK ================================================

    foreach ($data_pribadi->result() as $_warga) {

        if ($_warga->jk == 'L') {

            $jk = 'Laki-laki';
        } else {

            $jk = 'Perempuan';
        }

        if ($_warga->foto == "") {

            if ($_warga->jk == 'L') {

                $gambar = base_url() . "assets/plugins/foto/boy.png";
            } else {

                $gambar = base_url() . "assets/plugins/foto/girl.png";
            }
        } else {

            $gambar = base_url() . "assets/plugins/foto/" . $_warga->foto;
        }

    ?>



        <!-- MODAL ADD -->

        <div class="col-sm-12">

            <div class="panel panel-success block6">

                <div class="panel-heading text-center" data-perform="panel-collapse">&nbsp;

                    <div class="pull-right"><a href="#"><i class="fa fa-minus"></i></a> </div>

                </div>

                <div class="panel-wrapper collapse in" aria-expanded="true">

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-4 col-sm-6">

                                <h4 class="text-center">BLOK <?= $_warga->nama_blok . "-NO. " . $_warga->no_rumah; ?></h4>

                                <div class="white-box text-center">

                                    <center>

                                        <img src="<?= $gambar ?>" id="product-image" class="img-responsive" />

                                    </center>

                                    <button class="btn btn-success m-r-5"><?= $_warga->nama_lengkap ?></button>

                                </div>

                                <p style="text-align:left"><a onclick="get_profil()"><button class="btn btn-info waves-effect waves-light"><i class="fa fa-pencil"></i> Edit Profil</button></a></p>

                            </div>

                            <div class="col-md-8 col-sm-6">

                                <table class="table table-hover">

                                    <tbody>

                                        <tr>

                                            <td>Status Menempati</td>

                                            <th><?= $_warga->status_menempati ?></th>

                                        </tr>

                                        <tr>

                                            <td>Status Rumah</td>

                                            <th><?= $_warga->status_rumah ?></th>

                                        </tr>

                                        <tr>

                                            <td>NIK</td>

                                            <th><?= $_warga->nik ?></th>

                                        </tr>

                                        <tr>

                                            <td>TTL</td>

                                            <th><?= $_warga->tempat_lahir ?>, <?= date('d M Y', strtotime($_warga->tanggal_lahir)) ?></th>

                                        </tr>

                                        <tr>

                                            <td>Jenis Kelamin</td>

                                            <th><?= $jk ?></th>

                                        </tr>

                                        <tr>

                                            <td>Agama</td>

                                            <th><?= $_warga->agama ?></th>

                                        </tr>

                                        <tr>

                                            <td>Status Perkawinan</td>

                                            <th><?= $_warga->status_perkawinan ?></th>

                                        </tr>

                                        <tr>

                                            <td>Pekerjaan</td>

                                            <th><?= $_warga->pekerjaan ?></th>

                                        </tr>

                                        <tr>

                                            <td>Kontak</td>

                                            <th><?= $_warga->kontak ?></th>

                                        </tr>

                                        <tr>

                                            <td>Email</td>

                                            <th><?= strtolower($_warga->email)  ?></th>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- /.modal-content -->



    <?php

        // DATA PEMILIK END ================================================

    }

    ?>

</div>

<script>
    function get_profil() {
        $('#primary-content').hide();
        $.get(base_url + INI_DIA + '/get_data', function(result) {
            $('#second-content').html(result);
        });
    }



    function batal() {
        $('#primary-content').show();
        $('#second-content').html('');
    }
</script>