<?php echo $this->session->flashdata('msg'); 
foreach ($data_keluarga->result() as $row) {
    $id_keluarga = $row->id_keluarga;
    $id_warga = $row->id_warga;
    $status_hubungan = $row->status_hubungan;
    $nama_lengkap = $row->nama_lengkap;
    $nik = $row->nik;
    $tempat_lahir = $row->tempat_lahir;
    $tanggal_lahir = $row->tanggal_lahir;
    $jk = $row->jk;
    $gol_darah = $row->gol_darah;
    $agama = $row->agama;
    $status_perkawinan = $row->status_perkawinan;
    $pekerjaan = $row->pekerjaan;
    $foto = $row->foto;
}

if ($foto == NULL) {
    $gambar = NULL;
}
else{
    $gambar = "data-default-file='".base_url()."assets/plugins/foto/".$foto."'";  
}
?>

            
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-md-12">
                        <div class="white-box">
                                <a href="<?php echo base_url() ?>Warga"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
                            <div class="row">
                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Warga/edit_keluarga" method="post" class="form-horizontal row-fluid">
                                        <div class="col-md-4 col-sm-6">
                                            <h4 class="text-center">Edit Data </h4>
                                            <div class="white-box text-center">
                                                <center>
                                                <input name="userfile" id="input-file-now" class="dropify" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"/ <?= $gambar ?> > 
                                                <h5>Foto</h5>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-6">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td>Nama Lengkap</td>
                                                                <th>
                                                                    <input type="hidden" name="id_warga" value="<?= $id_warga ?>">
                                                                    <input type="hidden" name="id_keluarga" value="<?= $id_keluarga ?>">
                                                                    <input type="text" value="<?php echo isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : $nama_lengkap ?>" id="nama_lengkap" required name="nama_lengkap" placeholder="Nama Lengkap..." class="form-control">
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>NIK</td>
                                                                <th>
                                            <input type="number" maxlength="16"value="<?php echo isset($_SESSION['nik']) ? $_SESSION['nik'] : $nik ?>" required placeholder="NIK..." onkeypress='return isNumberKey(event)' name="nik" class="form-control" >
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>Tempat Lahir</td>
                                                                <th> 
                                            <input type="text" maxlength="20" id="tempat_lahir" value="<?php echo isset($_SESSION['tempat_lahir']) ? $_SESSION['tempat_lahir'] : $tempat_lahir ?>" placeholder="Tempat Lahir..." name="tempat_lahir" class="form-control" >
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Lahir</td>
                                                                <th> 
                                            <input type="date"  name="tanggal_lahir" value="<?php echo isset($_SESSION['tanggal_lahir']) ? $_SESSION['tanggal_lahir'] : $tanggal_lahir ?>" class="form-control" >
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Kelamin</td>
                                                                <th>
                                                                    <select class="form-control" name="jk">
                                                                        <option value="L" <?php if($jk == 'L'){echo" selected";} ?> >LAKI-LAKI</option>
                                                                        <option value="P" <?php if($jk == 'P'){echo" selected";} ?> >PEREMPUAN</option>
                                                                    </select>    
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>Golongan Darah</td>
                                                                <th>
                                            <input type="text" maxlength="20" value="<?php echo isset($_SESSION['gol_darah']) ? $_SESSION['gol_darah'] : $gol_darah ?>" id="gol_darah" placeholder="Golongan Darah..." name="gol_darah" class="form-control" >    
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>Agama</td>
                                                                <th>
                                                                    <select class="form-control" name="agama">
                                                                        <option value="ISLAM" <?php if($agama == 'ISLAM'){echo" selected";} ?> >ISLAM</option>
                                                                        <option value="KRISTEN" <?php if($agama == 'KRISTEN'){echo" selected";} ?> >KRISTEN</option>
                                                                        <option value="PROTESTAN" <?php if($agama == 'PROTESTAN'){echo" selected";} ?> >PROTESTAN</option>
                                                                        <option value="HINDU" <?php if($agama == 'HINDU'){echo" selected";} ?> >HINDU</option>
                                                                        <option value="BUDHA" <?php if($agama == 'BUDHA'){echo" selected";} ?> >BUDHA</option>
                                                                    </select>  
                                                                </th>
                                                            </tr> 
                                                            <?php 
                                                                $bk = '';
                                                                $ka = '';
                                                                $ch = '';
                                                                $cm = '';
                                                                if($status_perkawinan == 'BELUM KAWIN')
                                                                {
                                                                    $bk = " selected";
                                                                } 

                                                                if($status_perkawinan == 'KAWIN')
                                                                {
                                                                    $ka = " selected";
                                                                } 
                                                                
                                                                if($status_perkawinan == 'CERAI HIDUP')
                                                                {
                                                                    $ch = " selected";
                                                                } 
                                                                
                                                                if($status_perkawinan == 'CERAI MATI')
                                                                {
                                                                    $ch = " selected";
                                                                } 
                                                            ?>
                                                            <tr>
                                                                <td>Status Perkawinan</td>
                                                                <th>
                                                                    <select class="form-control" name="status_perkawinan">
                                                                        <option value="BELUM KAWIN" <?= $bk ?>>BELUM KAWIN</option>
                                                                        <option value="KAWIN" <?= $ka ?> >KAWIN</option>
                                                                        <option value="CERAI HIDUP" <?= $ch ?> >CERAI HIDUP</option>
                                                                        <option value="CERAI MATI" <?= $cm ?> >CERAI MATI</option>
                                                                    </select> 
                                                                </th>
                                                            </tr>
                                                            <?php 
                                                                $ist = '';
                                                                $anak = '';
                                                                $ibu = '';
                                                                $bapa = '';
                                                                $kaka = '';
                                                                $adik = '';
                                                                $kelu = '';
                                                                if($status_hubungan == 'ISTRI')
                                                                {
                                                                    $ist = ' selected';
                                                                } 
                                                                if($status_hubungan == 'ANAK')
                                                                {
                                                                    $anak = ' selected';
                                                                } 
                                                                if($status_hubungan == 'IBU KANDUNG')
                                                                {
                                                                    $ibu = ' selected';
                                                                } 
                                                                if($status_hubungan == 'BAPAK KANDUNG')
                                                                {
                                                                    $bapa = ' selected';
                                                                } 
                                                                if($status_hubungan == 'KAKAK KANDUNG')
                                                                {
                                                                    $kaka = ' selected';
                                                                } 
                                                                if($status_hubungan == 'ADIK KANDUNG')
                                                                {
                                                                    $adik = ' selected';
                                                                } 
                                                                if($status_hubungan == 'KELUARGA LAINNYA')
                                                                {
                                                                    $kelu = ' selected';
                                                                } 
                                                            ?> 
                                                            <tr>
                                                                <td>Hubungan dengan Pemilik</td>
                                                                <th>
                                                                    <select class="form-control" name="status_hubungan">
                                                                        <option value="ISTRI" <?= $ist ?> >ISTRI</option>
                                                                        <option value="ANAK" <?= $anak ?> >ANAK</option>
                                                                        <option value="IBU KANDUNG" <?= $ibu ?> >IBU KANDUNG</option>
                                                                        <option value="BAPAK KANDUNG" <?= $bapa ?> >BAPAK KANDUNG</option>
                                                                        <option value="KAKAK KANDUNG" <?= $kaka ?> >KAKAK KANDUNG</option>
                                                                        <option value="ADIK KANDUNG" <?= $adik ?> >ADIK KANDUNG</option>
                                                                        <option value="KELUARGA LAINNYA" <?= $kelu ?> >KELUARGA LAINNYA</option>
                                                                    </select> 
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>Pekerjaan</td>
                                                                <th>
                                                                    <input type="text" value="<?php echo isset($_SESSION['pekerjaan']) ? $_SESSION['pekerjaan'] : $pekerjaan ?>" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan..." class="form-control">    
                                                                </th>
                                                            </tr>    
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Edit</button>
                                                                    </div>
                                                                </td>
                                                                <th></th>
                                                            </tr>                                                  
                                                        </tbody>
                                                    </table>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>


