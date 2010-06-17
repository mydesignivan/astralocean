<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<h1>Products</h1>

<button type="button" class="right submit" onclick="location.href='<?=site_url('/panel/products/form/');?>'">New Product</button>

<table id="tblList" cellpadding="0" cellspacing="0" class="clear tbl-products">
    <thead>
        <tr>
            <td class="cell1">Product</td>
            <td class="cell2">Order</td>
            <td class="cell3">Edit</td>
            <td class="cell4">Delete</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $listProducts->result_array() as $row ){
        $url = site_url('/panel/products/form/'.$row['product_id']);
    ?>
        <tr>
            <td class="cell1">
                <a href="<?=$url?>"><img src="<?=UPLOAD_DIR.$row['image_thumb']?>" alt="" width="90" height="" /></a>
                <a href="<?=$url?>"><?=$row['productname'];?></a>
            </td>
            <td class="cell2">
                <a href="<?=site_url('/panel/products/form/')?>"><img src="images/icon_arrow_down.png" alt="Down" width="16" height="16" /></a>&nbsp;&nbsp;
                <a href="<?=site_url('/panel/products/form/')?>"><img src="images/icon_arrow_up.png" alt="Up" width="16" height="16" /></a>
            </td>
            <td class="cell3"><a href="<?=$url?>" class="link-icon"><img src="images/icon_edit.png" alt="" width="16" height="16" /><span>Edit</span></a></td>
            <td class="cell4"><a href="javascript:void(Products.del(<?=$row['product_id']?>))" class="link-icon"><img src="images/icon_delete.png" alt="" width="16" height="16" /><span>Delete</span></a></td>
        </tr>
    <?php }?>
    </tbody>
</table>

<div class="text-center"><?=$this->pagination->create_links();?></div>
