<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<h1>Pages</h1>

<table id="tblList" cellpadding="0" cellspacing="0" class="clear tbl-pages">
    <tbody>
        <tr>
            <td class="cell1"><a href="<?=site_url('/ourcompany/')?>" class="left" target="_blank" style="position: relative;">Our Company</a>
                <div id="cont1" class="clear left">
                    <div class="success hide" style="margin-bottom:10px;">Los datos han sido guardado con &eacute;xito</div>
                    <div class="error hide" style="margin-bottom:10px;">Los datos no han podido ser guardados con &eacute;xito</div>
                    <textarea id="txtContent1" rows="5" cols="20" class="left"></textarea>
                    <button type="button" class="submit" onclick="Pages.save(this, 'txtContent1', 'ourcompany');">Save</button><img src="images/ajax-loader2.gif" alt="Loading" width="32" height="32" style="position:relative; top: 12px;" class="jq-ajaxloader hide" />
                </div>
            </td>
            <td class="cell2"><a href="#cont1" onclick="Pages.slideCont(this); return false;"><img src="images/icon_arrow_up2.png" alt="Abrir" width="16" height="16" class="jq-icon" /></a></td>
        </tr>
        <tr>
            <td class="cell1"><a href="<?=site_url('/facilities/')?>" class="left" target="_blank" style="position: relative;">Facilities</a>
                <div id="cont2" class="clear left">
                    <div class="success hide" style="margin-bottom:10px;">Los datos han sido guardado con &eacute;xito</div>
                    <div class="error hide" style="margin-bottom:10px;">Los datos no han podido ser guardados con &eacute;xito</div>
                    <textarea id="txtContent2" rows="5" cols="20" class="left"></textarea>
                    <button type="button" class="submit" onclick="Pages.save(this, 'txtContent2', 'facilities');">Save</button><img src="images/ajax-loader2.gif" alt="Loading" width="32" height="32" style="position:relative; top: 12px;" class="jq-ajaxloader hide" />
                </div>
            </td>
            <td class="cell2"><a href="#cont2" onclick="Pages.slideCont(this); return false;"><img src="images/icon_arrow_up2.png" alt="Abrir" width="16" height="16" class="jq-icon" /></a></td>
        </tr>
    </tbody>
</table>

<script type="text/javascript">
<!--
    Pages.initializer();
-->
</script>