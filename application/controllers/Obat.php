<?php
    class Obat extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function index()
        {
            $qry = $this->db->query('select * from obat');
            $view['data'] = $qry->result_array();
            $this->load->view('obat/list', $view);
        }

        public function tambah()
        {
            $data['satuan_combo'] = $this->_satuan_combo_generate();
            $this->load->view('obat/form', $data);
        }

        public function edit($prm_key = '')
        {
            if(trim($prm_key) != '')
            {
                $view['satuan_combo'] = $this->_satuan_combo_generate();
                $qry = $this->db->get_where('obat', array('id' => $prm_key));
                $view['data'] = $qry->result_array();
                $this->load->view('obat/form', $view);
            } else {
            redirect(site_url().'/obat');
            }
        }

        public function hapus($prm_key = '') {
            if(trim($prm_key) != '') {
                $qry = $this->db->delete('obat', array('id' => $prm_key));
            }
            redirect(site_url().'/obat');
        }

        public function simpan()
        {
            $this->load->library('form_validation');
            $rules = array(
                array
                (
                    'field' => 'txt_id'
                    , 'label' => 'ID'
                    , 'rules' => 'trim'
                ), 
                array
                (
                    'field' => 'cmb_satuan'
                    , 'label' => 'Satuan'
                    , 'rules' => 'trim|required'
                ), 
                array
                (
                'field' => 'txt_nama_obat'
                , 'label' => 'Nama Obat'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_produser_obat'
                , 'label' => 'Produser Obat'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_exp_obat'
                , 'label' => 'Exp Obat'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_harga_beli'
                , 'label' => 'Harga Beli'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_harga_jual'
                , 'label' => 'Harga Jual'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_stok_obat'
                , 'label' => 'Stok Obat'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_jenis_obat'
                , 'label' => 'Jenis Obat'
                , 'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('<code>', '</code>');
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('obat/form');
            } else {
                $qry = $this->db->get_where('obat', array('id' => $this->input->post('txt_id')));
                $data = array
                (
                    'satuan_id' => $this->input->post('cmb_satuan')
                    , 'nama_obat' => $this->input->post('txt_nama_obat')
                    , 'produser_obat' => $this->input->post('txt_produser_obat')
                    , 'exp_obat' => $this->input->post('txt_exp_obat')
                    , 'harga_beli' => $this->input->post('txt_harga_beli')
                    , 'harga_jual' => $this->input->post('txt_harga_jual')
                    , 'stok_obat' => $this->input->post('txt_stok_obat')
                    , 'jenis_obat' => $this->input->post('txt_jenis_obat')
                );
                if( count($qry->result()) == 0 )
                {
                    $data = array_merge(array( 'id' => $this->input->post('txt_id') ), $data);
                    $this->db->insert('obat', $data);
                } else {
                    $this->db->update('obat', $data, array('id' => $this->input->post('txt_id')));
                }
                redirect(site_url().'/obat');
            }
        }

        private function _satuan_combo_generate()
        {
            $qry = $this->db->query('select * from satuan');
            $result = $qry->result_array();
            return $result;
        }
    }