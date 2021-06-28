<?php echo $this->session->flashdata('msg'); ?>
<div class="row">
    <div class="col-sm-12">
        <div id="second-content">
        </div>
        <div class="white-box" id="primary-content">
            <h3 class="box-title m-b-0">Data Warga</h3>
            <br>
            <p style="text-align:right"><button class="btn btn-success waves-effect waves-light" onclick="form_add()"><i class="fa fa-plus m-l-5"></i> Warga</button></p>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped display">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Data Pemilik</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function view() {
        // let id_opd = $('#id_opd_filter').val();
        // let id_topik = $('#id_topik_filter').val();
        // let status = $('#status').val();
        $('#myTable').dataTable().fnDestroy();
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                "url": base_url + INI_DIA + '/get_datas',
                "type": "POST",
                data: {
                    // id_opd: id_opd,
                    // id_topik: id_topik,
                    // status: status,
                },
            }
        });
    }

    function batal() {
        $('#primary-content').show();
        $('#second-content').html('');
    }

    function form_add() {
        $('#primary-content').hide();
        $.get(base_url + INI_DIA + '/form_add', function(result) {
            $('#second-content').html(result);
        });
    }

    function form_edit(id) {
        $('#primary-content').hide();
        $.get(base_url + INI_DIA + '/get_data/' + id, function(result) {
            $('#second-content').html(result);
        });
    }
</script>