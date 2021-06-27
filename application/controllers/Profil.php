<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    private $nama_tabel = 'tbl_warga';
    private $nama_tabel2 = 'ms_blok';
    private $nama_tabel3 = 'ms_no_rumah';
    private $nama_tabel4 = 'tr_rumah';

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        } else {
            $id_user = $this->session->userdata('id_user');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $id_warga = $this->session->userdata('id_warga');
        $data['data_pribadi'] = $this->DataHandle->other_query("SELECT tr_rumah.status_menempati, tr_rumah.status_rumah, tr_rumah.no_rumah, ms_blok.nama_blok, tbl_warga.id_warga, tbl_warga.nik, tbl_warga.nama_lengkap, tbl_warga.tempat_lahir, tbl_warga.tanggal_lahir, tbl_warga.kontak, tbl_warga.email, tbl_warga.jk, tbl_warga.gol_darah, tbl_warga.agama, tbl_warga.status_perkawinan, tbl_warga.pekerjaan, tbl_warga.`status`, tbl_warga.foto FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' AND tr_rumah.id_warga = '" . $id_warga . "' ORDER BY tr_rumah.id_warga DESC");
        $this->template->back_end('back_end/v_profil', $data);
    }

    public function get_data()
    {
        $id_warga = $_SESSION['id_warga'];
        $data['data_blok'] = $this->DataHandle->getAllWhere('ms_blok', '*', "status = '1'", "nama_blok ASC");
        $data['data_pribadi'] = $this->DataHandle->other_query("SELECT tr_rumah.status_menempati, tr_rumah.status_rumah, tr_rumah.no_rumah, ms_blok.nama_blok,ms_blok.id_blok, tbl_warga.id_warga, tbl_warga.nik, tbl_warga.nama_lengkap, tbl_warga.tempat_lahir, tbl_warga.tanggal_lahir, tbl_warga.kontak, tbl_warga.email, tbl_warga.jk, tbl_warga.gol_darah, tbl_warga.agama, tbl_warga.status_perkawinan, tbl_warga.pekerjaan, tbl_warga.`status`, tbl_warga.foto FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' AND tr_rumah.id_warga = '" . $id_warga . "' ORDER BY tr_rumah.id_warga DESC");
        $this->load->view('back_end/v_edit_profil', $data);
    }

    private function set_upload_options()
    {
        $config['upload_path'] = './assets/plugins/foto';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|JPG';
        $config['max_size'] = 0;
        $config['encrypt_name'] = TRUE;
        $config['overwrite']     = FALSE;

        return $config;
    }
    private function resize($nama_file_baru)
    {
        $this->load->library('image_lib');

        $conf['image_library'] = 'gd2';
        $conf['source_image'] = './assets/plugins/foto/' . $nama_file_baru;
        $conf['create_thumb'] = FALSE;
        $conf['maintain_ratio'] = TRUE;
        $conf['quality'] = '60%';
        $conf['width'] = 250;
        $conf['height'] = 340;
        $conf['new_image'] = './assets/plugins/foto/' . $nama_file_baru;

        $this->image_lib->clear();
        $this->image_lib->initialize($conf);
        $this->image_lib->resize();
    }


    public function update_profil()
    {
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $status_menempati = $this->input->post('status_menempati');
        $id_warga = $this->input->post('id_warga');
        $id_blok = $this->input->post('id_blok');
        $no_rumah = $this->input->post('no_rumah');
        $nama_lengkap = strtoupper($this->input->post('nama_lengkap'));
        $nik = $this->input->post('nik');
        $tempat_lahir = strtoupper($this->input->post('tempat_lahir'));
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jk = strtoupper($this->input->post('jk'));
        $gol_darah = $this->input->post('gol_darah');
        $agama = strtoupper($this->input->post('agama'));
        $status_perkawinan = strtoupper($this->input->post('status_perkawinan'));
        $pekerjaan = strtoupper($this->input->post('pekerjaan'));
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');


        $tersedia = $this->DataHandle->getAllWhere($this->nama_tabel4, '*', "status = '1' AND id_blok='" . $id_blok . "' AND no_rumah = '" . $no_rumah . "'", "id_rumah ASC")->row();
        // var_dump($tersedia->id_warga);die;

        if ($tersedia != NULL) {
            if ($tersedia->id_warga == $id_warga) {
                if ($_FILES['userfile']['name'] != NULL) {
                    $gambar_lama = $this->input->post('gambar_lama');
                    $dataInfo = array();
                    $files = $_FILES;
                    $_FILES['userfile']['name'] = $files['userfile']['name'];
                    $_FILES['userfile']['type'] = $files['userfile']['type'];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
                    $_FILES['userfile']['error'] = $files['userfile']['error'];
                    $_FILES['userfile']['size'] = $files['userfile']['size'];

                    $this->upload->initialize($this->set_upload_options());
                    if ($this->upload->do_upload()) {
                        $dataInfo = $this->upload->data();

                        if ($dataInfo['file_size'] > 1024) {
                            $this->resize($dataInfo['file_name']);
                        }

                        if ($dataInfo['image_width'] > 250) {
                            $this->resize($dataInfo['file_name']);
                        }
                        // DATA EDIT ARTIKEL
                        $edit_data = array(
                            'nik' => $nik,
                            'nama_lengkap' => $nama_lengkap,
                            'foto' => $dataInfo['file_name'],
                            'tempat_lahir' => $tempat_lahir,
                            'tanggal_lahir' => $tanggal_lahir,
                            'kontak' => $kontak,
                            'email' => $email,
                            'jk' => $jk,
                            'gol_darah' => $gol_darah,
                            'agama' => $agama,
                            'status_perkawinan' => $status_perkawinan,
                            'pekerjaan' => $pekerjaan,
                            'updated_by' => $id_user
                        );
                        $edit_data2 = array(
                            'id_blok' => $id_blok,
                            'no_rumah' => $no_rumah,
                            'status_menempati' => $status_menempati,
                            'updated_by' => $id_user
                        );
                        $where = array(
                            'id_warga' => $id_warga
                        );
                        $this->DataHandle->edit('tbl_warga', $edit_data, $where);
                        $this->DataHandle->edit('tr_rumah', $edit_data2, $where);

                        // HAPUS GAMBAR LAMA   
                        $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Perbaharui ... ", "success"); </script>');

                        // CATAT LOG
                        $input_data = array(
                            'id_user' => $id_user,
                            'created_at' => date('Y-m-d h:i:s'),
                            'log_kegiatan' => 'Mengubah Profil dan Upload Foto'
                        );
                        $this->DataHandle->insert('log_kegiatan', $input_data);

                        $message = "Profil berhasil diperbaharui..";
                        $result = [
                            'status' => true,
                            'msg' => $message,
                            'title' => "Sukses",
                            'tipe' => "success",
                        ];
                    } else {
                        $result = [
                            'status' => false,
                            'msg' => "Upload Gambar terjadi kesalahan, mohon cek ekstensi file pada gambar...",
                            'title' => "Maaf..",
                            'tipe' => "info",
                        ];
                    }
                }
                // KONDISI GAMBAR KOSONG
                else {
                    // DATA EDIT ARTIKEL
                    $edit_data = array(
                        'nik' => $nik,
                        'nama_lengkap' => $nama_lengkap,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'kontak' => $kontak,
                        'email' => $email,
                        'jk' => $jk,
                        'gol_darah' => $gol_darah,
                        'agama' => $agama,
                        'status_perkawinan' => $status_perkawinan,
                        'pekerjaan' => $pekerjaan,
                        'updated_by' => $id_user
                    );
                    $edit_data2 = array(
                        'id_blok' => $id_blok,
                        'no_rumah' => $no_rumah,
                        'status_menempati' => $status_menempati,
                        'updated_by' => $id_user
                    );
                    $where = array(
                        'id_warga' => $id_warga
                    );
                    $this->DataHandle->edit('tbl_warga', $edit_data, $where);
                    $this->DataHandle->edit('tr_rumah', $edit_data2, $where);

                    // CATAT LOG
                    $input_data = array(
                        'id_user' => $id_user,
                        'created_at' => date('Y-m-d h:i:s'),
                        'log_kegiatan' => 'Mengubah Profil dan Tanpa Upload Foto'
                    );
                    $this->DataHandle->insert('log_kegiatan', $input_data);


                    $message = "Profil berhasil diperbaharui..";
                    $result = [
                        'status' => true,
                        'msg' => $message,
                        'title' => "Sukses",
                        'tipe' => "success",
                    ];
                }
            } else {
                $data_session = array(
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'foto' => $dataInfo['file_name'],
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'kontak' => $kontak,
                    'email' => $email,
                    'jk' => $jk,
                    'gol_darah' => $gol_darah,
                    'agama' => $agama,
                    'status_perkawinan' => $status_perkawinan,
                    'pekerjaan' => $pekerjaan,
                    'id_blok' => $id_blok,
                    'no_rumah' => $no_rumah,
                    'status_menempati' => $status_menempati
                );

                $result = [
                    'status' => false,
                    'msg' => "Maaf, No Rumah sudah Terisi",
                    'title' => "Perhatian!",
                    'tipe' => "warning",
                ];
                echo json_encode($result);
                die;
            }
        } else { // KONDISI GAMBAR ADA
            if ($_FILES['userfile']['name'] != NULL) {
                $gambar_lama = $this->input->post('gambar_lama');
                $dataInfo = array();
                $files = $_FILES;
                $_FILES['userfile']['name'] = $files['userfile']['name'];
                $_FILES['userfile']['type'] = $files['userfile']['type'];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
                $_FILES['userfile']['error'] = $files['userfile']['error'];
                $_FILES['userfile']['size'] = $files['userfile']['size'];

                $this->upload->initialize($this->set_upload_options());
                if ($this->upload->do_upload()) {
                    $dataInfo = $this->upload->data();

                    if ($dataInfo['file_size'] > 1024) {
                        $this->resize($dataInfo['file_name']);
                    }

                    if ($dataInfo['image_width'] > 250) {
                        $this->resize($dataInfo['file_name']);
                    }
                    // DATA EDIT ARTIKEL
                    $edit_data = array(
                        'nik' => $nik,
                        'nama_lengkap' => $nama_lengkap,
                        'foto' => $dataInfo['file_name'],
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'kontak' => $kontak,
                        'email' => $email,
                        'jk' => $jk,
                        'gol_darah' => $gol_darah,
                        'agama' => $agama,
                        'status_perkawinan' => $status_perkawinan,
                        'pekerjaan' => $pekerjaan,
                        'updated_by' => $id_user
                    );
                    $edit_data2 = array(
                        'id_blok' => $id_blok,
                        'no_rumah' => $no_rumah,
                        'status_menempati' => $status_menempati,
                        'updated_by' => $id_user
                    );
                    $where = array(
                        'id_warga' => $id_warga
                    );
                    $this->DataHandle->edit('tbl_warga', $edit_data, $where);
                    $this->DataHandle->edit('tr_rumah', $edit_data2, $where);


                    // CATAT LOG
                    $input_data = array(
                        'id_user' => $id_user,
                        'created_at' => date('Y-m-d h:i:s'),
                        'log_kegiatan' => 'Mengubah Profil dan Upload Foto'
                    );
                    $this->DataHandle->insert('log_kegiatan', $input_data);

                    $message = "Profil berhasil diperbaharui..";
                    $result = [
                        'status' => true,
                        'msg' => $message,
                        'title' => "Sukses",
                        'tipe' => "success",
                    ];
                } else {

                    $result = [
                        'status' => false,
                        'msg' => "Upload Gambar terjadi kesalahan, mohon cek ekstensi file pada gambar...",
                        'title' => "Maaf..",
                        'tipe' => "info",
                    ];
                }
            }
            // KONDISI GAMBAR KOSONG
            else {
                // DATA EDIT ARTIKEL
                $edit_data = array(
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'kontak' => $kontak,
                    'email' => $email,
                    'jk' => $jk,
                    'gol_darah' => $gol_darah,
                    'agama' => $agama,
                    'status_perkawinan' => $status_perkawinan,
                    'pekerjaan' => $pekerjaan,
                    'updated_by' => $id_user
                );
                $edit_data2 = array(
                    'id_blok' => $id_blok,
                    'no_rumah' => $no_rumah,
                    'status_menempati' => $status_menempati,
                    'updated_by' => $id_user
                );
                $where = array(
                    'id_warga' => $id_warga
                );
                $this->DataHandle->edit('tbl_warga', $edit_data, $where);
                $this->DataHandle->edit('tr_rumah', $edit_data2, $where);

                // CATAT LOG
                $input_data = array(
                    'id_user' => $id_user,
                    'created_at' => date('Y-m-d h:i:s'),
                    'log_kegiatan' => 'Mengubah Profil dan Tanpa Upload Foto'
                );
                $this->DataHandle->insert('log_kegiatan', $input_data);

                $message = "Profil berhasil diperbaharui..";
                $result = [
                    'status' => true,
                    'msg' => $message,
                    'title' => "Sukses",
                    'tipe' => "success",
                ];
            }
        }
        echo json_encode($result);
    }
}
