                Data Warga

                <hr>

                <?php echo $this->session->flashdata('msg'); ?>

                <div class="row">

                    <div class="col-sm-12">

                        <div class="white-box">

                            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->

                            <h3 class="box-title m-b-0">Data Warga</h3>

                            <br>

                            <div class="table-responsive">

                                <table id="myTable" class="table table-striped display">

                                    <thead>

                                        <tr>

                                            <th class="text-center"></th>

                                            <th class="text-center">Foto</th>

                                            <th class="text-center">Nama</th>

                                            <th class="text-center">Rumah</th>

                                            <th class="text-center">Pekerjaan</th>

                                            <th class="text-center">Status Menempati</th>

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

                                                    $gambar = '<h4 class="text-info">--Belum ada foto--</h4>';
                                                } else {

                                                    $gambar = "<img src='" . base_url() . "assets/plugins/foto/" . $_warga->foto . "' style='width:50%;height:auto'>";
                                                }

                                        ?>

                                                <tr>

                                                    <td>

                                                        <center>

                                                            <div class="btn-group m-r-10">

                                                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>

                                                                <ul role="menu" class="dropdown-menu">

                                                                    <li><a data-toggle="modal" data-target="#ModalDetail-<?= $no ?>"><i class="fa fa-search m-r-5"></i>Lihat</a></li>

                                                                    <li><a href="<?= base_url() ?>Warga/data_keluarga/<?= $_warga->id_warga; ?>"><i class="fa fa-users m-r-5"></i>Anggota Keluarga</a></li>

                                                                </ul>

                                                            </div>

                                                        </center>

                                                    </td>

                                                    <td class="text-center"><?= $gambar ?></td>

                                                    <td><?= $_warga->nama_lengkap; ?></td>

                                                    <td class="text-center">BLOK <?= $_warga->nama_blok . "-NO. " . $_warga->no_rumah; ?></td>

                                                    <td class="text-center"><?= $_warga->pekerjaan; ?></td>

                                                    <td class="text-center"><?= $_warga->status_menempati; ?></td>

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

                if ($data_warga == NULL) {

                    # code...

                } else {



                    foreach ($data_warga->result() as $_warga) {

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

                        <div id="ModalDetail-<?= $no ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-lg">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                        <h4 class="modal-title" id="myModalLabel">Detail Warga</h4>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row">

                                            <div class="col-md-4 col-sm-12">

                                                <h4 class="text-center">BLOK <?= $_warga->nama_blok . "-NO. " . $_warga->no_rumah; ?></h4>

                                                <div class="white-box text-center">

                                                    <center>

                                                        <img src="<?= $gambar ?>" id="product-image" class="img-responsive" />

                                                    </center>

                                                    <button class="btn btn-info m-r-5"><?= $_warga->nama_lengkap ?></button>

                                                </div>

                                            </div>

                                            <div class="col-md-8 col-sm-12">

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

                                                            <td>Golongan Darah</td>

                                                            <th><?= $_warga->gol_darah ?></th>

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

                                                            <th style="font-size: 14px;"><?= strtolower($_warga->email) ?></th>

                                                        </tr>

                                                        <tr>

                                                            <td>

                                                                <a href="<?= base_url() ?>Warga/data_keluarga/<?= $_warga->id_warga ?>"><i class="fa fa-users m-r-5"></i>Keluarga

                                                                </a>

                                                            </td>

                                                            <th>

                                                            </th>

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