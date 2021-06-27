                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Data Pengguna</h3>
                            <br>
                            <?php
                            // if(count($warga->result()) > 0){
                            ?>
                            <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Pengguna</button></p>
                            <?php
                            // }
                            ?>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">Nama / Alamat</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Dibuat</th>
                                            <th class="text-center">Terakhir Diubah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_user->result() as $_user) {
                                            if ($_user->updated_at == NULL) {
                                                $tgl_ubah = '-';
                                            } else {
                                                $tgl_ubah = date('d M Y h:i:s', strtotime($_user->updated_at));
                                            }
                                        ?>
                                            <tr>
                                                <td class="text-center">
                                                    <center>
                                                        <div class="btn-group m-r-10">
                                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>
                                                            <ul role="menu" class="dropdown-menu">
                                                                <li><a data-toggle="modal" data-target="#ModalEdit-<?= $_user->id_user; ?>"><i class="fa fa-edit m-r-5"></i>Edit</a></li>
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
                                                                    window.location = "<?= base_url() ?>User/delete/<?= $_user->id_user; ?>";
                                                                  } else {
                                                                    
                                                                  }
                                                                });'><i class="fa fa-trash-o m-r-5"></i>Hapus</a></li>
                                                            </ul>
                                                        </div>
                                                    </center>
                                                </td>
                                                <td class="text-left">
                                                    <?= $_user->nama_lengkap ?>
                                                    <br>
                                                    BLOK <?= $_user->nama_blok ?>-NO. <?= $_user->no_rumah ?>
                                                </td>
                                                <td class="text-center"><?= $_user->username; ?></td>
                                                <td class="text-center"><?= date('d M Y h:i:s', strtotime($_user->created_at)); ?></td>
                                                <td class="text-center"><?= $tgl_ubah ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL ADD -->
                <div id="myModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form method="post" action="<?php echo base_url() ?>User/add">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Warga</label>
                                                <select name="id_warga" class="form-control" required>
                                                    <option value="">-PILIH WARGA-</option>
                                                    <?php
                                                    foreach ($warga->result() as $row) { ?>
                                                        <option value="<?= $row->id_warga ?>"><?= $row->nama_lengkap ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="form-control" name="username" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ketik Ulang Password</label>
                                                <input type="password" class="form-control" name="retypepassword" required>
                                            </div>
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- MODAL ADD END -->


                <!-- MODAL EDIT -->
                <?php
                $no = 1;
                foreach ($data_user->result() as $_row) { ?>
                    <div id="ModalEdit-<?= $_row->id_user; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Pengurus</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <form method="post" action="<?= base_url() ?>User/edit">
                                                <input type="hidden" class="form-control" name="id_user" value="<?= $_row->id_user ?>">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Username</label>
                                                    <input type="text" class="form-control" name="username" value="<?= $_row->username ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="password" class="form-control" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Ketik Ulang Password</label>
                                                    <input type="password" class="form-control" name="retypepassword" required>
                                                </div>
                                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- MODAL EDIT END -->
                <?php
                    $no++;
                }
                ?>