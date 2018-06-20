<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {

    const INIT_NAME = 'Initial_setup';
    const AUTH_INIT_NAME = 'Initial_setup';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('datetime_helper');
        $this->load->library('form_validation');
    }

    public function index() {
        redirect('generate/generic');
    }

    // --- pages ---
    public function init() {
        $data = $this->_prepare_data($this::INIT_NAME, TRUE);
        $data['nav_links'] = $this->_nav_links('init');
        $this->load->view('generate/init_page', $data);
    }

    public function auth_init() {
        $data = $this->_prepare_data($this::INIT_NAME, TRUE);
        $data['nav_links'] = $this->_nav_links('auth_init');
        $this->load->view('generate/auth_init_page', $data);
    }

    public function generic() {
        $this->form_validation->set_rules('script_name', 'Script Name', 'trim|required|alpha_dash|max_length[512]');

        if($this->form_validation->run()) {
            $script_name = $this->input->post('script_name');
            redirect('generate/generate_generic_script/' . $script_name);
        }

        $data = $this->_prepare_data($this::INIT_NAME, TRUE);
        $data['nav_links'] = $this->_nav_links('generic');
        $this->load->view('generate/generic_page', $data);
    }

    public function nodejs() {
        $this->form_validation->set_rules('script_name', 'Script Name', 'trim|required|alpha_dash|max_length[512]');
        $this->form_validation->set_rules('table_name', 'Table Name', 'trim|required|alpha_dash|max_length[512]');
        $this->form_validation->set_rules('schema_name', 'Schema Name', 'trim|required|alpha_dash|max_length[512]');

        if($this->form_validation->run()) {
            $script_name = $this->input->post('script_name');
            $table_name = $this->input->post('table_name');
            $schema_name = $this->input->post('schema_name');
            redirect("generate/generate_nodejs/$script_name/$table_name/$schema_name");
        }

        $data = $this->_prepare_data($this::INIT_NAME, TRUE, 'kebab');
        $data['table_name'] = 'SampleTable';
        $data['schema_name'] = 'sampleTable';
        $data['nav_links'] = $this->_nav_links('nodejs');
        $this->load->view('generate/nodejs_page', $data);
    }

    private function _nav_links($active_link_key) {
        return array(
            'generic' => [
                'label' => '<i class="fas fa-exchange-alt fa-fw"></i> Generic',
                'url' => site_url('generate/generic'),
                'active' => ($active_link_key == 'generic')
            ],
            'init' => [
                'label' => '<i class="fas fa-cog fa-fw"></i> Inital Setup',
                'url' => site_url('generate/init'),
                'active' => ($active_link_key == 'init')
            ],
            'auth_init' => [
                'label' => '<i class="fas fa-lock fa-fw"></i> Auth Inital Setup',
                'url' => site_url('generate/auth_init'),
                'active' => ($active_link_key == 'auth_init')
            ],
            'nodejs' => [
                'label' => '<i class="fas fa-code fa-fw"></i> Node JS',
                'url' => site_url('generate/nodejs'),
                'active' => ($active_link_key == 'nodejs')
            ]
        );
    }

    // --- exports ---
    public function generate_init_script() {
        $data = $this->_prepare_data($this::INIT_NAME);
        $this->load->view('export/init_export', $data);
    }

    public function generate_auth_init_script() {
        $data = $this->_prepare_data($this::AUTH_INIT_NAME);
        $this->load->view('export/auth_init_export', $data);
    }

    public function generate_generic_script($script_name) {
        $data = $this->_prepare_data($script_name);
        $this->load->view('export/generic_export', $data);
    }

    public function generate_nodejs($script_name, $table_name, $schema_name) {
        $data = $this->_prepare_data($script_name, FALSE, 'kebab');
        $data['table_name'] = $table_name;
        $data['schema_name'] = $schema_name;
        $this->load->view('export/nodejs_export', $data);
    }

    private function _prepare_data($script_name, $html=FALSE, $case_type='snake') {
        $version_number = $this->datetime_helper->now(MIGRATION_DATE_FORMAT);
        $filename = $version_number . "_" . strtolower($script_name);

        switch($case_type) {
            case $this->_case_type()['kebab']:
                $filename = $version_number . "-" . strtolower($script_name);
                break;

            case $this->_case_type()['snake']:
            default:
                $filename = $version_number . "_" . strtolower($script_name);
                break;
        }

        return array(
            'descriptive_name' => $script_name,
            'version_number' => $version_number,
            'filename' => $filename,
            'html' => $html
        );
    }

    private function _case_type() {
        return [
            'snake' => 'snake',
            'kebab' => 'kebab',
            'pascal' => 'pascal',
            'camel' => 'camel'
        ];
    }

} //end Generate controller class