<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/components/dropify/dist/css/dropify.min.css">
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
<?php echo $this->session->flashdata('msg');
foreach ($data_pribadi->result() as $row) {
    $id_blok = $row->id_blok;
    $no_rumah = $row->no_rumah;
    $id_warga = $row->id_warga;
    $status_menempati = $row->status_menempati;
    $status_rumah = $row->status_rumah;
    $nama_lengkap = $row->nama_lengkap;
    $nik = $row->nik;
    $tempat_lahir = $row->tempat_lahir;
    $tanggal_lahir = $row->tanggal_lahir;
    $jk = $row->jk;
    $gol_darah = $row->gol_darah;
    $agama = $row->agama;
    $status_perkawinan = $row->status_perkawinan;
    $pekerjaan = $row->pekerjaan;
    $kontak = $row->kontak;
    $email = $row->email;
    $foto = $row->foto;
}



if ($foto == NULL) {
    $gambar = '';
} else {
    $gambar = "data-default-file='assets/plugins/foto/" . $foto . "'";
}

?>
<div class="row">
    <!-- Left sidebar -->
    <div class="col-md-12">
        <div class="white-box">
            <button type="button" class="close" onclick="batal()">×</button>
            <div class="row">
                <form enctype="multipart/form-data" id="form-ajax" action="<?php echo base_url() ?>Warga/add" method="post" class="form-horizontal row-fluid" autocomplete="off">
                    <div class="col-md-4 col-sm-6">
                        <h4 class="text-center">Edit Data </h4>
                        <div class="white-box text-center">
                            <center>
                                <input name="userfile" id="input-file-now" class="dropify" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <h5>Foto</h5>
                            </center>
                        </div>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Status Menempati</td>
                                    <th>
                                        <select class="form-control" name="status_menempati">
                                            <option value="HAK MILIK" <?php if ($status_menempati == 'HAK MILIK') {
                                                                            echo " selected";
                                                                        } ?>>HAK MILIK</option>
                                            <option value="KONTRAK" <?php if ($status_menempati == 'KONTRAK') {
                                                                        echo " selected";
                                                                    } ?>>KONTRAK</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Status Rumah</td>
                                    <th>
                                        <select class="form-control" name="status_rumah">
                                            <option value="ADA" <?php if ($status_rumah == 'ADA') {
                                                                    echo " selected";
                                                                } ?>>ADA</option>
                                            <option value="TIDAK ADA" <?php if ($status_rumah == 'TIDAK ADA') {
                                                                            echo " selected";
                                                                        } ?>>TIDAK ADA</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Blok</td>
                                    <th>
                                        <select class="form-control" name="id_blok">
                                            <?php
                                            foreach ($data_blok->result() as $row) : ?>
                                                <option value="<?= $row->id_blok ?>" <?php if ($id_blok == $row->id_blok) {
                                                                                            echo " selected";
                                                                                        } ?>><?= $row->nama_blok ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <td>No Rumah</td>
                                    <th>
                                        <select class="form-control" name="no_rumah">
                                            <option value="">-PILIH-</option>
                                            <option value="<?= $no_rumah ?>" selected><?= $no_rumah ?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="12A">12A</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                        </select>
                                    </th>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                    <div class="col-md-8 col-sm-6">

                        <table class="table table-hover">

                            <tbody>

                                <tr>

                                    <td>Nama Lengkap</td>

                                    <th>

                                        <input type="hidden" name="id_warga" value="<?= en_crypt($id_warga) ?>">

                                        <input type="text" value="<?php echo isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : $nama_lengkap ?>" id="nama_lengkap" required name="nama_lengkap" placeholder="Nama Lengkap..." class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>NIK</td>

                                    <th>

                                        <input type="number" maxlength="16" value="<?php echo isset($_SESSION['nik']) ? $_SESSION['nik'] : $nik ?>" required placeholder="NIK..." onkeypress='return isNumberKey(event)' name="nik" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Tempat Lahir</td>

                                    <th>

                                        <input type="text" maxlength="20" id="tempat_lahir" value="<?php echo isset($_SESSION['tempat_lahir']) ? $_SESSION['tempat_lahir'] : $tempat_lahir ?>" placeholder="Tempat Lahir..." name="tempat_lahir" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Tanggal Lahir</td>

                                    <th>

                                        <input type="date" name="tanggal_lahir" value="<?php echo isset($_SESSION['tanggal_lahir']) ? $_SESSION['tanggal_lahir'] : $tanggal_lahir ?>" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Jenis Kelamin</td>

                                    <th>

                                        <select class="form-control" name="jk">

                                            <option value="L" <?php if ($jk == 'L') {
                                                                    echo " selected";
                                                                } ?>>LAKI-LAKI</option>

                                            <option value="P" <?php if ($jk == 'P') {
                                                                    echo " selected";
                                                                } ?>>PEREMPUAN</option>

                                        </select>

                                    </th>

                                </tr>

                                <tr>

                                    <td>Golongan Darah</td>

                                    <th>

                                        <input type="text" maxlength="20" value="<?php echo isset($_SESSION['gol_darah']) ? $_SESSION['gol_darah'] : $gol_darah ?>" id="gol_darah" placeholder="Golongan Darah..." name="gol_darah" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Agama</td>

                                    <th>

                                        <select class="form-control" name="agama">

                                            <option value="ISLAM" <?php if ($agama == 'ISLAM') {
                                                                        echo " selected";
                                                                    } ?>>ISLAM</option>

                                            <option value="KRISTEN" <?php if ($agama == 'KRISTEN') {
                                                                        echo " selected";
                                                                    } ?>>KRISTEN</option>

                                            <option value="PROTESTAN" <?php if ($agama == 'PROTESTAN') {
                                                                            echo " selected";
                                                                        } ?>>PROTESTAN</option>

                                            <option value="HINDU" <?php if ($agama == 'HINDU') {
                                                                        echo " selected";
                                                                    } ?>>HINDU</option>

                                            <option value="BUDHA" <?php if ($agama == 'BUDHA') {
                                                                        echo " selected";
                                                                    } ?>>BUDHA</option>

                                        </select>

                                    </th>

                                </tr>

                                <?php

                                $bk = '';

                                $ka = '';

                                $ch = '';

                                $cm = '';

                                if ($status_perkawinan == 'BELUM KAWIN') {

                                    $bk = " selected";
                                }



                                if ($status_perkawinan == 'KAWIN') {

                                    $ka = " selected";
                                }



                                if ($status_perkawinan == 'CERAI HIDUP') {

                                    $ch = " selected";
                                }



                                if ($status_perkawinan == 'CERAI MATI') {

                                    $ch = " selected";
                                }

                                ?>

                                <tr>

                                    <td>Status Perkawinan</td>

                                    <th>

                                        <select class="form-control" name="status_perkawinan">

                                            <option value="BELUM KAWIN" <?= $bk ?>>BELUM KAWIN</option>

                                            <option value="KAWIN" <?= $ka ?>>KAWIN</option>

                                            <option value="CERAI HIDUP" <?= $ch ?>>CERAI HIDUP</option>

                                            <option value="CERAI MATI" <?= $cm ?>>CERAI MATI</option>

                                        </select>

                                    </th>

                                </tr>

                                <tr>

                                    <td>Pekerjaan</td>

                                    <th>

                                        <input type="text" value="<?php echo isset($_SESSION['pekerjaan']) ? $_SESSION['pekerjaan'] : $pekerjaan ?>" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan..." class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Kontak</td>

                                    <th>

                                        <input type="number" maxlength="13" value="<?php echo isset($_SESSION['kontak']) ? $_SESSION['kontak'] : $kontak ?>" placeholder="No. Handphone..." onkeypress='return isNumberKey(event)' name="kontak" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Email</td>

                                    <th>

                                        <input type="text" placeholder="E-mail" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : $email ?>" name="email" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>

                                        <div class="form-group">

                                            <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Edit</button>

                                        </div>

                                    </td>

                                    <th></th>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
<script src="<?= base_url() ?>assets/plugins/components/dropify/dist/js/dropify.min.js"></script>
<script>
    $('#form-ajax').submit(function(e) {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                data = JSON.parse(data);
                swal(data.title, data.msg, data.tipe);
                if (data.status) {
                    batal();
                }
            },
            error: function(data) {

            }
        });
        e.preventDefault();
    });
</script>