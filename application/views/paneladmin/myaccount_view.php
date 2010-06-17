<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<h1>My Account</h1>
<?php if( $this->session->flashdata('savestatus')=="ok" ){?>
    <div class="success">Los datos han sido guardado con &eacute;xito.</div>
<?php }elseif( $this->session->flashdata('savestatus')=="error" ){?>
    <div class="error">Los datos no han sido guardados.</div>
<?php }?>

<form id="form1" method="post" action="<?=site_url('/panel/myaccount/save/');?>">
    <fieldset class="myaccount-col">
        <div class="left">
            <label>Email (*)</label>
            <input type="text" name="txtEmail" id="txtEmail" value="<?=$info['email'];?>" class="validator" />
        </div>

        <div class="clear left">
            <label>Phone</label>
            <input type="text" name="txtPhone" value="<?=$info['phone'];?>" />
        </div>

        <div class="clear left">
            <label>Fax</label>
            <input type="text" name="txtFax" value="<?=$info['fax'];?>" />
        </div>
    </fieldset>

    <fieldset class="myaccount-col">
        <div class="left">
            <label>User (*)</label>
            <input type="text" name="txtUser" id="txtUser" value="<?=$info['username'];?>" class="validator" />
        </div>

        <div id="divCont1" class="clear left">
            <br />
            <a href="javascript:void(Account.show_pss())" class="link1">Change Password</a>
        </div>

        <div id="divCont2" class="clear left hide">
            <div class="clear left">
                <label>Current Password</label>
                <input type="password" name="txtPssCurrent" id="txtPssCurrent" value="" />
            </div>

            <div class="clear left">
                <label>New Password</label>
                <input type="password" name="txtPssNew" id="txtPssNew" value="" class="validator" />
            </div>

            <div class="clear left">
                <label>Repeat Password</label>
                <input type="password" id="txtPssVeri" id="txtPssVeri" value="" class="validator" />
            </div>
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
