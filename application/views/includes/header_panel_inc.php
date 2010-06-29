<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="head">
    <!-- logo --><h1 id="logo"><a href="<?=$this->config->item('base_url');?>">Logo</a></h1>

    <!-- Main menu -->
    <?php $seg = $this->uri->segment(2);?>

    <ul id="navigation">
        <li <?php if( $seg=="index" || $seg=="" ) echo 'class="highlighted"';?>><a href="<?=$this->config->item('base_url');?>">Home</a></li>
        <li <?php if( $seg=="myaccount" ) echo 'class="highlighted"';?>><a href="<?=site_url('/panel/myaccount/');?>">My Account</a></li>
        <li <?php if( $seg=="products" ) echo 'class="highlighted"';?>><a href="<?=site_url('/panel/products/');?>">Products</a></li>
        <li <?php if( $seg=="pages" ) echo 'class="highlighted"';?>><a href="<?=site_url('/panel/pages/');?>">Pages</a></li>
        <li><a href="<?=site_url('/panel/index/logout/');?>">Logout</a></li>
    </ul>
</div>

