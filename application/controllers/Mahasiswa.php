<?php
    class Mahasiswa extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function index()
        {
            $qry = $this->db->query('select prodi.prodi, mahasiswa.* from prodi, mahasiswa where prodi.id = mahasiswa.prodi_id order by id asc');
            $view['data'] = $qry->result_array();
            $this->load->view('mahasiswa/list', $view);
        }

        public function tambah()
        {
            $data['prodi_combo'] = $this->_prodi_combo_generate();
            $this->load->view('mahasiswa/form', $data);
        }

        public function edit($prm_key = '')
        {
            if(trim($prm_key) != '')
            {
                $view['prodi_combo'] = $this->_prodi_combo_generate();
                $qry = $this->db->get_where('mahasiswa', array('id' => $prm_key));
                $view['data'] = $qry->result_array();
                $this->load->view('mahasiswa/form', $view);
            } else {
            redirect(site_url().'/mahasiswa');
            }
        }

        public function hapus($prm_key = '') {
            if(trim($prm_key) != '') {
                $qry = $this->db->delete('mahasiswa', array('id' => $prm_key));
            }
            redirect(site_url().'/mahasiswa');
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
                    'field' => 'cmb_prodi'
                    , 'label' => 'Prodi'
                    , 'rules' => 'trim|required'
                ), 
                array
                (
                'field' => 'txt_nama'
                , 'label' => 'Nama'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_alamat'
                , 'label' => 'Alamat'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'cmb_jenis_kelamin'
                , 'label' => 'JenisKelamin'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_no_tlp'
                , 'label' => 'No Telp'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_tgl_lahir'
                , 'label' => 'Tgl Lahir'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_tgl_masuk'
                , 'label' => 'Tgl Masuk'
                , 'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('<code>', '</code>');
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('mahasiswa/form');
            } else {
                $qry = $this->db->get_where('mahasiswa', array('id' => $this->input->post('txt_id')));
                $data = array
                (
                    'prodi_id' => $this->input->post('cmb_prodi')
                    , 'nama' => $this->input->post('txt_nama')
                    , 'alamat' => $this->input->post('txt_alamat')
                    , 'jenis_kelamin' => $this->input->post('cmb_jenis_kelamin')
                    , 'no_tlp' => $this->input->post('txt_no_tlp')
                    , 'tgl_lahir' => $this->input->post('txt_tgl_lahir')
                    , 'tgl_masuk' => $this->input->post('txt_tgl_masuk')
                );
                if( count($qry->result()) == 0 )
                {
                    $data = array_merge(array( 'id' => $this->input->post('txt_id') ), $data);
                    $this->db->insert('mahasiswa', $data);
                } else {
                    $this->db->update('mahasiswa', $data, array('id' => $this->input->post('txt_id')));
                }
                redirect(site_url().'/mahasiswa');
            }
        }

        private function _prodi_combo_generate()
        {
            $qry = $this->db->query('select * from prodi');
            $result = $qry->result_array();
            return $result;
        }
    }