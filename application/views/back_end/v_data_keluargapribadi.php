Data Keluarga
<hr>
<?php echo $this->session->flashdata('msg'); ?>
<div class="row" id="second-content">
</div>
<div class="row" id="primary-content">

    <div class="col-sm-12">
        <div class="white-box">
            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
            <h3 class="box-title m-b-0">Data Keluarga</h3>
            <br>
            <p style="text-align:right"><a onclick="add_keluarga_pribadi('<?= en_crypt($id_warga) ?>')"><button class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Keluarga</button></a></p>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped display">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Hubungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($data_keluarga == NULL) {
                            # code...
                        } else {

                            $no = 1;
                            foreach ($data_keluarga->result() as $_keluarga) {
                                if ($_keluarga->foto == "") {
                                    $gambar = '<h4 class="text-warning">Belum ada foto</h4>';
                                } else {
                                    $gambar = "<img src='" . base_url() . "assets/plugins/foto/" . $_keluarga->foto . "' style='max-width:70%;max-height:70%;'>";
                                }
                        ?>
                                <tr>
                                    <td>
                                        <center>
                                            <div class="btn-group m-r-10">
                                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li><a data-toggle="modal" data-target="#ModalDetail-<?= $no ?>"><i class="fa fa-search m-r-5"></i>Lihat</a></li>
                                                    <li><a onclick="edit_keluarga('<?= $_keluarga->id_keluarga; ?>','<?= $_keluarga->id_warga; ?>')"><i class="fa fa-edit m-r-5"></i>Edit</a></li>
                                                    <li class="divider"></li>
                                                    <li><a onclick='javascript: swal({
                                                                      title: "Are You Sure?",
                                                                      text: "Konfirmasi untuk menghapus data terpilih",
                                                                      icon: "warning",
                                                                      buttons: true,
                                                                      dangerMode: true,
                                                                    })
                                                                    .then((willDelete) => {
                                                                      if (willDelete) {    
                                                                        window.location = "<?= base_url() ?>Keluarga/delete_keluarga/<?= $_keluarga->id_keluarga; ?>/<?= $_keluarga->id_warga; ?>";
                                                                      } else {
                                                                        
                                                                      }
                                                                    });'><i class="fa fa-trash-o m-r-5"></i>Hapus</a></li>
                                                </ul>
                                            </div>
                                        </center>
                                    </td>
                                    <td class="text-center"><?= $gambar ?></td>
                                    <td><?= $_keluarga->nama_lengkap; ?></td>
                                    <td class="text-center"><?= $_keluarga->status_hubungan; ?></td>
                                </tr>
                        <?php
                                $no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
$no = 1;
// LOOPING MODAL ================================================
if ($data_keluarga == NULL) {
    # code...
} else {

    foreach ($data_keluarga->result() as $_keluarga) {
        if ($_keluarga->jk == 'L') {
            $jk = 'Laki-laki';
        } else {
            $jk = 'Perempuan';
        }
        if ($_keluarga->foto == "") {
            if ($_keluarga->jk == 'L') {
                $gambar = base_url() . "assets/plugins/foto/boy.png";
            } else {
                $gambar = base_url() . "assets/plugins/foto/girl.png";
            }
        } else {
            $gambar = base_url() . "assets/plugins/foto/" . $_keluarga->foto;
        }
?>

        <!-- MODAL ADD -->
        <div id="ModalDetail-<?= $no ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Detail Keluarga</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="white-box text-center">
                                    <center>
                                        <img src="<?= $gambar ?>" id="product-image" class="img-responsive" />
                                    </center>
                                    <button class="btn btn-info m-r-5"><?= $_keluarga->nama_lengkap ?></button>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>NIK</td>
                                            <th><?= $_keluarga->nik ?></th>
                                        </tr>
                                        <tr>
                                            <td>TTL</td>
                                            <th><?= $_keluarga->tempat_lahir ?>, <?= date('d M Y', strtotime($_keluarga->tanggal_lahir)) ?></th>
                                        </tr>
                                        <tr>
                                            <td>Hubungan Status</td>
                                            <th><?= $_keluarga->status_hubungan ?></th>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <th><?= $jk ?></th>
                                        </tr>
                                        <tr>
                                            <td>Golongan Darah</td>
                                            <th><?= $_keluarga->gol_darah ?></th>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <th><?= $_keluarga->agama ?></th>
                                        </tr>
                                        <tr>
                                            <td>Status Perkawinan</td>
                                            <th><?= $_keluarga->status_perkawinan ?></th>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <th><?= $_keluarga->pekerjaan ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- MODAL ADD END -->

<?php
        // LOOPING MODAL ================================================
        $no++;
    }
}
?>

<script>
    function add_keluarga_pribadi(id) {
        $('#primary-content').hide();
        $.get(base_url + INI_DIA + '/form_add/' + id, function(result) {
            $('#second-content').html(result);
        });
    }

    function batal() {
        $('#primary-content').show();
        $('#second-content').html('');
    }

    function edit_keluarga(id_k, id_w) {
        $('#primary-content').hide();
        $.get(base_url + INI_DIA + '/get_data_keluarga/' + id_k + '/' + id_w, function(result) {
            $('#second-content').html(result);
        });
    }
</script>