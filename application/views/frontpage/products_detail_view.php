<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="content spacer">
    <h1><?=$tlp_title_section?></h1>
</div>

<div class="prodet-col1">
    <img src="<?=UPLOAD_DIR.$info['image_thumb']?>" alt="<?=$info['image']?>" width="200" height="146" />
</div>
<div class="prodet-col2">
    <h2 class="text-small">FREEZING METHODS</h2>
    <?=$info['content_freezingmethods']?>
</div>
<div class="prodet-col2">
    <h2 class="text-small">PRODUCT CHARACTERISTICS</h2>
    <?=$info['content_productcharacteristics']?>
</div>
<div class="prodet-col2 last">
    <h2 class="text-small">ABOUT <?=strtoupper($info['productname'])?></h2>
    <?=$info['content_about']?>
</div>
