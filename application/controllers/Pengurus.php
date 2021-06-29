<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{

    private $role_user, $id_sekolah, $kondisi;
    private $pengurus = 'tbl_pengurus as p';
    private $warga = 'tbl_warga as w';
    private $rumah = 'tr_rumah as r';
    private $blok = 'ms_blok as b';

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['data_pengurus'] = $this->DataHandle->get_four_o($this->pengurus, $this->warga, $this->rumah, $this->blok, 'p.id_pengurus, w.nama_lengkap, w.id_warga, p.jabatan, b.nama_blok, r.no_rumah', 'w.id_warga = p.id_warga', 'w.id_warga = r.id_warga', 'b.id_blok = r.id_blok', "p.status = '1' AND w.status = '1'", "p.id_pengurus DESC");

        $data['warga_bukan_pengurus'] = $this->DataHandle->other_query("SELECT w.id_warga, w.nama_lengkap, b.nama_blok, r.no_rumah FROM tbl_warga as w JOIN tr_rumah as r on w.id_warga = r.id_warga JOIN ms_blok as b ON b.id_blok = r.id_blok  WHERE w.status = 1 AND w.id_warga NOT IN (SELECT id_warga FROM tbl_pengurus where status = 1)");
        // hitung ketua RT
        $hitung_ketuart = $this->DataHandle->getAllWhere($this->pengurus, '*', "p.jabatan = 'Ketua RT' and p.status = 1", 'p.id_pengurus ASC')->result_array();
        $data['hitung_ketuart'] = count($hitung_ketuart);

        // hitung ketua RW
        $hitung_ketuarw = $this->DataHandle->getAllWhere($this->pengurus, '*', "p.jabatan = 'Ketua RW' and p.status = 1", 'p.id_pengurus ASC')->result_array();
        $data['hitung_ketuarw'] = count($hitung_ketuarw);

        // hitung Sekretaris
        $hitung_sekretaris = $this->DataHandle->getAllWhere($this->pengurus, '*', "p.jabatan = 'Sekretaris' and p.status = 1", 'p.id_pengurus ASC')->result_array();
        $data['hitung_sekretaris'] = count($hitung_sekretaris);

        // hitung Ketua Forum
        $hitung_ketuaforum = $this->DataHandle->getAllWhere($this->pengurus, '*', "p.jabatan = 'Ketua Forum' and p.status = 1", 'p.id_pengurus ASC')->result_array();
        $data['hitung_ketuaforum'] = count($hitung_ketuaforum);

        // hitung Bendahara
        $hitung_bendahara = $this->DataHandle->getAllWhere($this->pengurus, '*', "p.jabatan = 'Bendahara' and p.status = 1", 'p.id_pengurus ASC')->result_array();
        $data['hitung_bendahara'] = count($hitung_bendahara);

        // hitung Keamanan
        $hitung_keamanan = $this->DataHandle->getAllWhere($this->pengurus, '*', "p.jabatan = 'Keamanan' and p.status = 1", 'p.id_pengurus ASC')->result_array();
        $data['hitung_keamanan'] = count($hitung_keamanan);

        // hitung Humas
        $hitung_humas = $this->DataHandle->getAllWhere($this->pengurus, '*', "p.jabatan = 'Humas' and p.status = 1", 'p.id_pengurus ASC')->result_array();
        $data['hitung_humas'] = count($hitung_humas);
        $this->template->back_end('back_end/v_data_pengurus', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $id_warga = $this->input->post('id_warga');
        $jabatan = $this->input->post('jabatan');

        // DATA INPUT Blok
        $input_data = array(
            'id_warga' => $id_warga,
            'jabatan' => $jabatan,
            'status' => 1,
            'created_by' => $id_user
        );
        $this->DataHandle->insert('tbl_pengurus', $input_data);
        // CATAT LOG
        $input_data = array(
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Menambah Pengurus dengan ID Warga ' . $id_warga . '  Jabatan ' . $jabatan . ''
        );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        $this->session->set_flashdata('msg', '<script> swal("Insert Success!", "Data Berhasil Disimpan ... ", "success"); </script>');

        redirect('Pengurus');
    }

    public function delete($id_pengurus)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
        );
        $where = array(
            'id_pengurus' => $id_pengurus
        );
        $this->DataHandle->edit('tbl_pengurus', $data, $where);
        // CATAT LOG
        $input_data = array(
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Menghapus Pengurus dengan ID Pengurus ' . $id_pengurus . ''
        );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        $this->session->set_flashdata('msg', '<script> swal("Delete Success!", "Data Berhasil Dihapus ... ", "success"); </script>');

        redirect('Pengurus');
    }

    public function get_data($id_pengurus)
    {
        $where = array(
            'id_pengurus' => $id_pengurus
        );

        $data['data_pengurus'] = $this->DataHandle->get_four_o($this->pengurus, $this->warga, $this->rumah, $this->blok, 'p.id_pengurus, w.nama_lengkap, p.jabatan, b.nama_blok, r.no_rumah', 'w.id_warga = p.id_warga', 'w.id_warga = r.id_warga', 'b.id_blok = r.id_blok', "p.status = '1' AND w.status = '1' AND p.id_pengurus='" . $id_pengurus . "'", "p.id_pengurus DESC");
        $data['warga_bukan_pengurus'] = $this->DataHandle->other_query("SELECT w.id_warga, w.nama_lengkap, b.nama_blok, r.no_rumah FROM tbl_warga as w JOIN tr_rumah as r on w.id_warga = r.id_warga JOIN ms_blok as b ON b.id_blok = r.id_blok  WHERE w.id_warga NOT IN (SELECT id_warga FROM tbl_pengurus where status = 1)");
        $this->template->back_end('back_end/v_edit_pengurus', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_pengurus = $this->input->post('id_pengurus');
        $id_warga = $this->input->post('id_warga');
        $jabatan = $this->input->post('jabatan');

        $edit_data = array(
            'id_warga' => $id_warga,
            'jabatan' => $jabatan,
            'updated_by' => $id_user
        );
        $where = array(
            'id_pengurus' => $id_pengurus
        );
        $this->DataHandle->edit('tbl_pengurus', $edit_data, $where);
        // CATAT LOG
        $input_data = array(
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Merubah Pengurus dengan ID Pengurus ' . $id_pengurus . ' dengan jabatan ' . $jabatan . ''
        );

        $this->DataHandle->insert('log_kegiatan', $input_data);

        $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ... ", "success"); </script>');

        redirect('Pengurus');
    }
}
