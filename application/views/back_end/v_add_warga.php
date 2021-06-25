<?php echo $this->session->flashdata('msg'); ?>

            

                <div class="row">

                    <!-- Left sidebar -->

                    <div class="col-md-12">

                        <div class="white-box">

                                <a href="<?php echo base_url() ?>Warga"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>

                            <div class="row">

                                    <form enctype="multipart/form-data" action="<?php echo base_url() ?>Warga/add" method="post" class="form-horizontal row-fluid">

                                        <div class="col-md-4 col-sm-6">

                                            <h4 class="text-center">Data Warga </h4>

                                            <div class="white-box text-center">

                                                <center>

                                                <input name="userfile" id="input-file-now" class="dropify" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"/> 

                                                <h5>Foto</h5>

                                                </center>

                                            </div>



                                                    <table class="table table-hover">

                                                        <tbody>

                                                            <tr>

                                                                <td>Nama Lengkap</td>

                                                                <th>

                                                                    <input type="text" value="<?php echo isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : '' ?>" id="nama_lengkap" required name="nama_lengkap" placeholder="Nama Lengkap..." class="form-control">

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Status Menempati</td>

                                                                <th>

                                                                    <select class="form-control" name="status_menempati">

                                                                        <option value="HAK MILIK">HAK MILIK</option>

                                                                        <option value="KONTRAK">KONTRAK</option>

                                                                    </select>

                                                                </th>

                                                            </tr>

                                                            <!-- <tr>

                                                                <td>Status Rumah</td>

                                                                <th>

                                                                    <select class="form-control" name="status_rumah">

                                                                        <option value="ADA">ADA</option>

                                                                        <option value="TIDAK ADA">TIDAK ADA</option>

                                                                    </select>     

                                                                </th>

                                                            </tr> -->

                                                            <tr>

                                                                <td>Blok</td>

                                                                <th>

                                                                    <select class="form-control" name="id_blok">

                                                                    <?php

                                                                    foreach ($data_blok->result() as $row) : ?>

                                                                        <option value="<?= $row->id_blok ?>"><?= $row->nama_blok ?></option>                

                                                                    <?php

                                                                    endforeach;

                                                                    ?>

                                                                    </select>    

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>No Rumah</td>

                                                                <th>

                                                                    <select class="form-control" required name="no_rumah">

                                                                        <option value="">-PILIH-</option>

                                                                        <option value="1">1</option>

                                                                        <option value="2">2</option>

                                                                        <option value="3">3</option>

                                                                        <option value="4">4</option>

                                                                        <option value="5">5</option>

                                                                        <option value="6">6</option>

                                                                        <option value="7">7</option>

                                                                        <option value="8">8</option>

                                                                        <option value="9">9</option>

                                                                        <option value="10">10</option>

                                                                        <option value="11">11</option>

                                                                        <option value="12">12</option>

                                                                        <option value="12A">12A</option>

                                                                        <option value="13">13</option>

                                                                        <option value="14">14</option>

                                                                        <option value="15">15</option>

                                                                        <option value="16">16</option>

                                                                        <option value="17">17</option>

                                                                        <option value="18">18</option>

                                                                        <option value="19">19</option>

                                                                        <option value="20">20</option>

                                                                        <option value="21">21</option>

                                                                        <option value="22">22</option>

                                                                        <option value="23">23</option>

                                                                        <option value="24">24</option>

                                                                        <option value="25">25</option>

                                                                        <option value="26">26</option>

                                                                    </select> 

                                                                </th>

                                                            </tr>

                                                        </tbody>

                                                    </table>

                                        </div>

                                        <div class="col-md-8 col-sm-6">

                                                    <table class="table table-hover">

                                                        <tbody>

                                                            <tr>

                                                                <td>NIK</td>

                                                                <th>

                                            <input type="number" maxlength="16"value="<?php echo isset($_SESSION['nik']) ? $_SESSION['nik'] : '' ?>" required placeholder="NIK..." onkeypress='return isNumberKey(event)' name="nik" class="form-control" >

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Tempat Lahir</td>

                                                                <th> 

                                            <input type="text" maxlength="20" id="tempat_lahir" value="<?php echo isset($_SESSION['tempat_lahir']) ? $_SESSION['tempat_lahir'] : '' ?>" placeholder="Tempat Lahir..." name="tempat_lahir" class="form-control" >

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Tanggal Lahir</td>

                                                                <th> 

                                            <input type="date"  name="tanggal_lahir" value="<?php echo isset($_SESSION['tanggal_lahir']) ? $_SESSION['tanggal_lahir'] : '' ?>" class="form-control" >

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Jenis Kelamin</td>

                                                                <th>

                                                                    <select class="form-control" name="jk">

                                                                        <option value="L">LAKI-LAKI</option>

                                                                        <option value="P">PEREMPUAN</option>

                                                                    </select>    

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Golongan Darah</td>

                                                                <th>

                                            <input type="text" maxlength="20" value="<?php echo isset($_SESSION['gol_darah']) ? $_SESSION['gol_darah'] : '' ?>" id="gol_darah" placeholder="Golongan Darah..." name="gol_darah" class="form-control" >    

                                                                </th>

                                                            </tr>

                                                            <tr>

                                                                <td>Agama</td>

                                                                <th>

                                                                    <select class="form-control" name="agama">

                                                                        <option value="ISLAM">ISLAM</option>

                                                                        <option value="KRISTEN">KRISTEN</option>

                                                                        <option value="PROTESTAN">PROTESTAN</option>

                                                                        <option value="HINDU">HINDU</option>

                                                                        <option value="BUDHA">BUDHA</option>

                                                                    </select>  

                                                                </th>

                                                            </tr> 

                                                            <tr>

                                                                <td>Status Perkawinan</td>

                                                                <th>

                                                                    <select class="form-control" name="status_perkawinan">

                                                                        <option value="BELUM KAWIN">BELUM KAWIN</option>

                                                                        <option value="KAWIN">KAWIN</option>

                                                                        <option value="CERAI HIDUP">CERAI HIDUP</option>

                                                                        <option value="CERAI MATI">CERAI MATI</option>

                                                                    </select> 

                                                                </th>

                                                            </tr> 

                                                            <tr>

                                                                <td>Pekerjaan</td>

                                                                <th>

                                                                    <input type="text" value="<?php echo isset($_SESSION['pekerjaan']) ? $_SESSION['pekerjaan'] : '' ?>" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan..." class="form-control">    

                                                                </th>

                                                            </tr>  

                                                            <tr>

                                                                <td>Kontak</td>

                                                                <th>

                                            <input type="number" maxlength="13" value="<?php echo isset($_SESSION['kontak']) ? $_SESSION['kontak'] : '' ?>" placeholder="No. Handphone..." onkeypress='return isNumberKey(event)' name="kontak" class="form-control" >

                                                                </th>

                                                            </tr>   

                                                            <tr>

                                                                <td>Email</td>

                                                                <th>

                                            <input type="text" placeholder="E-mail" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>"  name="email" class="form-control" >

                                                                </th>

                                                            </tr>   

                                                            <tr>

                                                                <td>

                                                                    <div class="form-group">

                                                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan</button>

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





