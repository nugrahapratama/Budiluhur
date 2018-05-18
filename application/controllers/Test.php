<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index()
	{
		$data = array(
			'title' => "Budi Luhur",
			'message' => "Welcome to Budi Luhur"
		);
		
		$this->load->view('test_view', $data);
	}
		
	public function hello()
	{
		echo "Ini Method Hello";
	}
}
?>
