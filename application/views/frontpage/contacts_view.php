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

<div class="rounded-box contact">

<?php if( !empty($info['skype']) ) {?>
    <div class="cont">
        <div class="cont-top"></div>
        <div class="cont-inner">
            <label class="label-1">Skype:</label>
            <div class="text"><?=$info['skype']?></div>
        </div>
        <div class="cont-bottom"></div>
    </div>
<?php }?>

<?php if( !empty($info['commerdiv_email']) ) {?>
    <div class="cont">
        <h3>Commercial Division</h3>
        <div class="cont-top"></div>
        <div class="cont-inner">
            <label class="label-1">E-mail:</label>
            <div class="text"><a href="mailto:<?=$info['commerdiv_email']?>"><?=$info['commerdiv_email']?></a></div>
        </div>
        <div class="cont-bottom"></div>
    </div>
<?php }?>

<?php if( !empty($info['commerdivar_phone']) ) {?>
    <div class="cont">
        <h3>Commercial Division: ARGENTINA</h3>
        <div class="cont-top"></div>
        <div class="cont-inner">
            <label class="label-1">Phone:</label>
            <div class="text"><?=nl2br($info['commerdivar_phone'])?></div>
        </div>
        <div class="cont-bottom"></div>
    </div>
<?php }?>

<?php if( !empty($info['commerdives_phone']) ) {?>
    <div class="cont">
        <h3>Commercial Division: ESPA&Ntilde;A</h3>
        <div class="cont-top"></div>
        <div class="cont-inner">
            <label class="label-1">Phone:</label>
            <div class="text"><?=nl2br($info['commerdives_phone'])?></div>
        </div>
        <div class="cont-bottom"></div>
    </div>
<?php }?>

<?php if( !empty($info['pp_phone']) ) {?>
    <div class="cont">
        <h3>Prduction and Planning</h3>
        <div class="cont-top"></div>
        <div class="cont-inner">
            <label class="label-1">Phone:</label>
            <div class="text"><?=nl2br($info['pp_phone'])?></div>
        </div>
        <div class="cont-bottom"></div>
    </div>
<?php }?>

<?php if( !empty($info['prodplan_email']) ) {?>
    <div class="cont">
        <div class="cont-top"></div>
        <div class="cont-inner">
            <label class="label-1">E-mail:</label>
            <div class="text"><a href="mailto:<?=$info['prodplan_email']?>"><?=$info['prodplan_email']?></a></div>
        </div>
        <div class="cont-bottom"></div>
    </div>
<?php }?>

    <div class="box-end clear"></div><!-- corners -->
</div>

<!-- end: right-column -->
