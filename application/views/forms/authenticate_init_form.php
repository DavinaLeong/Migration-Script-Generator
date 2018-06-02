<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_snippets/head_resources'); ?>
</head>
<body>
<!-- .container-fluid start -->
<div class="container-fluid">
    <h1 class="display-3"><i class="fas fa-code fa-fw"></i> Migration Script Generator</h1>
    <ul class="nav nav-tabs">
        <li role="presentation" class="nav-item"><a class="nav-link active" href="<?=site_url('generate_migration/init');?>"><i class="fas fa-cog fa-fw"></i> Inital Setup</a></li>
        <li role="presentation" class="nav-item"><a class="nav-link" href="<?=site_url('generate_migration/generic');?>"><i class="fas fa-sync fa-fw"></i> Generic Script</a></li>
    </ul>
</div>
<!-- .container-fluid end -->

<!-- container start -->
<div class="container">
    <h1 class="display-4 mb-3">Generate <span class="text-info">Inital Setup</span> Migration Script</h1>

    <!-- #card-form start -->
    <div id="card-form" class="card border-info mb-3">
        <h5 class="card-header bg-info text-white"><i class="fas fa-bolt fa-fw"></i> Generate Script Form</h5>
        <div class="card-body">
            <p>This form generates a migration script which inits the usual tables like User and User Log.</p>
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
            <pre><code class="language-php line-numbers"><?php $this->load->view('templates/authenticate_init_template') ;?></code></pre>
        </div>
    </div>
    <!-- #card-script end -->

    <?php $this->load->view('_snippets/footer'); ?>
</div>
<!-- container end -->
<?php $this->load->view('_snippets/body_resources'); ?>
</body>
</html>