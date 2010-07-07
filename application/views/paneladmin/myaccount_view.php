<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<h1>My Account</h1>
<?php if( $this->session->flashdata('savestatus')=="ok" ){?>
    <div class="success">Los datos han sido guardado con &eacute;xito.</div>
<?php }elseif( $this->session->flashdata('savestatus')=="error" ){?>
    <div class="error">Los datos no han sido guardados.</div>
<?php }?>

<form id="form1" method="post" action="<?=site_url('/panel/myaccount/save/');?>">
    <fieldset class="fieldset-form myaccount-form">
        <legend>Datos del Contacto</legend>

        <div class="left">
            <div class="row w1">
                <label class="left">Skype</label>
                <input type="text" name="txtSkype" value="<?=$info['skype'];?>" class="right" />
            </div>

            <div class="row w1">
                <h6>Commercial Division</h6>
                <label class="left">Email (*)</label>
                <input type="text" name="txtCommerDivEmail" id="txtCommerDivEmail" value="<?=$info['commerdiv_email'];?>" class="right" />
            </div>

            <div class="row w1">
                <h6>Commercial Division ARGENTINA</h6>
                <label class="left">Phone</label>
                <textarea name="txtCommerDivArPhone" rows="22" cols="10" class="right textarea-small"><?=$info['commerdivar_phone'];?></textarea>
            </div>
        </div>
        <div class="right">
            <div class="row w1">
                <h6>Commercial Division ESPA&Ntilde;A</h6>
                <label class="left">Phone</label>
                <textarea name="txtCommerdivEsPhone" rows="22" cols="10" class="right textarea-small"><?=$info['commerdives_phone'];?></textarea>
            </div>

            <div class="row w1">
                <h6>Production and Planning</h6>
                <label class="left">Phone</label>
                <textarea name="txtProdPlanPhone" rows="22" cols="10" class="right textarea-small"><?=$info['prodplan_phone'];?></textarea>
            </div>
            <div class="row w1">
                <label class="left">Email</label>
                <input type="text" name="txtProdPlanEmail" value="<?=$info['prodplan_email'];?>" class="right" />
            </div>
        </div>
    </fieldset>

    <fieldset class="fieldset-form myaccount-form">
        <legend>Datos del Usuario</legend>

        <div class="row w2">
            <label class="left">User (*)</label>
            <input type="text" name="txtUser" id="txtUser" value="<?=$info['username'];?>" class="right validator" />
        </div>
        <div class="row w2">
            <label class="left">Current Password</label>
            <input type="password" name="txtPssCurrent" id="txtPssCurrent" value="" class="right" />
        </div>
        <div class="row w2">
            <label class="left">New Password</label>
            <input type="password" name="txtPssNew" id="txtPssNew" value="" class="right validator" />
        </div>
        <div class="row w2">
            <label class="left">Repeat Password</label>
            <input type="password" id="txtPssVeri" id="txtPssVeri" value="" class="right validator" />
        </div>
    </fieldset>

    <div class="clear">
        <button type="button" class="submit" onclick="Account.save()">Save</button>
        &nbsp;<img id="imgAL" src="images/ajax-loader2.gif" alt="Loading" width="32" height="32" style="position:relative; top:10px; display: none;" />
    </div>
</form>

<script type="text/javascript">
<!--
    Account.initializer();
-->
</script>
