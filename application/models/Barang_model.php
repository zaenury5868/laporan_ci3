<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function import_data($databarang)
	{
		$jumlah = count($databarang);
		if($jumlah > 0){
			$this->db->replace('m_barang', $databarang);
		}
	}

	public function getDataBarang()
	{
		return $this->db->get('m_barang')->result_array();
	}

}