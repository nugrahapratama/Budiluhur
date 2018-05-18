<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pesan/index.html';
            $config['first_url'] = base_url() . 'pesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pesan_model->total_rows($q);
        $pesan = $this->Pesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pesan_data' => $pesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pesan/pesan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pesan' => $row->id_pesan,
		'id_pelanggan' => $row->id_pelanggan,
		'tgl_pesan' => $row->tgl_pesan,
	    );
            $this->load->view('pesan/pesan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pesan/create_action'),
	    'id_pesan' => set_value('id_pesan'),
	    'id_pelanggan' => set_value('id_pelanggan'),
	    'tgl_pesan' => set_value('tgl_pesan'),
	);
        $this->load->view('pesan/pesan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
		'tgl_pesan' => $this->input->post('tgl_pesan',TRUE),
	    );

            $this->Pesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pesan/update_action'),
		'id_pesan' => set_value('id_pesan', $row->id_pesan),
		'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
		'tgl_pesan' => set_value('tgl_pesan', $row->tgl_pesan),
	    );
            $this->load->view('pesan/pesan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pesan', TRUE));
        } else {
            $data = array(
		'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
		'tgl_pesan' => $this->input->post('tgl_pesan',TRUE),
	    );

            $this->Pesan_model->update($this->input->post('id_pesan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pesan_model->get_by_id($id);

        if ($row) {
            $this->Pesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
	$this->form_validation->set_rules('tgl_pesan', 'tgl pesan', 'trim|required');

	$this->form_validation->set_rules('id_pesan', 'id_pesan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pesan.xls";
        $judul = "pesan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pelanggan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pesan");

	foreach ($this->Pesan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pelanggan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pesan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pesan.php */
/* Location: ./application/controllers/Pesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-18 15:50:24 */
/* http://harviacode.com */