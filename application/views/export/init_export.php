<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var $descriptive_name
 * @var $version_number
 * @var $filename
 */
header("Content-Type: application/php");
header("Content-Disposition: attachment; filename=" . $filename . ".php");
header("Pragma: no-cache");
header("Expires: 0");

$this->load->view('templates/init_template');