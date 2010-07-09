<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- start: left-column -->
<div id="left-column" class="content">

    <h1>Contact Form</h1>
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Nam ornare. Vivamus dolor metus, condimentum ac, iaculis non.</p>            -->

    <!-- Necessary div for jQuery validation -->
    <div id="contact-form">
        <?php if( $this->session->flashdata('statusmail')=="ok" ){?>
            <div class="success">Thank you very much for contacting, shortly we will be in contact.</div>
        <?php }elseif( $this->session->flashdata('statusmail')=="error" ){?>
            <div class="error">Error in sending email</div>
        <?php }?>
            
        <form id="form1" method="post" action="<?=site_url('/contacts/send/')?>" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <div class="left">
                    <label>Your name..</label>
                    <input type="text" name="txtName" id="txtName" value="" class="left validator" />
                </div>

                <div class="clear left">
                    <label>Your E-mail..</label>
                    <input type="text" name="txtEmail" id="txtEmail" value="" class="left validator" />
                </div>

                <div class="clear left">
                    <label>Your message..</label>
                    <textarea name="txtConsult" id="txtConsult" cols="40" rows="5" class="left validator"></textarea><br/>
                </div>
            </fieldset>
            <button type="button" class="submit" onclick="Contact.send();">Send it!</button>
        </form>

        <script type="text/javascript">
        <!--
            Contact.initializer();
        -->
        </script>

    </div>
</div>
<!-- end: left-column -->

<!-- start: right-column -->

<div class="rounded-box">

<?php if( !empty($info['skype']) ) {?>
    <div class="inner content">
        <h6>Skype: <?=$info['skype']?></h6>
    </div>
<?php }?>
<?php if( !empty($info['commerdiv_email']) ) {?>
    <div class="inner content">
        <h3 class="title1">Commercial Division</h3>
        <h6>E-mail: <a href="mailto:<?=$info['commerdiv_email']?>"><?=$info['commerdiv_email']?></a></h6>
    </div>
<?php }?>
<?php if( !empty($info['commerdivar_phone']) ) {?>
    <div class="inner content">
        <h3 class="title1">Commercial Division: ARGENTINA</h3>
        <h6>Phone: <?=nl2br($info['commerdivar_phone'])?></h6>
    </div>
<?php }?>
<?php if( !empty($info['commerdives_phone']) ) {?>
    <div class="inner content">
        <h3 class="title1">Commercial Division: ESPA&Ntilde;A</h3>
        <h6>Phone: <?=nl2br($info['commerdives_phone'])?></h6>
    </div>
<?php }?>
<?php if( !empty($info['prodplan_phone']) ) {?>
    <div class="inner content">
        <h3 class="title1">Prduction and Planning</h3>
        <h6>Phone: <?=nl2br($info['prodplan_phone'])?></h6>
    </div>
<?php }?>
<?php if( !empty($info['prodplan_email']) ) {?>
    <div class="inner content">
        <h6>E-mail: <a href="mailto:<?=$info['prodplan_email']?>"><?=$info['prodplan_email']?></a></h6>
    </div>
<?php }?>

    <div class="box-end"></div><!-- corners -->
</div>

<!--<div class="rounded-box">
    <div class="inner content">
        <p>123 Main Road East<br />
        Cityname, ST 12345</p>
    </div>
    <div class="box-end"></div>
</div>-->

<!-- end: right-column -->
