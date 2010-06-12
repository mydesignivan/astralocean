<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<base href="<?=base_url();?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="images/favicon.ico" rel="stylesheet icon" type="image/ico" />

<link href="css/reset<?=$this->config->item('sufix_pack_css');?>.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/stylesheet<?=$this->config->item('sufix_pack_css');?>.css" rel="stylesheet" type="text/css" media="all" />
<!--[if lte IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
<!--[if lte IE 7]>
<link href="css/ie.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->


<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>


<script type="text/javascript">
<!--
<?php $indexphp = index_page();if( !empty($indexphp) ) $indexphp.="/";?>
    var baseURI = $("base").attr("href")+"<?=$indexphp;?>";
-->
</script>


<!--[if IE 6]>
<script type="text/javascript">
    var IE6UPDATE_OPTIONS = {
        icons_path: "js/plugins/ie6update/ie6update/images/"
    }
</script>
<script type="text/javascript" src="js/plugins/ie6update/ie6update/ie6update.js"></script>
<![endif]-->

<!--[if IE 6]>
<script type="text/javascript" src="_js/plugins/DD_belatedPNG.js"></script>
<![endif]-->