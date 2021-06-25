<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{		
		$id_user = $this->session->userdata('id_user');
        // CATAT LOG
        $input_data = array(            
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Melakukan Logout'
         );
	    $this->DataHandle->insert('log_kegiatan', $input_data);

		$session_items = array('id_warga', 'id_user', 'nama', 'jabatan', 'role_user');
		$this->session->unset_userdata($session_items);
        $this->session->set_flashdata('msg', '<script> swal("Logout Success!", "Silahkan Login Kembali untuk melanjutkan ;)", "success"); </script>');  	
        redirect('Login');
	}
}
