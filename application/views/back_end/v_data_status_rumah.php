                Data Status Rumah

                <hr>

                <?php echo $this->session->flashdata('msg'); ?>

                <div class="row">

                    <div class="col-lg-12 col-sm-12 col-xs-12">

                        <div class="white-box">

                            <p class="text-muted m-b-40"></p>

                            <!-- Nav tabs -->

                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Status Rumah</span></a></li>

                                <!-- <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Profile</span></a></li>

                                <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Messages</span></a></li>

                                <li role="presentation" class=""><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Settings</span></a></li>

                                <li role="presentation" class=""><a href="#tes" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Tes</span></a></li> -->

                            </ul>

                            <!-- Tab panes -->

                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="home">

                                    <div class="col-md-12">

                                        <div class="table-responsive">

                                            <table id="myTable" class="table table-striped display">

                                                <thead>

                                                    <tr>

                                                        <!-- <th class="text-center"></th> -->

                                                        <th class="text-center">No.</th>

                                                        <th class="text-center">Data Pemilik Rumah</th>

                                                        <th class="text-center">Status Rumah</th>


                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php

                                                    if ($data_warga == NULL) {

                                                        # code...

                                                    } else {



                                                        $no = 1;

                                                        foreach ($data_warga->result() as $_warga) {

                                                            if ($_warga->status_rumah == "TIDAK ADA") {

                                                                $color = 'danger';
                                                            } else {

                                                                $color = 'success';
                                                            }

                                                    ?>

                                                            <tr>

                                                                <!--                                                 <td>

                                                                <center>

                                                                    <div class="btn-group m-r-10">

                                                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle waves-effect waves-light" type="button"> <i class="fa fa-gears m-r-5"></i> <span class="caret"></span></button>

                                                                        <ul role="menu" class="dropdown-menu">

                                                                            <li><a data-toggle="modal" data-target="#ModalDetail-<?= $no ?>"><i class="fa fa-search m-r-5"></i>Lihat</a></li>

                                                                            <li><a href="<?= base_url() ?>Warga/keluarga/<?= $_warga->id_warga; ?>"><i class="fa fa-users m-r-5"></i>Anggota Keluarga</a></li>

                                                                            <li><a href="<?= base_url() ?>Warga/get_data/<?= $_warga->id_warga; ?>"><i class="fa fa-edit m-r-5"></i>Edit</a></li>

                                                                            

                                                                            <li><a href="<?= base_url() ?>Warga/delete/<?= $_warga->id_warga; ?>" onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o m-r-5"></i>Hapus</a></li>

                                                                        </ul>

                                                                    </div>

                                                                </center>

                                                            </td> -->

                                                                <td class="text-center"><?= $no; ?></td>

                                                                <td>

                                                                    <b><?= $_warga->nama_lengkap; ?></b>

                                                                    <br>

                                                                    BLOK <?= $_warga->nama_blok . "-NO. " . $_warga->no_rumah; ?>

                                                                    <br>

                                                                    <?= $_warga->status_menempati; ?>

                                                                </td>

                                                                <td class="text-center"><strong><span class="text-<?= $color ?>"><?= $_warga->status_rumah; ?></span></strong></td>

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

                                    <div class="clearfix"></div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="profile">

                                    <div class="col-md-6">

                                        <h3>Lets check profile</h3>

                                        <h4>you can use it with the small code</h4>
                                    </div>

                                    <div class="col-md-5 pull-right">

                                        <p>Vulputate eget, arcu, fringilla vel, aliquet nec, daf adfd vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="messages">

                                    <div class="col-md-6">

                                        <h3>Come on you have a lot message</h3>

                                        <h4>you can use it with the small code</h4>
                                    </div>

                                    <div class="col-md-5 pull-right">

                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="settings">

                                    <div class="col-md-6">

                                        <h3>Just do Settings</h3>

                                        <h4>you can use it with the small code</h4>
                                    </div>

                                    <div class="col-md-5 pull-right">

                                        <p>Vulputate eget, fringilla vel, aliquet nec, daf adfd vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="tes">

                                    <div class="col-md-6">

                                        <h3>Tes Boy</h3>

                                        <h4>Tes BoyTes BoyTes BoyTes Boy</h4>
                                    </div>

                                    <div class="col-md-5 pull-right">

                                        <p>Tes BoyTes BoyTes BoyTes Boy Tes BoyTes BoyTes BoyTes Boy Tes BoyTes BoyTes BoyTes Boy Tes BoyTes BoyTes BoyTes Boy.</p>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>