<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<h1>Pages</h1>

<table id="tblList" cellpadding="0" cellspacing="0" class="clear tbl-pages">
    <thead>
        <tr>
            <td class="cell1">Page</td>
            <td class="cell2">Edit</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="cell1"><a href="javascript:void(0)">Home</a></td>
            <td class="cell2"><a href="javascript:void(0)" onclick="Pages.slide(this);" class="link-icon"><img src="images/icon_edit.png" alt="" width="16" height="16" /><span>Edit</span></a></td>
        </tr>
        <tr class="hide">
            <td colspan="2">
                <textarea name="txtContent" rows="5" cols="20" class="left"></textarea>
            </td>
        </tr>
        <tr>
            <td class="cell1"><a href="javascript:void()">Our Company</a></td>
            <td class="cell2"><a href="" class="link-icon"><img src="images/icon_edit.png" alt="" width="16" height="16" /><span>Edit</span></a></td>
        </tr>
    </tbody>

    
</table>

<script type="text/javascript">
<!--
    Pages.initializer();
-->
</script>