<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title><?=TITLE_GLOBAL . @$tlp_title;?></title>
    <meta name="description" content="<?=META_DESCRIPTION_GLOBALS . @$tlp_meta_description;?>" />
    <meta name="keywords" content="<?=META_KEYWORDS_GLOBALS . @$tlp_meta_keywords;?>" />
    <meta name="robots" content="index,follow" />

    <?php require('includes/head_inc.php');?>
    <?php if( isset($tlp_script) && !empty($tlp_script) ) {
        if( !is_array($tlp_script) ) $tlp_script = array($tlp_script);
        foreach( $tlp_script as $file ){
            require('js/includes/'.$file.'_inc.php');
        }
    }?>
</head>

<body>
    <!-- begin: wrapper -->
    <div id="wrapper">

        <!-- ================  HEADER  ================ -->
            <?php require('includes/header_inc.php');?>
        <!-- ================  END HEADER  ================ -->


        <!-- =============== CONTAINER CENTRAL =============== -->
            <?php require($tlp_section);?>
        <!-- ================  END MAIN CONTAINER  ================ -->
        <div class="clear"></div>

        <!-- get started
        <div class="get-started">
                <img src="images/get-started.gif" alt="" class="left" />
                <a class="start left" href="contact-us.html">Start</a>
                <div class="clear"></div>
        </div>
         -->

        <!-- =============== FOOTER =============== -->
            <?php require('includes/footer_inc.php');?>
        <!-- =============== END FOOTER =============== -->
    </div>
    <!-- end: wrapper -->
</body>
</html>