<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {

    private $ms_iuran = 'ms_iuran';

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }

	public function index()
	{
        $data['data_iuran'] = $this->DataHandle->getAllWhere($this->ms_iuran, '*', "status = '1'", "keterangan ASC");		
        $this->template->back_end('back_end/v_data_iuran', $data);
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
        $this->DataHandle->insert($this->nama_tabel, $input_data);
            $this->session->set_flashdata('msg', '<script> swal("Insert Success!", "Data Berhasil Ditambahkan ... ", "success"); </script>');  

        // CATAT LOG
        $input_data = array(            
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Menambah Data Blok'
         );
        $this->DataHandle->insert('log_kegiatan', $input_data);

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
            'log_kegiatan' => 'Menghapus Data Blok dengan ID '.$id_blok.''
         );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        redirect('Blok');     
    }

    public function get_data($id_blok){
        $where = array(
            'id_blok' => $id_blok
         );
        $data['data_blok'] = $this->DataHandle->getAllWhere($this->nama_tabel, '*', $where, 'id_blok ASC');
        $this->template->back_end('back_end/v_edit_blok', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_iuran = $this->input->post('id_iuran');        
        $keterangan = $this->input->post('keterangan');        
        $nominal = $this->input->post('nominal');        

        $edit_data = array(
            'keterangan' => $keterangan,
            'nominal' => $nominal,
            'updated_by' => $id_user
         );
        $where = array(
            'id_iuran' => $id_iuran
         );
        $this->DataHandle->edit($this->ms_iuran, $edit_data, $where);
        $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ... ", "success"); </script>'); 

        // CATAT LOG
        $input_data = array(            
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Merubah Besaran Iuran dengan ID ('.$id_iuran.'), Menjadi '.$nominal.''
         );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        redirect('Iuran');
    }
}
