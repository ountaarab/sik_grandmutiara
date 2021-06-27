<?php echo $this->session->flashdata('msg'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/components/dropify/dist/css/dropify.min.css">
<div class="row">
    <!-- Left sidebar -->
    <div class="col-md-12">

        <div class="white-box">

            <button type="button" class="close" onclick="batal()">×</button>

            <div class="row">

                <form enctype="multipart/form-data" id="form-ajax" action="<?php echo base_url() ?>Keluarga/add_keluarga" method="post" class="form-horizontal row-fluid">

                    <div class="col-md-4 col-sm-6">

                        <h4 class="text-center">Tambah Data Keluarga </h4>

                        <div class="white-box text-center">

                            <center>

                                <input name="userfile" id="input-file-now" class="dropify" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" />

                                <h5>Foto</h5>

                            </center>

                        </div>

                    </div>

                    <div class="col-md-8 col-sm-6">

                        <table class="table table-hover">

                            <tbody>

                                <tr>

                                    <td>Nama Lengkap</td>

                                    <th>

                                        <input type="hidden" name="id_warga" value="<?= $id_warga ?>">

                                        <input type="text" value="<?php echo isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : '' ?>" id="nama_lengkap" required name="nama_lengkap" placeholder="Nama Lengkap..." class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>NIK</td>

                                    <th>

                                        <input type="text" value="<?php echo isset($_SESSION['nik']) ? $_SESSION['nik'] : '' ?>" id="nik" name="nik" placeholder="NIK..." class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Tempat Lahir</td>

                                    <th>

                                        <input type="text" maxlength="20" id="tempat_lahir" value="<?php echo isset($_SESSION['tempat_lahir']) ? $_SESSION['tempat_lahir'] : '' ?>" placeholder="Tempat Lahir..." name="tempat_lahir" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Tanggal Lahir</td>

                                    <th>

                                        <input type="date" name="tanggal_lahir" value="<?php echo isset($_SESSION['tanggal_lahir']) ? $_SESSION['tanggal_lahir'] : '' ?>" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Hubungan Dengan Pemilik</td>

                                    <th>

                                        <select class="form-control" name="status_hubungan">

                                            <option value="ISTRI">ISTRI</option>

                                            <option value="ANAK">ANAK</option>

                                            <option value="IBU KANDUNG">IBU KANDUNG</option>

                                            <option value="BAPAK KANDUNG">BAPAK KANDUNG</option>

                                            <option value="KAKAK KANDUNG">KAKAK KANDUNG</option>

                                            <option value="ADIK KANDUNG">ADIK KANDUNG</option>

                                            <option value="KELUARGA LAINNYA">KELUARGA LAINNYA</option>

                                        </select>

                                    </th>

                                </tr>

                                <tr>

                                    <td>Jenis Kelamin</td>

                                    <th>

                                        <select class="form-control" name="jk">

                                            <option value="L">LAKI-LAKI</option>

                                            <option value="P">PEREMPUAN</option>

                                        </select>

                                    </th>

                                </tr>

                                <tr>

                                    <td>Golongan Darah</td>

                                    <th>

                                        <input type="text" maxlength="20" value="<?php echo isset($_SESSION['gol_darah']) ? $_SESSION['gol_darah'] : '' ?>" id="gol_darah" placeholder="Golongan Darah..." name="gol_darah" class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>Agama</td>

                                    <th>

                                        <select class="form-control" name="agama">

                                            <option value="ISLAM">ISLAM</option>

                                            <option value="KRISTEN">KRISTEN</option>

                                            <option value="PROTESTAN">PROTESTAN</option>

                                            <option value="HINDU">HINDU</option>

                                            <option value="BUDHA">BUDHA</option>

                                        </select>

                                    </th>

                                </tr>

                                <tr>

                                    <td>Status Perkawinan</td>

                                    <th>

                                        <select class="form-control" name="status_perkawinan">

                                            <option value="BELUM KAWIN">BELUM KAWIN</option>

                                            <option value="KAWIN">KAWIN</option>

                                            <option value="CERAI HIDUP">CERAI HIDUP</option>

                                            <option value="CERAI MATI">CERAI MATI</option>

                                        </select>

                                    </th>

                                </tr>

                                <tr>

                                    <td>Pekerjaan</td>

                                    <th>

                                        <input type="text" value="<?php echo isset($_SESSION['pekerjaan']) ? $_SESSION['pekerjaan'] : '' ?>" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan..." class="form-control">

                                    </th>

                                </tr>

                                <tr>

                                    <td>

                                        <div class="form-group">

                                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan</button>

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
    $(function() {
        $('.dropify').dropify();
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });

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