<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['warga'] = $this->DataHandle->other_query("select * from tr_rumah join tbl_warga on tbl_warga.id_warga = tr_rumah.id_warga");
        $data['data_user'] = $this->DataHandle->other_query("SELECT u.id_user, w.id_warga, w.nama_lengkap, b.nama_blok, r.no_rumah, u.username, u.created_at, u.updated_at FROM tbl_warga as w JOIN tr_rumah as r on w.id_warga = r.id_warga JOIN ms_blok as b ON b.id_blok = r.id_blok JOIN tbl_user u on u.id_warga = w.id_warga  WHERE w.status = 1  AND u.status = 1");
        $this->template->back_end('back_end/v_data_user', $data);
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');
        $username = $this->input->post('username');
        $id_warga = $this->input->post('id_warga');
        $password = md5($this->input->post('password'));
        $retypepassword = md5($this->input->post('retypepassword'));

        if ($password != $retypepassword) {
            $this->session->set_flashdata('msg', '<script> swal("Insert Failed!", "Kolom Password dan Ulangi Password harus sama !!!", "warning"); </script>');

            redirect('User');
        } else {
            $where = array(
                'username' => $username,
                'status' => 1
            );
            $cek_username = $this->DataHandle->getAllWhere('tbl_user', '*', $where, 'id_user ASC');
            $cek_username = $cek_username->num_rows();
            if ($cek_username > 0) {
                $this->session->set_flashdata('msg', '<script> swal("Insert Failed!", "Username Sudah Digunakan, Mohon Gunakan Username lain ...", "warning"); </script>');

                redirect('User');
            } else {
                // DATA INPUT USER
                $input_data = array(
                    'username' => $username,
                    'id_warga' => $id_warga,
                    'role_user' => '1',
                    'password' => $password,
                    'status' => 1,
                    'created_by' => $id_user
                );
                $this->DataHandle->insert('tbl_user', $input_data);
                $this->session->set_flashdata('msg', '<script> swal("Insert Success!", "Username ' . $username . ' berhasil Disimpan ...", "success"); </script>');

                // CATAT LOG
                $input_data = array(
                    'id_user' => $id_user,
                    'created_at' => date('Y-m-d h:i:s'),
                    'log_kegiatan' => 'Menambah Data Pengguna dengan Username : ' . $username . ''
                );
                $this->DataHandle->insert('log_kegiatan', $input_data);

                redirect('User');
            }
        }
    }

    public function delete($id)
    {
        $id_user = $this->session->userdata('id_user');
        $data = array(
            'status' => '0',
            'updated_by' => $id_user
        );
        $where = array(
            'id_user' => $id
        );

        // CATAT LOG
        $input_data = array(
            'id_user' => $id_user,
            'created_at' => date('Y-m-d h:i:s'),
            'log_kegiatan' => 'Menghapus Data Pengguna dengan ID : ' . $id . ''
        );
        $this->DataHandle->insert('log_kegiatan', $input_data);

        $this->DataHandle->edit('tbl_user', $data, $where);
        $this->session->set_flashdata('msg', '<script> swal("Delete Success!", "Data Berhasil Dihapus ...", "success"); </script>');

        redirect('User');
    }

    public function get_data($id_user)
    {
        $where = array(
            'id_user' => $id_user
        );
        $data['data_user'] = $this->DataHandle->getAllWhere('tbl_user', '*', $where, 'id_user ASC');
        $data['data_sekolah'] = $this->DataHandle->getAllWhere('tbl_sekolah', '*', "status = '1' AND id_sekolah != '0'");
        $this->template->back_end('back_end/v_edit_user', $data);
    }

    public function edit()
    {
        $id_updated = $this->session->userdata('id_user');
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $retypepassword = md5($this->input->post('retypepassword'));

        if ($password != $retypepassword) {
            $this->session->set_flashdata('msg', '<script> swal("Update Failed!", "Kolom Password dan Ulangi Password harus sama !!!", "warning"); </script>');

            redirect('User');
        } else {
            $where = array(
                'username' => $username,
                'status' => 1
            );
            $cek_username = $this->DataHandle->getAllWhere('tbl_user', '*', $where, 'id_user ASC');
            $cek_username = $cek_username->num_rows();
            if ($cek_username > 0) {
                $this->session->set_flashdata('msg', '<script> swal("Update Failed!", "Username Sudah Digunakan, Mohon Gunakan Username lain ...", "warning"); </script>');

                redirect('User');
            } else {
                $input_data = array(
                    'username' => $username,
                    'password' => $password,
                    'status' => 1,
                    'updated_by' => $id_updated
                );
                $where = array(
                    'id_user' => $id_user
                );

                $this->DataHandle->edit('tbl_user', $input_data, $where);

                // CATAT LOG
                $input_data = array(
                    'id_user' => $id_user,
                    'created_at' => date('Y-m-d h:i:s'),
                    'log_kegiatan' => 'Merubah Data Pengguna dengan ID : ' . $id_user . ''
                );
                $this->DataHandle->insert('log_kegiatan', $input_data);

                $this->session->set_flashdata('msg', '<script> swal("Update Success!", "Data Berhasil Diperbaharui ...", "success"); </script>');

                redirect('User');
            }
        }
    }
}
