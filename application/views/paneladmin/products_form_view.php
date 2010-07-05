<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<h1>New Product</h1>
<?php if( $this->session->flashdata('savestatus')=="error" ){?>
    <div class="error"><?=$this->session->flashdata('msgerror')?></div>
<?php }?>

<div class="clear">
    <button type="button" class="submit" onclick="Products.save();">Save</button>
    &nbsp;<img src="images/ajax-loader2.gif" alt="Loading" width="32" height="32" style="position:relative; top:10px; display: none;" class="jq-ajaxloader" />
</div>
<form id="form1" method="post" action="<?=site_url('/panel/products/'. (!isset($info) ? "create" : "edit"));?>" enctype="multipart/form-data">
    <fieldset>
        <div class="left">
            <label for="txtProduct">Product Name (*)</label>
            <input type="text" name="txtProductName" id="txtProductName" value="<?=@$info['productname']?>" class="left larger validator" />
        </div>

        <div class="clear left">
            <label for="txtProduct">Image (*)</label>
            <?php if( !isset($info) ){?>
                <input type="file" name="txtImage" id="txtImage" value="" class="left larger" size="30" />
            <?php }else{?>
                <a href="<?=UPLOAD_DIR.$info['image'];?>" class="jq-fancybox"><img src="<?=UPLOAD_DIR.$info['image_thumb'];?>" alt="" width="100" height="" /></a><br />
                <input type="file" name="txtImage" id="txtImage" value="" class="left larger" size="30" />
            <?php }?>
            <div id="msgbox-image" class="left clear"></div>
        </div>

        <div class="clear left">
            <label>About</label>
            <textarea id="txtContent_about" name="txtContent_about" rows="5" cols="20" class="left"><?=@$info['content_about'];?></textarea>
            <div id="msgbox-content1" class="left clear" style="margin-top:10px;"></div>
        </div>

        <div class="clear left">
            <label>Product Characteristics</label>
            <textarea id="txtContent_productcharacteristics" name="txtContent_productcharacteristics" rows="5" cols="20" class="left"><?=@$info['content_productcharacteristics'];?></textarea>
            <div id="msgbox-content2" class="left clear" style="margin-top:10px;"></div>
        </div>

        <div class="clear left">
            <label>Freezing Methods</label>
            <textarea id="txtContent_freezingmethods" name="txtContent_freezingmethods" rows="5" cols="20" class="left"><?=@$info['content_freezingmethods'];?></textarea>
            <div id="msgbox-content3" class="left clear" style="margin-top:10px;"></div>
        </div>


    </fieldset>

    <div class="clear">
        <button type="button" class="submit" onclick="Products.save();">Save</button>
        &nbsp;<img src="images/ajax-loader2.gif" alt="Loading" width="32" height="32" style="position:relative; top:10px; display: none;" class="jq-ajaxloader" />
    </div>

    <input type="hidden" name="product_id" value="<?=@$info['product_id']?>" />
    <input type="hidden" name="filename" value="<?=@$info['image']?>" />
</form>

<script type="text/javascript">
<!--
    Products.initializer(<?=!isset($info) ? 'false' : 'true';?>);
-->
</script>
