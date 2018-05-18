<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daftarnilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Daftarnilai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'daftarnilai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'daftarnilai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'daftarnilai/index.html';
            $config['first_url'] = base_url() . 'daftarnilai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Daftarnilai_model->total_rows($q);
        $daftarnilai = $this->Daftarnilai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'daftarnilai_data' => $daftarnilai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('daftarnilai/daftarnilai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Daftarnilai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Nomor' => $row->Nomor,
		'NIM' => $row->NIM,
		'Nama' => $row->Nama,
		'ProgramStudi' => $row->ProgramStudi,
		'Fakultas' => $row->Fakultas,
		'TahunAjaran' => $row->TahunAjaran,
		'Alamat' => $row->Alamat,
		'TanggalUjian' => $row->TanggalUjian,
		'Nilai' => $row->Nilai,
		'MataKuliah' => $row->MataKuliah,
	    );
            $this->load->view('daftarnilai/daftarnilai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftarnilai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('daftarnilai/create_action'),
	    'Nomor' => set_value('Nomor'),
	    'NIM' => set_value('NIM'),
	    'Nama' => set_value('Nama'),
	    'ProgramStudi' => set_value('ProgramStudi'),
	    'Fakultas' => set_value('Fakultas'),
	    'TahunAjaran' => set_value('TahunAjaran'),
	    'Alamat' => set_value('Alamat'),
	    'TanggalUjian' => set_value('TanggalUjian'),
	    'Nilai' => set_value('Nilai'),
	    'MataKuliah' => set_value('MataKuliah'),
	);
        $this->load->view('daftarnilai/daftarnilai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nomor' => $this->input->post('Nomor',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'ProgramStudi' => $this->input->post('ProgramStudi',TRUE),
		'Fakultas' => $this->input->post('Fakultas',TRUE),
		'TahunAjaran' => $this->input->post('TahunAjaran',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'TanggalUjian' => $this->input->post('TanggalUjian',TRUE),
		'Nilai' => $this->input->post('Nilai',TRUE),
		'MataKuliah' => $this->input->post('MataKuliah',TRUE),
	    );

            $this->Daftarnilai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('daftarnilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Daftarnilai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('daftarnilai/update_action'),
		'Nomor' => set_value('Nomor', $row->Nomor),
		'NIM' => set_value('NIM', $row->NIM),
		'Nama' => set_value('Nama', $row->Nama),
		'ProgramStudi' => set_value('ProgramStudi', $row->ProgramStudi),
		'Fakultas' => set_value('Fakultas', $row->Fakultas),
		'TahunAjaran' => set_value('TahunAjaran', $row->TahunAjaran),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'TanggalUjian' => set_value('TanggalUjian', $row->TanggalUjian),
		'Nilai' => set_value('Nilai', $row->Nilai),
		'MataKuliah' => set_value('MataKuliah', $row->MataKuliah),
	    );
            $this->load->view('daftarnilai/daftarnilai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftarnilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('NIM', TRUE));
        } else {
            $data = array(
		'Nomor' => $this->input->post('Nomor',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'ProgramStudi' => $this->input->post('ProgramStudi',TRUE),
		'Fakultas' => $this->input->post('Fakultas',TRUE),
		'TahunAjaran' => $this->input->post('TahunAjaran',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'TanggalUjian' => $this->input->post('TanggalUjian',TRUE),
		'Nilai' => $this->input->post('Nilai',TRUE),
		'MataKuliah' => $this->input->post('MataKuliah',TRUE),
	    );

            $this->Daftarnilai_model->update($this->input->post('NIM', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('daftarnilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Daftarnilai_model->get_by_id($id);

        if ($row) {
            $this->Daftarnilai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('daftarnilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftarnilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nomor', 'nomor', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('ProgramStudi', 'programstudi', 'trim|required');
	$this->form_validation->set_rules('Fakultas', 'fakultas', 'trim|required');
	$this->form_validation->set_rules('TahunAjaran', 'tahunajaran', 'trim|required');
	$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('TanggalUjian', 'tanggalujian', 'trim|required');
	$this->form_validation->set_rules('Nilai', 'nilai', 'trim|required');
	$this->form_validation->set_rules('MataKuliah', 'matakuliah', 'trim|required');

	$this->form_validation->set_rules('NIM', 'NIM', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "daftarnilai.xls";
        $judul = "daftarnilai";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "ProgramStudi");
	xlsWriteLabel($tablehead, $kolomhead++, "Fakultas");
	xlsWriteLabel($tablehead, $kolomhead++, "TahunAjaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "TanggalUjian");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai");
	xlsWriteLabel($tablehead, $kolomhead++, "MataKuliah");

	foreach ($this->Daftarnilai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Nomor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ProgramStudi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Fakultas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TahunAjaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TanggalUjian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nilai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MataKuliah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Daftarnilai.php */
/* Location: ./application/controllers/Daftarnilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-18 15:50:24 */
/* http://harviacode.com */