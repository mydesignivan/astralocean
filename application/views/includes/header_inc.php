<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="head">
    <!-- logo --><h1 id="logo"><a href="<?=$this->config->item('base_url');?>">Logo</a></h1>

    <!-- Main menu -->
    <?php $seg = $this->uri->segment(1);?>

    <ul id="navigation">
        <li <?php if( $seg=="index" || $seg=="" ) echo 'class="highlighted"';?>><a href="<?=$this->config->item('base_url');?>">Home</a></li>
        <li <?php if( $seg=="ourcompany" ) echo 'class="highlighted"';?>><a href="<?=site_url('/ourcompany/');?>">Our Company</a></li>
        <li <?php if( $seg=="products" ) echo 'class="highlighted"';?>><a href="<?=site_url('/products/');?>">Products</a></li>
        <li <?php if( $seg=="facilities" ) echo 'class="highlighted"';?>><a href="<?=site_url('/facilities/');?>">Facilities</a></li>
        <li <?php if( $seg=="contacts" ) echo 'class="highlighted"';?>><a href="<?=site_url('/contacts/');?>">Contact</a></li>
    </ul>
</div>

