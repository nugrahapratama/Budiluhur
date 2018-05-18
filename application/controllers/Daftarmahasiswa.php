<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daftarmahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Daftarmahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'daftarmahasiswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'daftarmahasiswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'daftarmahasiswa/index.html';
            $config['first_url'] = base_url() . 'daftarmahasiswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Daftarmahasiswa_model->total_rows($q);
        $daftarmahasiswa = $this->Daftarmahasiswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'daftarmahasiswa_data' => $daftarmahasiswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('daftarmahasiswa/daftarmahasiswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Daftarmahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Nomor' => $row->Nomor,
		'NIM' => $row->NIM,
		'Nama' => $row->Nama,
		'Alamat' => $row->Alamat,
		'TanggalLahir' => $row->TanggalLahir,
		'KotaKelahiran' => $row->KotaKelahiran,
		'JenisKelamin' => $row->JenisKelamin,
		'Agama' => $row->Agama,
		'Kebangsaan' => $row->Kebangsaan,
		'GolonganDarah' => $row->GolonganDarah,
	    );
            $this->load->view('daftarmahasiswa/daftarmahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftarmahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('daftarmahasiswa/create_action'),
	    'Nomor' => set_value('Nomor'),
	    'NIM' => set_value('NIM'),
	    'Nama' => set_value('Nama'),
	    'Alamat' => set_value('Alamat'),
	    'TanggalLahir' => set_value('TanggalLahir'),
	    'KotaKelahiran' => set_value('KotaKelahiran'),
	    'JenisKelamin' => set_value('JenisKelamin'),
	    'Agama' => set_value('Agama'),
	    'Kebangsaan' => set_value('Kebangsaan'),
	    'GolonganDarah' => set_value('GolonganDarah'),
	);
        $this->load->view('daftarmahasiswa/daftarmahasiswa_form', $data);
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
		'Alamat' => $this->input->post('Alamat',TRUE),
		'TanggalLahir' => $this->input->post('TanggalLahir',TRUE),
		'KotaKelahiran' => $this->input->post('KotaKelahiran',TRUE),
		'JenisKelamin' => $this->input->post('JenisKelamin',TRUE),
		'Agama' => $this->input->post('Agama',TRUE),
		'Kebangsaan' => $this->input->post('Kebangsaan',TRUE),
		'GolonganDarah' => $this->input->post('GolonganDarah',TRUE),
	    );

            $this->Daftarmahasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('daftarmahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Daftarmahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('daftarmahasiswa/update_action'),
		'Nomor' => set_value('Nomor', $row->Nomor),
		'NIM' => set_value('NIM', $row->NIM),
		'Nama' => set_value('Nama', $row->Nama),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'TanggalLahir' => set_value('TanggalLahir', $row->TanggalLahir),
		'KotaKelahiran' => set_value('KotaKelahiran', $row->KotaKelahiran),
		'JenisKelamin' => set_value('JenisKelamin', $row->JenisKelamin),
		'Agama' => set_value('Agama', $row->Agama),
		'Kebangsaan' => set_value('Kebangsaan', $row->Kebangsaan),
		'GolonganDarah' => set_value('GolonganDarah', $row->GolonganDarah),
	    );
            $this->load->view('daftarmahasiswa/daftarmahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftarmahasiswa'));
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
		'Alamat' => $this->input->post('Alamat',TRUE),
		'TanggalLahir' => $this->input->post('TanggalLahir',TRUE),
		'KotaKelahiran' => $this->input->post('KotaKelahiran',TRUE),
		'JenisKelamin' => $this->input->post('JenisKelamin',TRUE),
		'Agama' => $this->input->post('Agama',TRUE),
		'Kebangsaan' => $this->input->post('Kebangsaan',TRUE),
		'GolonganDarah' => $this->input->post('GolonganDarah',TRUE),
	    );

            $this->Daftarmahasiswa_model->update($this->input->post('NIM', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('daftarmahasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Daftarmahasiswa_model->get_by_id($id);

        if ($row) {
            $this->Daftarmahasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('daftarmahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daftarmahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nomor', 'nomor', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('TanggalLahir', 'tanggallahir', 'trim|required');
	$this->form_validation->set_rules('KotaKelahiran', 'kotakelahiran', 'trim|required');
	$this->form_validation->set_rules('JenisKelamin', 'jeniskelamin', 'trim|required');
	$this->form_validation->set_rules('Agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('Kebangsaan', 'kebangsaan', 'trim|required');
	$this->form_validation->set_rules('GolonganDarah', 'golongandarah', 'trim|required');

	$this->form_validation->set_rules('NIM', 'NIM', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "daftarmahasiswa.xls";
        $judul = "daftarmahasiswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "TanggalLahir");
	xlsWriteLabel($tablehead, $kolomhead++, "KotaKelahiran");
	xlsWriteLabel($tablehead, $kolomhead++, "JenisKelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Kebangsaan");
	xlsWriteLabel($tablehead, $kolomhead++, "GolonganDarah");

	foreach ($this->Daftarmahasiswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Nomor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TanggalLahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KotaKelahiran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->JenisKelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kebangsaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->GolonganDarah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Daftarmahasiswa.php */
/* Location: ./application/controllers/Daftarmahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-18 15:50:24 */
/* http://harviacode.com */