                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Master No. Rumah</h3>
                            <br>
                            <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data No. Rumah</button></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">Nama Blok</th>
                                            <th class="text-center">No Rumah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_no_rumah->result() as $_no_rumah) { ?>
                                        <tr>
                                            <td>                                            
                                                <center>
                                                    <div class="btn-group m-r-10">
                                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>
                                                        <ul role="menu" class="dropdown-menu">
                                                            <li><a data-toggle="modal" data-target="#myModalEdit-<?= $_no_rumah->id_no_rumah; ?>" href="<?= base_url() ?>Blok/get_data/<?= $_no_rumah->id_no_rumah; ?>"><i class="fa fa-edit m-r-5"></i>Edit</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="<?= base_url() ?>No_rumah/delete/<?= $_no_rumah->id_no_rumah; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o m-r-5"></i>Hapus</a></li>
                                                        </ul>
                                                    </div>
                                                </center>
                                            </td>
                                            <td class="text-center"><?php echo $_no_rumah->nama_blok; ?></td>
                                            <td class="text-center"><?php echo $_no_rumah->no_rumah; ?></td>
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
                                <h4 class="modal-title" id="myModalLabel">Tambah No. Rumah</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>No_rumah/add">
                                        <div class="form-group"> 
                                            <label for="exampleInputEmail1">Blok</label>
                                            <select class="form-control" name="id_blok">
                                            <?php
                                            foreach ($data_blok->result() as $_blok) { ?>
                                                <option value="<?= $_blok->id_blok ?>"><?= $_blok->nama_blok ?></option>
                                            <?php 
                                            } 
                                            ?>
                                            </select>
                                            <label for="exampleInputEmail1">No. Rumah</label>
                                            <input type="text" class="form-control" name="no_rumah" required>
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
                foreach ($data_no_rumah->result() as $_no_rumah) { ?>
                <div id="myModalEdit-<?= $_no_rumah->id_no_rumah ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Edit No. Rumah</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?= base_url() ?>No_rumah/edit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Blok</label>
                                            <select class="form-control" name="id_blok">
                                            <?php
                                            foreach ($data_blok->result() as $_blok) { 
                                                $select = NULL;
                                                if ($_blok->nama_blok == $_no_rumah->nama_blok) {
                                                    $select = " selected";
                                                }
                                            ?>
                                                <option value="<?= $_blok->id_blok ?>"<?= $select ?>><?= $_blok->nama_blok ?></option>
                                            <?php 
                                            } 
                                            ?>
                                            </select>
                                            <label for="exampleInputEmail1">No. Rumah</label>
                                            <input type="hidden" class="form-control" name="id_no_rumah" value="<?= $_no_rumah->id_no_rumah ?>" required> 
                                            <input type="text" class="form-control" name="no_rumah" value="<?= $_no_rumah->no_rumah ?>" required> 
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