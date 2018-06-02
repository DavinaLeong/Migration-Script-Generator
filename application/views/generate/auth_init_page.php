<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_snippets/head_resources'); ?>
</head>
<body>
<?php $this->load->view('_snippets/header'); ?>

<!-- container start -->
<div class="container">
    <h1 class="display-4 mb-3">Generate <span class="text-info">Authenticate Inital Setup</span> Migration Script</h1>

    <!-- #card-form start -->
    <div id="card-form" class="card border-info mb-3">
        <h5 class="card-header bg-info text-white"><i class="fas fa-bolt fa-fw"></i> Generate Script Form</h5>
        <div class="card-body">
            <p>Use this script for projects that <em>require</em> authentication.</p>
            <p>This script will create these tables:
                <ul>
                    <li>User</li>
                    <li>User Log</li>
                </ul>
            </p>
            <p>
                <a class="btn btn-primary btn-lg"
                   href="<?=site_url('generate_migration/generate_init_script');?>"
                   target="_blank">
                    Generate Script <i class="fas fa-check fa-fw"></i>
                </a>
            </p>
        </div>
    </div>
    <!-- #card-form end -->

    <!-- #card-script start -->
    <div id="card-script" class="card border-secondary mb-3">
        <h5 class="card-header bg-secondary text-white"><i class="fas fa-code fa-fw"></i> Script Preview</h5>
        <div class="card-body">
            <pre><code class="language-php line-numbers"><?php $this->load->view('templates/auth_init_template') ;?></code></pre>
        </div>
    </div>
    <!-- #card-script end -->

    <?php $this->load->view('_snippets/footer'); ?>
</div>
<!-- container end -->
<?php $this->load->view('_snippets/body_resources'); ?>
</body>
</html>