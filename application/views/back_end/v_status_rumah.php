<?php echo $this->session->flashdata('msg'); 
foreach ($data_user->result() as $row) {
    $status_rumah = $row->status_rumah;
}
?>

            

                <div class="row">

                    <!-- Left sidebar -->

                    <div class="col-md-6">

                        <div class="white-box">

                                <a href="<?php echo base_url() ?>Profil"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>

                            <div class="row">

                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Akun/edit_status_rumah" method="post" class="form-horizontal row-fluid">

                                        <div class="col-md-12 col-sm-12">

                                            <h4 class="text-center">Data Keadaan Rumah </h4>
                                                    <table class="table table-hover">

                                                        <tbody>

                                                            <tr>

                                                                <td>Status Rumah</td>

                                                                <th>

                                                                    <select class="form-control" id="status_rumah" name="status_rumah" readonly>

                                                                        <option value="ADA" <?php if($status_rumah == "ADA"){ echo"selected";} ?> >ADA</option>

                                                                        <option value="TIDAK ADA" <?php if($status_rumah == "TIDAK ADA"){ echo"selected";} ?> >TIDAK ADA</option>

                                                                    </select>     

                                                                </th>

                                                            </tr>
                                                            <tr>

                                                                <td>

                                                                    <div class="form-group">

                                                                        <a onClick="ubah()" id="btn_ubah" class="btn btn-warning"><i class="fa fa-pencil"></i> Ubah</a>

                                                                    </div>

                                                                </td>

                                                                <th>
                                                                    <div class="form-group">
                                                                        <button type="submit" id="btn_simpan" style="display: none" class="btn btn-info"><i class="fa fa-pencil"></i> Simpan</button>

                                                                        <a id="btn_batal" onClick="batal()" style="display: none;" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
                                                                    </div>
                                                                    
                                                                </th>

                                                            </tr>                                                  

                                                        </tbody>

                                                    </table>

                                        </div>

                                    </form>

                                </div>

                        </div>

                    </div>

                </div>

<script>
function ubah(){
    $('#btn_batal').show();
    $('#btn_simpan').show();
    $('#btn_ubah').hide();   
    $('#status_rumah').attr('readonly', false);
}    
function batal(){
    $('#btn_batal').hide();
    $('#btn_simpan').hide();
    $('#btn_ubah').show();
    $('#status_rumah').attr('readonly', true);
}  
</script>
