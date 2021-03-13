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

	public function getDataBarang($tanggalawal = null, $tanggalakhir = null)
	{
		$tanggalawalbaru = strtotime($tanggalawal);
		$tanggalakhirbaru = strtotime($tanggalakhir);
		// var_dump($tanggalakhirbaru, $tanggalawalbaru);
		// die;
		if($tanggalawal && $tanggalakhir) {
			$this->db->where('date_created >= ', $tanggalawalbaru);
			$this->db->where('date_created <= ', $tanggalakhirbaru);
		}
		return $this->db->get('m_barang')->result_array();
	}

}