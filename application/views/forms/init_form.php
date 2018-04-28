<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_snippets/head_resources'); ?>
</head>
<body>
<!-- .container-fluid start -->
<div class="container-fluid">
    <h1 class="page-header"><i class="fa fa-code fa-fw"></i> Migration Script Generator</h1>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="<?=site_url('generate_migration/init');?>"><i class="fa fa-cog fa-fw"></i> Inital Setup</a></li>
        <li role="presentation"><a href="<?=site_url('generate_migration/generic');?>"><i class="fa fa-refresh fa-fw"></i> Generic Script</a></li>
    </ul>
</div>
<!-- .container-fluid end -->

<!-- container start -->
<div class="container">
    <h2 class="page-header">Generate <span class="text-info">Inital Setup</span> Migration Script</h2>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h2 class="panel-title"><i class="fa fa-bolt fa-fw"></i> Generate Script Form</h2>
        </div>
        <div class="panel-body text-center">
            <p>This form generates a migration script which inits the usual tables like User and User Log.</p>
            <p>
                <a class="btn btn-primary btn-lg"
                   href="<?=site_url('generate_migration/generate_init_script');?>"
                   target="_blank">
                    Generate Script <i class="fa fa-check fa-fw"></i>
                </a>
            </p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><i class="fa fa-code fa-fw"></i> Script Preview</h2>
        </div>
        <div class="panel-body">
            <pre><code class="language-php line-numbers"><?php $this->load->view('templates/init_template') ;?></code></pre>
        </div>
    </div>

    <?php $this->load->view('_snippets/footer'); ?>
</div>
<!-- container end -->
<?php $this->load->view('_snippets/body_resources'); ?>
</body>
</html>