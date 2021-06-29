<?php echo $this->session->flashdata('msg'); ?>
<div class="row">
    <div class="col-sm-12">
        <div id="second-content">
        </div>
        <div class="white-box" id="primary-content">
            <h3 class="box-title m-b-0">Data Warga</h3>
            <br>
            <p style="text-align:right"><button class="btn btn-success waves-effect waves-light" onclick="form_add()"><i class="fa fa-plus m-l-5"></i> Warga</button></p>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped display">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Data Pemilik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($data_warga == NULL) {
                            # code...
                        } else {

                            $no = 1;
                            foreach ($data_warga->result() as $_warga) {

                                if ($_warga->foto == "") {
                                    if ($_warga->jk == 'L') {
                                        $gambar = base_url() . "assets/plugins/foto/boy.png";
                                    } else {
                                        $gambar = base_url() . "assets/plugins/foto/girl.png";
                                    }
                                } else {
                                    if (file_exists("assets/plugins/foto/" . $_warga->foto)) :
                                        $gambar = base_url() . "assets/plugins/foto/" . $_warga->foto;
                                    else :
                                        if ($_warga->jk == 'L') {
                                            $gambar = base_url() . "assets/plugins/foto/boy.png";
                                        } else {
                                            $gambar = base_url() . "assets/plugins/foto/girl.png";
                                        }
                                    endif;
                                }
                        ?>
                                <tr>
                                    <td>
                                        <center>
                                            <div class="btn-group m-r-10">
                                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li><a data-toggle="modal" data-target="#ModalDetail-<?= $no ?>"><i class="fa fa-search m-r-5"></i>Lihat</a></li>
                                                    <li><a href="<?= base_url() ?>Warga/keluarga/<?= en_crypt($_warga->id_warga) ?>"><i class="fa fa-users m-r-5"></i>Anggota Keluarga</a></li>
                                                    <li><a href="#" onclick="form_edit('<?= en_crypt($_warga->id_warga) ?>')"><i class="fa fa-edit m-r-5"></i>Edit</a></li>

                                                    <li><a onclick='javascript: swal({
                                                        title: "Are You Sure?",
                                                        text: "Konfirmasi untuk menghapus data terpilih",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {    
                                                        window.location = "<?= base_url() ?>Warga/delete/<?= en_crypt($_warga->id_warga); ?>";
                                                        } else {
                                                        
                                                        }
                                                    });'><i class="fa fa-trash-o m-r-5"></i>Hapus</a></li>
                                                </ul>
                                            </div>
                                        </center>
                                    </td>
                                    <td class="text-center"><img src='<?= $gambar ?>' style='width:40%;height:auto'></td>
                                    <td>
                                        <b><?= $_warga->nama_lengkap; ?></b><br>
                                        BLOK <?= $_warga->nama_blok . "-NO. " . $_warga->no_rumah; ?><br>
                                        <?= $_warga->status_menempati; ?>
                                    </td>
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

<script>
    function view() {
        // let id_opd = $('#id_opd_filter').val();
        // let id_topik = $('#id_topik_filter').val();
        // let status = $('#status').val();
        // $('#myTable').dataTable().fnDestroy();
        // $('#myTable').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     order: [],
        //     ajax: {
        //         "url": base_url + INI_DIA + '/get_datas',
        //         "type": "POST",
        //         data: {
        //             // id_opd: id_opd,
        //             // id_topik: id_topik,
        //             // status: status,
        //         },
        //     }
        // });
    }

    function batal() {
        $('#primary-content').show();
        $('#second-content').html('');
    }

    function form_add() {
        $('#primary-content').hide();
        $.get(base_url + INI_DIA + '/form_add', function(result) {
            $('#second-content').html(result);
        });
    }

    function form_edit(id) {
        $('#primary-content').hide();
        $.get(base_url + INI_DIA + '/get_data/' + id, function(result) {
            $('#second-content').html(result);
        });
    }
</script>