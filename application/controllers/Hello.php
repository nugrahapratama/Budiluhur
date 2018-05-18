<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {
	public function index()
	{
		$data['nama'] = "Budi Luhur";
		
		$this->load->view('hello_view', $data);
	}
}
