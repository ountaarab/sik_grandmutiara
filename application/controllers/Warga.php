<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_warga';
    private $nama_tabel2 = 'ms_blok';
    private $nama_tabel3 = 'ms_no_rumah';
    private $nama_tabel4 = 'tr_rumah';
    private $pk = 'id_warga';

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }
    public function hapus_session()
    {
        $session_items = array('nik', 'nama_lengkap', 'foto', 'tempat_lahir', 'tanggal_lahir', 'kontak', 'email', 'jk', 'gol_darah', 'agama', 'status_perkawinan', 'pekerjaan', 'id_blok', 'no_rumah', 'status_menempati');
        $this->session->unset_userdata($session_items);
    }

    public function index()
    {
        $this->hapus_session();
        $data['data_warga'] = $this->DataHandle->other_query("SELECT tr_rumah.status_menempati, tr_rumah.status_rumah, tr_rumah.no_rumah, ms_blok.nama_blok, tbl_warga.id_warga, tbl_warga.nik, tbl_warga.nama_lengkap, tbl_warga.tempat_lahir, tbl_warga.tanggal_lahir, tbl_warga.kontak, tbl_warga.email, tbl_warga.jk, tbl_warga.gol_darah, tbl_warga.agama, tbl_warga.status_perkawinan, tbl_warga.pekerjaan, tbl_warga.`status`, tbl_warga.foto FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' ORDER BY tr_rumah.id_warga DESC");
        $this->template->back_end('back_end/v_data_warga', $data);
    }

    public function Data_warga()
    {
        $this->hapus_session();
        $data['data_warga'] = $this->DataHandle->other_query("SELECT tr_rumah.status_menempati, tr_rumah.status_rumah, tr_rumah.no_rumah, ms_blok.nama_blok, tbl_warga.id_warga, tbl_warga.nik, tbl_warga.nama_lengkap, tbl_warga.tempat_lahir, tbl_warga.tanggal_lahir, tbl_warga.kontak, tbl_warga.email, tbl_warga.jk, tbl_warga.gol_darah, tbl_warga.agama, tbl_warga.status_perkawinan, tbl_warga.pekerjaan, tbl_warga.`status`, tbl_warga.foto FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' ORDER BY tr_rumah.id_warga DESC");
        $this->template->back_end('back_end/v_data_wargartrw', $data);
    }

    public function keluarga($id_warga = null)
    {
        if ($id_warga) :
            $id_warga = de_crypt($id_warga);
            $data['data_pribadi'] = $this->DataHandle->other_query("SELECT tr_rumah.status_menempati, tr_rumah.status_rumah, tr_rumah.no_rumah, ms_blok.nama_blok, tbl_warga.id_warga, tbl_warga.nik, tbl_warga.nama_lengkap, tbl_warga.tempat_lahir, tbl_warga.tanggal_lahir, tbl_warga.kontak, tbl_warga.email, tbl_warga.jk, tbl_warga.gol_darah, tbl_warga.agama, tbl_warga.status_perkawinan, tbl_warga.pekerjaan, tbl_warga.`status`, tbl_warga.foto FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' AND tr_rumah.id_warga = '" . $id_warga . "' ORDER BY tr_rumah.id_warga DESC");
            $data['data_keluarga'] = $this->DataHandle->getAllWhere('tbl_keluarga', '*', "status = '1' AND id_warga='" . $id_warga . "'", "id_keluarga ASC");
            $data['id_warga'] = $id_warga;
            $this->template->back_end('back_end/v_data_keluarga', $data);
        else :
            redirect('Warga');
        endif;
    }

    public function data_keluarga($id_warga)
    {
        $data['data_pribadi'] = $this->DataHandle->other_query("SELECT tr_rumah.status_menempati, tr_rumah.status_rumah, tr_rumah.no_rumah, ms_blok.nama_blok, tbl_warga.id_warga, tbl_warga.nik, tbl_warga.nama_lengkap, tbl_warga.tempat_lahir, tbl_warga.tanggal_lahir, tbl_warga.kontak, tbl_warga.email, tbl_warga.jk, tbl_warga.gol_darah, tbl_warga.agama, tbl_warga.status_perkawinan, tbl_warga.pekerjaan, tbl_warga.`status`, tbl_warga.foto FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' AND tr_rumah.id_warga = '" . $id_warga . "' ORDER BY tr_rumah.id_warga DESC");
        $data['data_keluarga'] = $this->DataHandle->getAllWhere('tbl_keluarga', '*', "status = '1' AND id_warga='" . $id_warga . "'", "id_keluarga ASC");
        $data['id_warga'] = $id_warga;
        $this->template->back_end('back_end/v_data_keluarga_rtrw', $data);
    }

    public function form_add()
    {
        $data['data_blok'] = $this->DataHandle->getAllWhere($this->nama_tabel2, '*', "status = '1'", "nama_blok ASC");
        $this->load->view('back_end/v_add_warga', $data);
    }

    public function form_add_keluarga($id_warga = null)
    {
        if ($id_warga) :
            $data['id_warga'] = $id_warga;
            $this->template->back_end('back_end/v_add_keluarga', $data);
        else :
            redirect('Warga');
        endif;
    }



    public function add_keluarga()
    {
        $id_warga = de_crypt($this->input->post('id_warga'));
        if ($id_warga != null) :
            $this->load->library('upload'); //pemanggilan library upload
            $id_user = $this->session->userdata('id_user');
            $nama_lengkap = strtoupper($this->input->post('nama_lengkap'));
            $nik = $this->input->post('nik');
            $tempat_lahir = strtoupper($this->input->post('tempat_lahir'));
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jk = strtoupper($this->input->post('jk'));
            $gol_darah = strtoupper($this->input->post('gol_darah'));
            $agama = strtoupper($this->input->post('agama'));
            $status_hubungan = $this->input->post('status_hubungan');
            $status_perkawinan = strtoupper($this->input->post('status_perkawinan'));
            $pekerjaan = strtoupper($this->input->post('pekerjaan'));


            // KONDISI GAMBAR ADA
            if ($_FILES['userfile']['name'] != NULL) {
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
                    // DATA INPUT
                    $input_data = array(
                        'id_warga' => $id_warga,
                        'nik' => $nik,
                        'nama_lengkap' => $nama_lengkap,
                        'foto' => $dataInfo['file_name'],
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'jk' => $jk,
                        'gol_darah' => $gol_darah,
                        'agama' => $agama,
                        'status_hubungan' => $status_hubungan,
                        'status_perkawinan' => $status_perkawinan,
                        'pekerjaan' => $pekerjaan,
                        'status' => 1,
                        'created_by' => $id_user
                    );
                    $this->DataHandle->insert('tbl_keluarga', $input_data);

                    $this->session->set_flashdata('msg', '<script> swal("Insert Success!", "Keluarga atas nama ' . $nama_lengkap . ' berhasil disimpan", "success"); </script>');
                    redirect('Warga/keluarga/' . en_crypt($id_warga));
                } else {
                    $this->session->set_flashdata('msg', '<script> swal("Failed Upload!", "Gambar Bermasalah !!!!", "error"); </script>');

                    redirect('Warga/keluarga/' . en_crypt($id_warga));
                }
            }
            // KONDISI GAMBAR KOSONG
            else {
                // DATA INPUT
                $input_data = array(
                    'id_warga' => $id_warga,
                    'nik' => $nik,
                    'nama_lengkap' => $nama_lengkap,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jk' => $jk,
                    'gol_darah' => $gol_darah,
                    'agama' => $agama,
                    'status_hubungan' => $status_hubungan,
                    'status_perkawinan' => $status_perkawinan,
                    'pekerjaan' => $pekerjaan,
                    'status' => 1,
                    'created_by' => $id_user
                );
                $this->DataHandle->insert('tbl_keluarga', $input_data);

                $this->session->set_flashdata('msg', '<script> swal("Insert Success!", "Keluarga atas nama ' . $nama_lengkap . ' berhasil disimpan", "success"); </script>');
                redirect('Warga/keluarga/' . de_crypt($id_warga));
            }
        else :
            redirect('Warga');
        endif;
    }



    public function add()
    {
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $status_menempati = $this->input->post('status_menempati');
        $status_rumah = 'ADA';
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

        $tersedia = $this->DataHandle->getAllWhere($this->nama_tabel4, '*', "status = '1' AND id_blok='" . $id_blok . "' AND no_rumah = '" . $no_rumah . "'", "id_rumah ASC")->num_rows();

        if ($tersedia > 0) {
            $result = [
                'status' => false,
                'msg' => "Maaf, No Rumah sudah Terisi",
                'title' => "Perhatian!",
                'tipe' => "warning",
            ];
            echo json_encode($result);
            die;
        }
        // KONDISI GAMBAR ADA
        if ($_FILES['userfile']['name'] != NULL) {
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
                // DATA INPUT
                $input_data = array(
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
                    'status' => 1,
                    'created_by' => $id_user
                );
                $this->DataHandle->insert($this->nama_tabel, $input_data);
                $get_id_warga = $this->DataHandle->get_last_id();

                // DATA INPUT
                $input_data = array(
                    'id_blok' => $id_blok,
                    'no_rumah' => $no_rumah,
                    'id_warga' => $get_id_warga,
                    'status_menempati' => $status_menempati,
                    'status_rumah' => $status_rumah,
                    'status' => 1,
                    'created_by' => $id_user
                );
                $this->DataHandle->insert($this->nama_tabel4, $input_data);
                $message = "Warga atas nama " . $nama_lengkap . " berhasil disimpan";
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
            // DATA INPUT
            $input_data = array(
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'foto' => NULL,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'kontak' => $kontak,
                'email' => $email,
                'jk' => $jk,
                'gol_darah' => $gol_darah,
                'agama' => $agama,
                'status_perkawinan' => $status_perkawinan,
                'pekerjaan' => $pekerjaan,
                'status' => 1,
                'created_by' => $id_user
            );
            $this->DataHandle->insert($this->nama_tabel, $input_data);
            $get_id_warga = $this->DataHandle->get_last_id();

            // DATA INPUT
            $input_data = array(
                'id_blok' => $id_blok,
                'no_rumah' => $no_rumah,
                'id_warga' => $get_id_warga,
                'status_menempati' => $status_menempati,
                'status_rumah' => $status_rumah,
                'status' => 1,
                'created_by' => $id_user
            );
            $this->DataHandle->insert($this->nama_tabel4, $input_data);
            $result = [
                'status' => true,
                'msg' => "Warga atas nama " . $nama_lengkap . " berhasil disimpan",
                'title' => "Sukses",
                'tipe' => "success",
            ];
        }
        echo json_encode($result);
    }

    public function delete($id_warga = null)
    {
        if ($id_warga) :
            $id_warga = de_crypt($id_warga);

            $id_user = $this->session->userdata('id_user');
            $data = array(
                'status' => '0',
                'updated_by' => $id_user
            );
            $where = array(
                'id_warga' => $id_warga
            );
            $this->DataHandle->edit($this->nama_tabel, $data, $where);
            $this->DataHandle->edit($this->nama_tabel4, $data, $where);
            $this->session->set_flashdata('msg', '<script> swal("Delete Success!", "Data Berhasil Dihapus ...", "success"); </script>');

            redirect('Warga');
        else :
            $this->session->set_flashdata('msg', '<script> swal("Maaf", "Terjadi Kesalahan", "info"); </script>');
            redirect('Warga');

        endif;
    }

    public function delete_keluarga($id_keluarga, $id_warga)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
        );
        $where = array(
            'id_keluarga' => $id_keluarga
        );
        $this->DataHandle->edit('tbl_keluarga', $data, $where);

        $this->session->set_flashdata('msg', '<script> swal("Delete Success!", "Data Berhasil Dihapus ...", "success"); </script>');

        redirect('Warga/keluarga/' . en_crypt($id_warga));
    }

    public function get_data($id_warga)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        if ($id_warga) :
            $id_warga = de_crypt($id_warga);
            $data['data_blok'] = $this->DataHandle->getAllWhere($this->nama_tabel2, '*', "status = '1'", "nama_blok ASC");
            $data['data_pribadi'] = $this->DataHandle->other_query("SELECT tr_rumah.status_menempati, tr_rumah.status_rumah, tr_rumah.no_rumah, ms_blok.nama_blok,ms_blok.id_blok, tbl_warga.id_warga, tbl_warga.nik, tbl_warga.nama_lengkap, tbl_warga.tempat_lahir, tbl_warga.tanggal_lahir, tbl_warga.kontak, tbl_warga.email, tbl_warga.jk, tbl_warga.gol_darah, tbl_warga.agama, tbl_warga.status_perkawinan, tbl_warga.pekerjaan, tbl_warga.`status`, tbl_warga.foto FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' AND tr_rumah.id_warga = '" . $id_warga . "' ORDER BY tr_rumah.id_warga DESC");
            $this->load->view('back_end/v_edit_warga', $data);
        endif;
    }

    public function get_data_keluarga($id_keluarga, $id_warga)
    {
        $data['data_keluarga'] = $this->DataHandle->getAllWhere('tbl_keluarga', '*', "status = '1' AND id_warga='" . $id_warga . "' AND id_keluarga='" . $id_keluarga . "'", "id_keluarga ASC");
        $this->template->back_end('back_end/v_edit_keluarga', $data);
    }

    public function edit()
    {
        $id_warga = $this->input->post('id_warga');
        $id_warga = de_crypt($id_warga);
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $status_menempati = $this->input->post('status_menempati');
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


        $tersedia = $this->DataHandle->getAllWhere($this->nama_tabel4, '*', "status = '1'AND id_warga != '" . $id_warga . "' AND id_blok='" . $id_blok . "' AND no_rumah = '" . $no_rumah . "'", "id_rumah ASC")->num_rows();
        // var_dump($tersedia->id_warga);die;

        if ($tersedia > 0) {
            $result = [
                'status' => false,
                'msg' => "Maaf, No Rumah sudah Terisi",
                'title' => "Perhatian!",
                'tipe' => "warning",
            ];
            echo json_encode($result);
            die;
        }

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
            // 'status_rumah' => $status_rumah,
            'updated_by' => $id_user
        );
        $where = array(
            'id_warga' => $id_warga
        );

        if ($_FILES['userfile']['name'] != NULL) {
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

                $edit_data['foto'] = $dataInfo['file_name'];
            } else {
                $result = [
                    'status' => false,
                    'msg' => "Upload Gambar terjadi kesalahan, mohon cek ekstensi file pada gambar...",
                    'title' => "Maaf..",
                    'tipe' => "info",
                ];
                echo json_encode($result);
                die;
            }
        } else {
            // $edit_data['foto'] = null;
        }
        $this->DataHandle->edit('tbl_warga', $edit_data, $where);
        $this->DataHandle->edit('tr_rumah', $edit_data2, $where);
        $result = [
            'status' => true,
            'msg' => "Warga atas nama " . $nama_lengkap . " berhasil diubah",
            'title' => "Sukses",
            'tipe' => "success",
        ];
        echo json_encode($result);
    }

    public function edit_keluarga()
    {
        $this->load->library('upload'); //pemanggilan library upload
        $id_user = $this->session->userdata('id_user');
        $id_warga = $this->input->post('id_warga');
        $id_keluarga = $this->input->post('id_keluarga');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $nik = $this->input->post('nik');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jk = $this->input->post('jk');
        $gol_darah = $this->input->post('gol_darah');
        $agama = $this->input->post('agama');
        $status_perkawinan = $this->input->post('status_perkawinan');
        $status_hubungan = $this->input->post('status_hubungan');
        $pekerjaan = $this->input->post('pekerjaan');

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
                    'jk' => $jk,
                    'gol_darah' => $gol_darah,
                    'agama' => $agama,
                    'status_perkawinan' => $status_perkawinan,
                    'status_hubungan' => $status_hubungan,
                    'pekerjaan' => $pekerjaan,
                    'updated_by' => $id_user
                );
                $where = array(
                    'id_keluarga' => $id_keluarga
                );
                $this->DataHandle->edit('tbl_keluarga', $edit_data, $where);

                // HAPUS GAMBAR LAMA   
                $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ...", "success"); </script>');
                redirect('Warga/keluarga/' . en_crypt($id_warga));
            } else {
                $this->session->set_flashdata('msg', '<script> swal("Failed Upload!", "Gambar Bermasalah !!!!", "error"); </script>');


                redirect('Warga/keluarga/' . en_crypt($id_warga));
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
                'jk' => $jk,
                'gol_darah' => $gol_darah,
                'agama' => $agama,
                'status_perkawinan' => $status_perkawinan,
                'status_hubungan' => $status_hubungan,
                'pekerjaan' => $pekerjaan,
                'updated_by' => $id_user
            );
            $where = array(
                'id_keluarga' => $id_keluarga
            );
            $this->DataHandle->edit('tbl_keluarga', $edit_data, $where);

            $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ...", "success"); </script>');
            redirect('Warga/keluarga/' . en_crypt($id_warga));
        }
    }

    private function set_upload_options()
    {
        $config['upload_path'] = './assets/plugins/foto';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
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
}
