

        <aside class="sidebar" role="navigation">

            <div class="scroll-sidebar">

                <div class="user-profile">

                    <div class="dropdown user-pro-body">

                        <div class="profile-image">

                            <img src="<?php echo base_url() ?>assets/plugins/images/users/boy.png" alt="user-img" class="img-circle">

                            <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                <span class="badge badge-danger">

                                    <i class="fa fa-angle-down"></i>

                                </span>

                            </a>

                            <ul class="dropdown-menu animated flipInY">

                                <li><a href="<?php echo base_url() ?>Akun"><i class="fa fa-user"></i> Akun</a></li>

                                <li><a href="<?php echo base_url() ?>Akun/status_rumah"><i class="fa fa-home"></i> Rumah</a></li>

                                <!-- <li><a href="<?php echo base_url() ?>Tamu"><i class="fa fa-inbox"></i> Buku Tamu</a></li> -->

                                <li role="separator" class="divider"></li>

                                <li><a href="<?php echo base_url() ?>Logout"><i class="fa fa-power-off"></i> Logout</a></li>

                            </ul>

                        </div>

                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> <?php echo $this->session->userdata('nama'); ?></a></p>

                    </div>

                </div>

                <nav class="sidebar-nav">

                    <ul id="side-menu">

                                <?php 

                                // Role User Warga

                                if ($this->session->userdata('role_user') === '1' && $this->session->userdata('jabatan') === 'WARGA') { ?>

                        <li>

                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-globe fa-fw"></i> <span class="hide-menu"> Data Pribadi</span></a>

                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url() ?>Profil"><i class="icon-notebook fa-fw"></i>Profil</a></li>

                                <li> <a href="<?php echo base_url() ?>Keluarga"><i class="icon-people fa-fw"></i>Anggota Keluarga</a> </li>

                            </ul>

                        </li>



                                <?php }

                                // Role User Keamanan

                                else if ($this->session->userdata('role_user') === '1' && $this->session->userdata('jabatan') === 'Keamanan') { ?>

                        <li>

                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-social-dropbox fa-fw"></i> <span class="hide-menu"> Data Pribadi</span></a>

                            <ul aria-expanded="false" class="collapse">                             

                                <li><a href="<?php echo base_url() ?>Profil"><i class="icon-notebook fa-fw"></i>Profil</a></li>

                                <li> <a href="<?php echo base_url() ?>Keluarga"><i class="icon-people fa-fw"></i>Data Keluarga</a> </li>

                            </ul>

                        </li>

                        <li>

                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-globe fa-fw"></i> <span class="hide-menu"> Data Kepengurusan</span></a>

                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url() ?>Status_rumah"><i class="fa fa-home fa-fw"></i>Status Rumah</a></li>

                            </ul>

                        </li>



                                <?php }

                                // Role User Ketua RW, RT & Ketua Forum

                                else if ($this->session->userdata('role_user') === '1' && ($this->session->userdata('jabatan') === 'Ketua RW' || $this->session->userdata('jabatan') === 'Ketua RT' || $this->session->userdata('jabatan') === 'Ketua Forum' || $this->session->userdata('jabatan') === 'Bendahara'  || $this->session->userdata('jabatan') === 'Sekretaris')) { ?>

                        <li>
                            
                            <a class="waves-effect" href="<?= base_url() ?>Dashboard_pengurus" ><i class="icon-home fa-fw"></i> <span class="hide-menu"> Dashboard</span></a>
                        </li>

                        <li>

                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-social-dropbox fa-fw"></i> <span class="hide-menu"> Data Pribadi</span></a>

                            <ul aria-expanded="false" class="collapse">                             

                                <li><a href="<?php echo base_url() ?>Profil"><i class="icon-notebook fa-fw"></i>Profil</a></li>

                                <li> <a href="<?php echo base_url() ?>Keluarga"><i class="icon-people fa-fw"></i>Data Keluarga</a> </li>

                            </ul>

                        </li>

                        <li>

                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-globe fa-fw"></i> <span class="hide-menu"> Data Kepengurusan</span></a>

                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url() ?>Pengurus"><i class="icon-user fa-fw"></i>Data Pengurus</a></li>

                                <li><a href="<?php echo base_url() ?>Warga/Data_warga"><i class="fa fa-users fa-fw"></i>Data Warga</a></li>

                                <li><a href="<?php echo base_url() ?>Status_rumah"><i class="fa fa-home fa-fw"></i>Status Rumah</a></li>

                            </ul>

                        </li>



                                <?php }

                                // Role User Super Admin

                                else if($this->session->userdata('role_user') === '9'){  ?>

                        <li>
                            
                            <a class="waves-effect" href="<?= base_url() ?>Dashboard" ><i class="icon-home fa-fw"></i> <span class="hide-menu"> Dashboard</span></a>
                        </li>

                        <li>

                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-globe fa-fw"></i> <span class="hide-menu"> Data Master</span></a>

                            <ul aria-expanded="false" class="collapse">

                                <!-- <li><a href="<?php echo base_url() ?>Profil"><i class="icon-user fa-fw"></i>Data Profil</a></li> -->

                                <li><a href="<?php echo base_url() ?>User"><i class="icon-people fa-fw"></i>Data Pengguna</a></li>

                                <li><a href="<?php echo base_url() ?>Iuran"><i class="fa fa-money fa-fw"></i>Data Iuran</a></li>

                                <li><a href="<?php echo base_url() ?>Blok"><i class="icon-direction fa-fw"></i>Data Blok</a></li>

                                <li><a href="<?php echo base_url() ?>Pengurus"><i class="icon-user fa-fw"></i>Data Pengurus</a></li>

                                <li><a href="<?php echo base_url() ?>Warga"><i class="fa fa-users fa-fw"></i>Data Warga</a></li>

                                <li><a href="<?php echo base_url() ?>Status_rumah"><i class="fa fa-home fa-fw"></i>Status Rumah</a></li>

                            </ul>

                        </li>

                                 

                                <?php } ?>

                    </ul>



                </nav>

            </div>

        </aside>