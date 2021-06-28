<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_Datatable extends CI_Model { 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query($tabel1, $column_order, $column_search, $order, $field, $kondisi)
    {        
        $this->db->select($field);

        $this->db->from($tabel1);

        if($kondisi != null || $kondisi != ''):
            $this->db->where($kondisi);
        endif;
 
        $i = 0;
     
        foreach ($column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($tabel1, $column_order, $column_search, $order, $field, $kondisi)
    {
        $this->_get_datatables_query($tabel1, $column_order, $column_search, $order, $field, $kondisi);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($tabel1, $column_order, $column_search, $order, $field, $kondisi)
    {
        $this->_get_datatables_query($tabel1, $column_order, $column_search, $order, $field, $kondisi);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($tabel1, $column_order, $column_search, $order, $field, $kondisi)
    {
        $this->db->select($field);

        $this->db->from($tabel1);

        if($kondisi != null || $kondisi != ''):
            $this->db->where($kondisi);
        endif;

        return $this->db->count_all_results();
    }
 
}