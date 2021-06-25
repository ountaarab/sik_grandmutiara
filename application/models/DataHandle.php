<?php

class DataHandle extends CI_Model {

    function getAll($tabel) {
        return $this->db->get($tabel);
    }
    
    function getAllWhere($tabel1, $field, $where, $order){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->where($where);
		$this->db->order_by($order);
		return $this->db->get();
	}
    
    function getAllWhereLim10($tabel1, $field, $where, $order){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->where($where2);
		$this->db->order_by($order, 'desc');
		$this->db->limit('10');
		return $this->db->get();
	}
    
    function get2lim6($tabel1, $tabel2, $field, $where, $where2, $order){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->where($where2);
		$this->db->order_by($order, 'desc');
		$this->db->limit('6');
		return $this->db->get();
	}
    
    function get2lim($tabel1, $tabel2, $field, $where, $where2, $order, $limit){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->where($where2);
		$this->db->order_by($order, 'desc');
		$this->db->limit($limit);
		return $this->db->get();
	}
    
    function getAllWhereNotIn($tabel1, $field, $where){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->where_not_in($where);
		return $this->db->get();
	}
    
    function get_like($tabel1, $field, $field2, $value, $where, $order){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->where($where);
		$this->db->like($field2,$value,'after');
		$this->db->order_by($order);
		return $this->db->get();
	}
    
    function get_two($tabel1, $tabel2, $field, $where, $where2){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->where($where2);
		return $this->db->get();
	}

	function get_two_($tabel1, $tabel2, $field, $where){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		return $this->db->get();
	}
	
	function get_two_o($tabel1, $tabel2, $field, $join, $kondisi, $order){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $join);
		$this->db->where($kondisi);
		$this->db->order_by($order);
		return $this->db->get();
	}
	
	function get_three_($tabel1, $tabel2, $tabel3, $field, $where, $where2){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->join($tabel3, $where2);
		return $this->db->get();
	}
	
	function get_four_($tabel1, $tabel2, $tabel3, $tabel4, $field, $where, $where2, $where3){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->join($tabel3, $where2);
		$this->db->join($tabel4, $where3);
		return $this->db->get();
	}
	
	function get_five_($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $field, $where, $where2, $where3, $where4){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->join($tabel3, $where2);
		$this->db->join($tabel4, $where3);
		$this->db->join($tabel5, $where4);
		return $this->db->get();
	}
	
	function get_five($tabel1, $tabel2, $tabel3, $tabel4, $tabel5, $field, $join1, $join2, $join3, $join4, $where){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $join1);
		$this->db->join($tabel3, $join2);
		$this->db->join($tabel4, $join3);
		$this->db->join($tabel5, $join4);
		$this->db->where($where);
		return $this->db->get();
	}
	
	function get_three($tabel1, $tabel2, $tabel3, $field, $where, $where2, $where3,  $order ){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->join($tabel3, $where2);
		$this->db->where($where3);
		$this->db->order_by($order,'DESC');
		return $this->db->get();
	}

	function get_three_o($tabel1, $tabel2, $tabel3, $field, $where, $where2, $where3, $where4, $order ){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->join($tabel3, $where2);
		$this->db->where($where3);
		$this->db->where($where4);
		$this->db->order_by($order,'DESC');
		return $this->db->get();
	}
	
	function get_four_o($tabel1, $tabel2, $tabel3, $tabel4, $field, $join2, $join3, $join4, $kondisi,  $order ){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $join2);
		$this->db->join($tabel3, $join3);
		$this->db->join($tabel4, $join4);
		$this->db->where($kondisi);
		$this->db->order_by($order);
		return $this->db->get();
	}
	
	function get_four($tabel1, $tabel2, $tabel3, $tabel4, $field, $where, $where2, $where3, $where4, $order ){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->join($tabel3, $where2);
		$this->db->join($tabel4, $where3);
		$this->db->where($where4);
		$this->db->order_by($order,'DESC');
		return $this->db->get();
	}
	
	function get_two_like($tabel1, $tabel2, $field, $field2, $value, $where, $where2, $order){
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->join($tabel2, $where);
		$this->db->where($where2);
		$this->db->like($field2,$value,'after');
		$this->db->order_by($order);
		return $this->db->get();
	}
    
    function sum($tabel, $field){
		$this->db->select_sum($field);
		return $this->db->get($tabel)->result();
	}
	
	function sum1($tabel, $field, $field1,$value){
		$this->db->select_sum($field);
		$this->db->like($field1,$value,'after');
		return $this->db->get($tabel)->result();
	}
	
	function sum2($tabel, $field, $where1, $where2){
		$this->db->select_sum($field);
		$this->db->where($where1);
		$this->db->where($where2);
		return $this->db->get($tabel)->result();
	}

    function insert($tabel, $insert) {
        $this->db->insert($tabel, $insert);
    }

    function edit($tabel, $data, $where) {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    function delete($tabel, $where) {
        $this->db->delete($tabel, $where);
    }
    
    function get_last_id(){
		return $this->db->insert_id();
	}

	function other_query($query){
		return $this->db->query($query);
	}

    function get($tabel, $where) {
        return $this->db->get_where($tabel, $where);
    }

	function get_order($tabel, $where, $order){
		$this->db->where($where);
		$this->db->order_by($order, 'asc');
		return $this->db->get($tabel);
	}

	function desa_load($id_kecamatan){
		$this->db->where("id_kecamatan", $id_kecamatan)->order_by("name", "asc");
		return $this->db->get("ms_desa");
	}
}
