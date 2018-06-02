<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_migration extends CI_Controller {

    const INIT_NAME = 'Initial_setup';
    const AUTH_INIT_NAME = 'Initial_setup';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('datetime_helper');
        $this->load->library('form_validation');
    }

    public function index() {
        redirect('generate_migration/generic');
    }

    // --- pages ---
    public function init() {
        $data = $this->_prepare_data($this::INIT_NAME, TRUE);
        $this->load->view('forms/init_form', $data);
    }

    public function authenticate_init() {
        $data = $this->_prepare_data($this::AUTH_INIT_NAME, TRUE);
        $this->load->view('forms/authenticate_init_form', $data);
    }

    public function generic() {
        $this->form_validation->set_rules('script_name', 'Script Name', 'trim|required|alpha_dash|max_length[512]');

        if($this->form_validation->run()) {
            $script_name = $this->input->post('script_name');
            redirect('generate_migration/generate_generic_script/' . $script_name);
        }

        $data = $this->_prepare_data('Sample_name', TRUE);
        $this->load->view('forms/generic_form', $data);
    }

    // --- exports ---
    public function generate_init_script() {
        $data = $this->_prepare_data($this::INIT_NAME);
        $this->load->view('export/init_export', $data);
    }

    public function generate_authenticate_init_script() {
        $data = $this->_prepare_data($this::AUTH_INIT_NAME);
        $this->load->view('export/authenticate_init_export', $data);
    }

    public function generate_generic_script($script_name) {
        $data = $this->_prepare_data($script_name);
        $this->load->view('export/generic_export', $data);
    }

    private function _nav_links($active_link) {
        return array(
            'init' => [

            ],
            'authenticate_init' => [

            ],
            'generic' => [
                
            ]
        );
    }

    private function _prepare_data($script_name, $html=FALSE) {
        return array(
            'descriptive_name' => ucfirst($script_name),
            'version_number' => $version_number = $this->datetime_helper->now(MIGRATION_DATE_FORMAT),
            'filename' => $version_number . "_" . strtolower($script_name),
            'html' => $html
        );
    }

} //end Generate_migration controller class