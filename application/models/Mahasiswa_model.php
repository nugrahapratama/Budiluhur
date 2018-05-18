<?php

class Mahasiswa_model extends CI_Model {
	
	function retrieve()
	{
		$query = $this->db->get('mhs');
		
		if($query->result()){
			foreach	($query->result() as $content) {
				$data[] = array(
							$content->nim,
							$content->nama,
							$content->alamat
							);
			}
			return $data;
		} else {
			return FALSE;
		}
	
	}
	
	function add($arg)
	{
		$data = array (
					'nim' =>$arg[0],
					'nama' =>$arg[1],
					'alamat' =>$arg[2],
					);
		$this->db->insert('mhs', $data);
	}
	
	function delete($id)
	{
		$this->db->where('nim', $id);
		$this->db->delete('mhs');
	}
	
	function update($id, $form)
	{
		$data = array(
					'nim' => $form[0],
					'nama' => $form[1],
					'alamat' => $form[2],
					);
		$this->db->where('nim', $id);
		$this->db->update('mhs', $data);
	}

	function getMahasiswa($id)
	{
		$this->db->where('nim', $id);
		$query = $this->db->get('mhs');
		
		if($query->result()){
			foreach ($query->result() as $content) {
				$data = array(
							$content->nim,
							$content->nama,
							$content->alamat
							);
			}
			return $data;
		} else {
			return FALSE;
		}
	}
}