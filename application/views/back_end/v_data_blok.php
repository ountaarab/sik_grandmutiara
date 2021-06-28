            <?php echo $this->session->flashdata('msg'); ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                        <h3 class="box-title m-b-0">Master Blok</h3>
                        <br>
                        <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data Blok</button></p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped display">
                                <thead>
                                    <tr>
                                        <th class="text-left">Nama Blok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_blok->result() as $_blok) { ?>
                                        <tr>
                                            <td class="text-left"><?php echo $_blok->nama_blok; ?>
                                                <div class="btn-group m-r-10">
                                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>
                                                    <ul role="menu" class="dropdown-menu">
                                                        <li><a data-toggle="modal" data-target="#myModalEdit-<?= $_blok->id_blok; ?>" href="<?= base_url() ?>Blok/get_data/<?= $_blok->id_blok; ?>"><i class="fa fa-edit m-r-5"></i>Edit</a></li>

                                                        <li><a onclick='javascript: swal({
                                                                  title: "Are You Sure?",
                                                                  text: "Konfirmasi untuk menghapus data terpilih",
                                                                  icon: "warning",
                                                                  buttons: true,
                                                                  dangerMode: true,
                                                                })
                                                                .then((willDelete) => {
                                                                  if (willDelete) {    
                                                                    window.location = "<?= base_url() ?>Blok/delete/<?= $_blok->id_blok; ?>";
                                                                  } else {
                                                                    
                                                                  }
                                                                });'><i class="fa fa-trash-o m-r-5"></i>Hapus</a></li>
                                                    </ul>
                                                </div>
                                            </td>
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
                            <h4 class="modal-title" id="myModalLabel">Tambah Nama Blok</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Blok/add">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Blok</label>
                                            <input type="text" class="form-control" name="nama_blok" required>
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
            foreach ($data_blok->result() as $_blok) { ?>
                <div id="myModalEdit-<?= $_blok->id_blok ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Edit Nama Blok</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form method="post" action="<?= base_url() ?>Blok/edit">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Blok</label>
                                                <input type="hidden" class="form-control" name="id_blok" value="<?= $_blok->id_blok ?>" required>
                                                <input type="text" class="form-control" name="nama_blok" value="<?= $_blok->nama_blok ?>" required>
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
            }
            ?>