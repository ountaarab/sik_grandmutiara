                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Master Iuran</h3>
                            <br>
                            <!-- <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data Blok</button></p> -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Keterangan</th>
                                            <th class="text-left">Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($data_iuran->result() as $_iuran) { ?>
                                        <tr>
                                            <td class="text-left"><?= $_iuran->keterangan; ?></td>
                                            <td class="text-left"><?= "Rp. " . number_format($_iuran->nominal,2,',','.'); ?>
                                                    <div class="btn-group m-r-10">
                                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>
                                                        <ul role="menu" class="dropdown-menu">
                                                            <li><a data-toggle="modal" data-target="#myModalEdit-<?= $_iuran->id_iuran; ?>" href="<?= base_url() ?>Blok/get_data/<?= $_iuran->id_iuran; ?>"><i class="fa fa-edit m-r-5"></i>Edit</a></li>
                                                        </ul>
                                                    </div></td>
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
                                <h4 class="modal-title" id="myModalLabel">Tambah Nama Blok</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?php echo base_url() ?>Blok/add">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Blok</label>
                                            <input type="text" class="form-control" name="nama_iuran" required> 
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
                foreach ($data_iuran->result() as $_iuran) { ?>
                <div id="myModalEdit-<?= $_iuran->id_iuran ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Edit Iuran</h4> </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="post" action="<?= base_url() ?>Iuran/edit">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Keterangan</label>
                                            <input type="hidden" class="form-control" name="id_iuran" value="<?= $_iuran->id_iuran ?>" required> 
                                            <input type="text" class="form-control" name="keterangan" value="<?= $_iuran->keterangan ?>" required> 
                                            <label for="exampleInputEmail1">Nominal</label>
                                            <input type="number" class="form-control" name="nominal" value="<?= $_iuran->nominal ?>" required> 
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