<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(validation_errors()):?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <?=validation_errors();?>
    </div>
<?php endif;?>