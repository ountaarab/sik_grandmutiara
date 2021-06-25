<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    private $role_user, $id_sekolah, $kondisi;
    private $nama_tabel = 'tbl_user';
    private $nama_tabel2 = 'tr_rumah';

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
    }

	public function index()
	{
        $id_user = $this->session->userdata('id_user');
        $data['data_user'] = $this->DataHandle->getAllWhere($this->nama_tabel, 'id_user, username, password, id_warga', "status = '1' AND id_user = '".$id_user."'", "id_user ASC");		
        // var_dump($data['data_user']->result());die;
        $this->template->back_end('back_end/v_akun', $data);
    }

    public function status_rumah()
    {
        $id_user = $this->session->userdata('id_user');
        $id_warga = $this->session->userdata('id_warga');
        $data['data_user'] = $this->DataHandle->getAllWhere($this->nama_tabel2, 'status_rumah,id_warga', "status = '1' AND id_warga = '".$id_warga."'", "id_warga ASC");   
        $this->template->back_end('back_end/v_status_rumah', $data);
    }

    public function edit_status_rumah() 
    {   
        
        $id_user = $this->session->userdata('id_user');
        $id_warga = $this->session->userdata('id_warga');
        $status_rumah = $this->input->post('status_rumah');        


        $edit_data = array(
            'status_rumah' => $status_rumah,
            'updated_by' => $id_user
         );            
        
        $where = array(
            'id_warga' => $id_warga
         );

        $this->DataHandle->edit($this->nama_tabel2, $edit_data, $where);
        // CATAT LOG
        $input_data = array(            
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Mengubah Status Rumah Menjadi '.$status_rumah.''
         );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ... ", "success"); </script>'); 

        redirect('Akun/status_rumah');
    }

    public function edit()
    {
        $id_warga = $this->input->post('id_warga');        
        $id_user = $this->input->post('id_user');        
        $username = $this->input->post('username');

        $data_user = $this->DataHandle->getAllWhere($this->nama_tabel, 'username, id_user', "status = '1' AND username LIKE '%".$username."%'", "id_user ASC")->row();   
        if ($data_user->id_user != $id_user) {
            if ($data_user->username == $username) {
                $this->session->set_flashdata('msg', '<script> swal("Maaf!", "Username sudah digunakan!! ", "warning"); </script>');
                redirect('Akun');
            }
        }


        $password = $this->input->post('password');                
        $repassword = $this->input->post('repassword');    

        if($password == $repassword){  

            if ($this->input->post('password') != NULL) {
                $log_kegiatan = 'Merubah Data Akun Pribadi dengan merubah password';
                $edit_data = array(
                    'username' => $username,
                    'password' => md5($this->input->post('password')),
                    'updated_by' => $id_user
                 );
            }
            else{
                $log_kegiatan = 'Merubah Data Akun Pribadi tanpa merubah password';
                $edit_data = array(
                    'username' => $username,
                    'updated_by' => $id_user
                 );            
            }
            $where = array(
                'id_warga' => $id_warga,
                'id_user' => $id_user,
             );
            $this->DataHandle->edit($this->nama_tabel, $edit_data, $where);
            $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ... ", "success"); </script>');  
            // CATAT LOG
            $input_data = array(            
                'id_user' => $id_user,
                'created_at' => date('Y-m-d h:i:s'),
                'log_kegiatan' => $log_kegiatan
             );
            $this->DataHandle->insert('log_kegiatan', $input_data);

            redirect('Akun');
        }
        else{

            $this->session->set_flashdata('msg', '<script> swal("Update Failed!", "Password dan Ulangi Password tidak sama!", "warning"); </script>'); 
            redirect('Akun');
        }         
    }
}
