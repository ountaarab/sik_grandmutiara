<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_rumah extends CI_Controller {
    

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }
    public function hapus_session(){  
        $session_items = array('nik', 'nama_lengkap', 'foto', 'tempat_lahir', 'tanggal_lahir', 'kontak', 'email', 'jk', 'gol_darah', 'agama', 'status_perkawinan', 'pekerjaan', 'id_blok', 'no_rumah', 'status_menempati', 'status_rumah');
        $this->session->unset_userdata($session_items);
    } 

    public function index()
    {
        $this->hapus_session();
        $data['data_warga'] = $this->DataHandle->other_query("SELECT tr_rumah.id_rumah, tbl_warga.id_warga, ms_blok.id_blok, ms_blok.nama_blok, tr_rumah.no_rumah, tr_rumah.status_menempati, tr_rumah.status_rumah, tbl_warga.nama_lengkap, tbl_warga.kontak FROM tr_rumah INNER JOIN tbl_warga ON tr_rumah.id_warga = tbl_warga.id_warga INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok WHERE tbl_warga.`status` = 1");        
        $this->template->back_end('back_end/v_data_status_rumah', $data);
    }
}
