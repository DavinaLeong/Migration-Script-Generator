<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @var $nav_links
 */
?><ul class="nav nav-tabs">
    <?php foreach($nav_links as $link_key=>$link): ?>
    <li role="presentation" class="nav-item"><a class="<?= $link['active'] ? 'nav-link' : ' nav-link active'; ?>" href="<?=$link['url'];?>"><?=$link['label'];?></a></li>
    <?php endforeach; ?>
</ul>