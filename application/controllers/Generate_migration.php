<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_migration extends CI_Controller {

    const INIT_NAME = 'Initial_setup';

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('datetime_helper');
        $this->load->library('form_validation');
    }

    public function index() {
        redirect('generate_migration/generic');
    }

    public function init() {
        $data = $this->_prepare_data($this::INIT_NAME, TRUE);
        $this->load->view('forms/init_form', $data);
    }

    public function generate_init_script() {
        $data = $this->_prepare_data($this::INIT_NAME);
        $this->load->view('export/init_export', $data);
    }

    public function generic() {
        $this->load->view('forms/generic_form');
    }

    private function _prepare_data($descriptive_name, $html=FALSE) {
        return array(
            'descriptive_name' => $descriptive_name,
            'version_number' => $version_number = $this->datetime_helper->now(MIGRATION_DATE_FORMAT),
            'filename' => $version_number . "_" . $descriptive_name,
            'html' => $html
        );
    }

} //end Generate_migration controller class