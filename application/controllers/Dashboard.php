<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['data_user'] = $this->DataHandle->other_query("SELECT COUNT(u.id_user) as jml FROM tbl_warga as w JOIN tr_rumah as r on w.id_warga = r.id_warga JOIN ms_blok as b ON b.id_blok = r.id_blok JOIN tbl_user u on u.id_warga = w.id_warga  WHERE w.status = 1  AND u.status = 1")->row_array();

        $data['data_warga'] = $this->DataHandle->other_query("SELECT COUNT(tr_rumah.status_menempati) as jml FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' ORDER BY tr_rumah.id_warga DESC")->row_array();

        $data['data_keluarga'] = $this->DataHandle->other_query("SELECT id_keluarga FROM tbl_keluarga WHERE status = 1")->num_rows();

        $data['data_warga_hak_milik'] = $this->DataHandle->other_query("SELECT COUNT(tr_rumah.status_menempati) as jml FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' AND tr_rumah.status_menempati = 'HAK MILIK' ORDER BY tr_rumah.id_warga DESC")->row_array();

        $data['data_warga_kontrak'] = $this->DataHandle->other_query("SELECT COUNT(tr_rumah.status_menempati) as jml FROM tr_rumah INNER JOIN ms_blok ON tr_rumah.id_blok = ms_blok.id_blok INNER JOIN tbl_warga ON tbl_warga.id_warga = tr_rumah.id_warga WHERE tr_rumah.status='1' AND tr_rumah.status_menempati = 'KONTRAK' ORDER BY tr_rumah.id_warga DESC")->row_array();

        $data['total_jiwa'] = intval($data['data_warga']['jml']) + $data['data_keluarga'];

        $data['data_pengurus'] = $this->DataHandle->get_four_o($this->pengurus, $this->warga, $this->rumah, $this->blok, 'p.id_pengurus, w.nama_lengkap, w.id_warga, p.jabatan, b.nama_blok, r.no_rumah', 'w.id_warga = p.id_warga', 'w.id_warga = r.id_warga', 'b.id_blok = r.id_blok', "p.status = '1' AND w.status = '1'", "p.id_pengurus DESC");

        $data['data_pengurus'] = count($data['data_pengurus']->result());

        $this->template->back_end('back_end/v_dashboard_admin', $data);
    }
}
