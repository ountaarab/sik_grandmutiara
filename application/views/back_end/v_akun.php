<?php echo $this->session->flashdata('msg'); 
foreach ($data_user->result() as $row) {
    $id_warga = $row->id_warga;
    $id_user = $row->id_user;
    $username = $row->username;
}
?>

            

                <div class="row">

                    <!-- Left sidebar -->

                    <div class="col-md-6">

                        <div class="white-box">

                                <a href="<?php echo base_url() ?>Profil"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>

                            <div class="row">

                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Akun/edit" method="post" class="form-horizontal row-fluid">

                                        <div class="col-md-12 col-sm-12">

                                            <h4 class="text-center">Data Akun </h4>
                                                    <table class="table table-hover">

                                                        <tbody>

                                                            <tr>

                                                                <td>Nama Lengkap</td>

                                                                <th>

                                                                    <input type="hidden" name="id_warga" value="<?= $id_warga ?>">
                                                                    <input type="hidden" name="id_user" value="<?= $id_user ?>">

                                                                    <input readonly type="text" value="<?= $username ?>" id="username" required name="username" placeholder="" class="form-control">

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Password</td>

                                                                <th>

                                                                    <input readonly type="password" value="" id="password" name="password" placeholder="" class="form-control"><span><small style="font-size: 10px">Kosongkan Password bila tidak mengubah Password.</small></span>

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Ulangi Password</td>

                                                                <th>

                                                                    <input readonly type="password" value="" id="repassword" name="repassword" placeholder="" class="form-control">
                                                                    <span><small style="font-size: 10px">Kosongkan Password bila tidak mengubah Password.</small></span>

                                                                </th>

                                                            </tr>
                                                            <tr>

                                                                <td>

                                                                    <div class="form-group">

                                                                        <span  style="font-size: 10px" id='message'></span>
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
    $('#username').attr('readonly', false);
    $('#password').attr('readonly', false);
    $('#repassword').attr('readonly', false);
}    
function batal(){
    $('#btn_batal').hide();
    $('#btn_simpan').hide();
    $('#btn_ubah').show();
    $('#username').attr('readonly', true);
    $('#password').attr('readonly', true);
    $('#repassword').attr('readonly', true);
}  
</script>
