                Data Warga
            <hr>
                <?php echo $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Detail Warga</h4> </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <h4 class="text-center">BLOK <?= $_warga->nama_blok."-NO. ".$_warga->no_rumah; ?></h4>
                                            <div class="white-box text-center">
                                                <center>
                                                    <img src="<?= $gambar ?>" id="product-image" class="img-responsive" />
                                                </center>
                                                <button class="btn btn-info m-r-5"><?= $_warga->nama_lengkap ?></button>
                                            </div>

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
                                                        </tbody>
                                                    </table>
                                        </div>
                                        <div class="col-md-8 col-sm-6">
                                                    <table class="table table-hover">
                                                        <tbody>
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
                                                                <th><?= $_warga->email ?></th>
                                                            </tr>   
                                                            <tr>
                                                                <td>
                                                                    <a href="<?= base_url() ?>Warga/keluarga/<?= $_warga->id_warga ?>"><button class="btn btn-default m-r-5" ><i class="fa fa-users m-r-5"></i>Anggota Keluarga</button>
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
                    </div>
                </div>