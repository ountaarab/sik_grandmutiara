                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
                            <h3 class="box-title m-b-0">Data Pengurus</h3>
                            <br>
                            <?php
                            if (count($warga_bukan_pengurus->result()) > 0) {
                            ?>
                                <p style="text-align:right"><button data-toggle="modal" data-target="#myModalAdd" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus m-l-5"></i> Data Pengurus</button></p>
                            <?php
                            }
                            ?>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">Nama Pengurus</th>
                                            <th class="text-center">Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_pengurus->result() as $_pengurus) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <center>
                                                        <div class="btn-group m-r-10">
                                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>
                                                            <ul role="menu" class="dropdown-menu">
                                                                <li><a data-toggle="modal" data-target="#myModalEdit-<?= $_pengurus->id_pengurus; ?>"><i class="fa fa-edit m-r-5"></i>Edit</a></li>

                                                                <li><a onclick='javascript: swal({
                                                                  title: "Are You Sure?",
                                                                  text: "Konfirmasi untuk menghapus data terpilih",
                                                                  icon: "warning",
                                                                  buttons: true,
                                                                  dangerMode: true,
                                                                })
                                                                .then((willDelete) => {
                                                                  if (willDelete) {    
                                                                    window.location = "<?= base_url() ?>Pengurus/delete/<?= $_pengurus->id_pengurus; ?>";
                                                                  } else {
                                                                    
                                                                  }
                                                                });'><i class="fa fa-trash-o m-r-5"></i>Hapus</a></li>
                                                            </ul>
                                                        </div>
                                                    </center>
                                                </td>
                                                <td class="text-left">
                                                    <?= $_pengurus->nama_lengkap ?>
                                                    <br>
                                                    BLOK <?= $_pengurus->nama_blok ?>-NO. <?= $_pengurus->no_rumah ?>
                                                </td>
                                                <td class="text-center"><?php echo $_pengurus->jabatan; ?></td>
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
                                <h4 class="modal-title" id="myModalLabel">Tambah Pengurus</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form method="post" action="<?php echo base_url() ?>Pengurus/add">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Warga</label>
                                                <select name="id_warga" class="form-control">
                                                    <?php
                                                    foreach ($warga_bukan_pengurus->result() as $_warga) { ?>
                                                        <option value="<?= $_warga->id_warga ?>">
                                                            <?= $_warga->nama_lengkap . " (BLOK " . $_warga->nama_blok . "-NO." . $_warga->no_rumah . ")"; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jabatan</label>
                                                <select name="jabatan" class="form-control">
                                                    <?php
                                                    // Kondisi Ketua RW
                                                    if ($hitung_ketuarw > 0) {
                                                    } else { ?>
                                                        <option value="Ketua RW">Ketua RW</option>
                                                    <?php
                                                    }
                                                    // Kondisi Ketua RT
                                                    if ($hitung_ketuart > 0) {
                                                    } else { ?>
                                                        <option value="Ketua RT">Ketua RT</option>
                                                    <?php
                                                    }
                                                    // Kondisi Ketua Forum
                                                    if ($hitung_ketuaforum > 0) {
                                                    } else { ?>
                                                        <option value="Ketua Forum">Ketua Forum</option>
                                                    <?php
                                                    }
                                                    // Kondisi Sekretaris
                                                    if ($hitung_sekretaris > 0) {
                                                    } else { ?>
                                                        <option value="Sekretaris">Sekretaris</option>
                                                    <?php
                                                    }
                                                    // Kondisi Bendahara
                                                    if ($hitung_bendahara > 0) {
                                                    } else { ?>
                                                        <option value="Bendahara">Bendahara</option>
                                                    <?php
                                                    }
                                                    // Kondisi Keamanan
                                                    if ($hitung_keamanan > 3) {
                                                    } else { ?>
                                                        <option value="Keamanan">Keamanan</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <?php
                                            if (count($warga_bukan_pengurus->result()) > 0) {
                                            ?>
                                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Tambah</button>
                                            <?php
                                            }
                                            ?>
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
                foreach ($data_pengurus->result() as $_pengurus) { ?>
                    <div id="myModalEdit-<?= $_pengurus->id_pengurus ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Pengurus</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <form method="post" action="<?= base_url() ?>Pengurus/edit">
                                                <input type="hidden" class="form-control" name="id_pengurus" value="<?= $_pengurus->id_pengurus ?>">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Warga</label>
                                                    <select name="id_warga" class="form-control">
                                                        <option value="<?= $_pengurus->id_warga ?>"><?= $_pengurus->nama_lengkap ?> (BLOK <?= $_pengurus->nama_blok ?>-NO. <?= $_pengurus->no_rumah ?>)</option>
                                                        <?php
                                                        foreach ($warga_bukan_pengurus->result() as $_warga) { ?>
                                                            <option value="<?= $_warga->id_warga ?>">
                                                                <?= $_warga->nama_lengkap . " (BLOK " . $_warga->nama_blok . "-NO." . $_warga->no_rumah . ")"; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Jabatan</label>
                                                    <select name="jabatan" class="form-control">
                                                        <option value="<?= $_pengurus->jabatan ?>"><?= $_pengurus->jabatan ?></option>
                                                        <?php
                                                        // Kondisi Ketua RW
                                                        if ($hitung_ketuarw > 0) {
                                                        } else { ?>
                                                            <option value="Ketua RW">Ketua RW</option>
                                                        <?php
                                                        }
                                                        // Kondisi Ketua RT
                                                        if ($hitung_ketuart > 0) {
                                                        } else { ?>
                                                            <option value="Ketua RT">Ketua RT</option>
                                                        <?php
                                                        }
                                                        // Kondisi Ketua Forum
                                                        if ($hitung_ketuaforum > 0) {
                                                        } else { ?>
                                                            <option value="Ketua Forum">Ketua Forum</option>
                                                        <?php
                                                        }
                                                        // Kondisi Sekretaris
                                                        if ($hitung_sekretaris > 0) {
                                                        } else { ?>
                                                            <option value="Sekretaris">Sekretaris</option>
                                                        <?php
                                                        }
                                                        // Kondisi Bendahara
                                                        if ($hitung_bendahara > 0) {
                                                        } else { ?>
                                                            <option value="Bendahara">Bendahara</option>
                                                        <?php
                                                        }
                                                        // Kondisi Keamanan
                                                        if ($hitung_keamanan > 3) {
                                                        } else { ?>
                                                            <option value="Keamanan">Keamanan</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
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