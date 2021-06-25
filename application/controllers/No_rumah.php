<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class No_rumah extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'ms_no_rumah';

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }

	public function index()
	{
        $data['data_blok'] = $this->DataHandle->getAllWhere('ms_blok', '*', "status = '1'", "nama_blok ASC");
        $data['data_no_rumah'] = $this->DataHandle->other_query("SELECT ms_no_rumah.id_no_rumah, ms_blok.nama_blok, ms_no_rumah.no_rumah, ms_no_rumah.created_at, ms_no_rumah.updated_at, ms_no_rumah.created_by, ms_no_rumah.updated_by, ms_no_rumah.`status` FROM ms_no_rumah INNER JOIN ms_blok ON ms_no_rumah.id_blok = ms_blok.id_blok WHERE ms_no_rumah.`status` = 1");		
        $this->template->back_end('back_end/v_data_no_rumah', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $id_blok = $this->input->post('id_blok');
        $no_rumah = $this->input->post('no_rumah');

        $hasil = $this->DataHandle->getAllWhere($this->nama_tabel, '*', "no_rumah LIKE '%".$no_rumah."%' AND id_blok = '".$id_blok."'", "no_rumah ASC")->row();
        if ($hasil != NULL) {
            $this->session->set_flashdata('msg', '
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> No Rumah pada Blok Tersebut sudah tersedia... 
            </div>');  

            redirect('No_rumah');     
        }
        else{

            // DATA INPUT Blok
            $input_data = array(            
                'id_blok' => $id_blok,
                'no_rumah' => $no_rumah,
                'status' => 1,
                'created_by' => $id_user
             );
            $this->DataHandle->insert($this->nama_tabel, $input_data);
            $this->session->set_flashdata('msg', '
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;</button>
                <i class="fa fa-check m-l-5"></i> Data Berhasil Ditambahkan ... 
            </div>');  

            redirect('No_rumah'); 

        }    
    }

    public function delete($id_no_rumah)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
         );
        $where = array(
            'id_no_rumah' => $id_no_rumah
         );
        $this->DataHandle->edit($this->nama_tabel, $data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Dihapus ... 
        </div>');  

        redirect('No_rumah');     
    }

    public function get_data($id_no_rumah){
        $where = array(
            'id_no_rumah' => $id_no_rumah
         );
        $data['data_no_rumah'] = $this->DataHandle->getAllWhere($this->nama_tabel, '*', $where);
        $this->template->back_end('back_end/v_edit_no_rumah', $data);
    }

    public function edit()
    {
        $id_user = $this->session->userdata('id_user');
        $id_no_rumah = $this->input->post('id_no_rumah');        
        $no_rumah = $this->input->post('no_rumah');        

        $edit_data = array(
            'no_rumah' => $no_rumah,
            'updated_by' => $id_user
         );
        $where = array(
            'id_no_rumah' => $id_no_rumah
         );
        $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);

        $this->session->set_flashdata('msg', '
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;</button>
            <i class="fa fa-check m-l-5"></i> Data Berhasil Diperbaharui ... 
        </div>');  

        redirect('No_rumah');
    }
}
