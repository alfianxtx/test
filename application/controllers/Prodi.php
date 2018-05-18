<?php
class Prodi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $qry = $this->db->query('select * from prodi');
        $view['data'] = $qry->result_array();
        $this->load->view('prodi/list', $view);
    }

    public function tambah()
    {
        $this->load->view('prodi/form');
    }

    public function edit($prm_key = '')
    {
        if(trim($prm_key) != '')
        {
            $qry = $this->db->get_where('prodi', array('id' => $prm_key));
            $view['data'] = $qry->result_array();
            $this->load->view('prodi/form', $view);
        } else {
            redirect(site_url().'/prodi');
        }
    }

    public function hapus($prm_key = '') 
    {
        if(trim($prm_key) != '') {
            $qry = $this->db->delete('prodi', array('id' => $prm_key));
        }
        redirect(site_url().'/prodi');
    }

    public function simpan()
    {
        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'txt_id'
                , 'label' => 'ID'
                , 'rules' => 'trim'
            ), 
            array(
                'field' => 'txt_prodi'
                , 'label' => 'Prodi'
                , 'rules' => 'trim|required'
            ),
            array(
                'field' => 'txt_fakultas'
                , 'label' => 'Fakultas'
                , 'rules' => 'trim|required'
            )
        );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<code>', '</code>');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('prodi/form');
        } else {
            $qry = $this->db->get_where('prodi', array('id' => $this->input->post('txt_id')));
            $data = array('prodi' => $this->input->post('txt_prodi'), 'fakultas' => $this->input->post('txt_fakultas'));
            if( count($qry->result()) == 0 )
            {
                $data = array_merge(array('id' => $this->input->post('txt_id') ), $data);
                $this->db->insert('prodi', $data);
            } else {
                $this->db->update('prodi', $data, array('id' => $this->input->post('txt_id')));
            }
            redirect(site_url().'/prodi');
        }
    }
}