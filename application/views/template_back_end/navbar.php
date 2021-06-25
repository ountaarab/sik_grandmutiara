        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <?php
                    if ($this->session->userdata('jabatan') == "SUPER ADMIN") { ?>
                        <a class="logo" href="<?php echo base_url() ?>Dashboard">
                        <?php
                    } else { ?>
                            <a class="logo" href="<?php echo base_url() ?>Profil">
                            <?php }
                            ?>
                            <b>
                                <img src="<?php echo base_url() ?>assets/plugins/images/logo_smal_new.png" alt="home" />
                            </b>
                            <span>
                                <img src="<?php echo base_url() ?>assets/plugins/images/logo-teks2.png" alt="homepage" class="dark-logo" />
                            </span>
                            </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                    </li>
                    <li>
                        <!--            <form role="search" class="app-search hidden-xs">
                            <i class="icon-magnifier"></i>
                            <input type="text" placeholder="Cari..." class="form-control">
                        </form> -->
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="right-side-toggle">
                        <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" onclick='javascript: swal({
  title: "Are You Sure?",
  text: "Konfirmasi untuk keluar dari Aplikasi SIK",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {    
    window.location = "<?= base_url('Logout') ?>";
  } else {
    
  }
});'>
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>