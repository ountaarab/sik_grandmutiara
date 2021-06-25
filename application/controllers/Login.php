<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 // function __construct() {
  //       parent::__construct();
  //       if (!$this->session->has_userdata('id_user')) {
  //           redirect('Logout');
  //       }
  //       else{            
  //       	if (!$this->session->has_userdata('jabatan')) {
  //           	redirect('Logout');
  //       	}
  //       	else{

	 //        	if ($this->session->userdata('jabatan') == "SUPER ADMIN") {
	 //            	redirect('Warga');
	 //        	}
	 //        	else if ($this->session->userdata('jabatan') == "WARGA") {
	 //            	redirect('Profil');
	 //        	}
	 //        	else{
	 //            	redirect('Profil');
	 //        	}
	 //        }
  //       }
  //   }

	public function index()
	{
	    if ($this->session->userdata('jabatan') == "SUPER ADMIN") {
            $this->session->set_flashdata('msg', '<script> swal("Perhatian!", "Untuk keluar dari aplikasi harap Logout Terlebih Dahulu ;)", "warning"); </script>');
        	redirect('Warga');
    	}
    	else if ($this->session->has_userdata('jabatan')) {
            $this->session->set_flashdata('msg', '<script> swal("Perhatian!", "Untuk keluar dari aplikasi harap Logout Terlebih Dahulu ;)", "warning"); </script>');
        	redirect('Profil');
    	}
    	else{
        	$this->load->view('login/v_login');
    	}
        // $data['permohonan'] = $this->DataHandle->get_order('ms_permohonan', 'status = 1','id');		
        // $this->template->back_end('v_data_user');
	}

	public function data_get()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		// GET DATA USER
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$user = $this->DataHandle->get('tbl_user', $where);
		if($user->num_rows() > 0){
			foreach($user->result() as $row){
				if ($row->status != '1') {
                $this->session->set_flashdata('msg', '<script> swal("Perhatian!", "Akun Anda sudah tidak aktif, Hubungi Admin untuk dapat login", "warning"); </script>');
					redirect('Login');	
				}
				else{
					$id_warga = $row->id_warga;
					$id_user = $row->id_user;
					$nama = $row->nama;
					$role_user = $row->role_user;				
				}
			}

			// KONDISI ADMIN
			if ($id_warga == 1000) {
				$data_session = array(
					'id_warga' => $id_warga,
					'id_user' => $id_user,
					'nama' => $nama,
					'jabatan' => 'SUPER ADMIN',
					'role_user' => $role_user
				);
	            $this->session->set_userdata($data_session);	            

	            // CATAT LOG
		        $input_data = array(            
		            'id_user' => $id_user,
		            'created_at' => date('Y-m-d h:i:s'),
		            'log_kegiatan' => 'Melakukan Login'
		         );
		        $this->DataHandle->insert('log_kegiatan', $input_data);

                $this->session->set_flashdata('msg', '<script> swal("Login Success!", "Selamat Datang '.$nama.'... ", "success"); </script>');   
				redirect('Dashboard');				
			}
			// KONDISI WARGA
			else{

				$where = array(
					'id_warga' => $id_warga,
					'status' => '1'
				);

				// PENGECEKAN PENGURUS
				$cek_pengurus = $this->DataHandle->get('tbl_pengurus', $where);


				if (count($cek_pengurus->result()) > 0) {

					foreach($cek_pengurus->result() as $row){
						if ($row->status != '1') {
							redirect('Login');	
						}
						else{
							$id_warga = $row->id_warga;
							$jabatan = $row->jabatan;				
						}
					}

					$data_session = array(
						'id_warga' => $id_warga,
						'id_user' => $id_user,
						'nama' => $nama,
						'jabatan' => $jabatan,
						'role_user' => $role_user
					);		
	            	$this->session->set_userdata($data_session);

		            // CATAT LOG
			        $input_data = array(            
			            'id_user' => $id_user,
			            'created_at' => date('Y-m-d h:i:s'),
			            'log_kegiatan' => 'Melakukan Login'
			         );
			        $this->DataHandle->insert('log_kegiatan', $input_data);
			        
                	$this->session->set_flashdata('msg', '<script> swal("Login Success!", "Selamat Datang '.$nama.'... ", "success"); </script>');   
					redirect('Dashboard_pengurus');		
				}
				// PENGECEKAN SELAIN PENGURUS
				else{

					$data_session = array(
						'id_warga' => $id_warga,
						'id_user' => $id_user,
						'nama' => $nama,
						'jabatan' => 'WARGA',
						'role_user' => $role_user
					);
	            	$this->session->set_userdata($data_session);

		            // CATAT LOG
			        $input_data = array(            
			            'id_user' => $id_user,
			            'created_at' => date('Y-m-d h:i:s'),
			            'log_kegiatan' => 'Melakukan Login'
			         );
			        $this->DataHandle->insert('log_kegiatan', $input_data);
			        
                	$this->session->set_flashdata('msg', '<script> swal("Login Success!", "Selamat Datang '.$nama.'... ", "success"); </script>');   
					redirect('Profil');				

				}

			}

		}
		else{
            $this->session->set_flashdata('msg', '<script> swal("Login Failed!", "Kombinasi Username dan Password tidak ditemukan!!", "error"); </script>');  	
			redirect('Login');
		}		
	}
}
