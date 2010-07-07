<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="head">
    <!-- logo --><h1 id="logo"><a href="<?=$this->config->item('base_url');?>">Logo</a></h1>

    <!-- Main menu -->
    <?php $seg = $this->uri->segment(1);?>

    <?php if( $this->session->userdata('logged_in') ) {?>
    <a href="<?=site_url('/panel/')?>" class="link-bp">Back to Panel</a>
    <?php }?>
    
    <ul id="navigation">
        <li <?php if( $seg=="index" || $seg=="" ) echo 'class="highlighted"';?>><a href="<?=$this->config->item('base_url');?>">Home</a></li>
        <li <?php if( $seg=="ourcompany" ) echo 'class="highlighted"';?>><a href="<?=site_url('/ourcompany/');?>">Our Company</a></li>
        <li <?php if( $seg=="products" ) echo 'class="highlighted"';?>><a href="<?=site_url('/products/');?>">Products</a></li>
        <li <?php if( $seg=="facilities" ) echo 'class="highlighted"';?>><a href="<?=site_url('/facilities/');?>">Facilities</a></li>
        <li <?php if( $seg=="contacts" ) echo 'class="highlighted"';?>><a href="<?=site_url('/contacts/');?>">Contact</a></li>
    </ul>
</div>

<!-- begin: promo-box -->
<div id="promo-box">
    <div class="inner">

        <div class="header">
            <div class="column1">
                <span></span>
            </div>
            <div class="column2">
                <div id="slider" class="slider">
                    <img src="images/slider/foto-1.jpg" alt="Connecting the dots" width="571" height="216" />
                    <img src="images/slider/foto-2.jpg" alt="Connecting the dots" width="571" height="216" />
                    <img src="images/slider/foto-3.jpg" alt="Connecting the dots" width="571" height="216" />
                    <img src="images/slider/foto-4.jpg" alt="Connecting the dots" width="571" height="216" />
                </div>
                <div id="slide-label" class="slide-label"></div>
            </div>
        </div>

<?php if( $this->uri->segment(1)=="index"||$this->uri->segment(1)=="" ){?>
        <div class="clear"></div>
        <div class="intro left">
            <span>Hake</span>
            <p><img src="images/pescados/hake.jpg" alt="Hake" width="125" />Praesent viverra dapibus ipsum vitae cursus. Proin eu dolor risus,
            nec tristique odio. Morbi luctus.</p>
        </div>

        <div class="intro left">
            <span>Pargo</span>
            <p><img src="images/pescados/pargo.jpg" alt="Pargo" width="125" />Praesent viverra dapibus ipsum vitae cursus. Proin eu dolor risus,
            nec tristique odio. Morbi luctus.</p>
        </div>

        <div class="intro left">
            <span>Ray</span>
            <p><img src="images/pescados/ray.jpg" alt="Ray" width="125" />Praesent viverra dapibus ipsum vitae cursus. Proin eu dolor risus,
            nec tristique odio. Morbi luctus.</p>
        </div>

        <div class="intro left">
            <span>Red Snapper</span>
            <p><img src="images/pescados/redsnapper.jpg" alt="Red Snapper" width="125" />Praesent viverra dapibus ipsum vitae cursus. Proin eu dolor risus,
            nec tristique odio. Morbi luctus.</p>
        </div>

        <div class="intro left">
            <span>Sea Trout</span>
            <p><img src="images/pescados/sea-trout.jpg" alt="Sea Trout" width="125" />Praesent viverra dapibus ipsum vitae cursus. Proin eu dolor risus,
            nec tristique odio. Morbi luctus.</p>
        </div>

        <div class="intro left">
            <span>Skate</span>
            <p><img src="images/pescados/skate.jpg" alt="Skate" width="125" />Praesent viverra dapibus ipsum vitae cursus. Proin eu dolor risus,
            nec tristique odio. Morbi luctus.</p>
        </div>
<?php }?>
        <div class="clear"></div>
    </div>
    <div class="box-end"></div><!-- corners -->
</div>
<!-- end: promo-box -->
