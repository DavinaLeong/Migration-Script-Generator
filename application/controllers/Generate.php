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

    private function _prepare_data($script_name, $html=FALSE) {
        return array(
            'descriptive_name' => ucfirst($script_name),
            'version_number' => $version_number = $this->datetime_helper->now(MIGRATION_DATE_FORMAT),
            'filename' => $version_number . "_" . strtolower($script_name),
            'html' => $html
        );
    }

} //end Generate controller class