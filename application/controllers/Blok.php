<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blok extends CI_Controller
{

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'ms_blok';

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['data_blok'] = $this->DataHandle->getAllWhere($this->nama_tabel, '*', "status = '1'", "nama_blok ASC");
        $this->template->back_end('back_end/v_data_blok', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $nama_blok = $this->input->post('nama_blok');

        // DATA INPUT Blok
        $input_data = array(
            'nama_blok' => $nama_blok,
            'status' => 1,
            'created_by' => $id_user
        );

        $cek = $this->DataHandle->getAllWhere('ms_blok', 'id_blok', array('nama_blok' => $nama_blok, 'status' => 1))->num_rows();
        if ($cek > 0) :
            $this->session->set_flashdata('msg', '<script> swal("Maaf!", "Nama Blok sudah pernah ada ... ", "info"); </script>');

        else :
            $this->DataHandle->insert($this->nama_tabel, $input_data);
            $this->session->set_flashdata('msg', '<script> swal("Insert Success!", "Data Berhasil Ditambahkan ... ", "success"); </script>');

            // CATAT LOG
            $input_data = array(
                'id_user' => $id_user,
                'created_at' => date('Y-m-d h:i:s'),
                'log_kegiatan' => 'Menambah Data Blok'
            );
            $this->DataHandle->insert('log_kegiatan', $input_data);

        endif;
        redirect('Blok');
    }

    public function delete($id_blok)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
        );
        $where = array(
            'id_blok' => $id_blok
        );
        $this->DataHandle->edit($this->nama_tabel, $data, $where);
        $this->session->set_flashdata('msg', '<script> swal("Delete Success!", "Data Berhasil Dihapus ... ", "success"); </script>');
        // CATAT LOG
        $input_data = array(
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Menghapus Data Blok dengan ID ' . $id_blok . ''
        );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        redirect('Blok');
    }

    public function get_data($id_blok)
    {
        $where = array(
            'id_blok' => $id_blok
        );
        $data['data_blok'] = $this->DataHandle->getAllWhere($this->nama_tabel, '*', $where, 'id_blok ASC');
        $this->template->back_end('back_end/v_edit_blok', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_blok = $this->input->post('id_blok');
        $nama_blok = $this->input->post('nama_blok');

        $edit_data = array(
            'nama_blok' => $nama_blok,
            'updated_by' => $id_user
        );
        $where = array(
            'id_blok' => $id_blok
        );
        $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);
        $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ... ", "success"); </script>');

        // CATAT LOG
        $input_data = array(
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Merubah Nama Blok dengan ID ' . $id_blok . ', Menjadi ' . $nama_blok . ''
        );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        redirect('Blok');
    }
}
