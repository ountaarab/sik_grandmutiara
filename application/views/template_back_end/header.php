<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/plugins/images/logo_sik.png">
  <title>S.I. Kependudukan <?= OBJECT_NAME ?></title>
  <!-- ===== Bootstrap CSS ===== -->
  <link href="<?= base_url() ?>assets/default/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- ===== Plugin CSS ===== -->
  <link href="<?= base_url() ?>assets/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/components/html5-editor/bootstrap-wysihtml5.css" />
  <link href="<?= base_url() ?>assets/plugins/components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <!-- ===== Animation CSS ===== -->
  <link href="<?= base_url() ?>assets/default/css/animate.css" rel="stylesheet">
  <!-- ===== Custom CSS ===== -->
  <link href="<?= base_url() ?>assets/default/css/style.css" rel="stylesheet">
  <!-- ===== Color CSS ===== -->
  <link href="<?= base_url() ?>assets/default/css/colors/green-dark.css" id="theme" rel="stylesheet">
  <?php
  if ($this->uri->segment(2) == 'form_add' || $this->uri->segment(2) == 'form_add_keluarga' || $this->uri->segment(2) == 'get_data_keluarga' || $this->uri->segment(2) == 'get_data') { ?>
    <!-- ===== Plugin CSS ===== -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/components/dropify/dist/css/dropify.min.css">
  <?php
  }
  ?>
  <!-- ===== SWAL JS ===== -->
  <script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
  <style type="text/css">

  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>