<!DOCTYPE html>

<html lang="en">



<?php echo $_head; ?>



<body class="mini-sidebar">

    <!-- Preloader -->

    <div class="preloader">

        <div class="cssload-speeding-wheel"></div>

    </div>

    <div id="wrapper">

        <!-- ===== Top-Navigation ===== -->

        <?php echo $_navbar; ?>

        <!-- ===== Top-Navigation-End ===== -->

        <!-- ===== Left-Sidebar ===== -->

        <?php echo $_sidebar; ?>

        <!-- ===== Left-Sidebar-End ===== -->

        <!-- Page Content -->

        <div class="page-wrapper">

            <div class="container-fluid">

                <?php echo $_content; ?>

                <?= "Logged In As : " . $_SESSION['jabatan'] ?>

                <br>

                <br>

            </div>

            <!-- /.container-fluid -->

            <?php echo $_footer; ?>

        </div>

        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->

    <script src="<?php echo base_url() ?>assets/plugins/components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="<?php echo base_url() ?>assets/default/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Menu Plugin JavaScript -->

    <script src="<?php echo base_url() ?>assets/default/js/sidebarmenu.js"></script>

    <!--slimscroll JavaScript -->

    <script src="<?php echo base_url() ?>assets/default/js/jquery.slimscroll.js"></script>

    <!--Wave Effects -->

    <script src="<?php echo base_url() ?>assets/default/js/waves.js"></script>

    <!-- Custom Theme JavaScript -->

    <script src="<?php echo base_url() ?>assets/default/js/custom.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/components/datatables/jquery.dataTables.min.js"></script>

    <!-- start - This is for export functionality only -->

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>

    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


    <!-- end - This is for export functionality only -->
    <script>
        $(function() {

            $('#myTable').DataTable();



            var table = $('#example').DataTable({

                "columnDefs": [{

                    "visible": false,

                    "targets": 2

                }],

                "order": [

                    [2, 'asc']

                ],

                "displayLength": 25,

                "drawCallback": function(settings) {

                    var api = this.api();

                    var rows = api.rows({

                        page: 'current'

                    }).nodes();

                    var last = null;

                    api.column(2, {

                        page: 'current'

                    }).data().each(function(group, i) {

                        if (last !== group) {

                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');

                            last = group;

                        }

                    });

                }

            });

            // Order by the grouping

            $('#example tbody').on('click', 'tr.group', function() {

                var currentOrder = table.order()[0];

                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {

                    table.order([2, 'desc']).draw();

                } else {

                    table.order([2, 'asc']).draw();

                }

            });

        });

        $('#example23').DataTable({

            dom: 'Bfrtip',

            buttons: [

                'copy', 'csv', 'excel', 'pdf', 'print'

            ]

        });
    </script>

    <!--Style Switcher -->

    <script src="<?php echo base_url() ?>assets/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>



    <!-- Validasi Only Number -->

    <script type="application/javascript">
        function isNumberKey(evt)

        {

            var charCode = (evt.which) ? evt.which : event.keyCode

            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;



            return true;

        }



        //   $('#pekerjaan').keyup(function(){

        //         this.value = this.value.toUpperCase();

        //   });



        //   $('#nama_lengkap').keyup(function(){

        //         this.value = this.value.toUpperCase();

        //   });



        //   $('#tempat_lahir').keyup(function(){

        //         this.value = this.value.toUpperCase();

        //   });



        //   $('#email').keyup(function(){

        //         this.value = this.value.toUpperCase();

        //   });



        //   $('#gol_darah').keyup(function(){

        //         this.value = this.value.toUpperCase();

        //   });
    </script>

    <!-- PLUGIN WYSI -->

    <script src="<?php echo base_url() ?>assets/plugins/components/html5-editor/wysihtml5-0.3.0.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/components/html5-editor/bootstrap-wysihtml5.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/components/dropzone-master/dist/dropzone.js"></script>

    <script>
        $(function() {

            $('.textarea_editor').wysihtml5();
            $(document).ready(function() {
                view();
            });

        });
    </script>

    <!-- PLUGIN WYSI END -->

    <!-- PLUGIN DROPIFY -->

    <?php

    if ($this->uri->segment(2) == 'form_add' || $this->uri->segment(2) == 'form_add_keluarga' || $this->uri->segment(2) == 'get_data_keluarga' || $this->uri->segment(2) == 'get_data') { ?>

        <!-- jQuery file upload -->

        <script src="<?= base_url() ?>assets/plugins/components/dropify/dist/js/dropify.min.js"></script>

        <script>
            $(function() {

                // Basic

                $('.dropify').dropify();

                // Translated

                $('.dropify-fr').dropify({

                    messages: {

                        default: 'Glissez-déposez un fichier ici ou cliquez',

                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',

                        remove: 'Supprimer',

                        error: 'Désolé, le fichier trop volumineux'

                    }

                });

                // Used events

                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element) {

                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");

                });

                drEvent.on('dropify.afterClear', function(event, element) {

                    alert('File deleted');

                });

                drEvent.on('dropify.errors', function(event, element) {

                    console.log('Has Errors');

                });

                var drDestroy = $('#input-file-to-destroy').dropify();

                drDestroy = drDestroy.data('dropify')

                $('#toggleDropify').on('click', function(e) {

                    e.preventDefault();

                    if (drDestroy.isDropified()) {

                        drDestroy.destroy();

                    } else {

                        drDestroy.init();

                    }

                })

            });
        </script>

    <?php

    }

    ?>

    <!-- PLUGIN DROPIFY END -->

    <?php
    if ($this->uri->segment(1) == 'Akun') { ?>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-2.2.3.min.js' ?>"></script>
        <script>
            var g = jQuery.noConflict();
            g('#password, #repassword').on('keyup', function() {
                if (g('#password').val() == g('#repassword').val()) {
                    g('#message').html('Matching').css('color', 'green');
                } else
                    g('#message').html('Not Matching').css('color', 'red');
            });
        </script>
    <?php
    }
    ?>

</body>



</html>