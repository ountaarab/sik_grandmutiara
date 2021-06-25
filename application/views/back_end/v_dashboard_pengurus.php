            Dashboard
            <hr>
                <?php echo $this->session->flashdata('msg'); ?>
            <div class="row m-0">
                <a href="<?= base_url() ?>Warga/Data_warga">
                    <div class="col-md-3 col-sm-6 col-xs-12 info-box">
                        <div class="media">
                            <div class="media-left">
                                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-account-multiple"></i></span>
                            </div>
                            <div class="media-body">
                                <h3 class="info-count text-blue"><?= $data_warga['jml'] ?></h3>
                                <p class="info-text font-12">Warga</p>
                                <span class="hr-line"></span>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-md-3 col-sm-6 col-xs-12 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-info text-white"><i class="mdi mdi-account-check"></i></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?= $data_warga_hak_milik['jml'] ?></h3>
                            <p class="info-text font-12">Hak Milik</p>
                            <span class="hr-line"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 info-box">
                    <div class="media">
                        <div class="media-left">
                            <span class="icoleaf bg-warning text-white"><i class="mdi mdi-account-convert"></i></span>
                        </div>
                        <div class="media-body">
                            <h3 class="info-count text-blue"><?= $data_warga_kontrak['jml'] ?></h3>
                            <p class="info-text font-12">Kontrak</p>
                            <span class="hr-line"></span>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url() ?>Pengurus">
                    <div class="col-md-3 col-sm-6 col-xs-12 info-box b-r-0">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icoleaf bg-danger text-white"><i class="mdi mdi-account-star"></i></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="info-count text-blue"><?= $data_pengurus ?></h3>
                                    <p class="info-text font-12">Pengurus</p>
                                    <span class="hr-line"></span>
                                </div>
                            </div>
                    </div>
                </a>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>