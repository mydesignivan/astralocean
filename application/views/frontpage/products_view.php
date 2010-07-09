<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="content spacer">
    <h1>Our Products</h1>
</div>

<!-- start: portfolio boxes -->
<?php foreach( $listProducts->result_array() as $row ){?>
<div class="folio-box">
    <div class="inner">
        <a href="<?=site_url('products/'.$row['reference'])?>"><img src="<?=UPLOAD_DIR.$row['image_thumb']?>" alt="<?=$row['image_thumb']?>" width="200" height="146" /></a>
        <div class="proj-label"><?=$row['productname']?></div><!-- project label -->
    </div>
    <div class="box-end"></div><!-- corners -->
</div>
<?php }?>

